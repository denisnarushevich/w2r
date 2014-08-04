<?php

/**
 * planner actions.
 *
 * @package    stag
 * @subpackage planner
 * @author     Rainmaker
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class plannerActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
    public function executeIndex(sfWebRequest $request)
    {
        sfContext::getInstance()->getConfiguration()->loadHelpers('Url'); // url_for
        
        $this->categoriesActivity   = Doctrine_Core::getTable('ActivityCategory')->getAll();
        $this->clients              = Doctrine_Core::getTable('User')->findAll();
        $this->guides               = Doctrine_Core::getTable('sfGuardUser')->findAll();
        
        $planners                   = Doctrine_Core::getTable('Planner')->getAll();
        $planners_fullcalendar      = array();
        foreach ($planners AS $planner)
        {
            $planners_fullcalendar[] = array(
                'title'             =>htmlentities(htmlspecialchars($planner->getUser()->getLastname()).' '.htmlspecialchars($planner->getUser()->getFirstname()).' - '.$planner->getUser()->getPhone()),
                'start'             =>date_format(date_create($planner->getDateBegin()), 'D M d Y H:i:s \G\M\TO (T)'),
                'end'               =>($planner->getDateBegin() == $planner->getDateEnd() ? preg_replace('#00:00:00#', '00:00:99', date_format(date_create($planner->getDateEnd()), 'D M d Y H:i:s \G\M\TO (T)')) : date_format(date_create($planner->getDateEnd()), 'D M d Y H:i:s \G\M\TO (T)')),
                'url'               =>url_for('@planner_view?id='.$planner->getId()),
                'backgroundColor'   =>($planner->getStatus() == 'New' ? 'green' : ($planner->getStatus() == 'InProgress' ? 'orange' : 'red')),
                'borderColor'       =>($planner->getStatus() == 'New' ? 'green' : ($planner->getStatus() == 'InProgress' ? 'orange' : 'red'))
            );
        }
        $this->planners             = $planners_fullcalendar;
    }
    
    public function executeAjax(sfWebRequest $request)
    {
        $id                         = $request->getParameter('id');
        $type                       = $request->getParameter('type');
        if ($type == 'client')
            $planners               = Doctrine_Core::getTable('Planner')->getByIdClient($id);
        else if ($type == 'guide')
            $planners               = Doctrine_Core::getTable('Planner')->getByIdEmployee($id);
        else if ($type == 'activity')
            $planners               = Doctrine_Core::getTable('Planner')->getByIdActivity($id);
        $planners_fullcalendar      = array();

        foreach ($planners AS $planner)
        {
            $planners_fullcalendar[] = array(
                'title'             =>htmlentities(htmlspecialchars($planner->getUser()->getLastname()).' '.htmlspecialchars($planner->getUser()->getFirstname()).' -  '.$planner->getUser()->getPhone()),
                'start'             =>date_format(date_create($planner->getDateBegin()), 'D M d Y H:i:s \G\M\TO (T)'),
                'end'               =>($planner->getDateBegin() == $planner->getDateEnd() ? preg_replace('#00:00:00#', '00:00:99', date_format(date_create($planner->getDateEnd()), 'D M d Y H:i:s \G\M\TO (T)')) : date_format(date_create($planner->getDateEnd()), 'D M d Y H:i:s \G\M\TO (T)')),
                'backgroundColor'   =>($planner->getStatus() == 'New' ? 'green' : ($planner->getStatus() == 'InProgress' ? 'orange' : 'red')),
                'borderColor'       =>($planner->getStatus() == 'New' ? 'green' : ($planner->getStatus() == 'InProgress' ? 'orange' : 'red'))
            );
        }
        $this->renderText(json_encode($planners_fullcalendar));
        return (sfView::NONE);
    }
    
    public function executeView(sfWebRequest $request)
    {
        $id                         = $request->getParameter('id');
        $booking                    = Doctrine_Core::getTable('Booking')->getByIdPlanner($id);
        $planners_fullcalendar      = array();
        
        if (count($booking) > 0)
            $planners_fullcalendar[]= array(
                'title'             =>htmlentities(htmlspecialchars($booking[0]->getPlanner()->getUser()->getLastname()).' '.htmlspecialchars($booking[0]->getPlanner()->getUser()->getFirstname()).' ('.$booking[0]->getPlanner()->getUser()->getPhone()).')',
                'start'             =>date_format(date_create($booking[0]->getPlanner()->getDateBegin()), 'D M d Y H:i:s \G\M\TO (T)'),
                'end'               =>($booking[0]->getPlanner()->getDateBegin() == $booking[0]->getPlanner()->getDateEnd() ? preg_replace('#00:00:00#', '00:00:99', date_format(date_create($booking[0]->getPlanner()->getDateEnd()), 'D M d Y H:i:s \G\M\TO (T)')) : date_format(date_create($booking[0]->getPlanner()->getDateEnd()), 'D M d Y H:i:s \G\M\TO (T)')),
                'backgroundColor'   =>($booking[0]->getStatus() == 'New' ? 'green' : ($booking[0]->getStatus() == 'InProgress' ? 'orange' : 'red')),
                'borderColor'       =>($booking[0]->getStatus() == 'New' ? 'green' : ($booking[0]->getStatus() == 'InProgress' ? 'orange' : 'red'))
            );
        foreach ($booking AS $book)
        {
            $activity = '';
            foreach ($book->getActivity()->getTranslation()->toArray() AS $trad)
            {
                $activity = $trad['name'];
                if ($trad['lang'] == 'fr' || $trad['lang'] == 'en')
                    break;
            }
            $planners_fullcalendar[]    = array(
                'title' =>htmlentities(htmlspecialchars($activity)).', for '.$book->getNbPersons().' person'.($book->getActivity()->getLastname() == NULL && $book->getActivity()->getFirstname() == NULL && $book->getActivity()->getPhone() == NULL ? '' : "\n".'Info. activity: '.sprintf('%s %s (%s)', $book->getActivity()->getLastname(), $book->getActivity()->getFirstname(), $book->getActivity()->getPhone())),
                'start' =>date_format(date_create($book->getDateBegin()), 'D M d Y H:i:s \G\M\TO (T)'),
                'end'   =>($book->getDateBegin() == $book->getDateEnd() ? preg_replace('#00:00:00#', '00:00:99', date_format(date_create($book->getDateEnd()), 'D M d Y H:i:s \G\M\TO (T)')) : date_format(date_create($book->getDateEnd()), 'D M d Y H:i:s \G\M\TO (T)')),
                'backgroundColor'   =>($book->getStatus() == 'New' ? 'green' : ($book->getStatus() == 'InProgress' ? 'orange' : 'red')),
                'borderColor'       =>($book->getStatus() == 'New' ? 'green' : ($book->getStatus() == 'InProgress' ? 'orange' : 'red'))
            );
        }
        foreach ($planners_fullcalendar AS &$p)
            if ($p['start'] == $p['end'])
                $p['end'] = preg_replace('#00:00:00#', '00:00:99', $p['end']);
        $this->planners             = $planners_fullcalendar;
    }
}
