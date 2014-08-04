<?php

/**
 * ActivityCategory filter form base class.
 *
 * @package    stag
 * @subpackage filter
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseActivityCategoryFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'image' => new sfWidgetFormFilterInput(),
      'del'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'image' => new sfValidatorPass(array('required' => false)),
      'del'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('activity_category_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ActivityCategory';
  }

  public function getFields()
  {
    return array(
      'id'    => 'Number',
      'image' => 'Text',
      'del'   => 'Boolean',
    );
  }
}
