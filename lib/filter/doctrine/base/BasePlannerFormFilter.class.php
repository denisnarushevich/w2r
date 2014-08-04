<?php

/**
 * Planner filter form base class.
 *
 * @package    stag
 * @subpackage filter
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePlannerFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_client'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'id_employee'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Employee'), 'add_empty' => true)),
      'date_begin'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'date_end'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'submit_date'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'contact_name'    => new sfWidgetFormFilterInput(),
      'contact_surname' => new sfWidgetFormFilterInput(),
      'other_info'      => new sfWidgetFormFilterInput(),
      'status'          => new sfWidgetFormChoice(array('choices' => array('' => '', 'New' => 'New', 'InProgress' => 'InProgress', 'Closed' => 'Closed'))),
      'log_price'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'bonus_code'      => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'id_client'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'id_employee'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Employee'), 'column' => 'id')),
      'date_begin'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'date_end'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'submit_date'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'contact_name'    => new sfValidatorPass(array('required' => false)),
      'contact_surname' => new sfValidatorPass(array('required' => false)),
      'other_info'      => new sfValidatorPass(array('required' => false)),
      'status'          => new sfValidatorChoice(array('required' => false, 'choices' => array('New' => 'New', 'InProgress' => 'InProgress', 'Closed' => 'Closed'))),
      'log_price'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'bonus_code'      => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('planner_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Planner';
  }

  public function getFields()
  {
    return array(
      'id'              => 'Number',
      'id_client'       => 'ForeignKey',
      'id_employee'     => 'ForeignKey',
      'date_begin'      => 'Date',
      'date_end'        => 'Date',
      'submit_date'     => 'Date',
      'contact_name'    => 'Text',
      'contact_surname' => 'Text',
      'other_info'      => 'Text',
      'status'          => 'Enum',
      'log_price'       => 'Number',
      'bonus_code'      => 'Text',
    );
  }
}
