<?php

/**
 * ExtraReserved form base class.
 *
 * @method ExtraReserved getObject() Returns the current form's model object
 *
 * @package    stag
 * @subpackage form
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseExtraReservedForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'id_extra'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Extra'), 'add_empty' => false)),
      'id_booking'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Booking'), 'add_empty' => false)),
      'id_activity' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Activity'), 'add_empty' => false)),
      'log_price'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_extra'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Extra'))),
      'id_booking'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Booking'))),
      'id_activity' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Activity'))),
      'log_price'   => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('extra_reserved[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ExtraReserved';
  }

}
