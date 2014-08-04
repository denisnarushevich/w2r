<?php

/**
 * Money form base class.
 *
 * @method Money getObject() Returns the current form's model object
 *
 * @package    stag
 * @subpackage form
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMoneyForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'money_name'   => new sfWidgetFormInputText(),
      'money_curr'   => new sfWidgetFormInputText(),
      'langues_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Langues')),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'money_name'   => new sfValidatorString(array('max_length' => 255)),
      'money_curr'   => new sfValidatorString(array('max_length' => 255)),
      'langues_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Langues', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('money[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Money';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['langues_list']))
    {
      $this->setDefault('langues_list', $this->object->Langues->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveLanguesList($con);

    parent::doSave($con);
  }

  public function saveLanguesList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['langues_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Langues->getPrimaryKeys();
    $values = $this->getValue('langues_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Langues', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Langues', array_values($link));
    }
  }

}
