<?php

/**
 * ExtraCategory form.
 *
 * @package    stag
 * @subpackage form
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ExtraCategoryForm extends BaseExtraCategoryForm
{
  public function configure()
  {
    $langues = Doctrine::getTable('Langues')->getAll();
    foreach ($langues as $langue) {
      $this->embedI18n(array($langue->getIso()));
      $this->widgetSchema->setLabel($langue->getIso(), $langue->getCountry());
      $this->widgetSchema[$langue->getIso()]['description'] = new sfWidgetFormCKEditor();
    }
    $this->embedRelations(array('Extra' => array(
        'considerNewFormEmptyFields'    => array('name', 'description'),
        'newRelationButtonLabel'        => 'Add one more',
        'newRelationUseJSFramework'     => 'jQuery',
        'newFormLabel'                  => 'New extra',
        'multipleNewForms'              => true,
        'newFormAfterExistingRelations' => true,
        'newFormsInitialCount'          => 1,
      
    )));
  }
}
