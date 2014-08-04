<?php

/**
 * Activity filter form base class.
 *
 * @package    stag
 * @subpackage filter
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseActivityFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_category'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ActivityCategory'), 'add_empty' => true)),
      'image'         => new sfWidgetFormFilterInput(),
      'default_price' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'stars'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'firstname'     => new sfWidgetFormFilterInput(),
      'lastname'      => new sfWidgetFormFilterInput(),
      'phone'         => new sfWidgetFormFilterInput(),
      'email'         => new sfWidgetFormFilterInput(),
      'address'       => new sfWidgetFormFilterInput(),
      'del'           => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'id_category'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ActivityCategory'), 'column' => 'id')),
      'image'         => new sfValidatorPass(array('required' => false)),
      'default_price' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'stars'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'firstname'     => new sfValidatorPass(array('required' => false)),
      'lastname'      => new sfValidatorPass(array('required' => false)),
      'phone'         => new sfValidatorPass(array('required' => false)),
      'email'         => new sfValidatorPass(array('required' => false)),
      'address'       => new sfValidatorPass(array('required' => false)),
      'del'           => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('activity_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Activity';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'id_category'   => 'ForeignKey',
      'image'         => 'Text',
      'default_price' => 'Number',
      'stars'         => 'Number',
      'firstname'     => 'Text',
      'lastname'      => 'Text',
      'phone'         => 'Text',
      'email'         => 'Text',
      'address'       => 'Text',
      'del'           => 'Boolean',
    );
  }
}
