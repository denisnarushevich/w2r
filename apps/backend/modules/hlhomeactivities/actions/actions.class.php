<?php

/**
 * hlhomeactivities actions.
 *
 * @package    stag
 * @subpackage hlhomeactivities
 * @author     Rainmaker
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class hlhomeactivitiesActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      $this->langues = Doctrine::getTable('Langues')->getAll();
      if ($request->isMethod('POST'))
      {
          $saveCulture = $this->getUser()->getCulture();
          for ($nb = 1; $nb <= 3; $nb++)
          {
              $hlactivity = Doctrine_Core::getTable('HighlightActivity')->findOneByNumber($nb);
              if (!$hlactivity)
                $hlactivity = new HighlightActivity();
              foreach ($this->langues as $langue) {
                $this->getUser()->setCulture($langue->getIso());
                $title = '';
                $titleBlue = '';
                $desc = '';
                $activity = false;
                if ($request->hasParameter('activity' . $nb . '_' . $langue->getiso()))
                  $activity = Doctrine_Core::getTable('Activity')->findOneBySlug($request->getParameter('activity' . $nb . '_' . $langue->getiso()));
                if ($activity)
                  $activity = $activity->getId();
                if ($request->hasParameter('title_' . $nb . '_' . $langue->getiso()))
                  $title = $request->getParameter('title_' . $nb . '_' . $langue->getiso());
                if ($request->hasParameter('title_' . $nb . '_' . $langue->getiso()))
                  $titleBlue = $request->getParameter('title_' . $nb . '_blue_' . $langue->getiso());
                if ($request->hasParameter('text' . $nb . '_' . $langue->getiso()))
                  $desc = $request->getParameter('text' . $nb . '_' . $langue->getiso());
                $hlactivity->setDescription($desc);
                $hlactivity->setTitle($title);
                $hlactivity->setTitleBlue($titleBlue);
                $hlactivity->setActivity($activity);
                $hlactivity->setNumber($nb);
                $hlactivity->save();
              }
              $hlactivity->save();
          }
          $this->getUser()->setCulture($saveCulture);
      }
      $acties = Doctrine_Core::getTable('HighlightActivity')->findAllWithTranslation();
      $this->activities = array();
      foreach($acties as $nb => $act)
      {
        $this->activities[$nb] = $act->toArray();
        foreach($this->langues as $langue)
        {
          $this->activities[$nb]['Translation'][$langue->getIso()]['activity_slug'] = '';
          $slug = Doctrine_Core::getTable('Activity')->find($acties[$nb]['Translation'][$langue->getIso()]['activity']);
          if ($slug)
            $this->activities[$nb]['Translation'][$langue->getIso()]['activity_slug'] = $slug->getSlug();
        }
      }
  }
  
  public function executeGetActivities(sfWebRequest $request)
  {
      if ($request->isXmlHttpRequest())
      {
          if ($request->hasParameter('q'))
          {
              $q = $request->getParameter('q');
              $activities = Doctrine_Core::getTable('Activity')->getAjaxResults($q);
              $results = array();
              foreach ( $activities as $result )
                $results[] = $result->getSlug();
              $this->results = $results;
          }
      }
  }
}
