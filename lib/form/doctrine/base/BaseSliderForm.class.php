<?php

/**
 * Slider form base class.
 *
 * @method Slider getObject() Returns the current form's model object
 *
 * @package    stag
 * @subpackage form
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSliderForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'image'       => new sfWidgetFormInputText(),
      'id_activity' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Activity'), 'add_empty' => false)),
      'title'       => new sfWidgetFormInputText(),
      'position'    => new sfWidgetFormInputText(),
      'active'      => new sfWidgetFormInputCheckbox(),
      'lang'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Langues'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'image'       => new sfValidatorString(array('max_length' => 255)),
      'id_activity' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Activity'))),
      'title'       => new sfValidatorString(array('max_length' => 255)),
      'position'    => new sfValidatorInteger(array('required' => false)),
      'active'      => new sfValidatorBoolean(array('required' => false)),
      'lang'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Langues'))),
    ));

    $this->widgetSchema->setNameFormat('slider[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Slider';
  }

}
