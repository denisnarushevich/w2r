<?php

/**
 * about actions.
 *
 * @package    stag
 * @subpackage about
 * @author     Rainmaker
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class aboutActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->about = Doctrine_Core::getTable('Informations')->getDataForLang('About', $this->getUser()->getCulture());
    if (!$this->about)
      $this->about = new Informations();
    $this->contact = new ContactForm();
		

		$this->contact->getWidget('captcha')->setOption('theme', 'custom');
		
		
    $widgetSchema = $this->contact->getWidgetSchema();
    unset($widgetSchema['status']);
    $this->contact->setWidgetSchema($widgetSchema);
    $widgetSchema = $this->contact->getValidatorSchema();
    unset($widgetSchema['status']);
    $this->contact->setValidatorSchema($widgetSchema);

    if ($request->isMethod('post'))
    {
      $captcha = array(
        'recaptcha_challenge_field' => $request->getParameter('recaptcha_challenge_field'),
        'recaptcha_response_field'  => $request->getParameter('recaptcha_response_field'),
        'status'                    => 'New'
      );
      $this->contact->bind(array_merge($request->getParameter('contact'), array('captcha' => $captcha)));
      if ($this->contact->isValid())
      {
        $this->contact->getObject()->setStatus('New');
        $this->contact->save();
        $this->redirect('about/contact');
      }
    }
  }
  
  public function executeContact(sfWebRequest $request)
  {
    
  }
}
