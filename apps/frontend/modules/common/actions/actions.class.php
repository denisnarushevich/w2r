<?php

/**
 * common actions.
 *
 * @package    stag
 * @subpackage common
 * @author     Rainmaker
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class commonActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeChange(sfWebRequest $request)
  {
      // Old Culture
      $old = $this->getUser()->getCulture();
      $this->forward404Unless($request->hasParameter('iso'));
      $iso = $request->getParameter('iso');
      $langue = Doctrine_Core::getTable('Langues')->findOneByIso($iso);
      $this->forward404Unless($langue);
      $this->getUser()->setCulture($iso);
      $this->redirect($this->getController()->genURL('homepage'));
  }
}
