<?php

/**
 * Booking filter form base class.
 *
 * @package    stag
 * @subpackage filter
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseBookingFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_client'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'id_activity' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Activity'), 'add_empty' => true)),
      'id_planner'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Planner'), 'add_empty' => true)),
      'date_begin'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'date_end'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'other_info'  => new sfWidgetFormFilterInput(),
      'nb_persons'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status'      => new sfWidgetFormChoice(array('choices' => array('' => '', 'New' => 'New', 'InProgress' => 'InProgress', 'Closed' => 'Closed'))),
      'log_price'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_client'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'id_activity' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Activity'), 'column' => 'id')),
      'id_planner'  => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Planner'), 'column' => 'id')),
      'date_begin'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'date_end'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'other_info'  => new sfValidatorPass(array('required' => false)),
      'nb_persons'  => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'status'      => new sfValidatorChoice(array('required' => false, 'choices' => array('New' => 'New', 'InProgress' => 'InProgress', 'Closed' => 'Closed'))),
      'log_price'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('booking_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Booking';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'id_client'   => 'ForeignKey',
      'id_activity' => 'ForeignKey',
      'id_planner'  => 'ForeignKey',
      'date_begin'  => 'Date',
      'date_end'    => 'Date',
      'other_info'  => 'Text',
      'nb_persons'  => 'Number',
      'status'      => 'Enum',
      'log_price'   => 'Number',
    );
  }
}
