<?php

/**
 * Image form.
 *
 * @package    stag
 * @subpackage form
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ImageForm extends BaseImageForm
{
  public function configure()
  {
      $this->widgetSchema['path'] = new sfWidgetFormInputFileEditable(array(
      'file_src'     => '/'.basename(sfConfig::get('sf_upload_dir')).'/photos/'.$this->getObject()->getPath(),
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
      'required'    => true,
      'mime_types'  => 'web_images',
      'path'        => sfConfig::get('sf_upload_dir') . "/photos/" 
    ));
  }
  
  public function doSave($con = null)
  {
    parent::doSave($con);

    // Create the Thumb, but don't stock it in DB, as the name will be the same, but in different path.
    $dir = sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR. 'photos' .DIRECTORY_SEPARATOR;
    $dirThumb = sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR. 'photos' .DIRECTORY_SEPARATOR.'thumb'.DIRECTORY_SEPARATOR;
    $img = $this->getObject()->getPath();
    $infos = getimagesize($dir.$img);
    $thumbnail = new sfThumbnail($infos['0'] / 4, $infos['1'] / 4);
    $thumbnail->loadFile($dir.$img);
    $thumbnail->save($dirThumb.$img);
  }
}
