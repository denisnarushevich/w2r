<?php

/**
 * checkout actions.
 *
 * @package    stag
 * @subpackage checkout
 * @author     Rainmaker
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class checkoutActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->bookings = $this->getUser()->getAttribute('booking', array());
    if (!$this->getUser()->isAuthenticated())
        $this->form = new RegisterUserForm();
    $this->user = $this->getUser()->getAccount();
    if ($request->isMethod('post'))
    {
      $this->posts = $request->getPostParameters();

      if ($request->hasParameter('date_from') && $request->getParameter('date_from') != '')
          $this->date_from = strtotime($request->getParameter('date_from'));
      if ($request->hasParameter('date_to') && $request->getParameter('date_to') != '')
          $this->date_to = strtotime($request->getParameter('date_to'));
      if ($this->date_to == '')
          $this->date_to = $this->date_from;
      // Get all the parameter for the != activities
      if ($request->hasParameter('act'))
      {
        // Bind User Here
        if (!$this->getUser()->isAuthenticated())
        {
          $this->form->bind($request->getParameter('user'));
          if ($this->form->isValid()) {
            $this->form->save();
            $user = $this->form->getObject();
            $user->setPassword($this->form->getValue('password'));
            $user->save();

            $this->user = $user;

            
            if (!sfConfig::get('app_doAuth_activation',false)) {
              $user->setIsActive(1);
              $user->save();
              $this->firstSignin();
            } else {
              $this->getUser()->setFlash('notice','Please check your email to finish registration process');
            }
          } else {
            $this->error = 2;
          }
        }
        if ($this->getUser()->isAuthenticated())
        {
          $this->planner = new Planner();
          $this->planner->setIdClient($this->getUser()->getAccount());
          $this->planner->setDateBegin(date('Y-m-d', $this->date_from));
          $this->planner->setDateEnd(date('Y-m-d', $this->date_to));
          $this->planner->setStatus('New');
          $this->planner->setSubmitDate(date('Y-m-d'));
          if ($request->hasParameter('contact_otherInfos'))
            $this->planner->setOtherInfo($request->getParameter('otherInfos'));
          if ($request->hasParameter('contact_lastname'))
            $this->planner->setContactName($request->getParameter('contact_lastname'));
          if ($request->hasParameter('contact_surname'))
            $this->planner->setContactSurname($request->getParameter('contact_surname'));
          if ($request->hasParameter('bonuscheck'))
            $this->planner->setBonusCode($request->getParameter('bonuscheck'));
          $this->planner->save();
          $acts = $request->getParameter('act');
          $nbAct = 0;
          foreach ($acts as $key => $act)
          {
            $runDat = $this->date_from;
            $continue = 0;
            $nb = -1;
            while ($runDat <= $this->date_to) {
              $dateF = date('mdY', $runDat);
              if (isset($act[$dateF . '_tick']))
              {
                $nb = $act[$dateF . '_nb'];
                $continue = 0;
                $runDat += 86400;
                while ($runDat <= $this->date_to) 
                {
                  $dateF = date('mdY', $runDat);
                  if ($nb == $act[$dateF . '_nb'])
                    $continue++;
                  else
                    break;
                  $runDat += 86400;
                }
                $runDat -= 86400;
                $this->addBooking($key, $runDat, $nb, $continue);
                $continue = 0;
                $nbAct++;
              }
              $runDat += 86400;
            }
          }
          if ($nbAct == 0)
            $this->error = 1;
          else
          {
            // Clear the session information
            $this->getUser()->offsetUnset ('booking');
            $this->redirect($this->getController()->genUrl('@added'));
          }
        }
      }
      else
        $this->error = 1;
      
      if (isset($this->error) && $this->error == 1)
        $this->planner->delete();
    }
  }
  
  public function executeAdded(sfWebRequest $request)
  {
    
  }
  
  public function executeCheckbonuscode(sfWebRequest $request)
  {
    if ($request->isMethod('POST') && $request->isXmlHttpRequest())
    {
        if ($request->hasParameter('code'))
        {
          $code = $request->getParameter('code');
          $params = array();
          $valeur = Doctrine_Core::getTable('BonusPartner')->findOneByCode($code);
          if (!$valeur)
          {
            $params = array('error' => $this->getContext()->getI18N()->__('No such code.'));
            return $this->renderText(json_encode($params));
          }
          $params['num'] = $valeur->getId();
          $params['val'] = $valeur->getValue();
          $params['type'] = $valeur->getType();;
          $params['value'] = $valeur->getComment();;
          return $this->renderText(json_encode($params));
        }
    }
    $params = array('error' => $this->getContext()->getI18N()->__('Invalid.'));
    return $this->renderText(json_encode($params));
  }
  
  private function addBooking($key, $runDat, $nb, $continue)
  {
    $startDate = $runDat;
    if ($continue > 0)
    {
      while ($continue > 0)
      {
        $startDate -= 86400;
        $continue--;
      }
    }
    $book = new Booking();
    $book->setIdActivity($key);
    $book->setDateBegin(date('Y-m-d', $startDate));
    $book->setDateEnd(date('Y-m-d', $runDat));
    $book->setIdClient($this->getUser()->getAccount());
    $book->setPlanner($this->planner);
    $book->setNbPersons($nb);
    $book->setStatus('New');
    $book->save();
  }
  
  /**
   *
   * Automaticaly signs in current user after registration 
   */

  protected function firstSignin()
  {
    if (sfConfig::get('app_doAuth_register_signin',true)) {
      $this->getUser()->signIn($this->user);
      $this->getUser()->setFlash('notice','Congratulations! You are now registered.');
    } else {
      $this->getUser()->setFlash('notice','Congratulations! You are now registered. Please, sign in');
    }
  }
}
