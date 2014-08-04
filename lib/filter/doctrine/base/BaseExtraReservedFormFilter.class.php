<?php

/**
 * ExtraReserved filter form base class.
 *
 * @package    stag
 * @subpackage filter
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseExtraReservedFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_extra'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Extra'), 'add_empty' => true)),
      'id_booking'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Booking'), 'add_empty' => true)),
      'id_activity' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Activity'), 'add_empty' => true)),
      'log_price'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_extra'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Extra'), 'column' => 'id')),
      'id_booking'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Booking'), 'column' => 'id')),
      'id_activity' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Activity'), 'column' => 'id')),
      'log_price'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('extra_reserved_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ExtraReserved';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'id_extra'    => 'ForeignKey',
      'id_booking'  => 'ForeignKey',
      'id_activity' => 'ForeignKey',
      'log_price'   => 'Number',
    );
  }
}
