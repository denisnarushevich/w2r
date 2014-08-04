<?php

/**
 * SlidesActivity form.
 *
 * @package    stag
 * @subpackage form
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SlidesActivityForm extends BaseSlidesActivityForm
{
  public function configure()
  {
    parent::configure();
    $this->widgetSchema['path'] = new sfWidgetFormInputFileEditable(array(
      'file_src'     => '/'.basename(sfConfig::get('sf_upload_dir')).'/slides/'.$this->getObject()->getPath(),
      'is_image'     => true,
      'edit_mode'    => !$this->isNew(),
      'with_delete'  => true,
      'template'     => '
        <div>%file%<br/>
          %input%<br/>
          %delete% %delete_label%
        </div>'
    ));

    $this->validatorSchema['path'] = new sfValidatorFile(array(
      'required'    => $this->isNew() ? true : false,
      'mime_types'  => 'web_images',
      'path'        => sfConfig::get('sf_upload_dir') . "/slides/" 
    ));
  }
  
  public function doSave($con = null)
  {
    parent::doSave($con);

    // Create the Thumb, but don't stock it in DB, as the name will be the same, but in different path.
    $dir = sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR. 'slides' .DIRECTORY_SEPARATOR;
    $dirThumb = sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR. 'slides' .DIRECTORY_SEPARATOR.'thumb'.DIRECTORY_SEPARATOR;
    $img = $this->getObject()->getPath();
    $infos = getimagesize($dir.$img);
    $thumbnail = new sfThumbnail($infos['0'] / 4, $infos['1'] / 4);
    $thumbnail->loadFile($dir.$img);
    $thumbnail->save($dirThumb.$img);
    
    $last = Doctrine_Core::getTable('SlidesActivity')->getLastPosition($this->getObject()->getIdObject(), 'Activity');
    $this->getObject()->setPosition($last + 1);
    $this->getObject()->save();
  }
}
