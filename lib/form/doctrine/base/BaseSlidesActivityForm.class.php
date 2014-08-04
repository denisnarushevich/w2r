<?php

/**
 * SlidesActivity form base class.
 *
 * @method SlidesActivity getObject() Returns the current form's model object
 *
 * @package    stag
 * @subpackage form
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSlidesActivityForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'id_object'   => new sfWidgetFormInputText(),
      'type_object' => new sfWidgetFormInputText(),
      'path'        => new sfWidgetFormInputText(),
      'position'    => new sfWidgetFormInputText(),
      'active'      => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_object'   => new sfValidatorInteger(),
      'type_object' => new sfValidatorString(array('max_length' => 255)),
      'path'        => new sfValidatorString(array('max_length' => 255)),
      'position'    => new sfValidatorInteger(array('required' => false)),
      'active'      => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('slides_activity[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SlidesActivity';
  }

}
