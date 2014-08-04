<?php

/**
 * Money filter form base class.
 *
 * @package    stag
 * @subpackage filter
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMoneyFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'money_name'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'money_curr'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'langues_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Langues')),
    ));

    $this->setValidators(array(
      'money_name'   => new sfValidatorPass(array('required' => false)),
      'money_curr'   => new sfValidatorPass(array('required' => false)),
      'langues_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Langues', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('money_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addLanguesListColumnQuery(Doctrine_Query $query, $field, $values)
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
      ->andWhereIn('LanguesMoney.langues_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Money';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'money_name'   => 'Text',
      'money_curr'   => 'Text',
      'langues_list' => 'ManyKey',
    );
  }
}
