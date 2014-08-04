<?php

/**
 * Contact form.
 *
 * @package    stag
 * @subpackage form
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ContactForm extends BaseContactForm
{
  public function configure()
  {
    if ($this->isNew() && sfContext::getInstance()->getConfiguration()->getApplication() == 'frontend')
    {
        $this->widgetSchema['captcha'] = new sfWidgetFormReCaptcha(array(
          'public_key' => sfConfig::get('app_recaptcha_public_key')
        ));

        $this->validatorSchema['captcha'] = new sfValidatorReCaptcha(array(
          'private_key' => sfConfig::get('app_recaptcha_private_key')
        ));
    }
  }
}
