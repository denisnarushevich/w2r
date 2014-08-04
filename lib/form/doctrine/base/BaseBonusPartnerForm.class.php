<?php

/**
 * BonusPartner form base class.
 *
 * @method BonusPartner getObject() Returns the current form's model object
 *
 * @package    stag
 * @subpackage form
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBonusPartnerForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'name'       => new sfWidgetFormInputText(),
      'value'      => new sfWidgetFormInputText(),
      'type'       => new sfWidgetFormInputText(),
      'id_partner' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Partners'), 'add_empty' => false)),
      'code'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 255)),
      'value'      => new sfValidatorString(array('max_length' => 255)),
      'type'       => new sfValidatorString(array('max_length' => 255)),
      'id_partner' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Partners'))),
      'code'       => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('bonus_partner[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BonusPartner';
  }

}
