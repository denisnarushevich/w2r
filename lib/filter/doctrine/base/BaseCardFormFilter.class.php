<?php

/**
 * Card filter form base class.
 *
 * @package    stag
 * @subpackage filter
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCardFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_client'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => true)),
      'card_name'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'card_numero' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'valid_to'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_client'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('User'), 'column' => 'id')),
      'card_name'   => new sfValidatorPass(array('required' => false)),
      'card_numero' => new sfValidatorPass(array('required' => false)),
      'valid_to'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('card_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Card';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'id_client'   => 'ForeignKey',
      'card_name'   => 'Text',
      'card_numero' => 'Text',
      'valid_to'    => 'Date',
    );
  }
}
