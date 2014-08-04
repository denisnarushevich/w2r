<?php

/**
 * Contact form base class.
 *
 * @method Contact getObject() Returns the current form's model object
 *
 * @package    stag
 * @subpackage form
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseContactForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'email'   => new sfWidgetFormInputText(),
      'name'    => new sfWidgetFormInputText(),
      'surname' => new sfWidgetFormInputText(),
      'comment' => new sfWidgetFormTextarea(),
      'status'  => new sfWidgetFormChoice(array('choices' => array('New' => 'New', 'InProgress' => 'InProgress', 'Closed' => 'Closed'))),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'email'   => new sfValidatorString(array('max_length' => 255)),
      'name'    => new sfValidatorString(array('max_length' => 255)),
      'surname' => new sfValidatorString(array('max_length' => 255)),
      'comment' => new sfValidatorString(array('max_length' => 65535)),
      'status'  => new sfValidatorChoice(array('choices' => array(0 => 'New', 1 => 'InProgress', 2 => 'Closed'))),
    ));

    $this->widgetSchema->setNameFormat('contact[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Contact';
  }

}
