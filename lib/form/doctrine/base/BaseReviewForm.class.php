<?php

/**
 * Review form base class.
 *
 * @method Review getObject() Returns the current form's model object
 *
 * @package    stag
 * @subpackage form
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseReviewForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'id_client'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('User'), 'add_empty' => false)),
      'description' => new sfWidgetFormTextarea(),
      'image'       => new sfWidgetFormInputText(),
      'country'     => new sfWidgetFormInputText(),
      'valide'      => new sfWidgetFormInputCheckbox(),
      'del'         => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'id_client'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('User'))),
      'description' => new sfValidatorString(array('max_length' => 63535)),
      'image'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'country'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'valide'      => new sfValidatorBoolean(array('required' => false)),
      'del'         => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('review[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Review';
  }

}
