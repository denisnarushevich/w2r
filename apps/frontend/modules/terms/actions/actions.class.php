<?php

/**
 * terms actions.
 *
 * @package    stag
 * @subpackage terms
 * @author     Rainmaker
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class termsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->terms = Doctrine_Core::getTable('Informations')->getDataForLang('Terms', $this->getUser()->getCulture());
    if (!$this->terms)
      $this->terms = new Informations();
  }
}
