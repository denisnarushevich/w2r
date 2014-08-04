<?php

/**
 * SliderTranslation filter form base class.
 *
 * @package    stag
 * @subpackage filter
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSliderTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'image'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'title'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'position' => new sfWidgetFormFilterInput(),
      'active'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'image'    => new sfValidatorPass(array('required' => false)),
      'title'    => new sfValidatorPass(array('required' => false)),
      'position' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'active'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('slider_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SliderTranslation';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'image'    => 'Text',
      'title'    => 'Text',
      'position' => 'Number',
      'active'   => 'Boolean',
      'lang'     => 'Text',
    );
  }
}
