<?php

/**
 * SlidesActivity filter form base class.
 *
 * @package    stag
 * @subpackage filter
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSlidesActivityFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_object'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'type_object' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'path'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'position'    => new sfWidgetFormFilterInput(),
      'active'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'id_object'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'type_object' => new sfValidatorPass(array('required' => false)),
      'path'        => new sfValidatorPass(array('required' => false)),
      'position'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'active'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('slides_activity_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SlidesActivity';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'id_object'   => 'Number',
      'type_object' => 'Text',
      'path'        => 'Text',
      'position'    => 'Number',
      'active'      => 'Boolean',
    );
  }
}
