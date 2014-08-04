<?php

/**
 * LanguesMoney filter form base class.
 *
 * @package    stag
 * @subpackage filter
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseLanguesMoneyFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'langues_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Langues'), 'add_empty' => true)),
      'money_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Money'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'langues_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Langues'), 'column' => 'id')),
      'money_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Money'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('langues_money_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'LanguesMoney';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'langues_id' => 'ForeignKey',
      'money_id'   => 'ForeignKey',
    );
  }
}
