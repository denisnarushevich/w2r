<?php

/**
 * ActivityPrice form base class.
 *
 * @method ActivityPrice getObject() Returns the current form's model object
 *
 * @package    stag
 * @subpackage form
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseActivityPriceForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'id_activity' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Activity'), 'add_empty' => false)),
      'date_begin'  => new sfWidgetFormDate(),
      'date_end'    => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_activity' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Activity'))),
      'date_begin'  => new sfValidatorDate(array('required' => false)),
      'date_end'    => new sfValidatorDate(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('activity_price[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ActivityPrice';
  }

}
