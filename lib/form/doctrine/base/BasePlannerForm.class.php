<?php

/**
 * Planner form base class.
 *
 * @method Planner getObject() Returns the current form's model object
 *
 * @package    stag
 * @subpackage form
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePlannerForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'              => new sfWidgetFormInputHidden(),
      'id_client'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => false)),
      'id_employee'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Employee'), 'add_empty' => true)),
      'date_begin'      => new sfWidgetFormDate(),
      'date_end'        => new sfWidgetFormDate(),
      'submit_date'     => new sfWidgetFormDate(),
      'contact_name'    => new sfWidgetFormTextarea(),
      'contact_surname' => new sfWidgetFormTextarea(),
      'other_info'      => new sfWidgetFormInputText(),
      'status'          => new sfWidgetFormChoice(array('choices' => array('New' => 'New', 'InProgress' => 'InProgress', 'Closed' => 'Closed'))),
      'log_price'       => new sfWidgetFormInputText(),
      'bonus_code'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_client'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'))),
      'id_employee'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Employee'), 'required' => false)),
      'date_begin'      => new sfValidatorDate(),
      'date_end'        => new sfValidatorDate(),
      'submit_date'     => new sfValidatorDate(),
      'contact_name'    => new sfValidatorString(array('required' => false)),
      'contact_surname' => new sfValidatorString(array('required' => false)),
      'other_info'      => new sfValidatorPass(array('required' => false)),
      'status'          => new sfValidatorChoice(array('choices' => array(0 => 'New', 1 => 'InProgress', 2 => 'Closed'))),
      'log_price'       => new sfValidatorInteger(),
      'bonus_code'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('planner[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Planner';
  }

}
