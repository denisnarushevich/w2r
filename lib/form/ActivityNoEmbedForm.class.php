<?php

/**
 * Activity form without embed.
 *
 * @package    stag
 * @subpackage form
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ActivityNoEmbed extends BaseActivityForm
{
  public function configure()
  {
    $langues = Doctrine::getTable('Langues')->getAll();
    foreach ($langues as $langue) {
      $this->embedI18n(array($langue->getIso()));
      $this->widgetSchema->setLabel($langue->getIso(), $langue->getCountry());
      $this->widgetSchema[$langue->getIso()]['description'] = new sfWidgetFormCKEditor();
      $this->widgetSchema[$langue->getIso()]['summary'] = new sfWidgetFormCKEditor();
    }
    
    $this->widgetSchema['image'] = new sfWidgetFormInputFileEditable(array(
      'file_src'     => '/'.basename(sfConfig::get('sf_upload_dir')).'/activity/'.$this->getObject()->getImage(),
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
      'required'    => $this->isNew() ? true : false,
      'mime_types'  => 'web_images',
      'path'        => sfConfig::get('sf_upload_dir') . "/activity/" 
    ));
  }
}
