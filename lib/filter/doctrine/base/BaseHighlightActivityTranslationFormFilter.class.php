<?php

/**
 * HighlightActivityTranslation filter form base class.
 *
 * @package    stag
 * @subpackage filter
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseHighlightActivityTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'activity'    => new sfWidgetFormFilterInput(),
      'title'       => new sfWidgetFormFilterInput(),
      'title_blue'  => new sfWidgetFormFilterInput(),
      'description' => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'activity'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'title'       => new sfValidatorPass(array('required' => false)),
      'title_blue'  => new sfValidatorPass(array('required' => false)),
      'description' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('highlight_activity_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'HighlightActivityTranslation';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'activity'    => 'Number',
      'title'       => 'Text',
      'title_blue'  => 'Text',
      'description' => 'Text',
      'lang'        => 'Text',
    );
  }
}
