<?php

require_once dirname(__FILE__).'/../lib/text_languesGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/text_languesGeneratorHelper.class.php';

/**
 * admin_langues actions.
 *
 * @package    stag
 * @subpackage admin_langues
 * @author     Rainmaker
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class text_languesActions extends autoText_languesActions
{
  public function executeDelete(sfWebRequest $request)
  {
    $referer = sfContext::getInstance()->getRequest()->getReferer();
    
    $params = sfContext::getInstance()->getRouting()->findRoute($referer);

    $environment = sfConfig::get('sf_environment');
    $script = ($environment == 'prod') ? 'backend.php': 'backend_dev.php';
    $referer = substr($referer, strpos($referer, $script) + strlen($script));
    $referer = str_replace('/' . $script, '', $referer);
    
    $request->checkCSRFProtection();

    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));

    if ($this->getRoute()->getObject()->delete())
    {
      $this->getUser()->setFlash('notice', 'The item was deleted successfully.');
    }

    if ($referer == '/admin_langues')
      $this->redirect('@text_langues');
  }
  
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

      try {
        $langues = $form->save();
      } catch (Doctrine_Validator_Exception $e) {

        $errorStack = $form->getObject()->getErrorStack();

        $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ?  's' : null) . " with validation errors: ";
        foreach ($errorStack as $field => $errors) {
            $message .= "$field (" . implode(", ", $errors) . "), ";
        }
        $message = trim($message, ', ');

        $this->getUser()->setFlash('error', $message);
        return sfView::SUCCESS;
      }

      $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $langues)));

      // Add for creating the catalogue for this language
      $this->createCatalogue($langues);
      
      if ($request->hasParameter('_save_and_add'))
      {
        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');

        $this->redirect('@text_langues_new');
      }
      else
      {
        $this->getUser()->setFlash('notice', $notice);

        $this->redirect(array('sf_route' => 'text_langues_edit', 'sf_subject' => $langues));
      }
    }
    else
    {
      $this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
    }
  }
  
  public function createCatalogue($langues)
  {
    $catalogue = new Catalogue();
    $catalogue->setName('messages.' . $langues->getIso());
    $catalogue->setSourceLang('en');
    $catalogue->setTargetLang($langues->getIso());
    $catalogue->save();
    $catalogue = new Catalogue();
    $catalogue->setName('sf_admin.' . $langues->getIso());
    $catalogue->setSourceLang('en');
    $catalogue->setTargetLang($langues->getIso());
    $catalogue->save();
    $catalogue = new Catalogue();
    $catalogue->setName('admin.' . $langues->getIso());
    $catalogue->setSourceLang('en');
    $catalogue->setTargetLang($langues->getIso());
    $catalogue->save();
  }
}
