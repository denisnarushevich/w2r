<?php

/**
 * SliderTranslation form base class.
 *
 * @method SliderTranslation getObject() Returns the current form's model object
 *
 * @package    stag
 * @subpackage form
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSliderTranslationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'image'    => new sfWidgetFormInputText(),
      'title'    => new sfWidgetFormInputText(),
      'position' => new sfWidgetFormInputText(),
      'active'   => new sfWidgetFormInputCheckbox(),
      'lang'     => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'image'    => new sfValidatorString(array('max_length' => 255)),
      'title'    => new sfValidatorString(array('max_length' => 255)),
      'position' => new sfValidatorInteger(array('required' => false)),
      'active'   => new sfValidatorBoolean(array('required' => false)),
      'lang'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('lang')), 'empty_value' => $this->getObject()->get('lang'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('slider_translation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SliderTranslation';
  }

}
