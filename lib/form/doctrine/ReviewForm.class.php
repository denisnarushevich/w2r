<?php

/**
 * Review form.
 *
 * @package    stag
 * @subpackage form
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ReviewForm extends BaseReviewForm
{
  public function configure()
  {
    parent::configure();
    if ($this->isNew() && sfContext::getInstance()->getConfiguration()->getApplication() == 'frontend')
    {
        $this->widgetSchema['captcha'] = new sfWidgetFormReCaptcha(array(
          'public_key' => sfConfig::get('app_recaptcha_public_key')
        ));

        $this->validatorSchema['captcha'] = new sfValidatorReCaptcha(array(
          'private_key' => sfConfig::get('app_recaptcha_private_key')
        ));
    }
    
    $this->widgetSchema['image'] = new sfWidgetFormInputFileEditable(array(
      'file_src'     => '/'.basename(sfConfig::get('sf_upload_dir')).'/reviews/'.$this->getObject()->getImage(),
      'is_image'     => true,
      'edit_mode'    => !$this->isNew(),
      'with_delete'  => true,
      'template'     => '
        <div>%file%<br/>
          %input%<br/>
          %delete% %delete_label%
        </div>'
    ));
 
    $this->validatorSchema['image'] = new sfValidatorFile(array(
      'required'    => false,
      'mime_types'  => 'web_images',
      'path'        => sfConfig::get('sf_upload_dir') . "/reviews/" 
    ));

    $culture = $this->getOption('culture');
    $this->widgetSchema['country'] = new sfWidgetFormI18nChoiceCountry(array('culture' => $culture));
  }
}
