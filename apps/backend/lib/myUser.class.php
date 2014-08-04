<?php

class myUser extends sfGuardSecurityUser
{
  public function initialize(sfEventDispatcher $dispatcher, sfStorage $storage, $options = array())
  {
    parent::initialize($dispatcher, $storage, $options);

    if ($this->isAuthenticated())
    {
      $isos = Doctrine::getTable('Langues')->getIsos();
      $cultures = array();
      foreach ($isos as $i => $iso) {
          $cultures[] = $iso['iso'];
      }
      $context = sfContext::getInstance();
      $request = $context->getRequest();
      $this->setCulture($request->getPreferredCulture($cultures));
    }
  }
}
