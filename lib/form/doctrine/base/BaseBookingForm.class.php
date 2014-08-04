<?php

/**
 * Booking form base class.
 *
 * @method Booking getObject() Returns the current form's model object
 *
 * @package    stag
 * @subpackage form
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBookingForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'id_client'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => false)),
      'id_activity' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Activity'), 'add_empty' => false)),
      'id_planner'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Planner'), 'add_empty' => false)),
      'date_begin'  => new sfWidgetFormDate(),
      'date_end'    => new sfWidgetFormDate(),
      'other_info'  => new sfWidgetFormInputText(),
      'nb_persons'  => new sfWidgetFormInputText(),
      'status'      => new sfWidgetFormChoice(array('choices' => array('New' => 'New', 'InProgress' => 'InProgress', 'Closed' => 'Closed'))),
      'log_price'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_client'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'))),
      'id_activity' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Activity'))),
      'id_planner'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Planner'))),
      'date_begin'  => new sfValidatorDate(),
      'date_end'    => new sfValidatorDate(),
      'other_info'  => new sfValidatorPass(array('required' => false)),
      'nb_persons'  => new sfValidatorInteger(),
      'status'      => new sfValidatorChoice(array('choices' => array(0 => 'New', 1 => 'InProgress', 2 => 'Closed'))),
      'log_price'   => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('booking[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Booking';
  }

}
