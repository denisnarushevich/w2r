<?php

/**
 * LanguesMoney form base class.
 *
 * @method LanguesMoney getObject() Returns the current form's model object
 *
 * @package    stag
 * @subpackage form
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLanguesMoneyForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'langues_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Langues'), 'add_empty' => false)),
      'money_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Money'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'langues_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Langues'))),
      'money_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Money'))),
    ));

    $this->widgetSchema->setNameFormat('langues_money[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LanguesMoney';
  }

}
