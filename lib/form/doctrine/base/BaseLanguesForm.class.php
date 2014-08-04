<?php

/**
 * Langues form base class.
 *
 * @method Langues getObject() Returns the current form's model object
 *
 * @package    stag
 * @subpackage form
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLanguesForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'iso'        => new sfWidgetFormInputText(),
      'country'    => new sfWidgetFormInputText(),
      'money_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Money')),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'iso'        => new sfValidatorString(array('max_length' => 255)),
      'country'    => new sfValidatorString(array('max_length' => 255)),
      'money_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Money', 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'Langues', 'column' => array('iso'))),
        new sfValidatorDoctrineUnique(array('model' => 'Langues', 'column' => array('country'))),
      ))
    );

    $this->widgetSchema->setNameFormat('langues[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Langues';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['money_list']))
    {
      $this->setDefault('money_list', $this->object->Money->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveMoneyList($con);

    parent::doSave($con);
  }

  public function saveMoneyList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['money_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Money->getPrimaryKeys();
    $values = $this->getValue('money_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Money', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Money', array_values($link));
    }
  }

}
