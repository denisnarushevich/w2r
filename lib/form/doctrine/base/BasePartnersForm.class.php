<?php

/**
 * Partners form base class.
 *
 * @method Partners getObject() Returns the current form's model object
 *
 * @package    stag
 * @subpackage form
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePartnersForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'name'         => new sfWidgetFormInputText(),
      'adress'       => new sfWidgetFormInputText(),
      'cp'           => new sfWidgetFormInputText(),
      'city'         => new sfWidgetFormInputText(),
      'country'      => new sfWidgetFormInputText(),
      'phone'        => new sfWidgetFormInputText(),
      'contact_name' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'         => new sfValidatorString(array('max_length' => 255)),
      'adress'       => new sfValidatorString(array('max_length' => 255)),
      'cp'           => new sfValidatorString(array('max_length' => 255)),
      'city'         => new sfValidatorString(array('max_length' => 255)),
      'country'      => new sfValidatorString(array('max_length' => 255)),
      'phone'        => new sfValidatorString(array('max_length' => 255)),
      'contact_name' => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('partners[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Partners';
  }

}
