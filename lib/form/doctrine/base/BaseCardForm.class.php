<?php

/**
 * Card form base class.
 *
 * @method Card getObject() Returns the current form's model object
 *
 * @package    stag
 * @subpackage form
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCardForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'id_client'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => false)),
      'card_name'   => new sfWidgetFormInputText(),
      'card_numero' => new sfWidgetFormInputText(),
      'valid_to'    => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_client'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'))),
      'card_name'   => new sfValidatorString(array('max_length' => 255)),
      'card_numero' => new sfValidatorString(array('max_length' => 255)),
      'valid_to'    => new sfValidatorDate(),
    ));

    $this->widgetSchema->setNameFormat('card[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Card';
  }

}
