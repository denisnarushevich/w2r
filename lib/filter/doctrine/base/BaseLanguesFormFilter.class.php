<?php

/**
 * Langues filter form base class.
 *
 * @package    stag
 * @subpackage filter
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseLanguesFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'iso'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'country'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'money_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Money')),
    ));

    $this->setValidators(array(
      'iso'        => new sfValidatorPass(array('required' => false)),
      'country'    => new sfValidatorPass(array('required' => false)),
      'money_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Money', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('langues_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addMoneyListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.LanguesMoney LanguesMoney')
      ->andWhereIn('LanguesMoney.money_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Langues';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'iso'        => 'Text',
      'country'    => 'Text',
      'money_list' => 'ManyKey',
    );
  }
}
