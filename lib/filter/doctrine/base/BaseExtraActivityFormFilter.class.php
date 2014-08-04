<?php

/**
 * ExtraActivity filter form base class.
 *
 * @package    stag
 * @subpackage filter
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseExtraActivityFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_activity' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Activity'), 'add_empty' => true)),
      'id_extra'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Extra'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id_activity' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Activity'), 'column' => 'id')),
      'id_extra'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Extra'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('extra_activity_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ExtraActivity';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'id_activity' => 'ForeignKey',
      'id_extra'    => 'ForeignKey',
    );
  }
}
