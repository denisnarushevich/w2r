<?php

/**
 * Activity form base class.
 *
 * @method Activity getObject() Returns the current form's model object
 *
 * @package    stag
 * @subpackage form
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseActivityForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'id_category'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ActivityCategory'), 'add_empty' => false)),
      'image'         => new sfWidgetFormInputText(),
      'default_price' => new sfWidgetFormInputText(),
      'stars'         => new sfWidgetFormInputText(),
      'firstname'     => new sfWidgetFormInputText(),
      'lastname'      => new sfWidgetFormInputText(),
      'phone'         => new sfWidgetFormInputText(),
      'email'         => new sfWidgetFormInputText(),
      'address'       => new sfWidgetFormInputText(),
      'del'           => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_category'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ActivityCategory'))),
      'image'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'default_price' => new sfValidatorInteger(),
      'stars'         => new sfValidatorInteger(),
      'firstname'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'lastname'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'phone'         => new sfValidatorString(array('max_length' => 14, 'required' => false)),
      'email'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'address'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'del'           => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('activity[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Activity';
  }

}
