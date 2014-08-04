<?php

/**
 * Contact filter form base class.
 *
 * @package    stag
 * @subpackage filter
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseContactFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'email'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'name'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'surname' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'comment' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'status'  => new sfWidgetFormChoice(array('choices' => array('' => '', 'New' => 'New', 'InProgress' => 'InProgress', 'Closed' => 'Closed'))),
    ));

    $this->setValidators(array(
      'email'   => new sfValidatorPass(array('required' => false)),
      'name'    => new sfValidatorPass(array('required' => false)),
      'surname' => new sfValidatorPass(array('required' => false)),
      'comment' => new sfValidatorPass(array('required' => false)),
      'status'  => new sfValidatorChoice(array('required' => false, 'choices' => array('New' => 'New', 'InProgress' => 'InProgress', 'Closed' => 'Closed'))),
    ));

    $this->widgetSchema->setNameFormat('contact_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Contact';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'email'   => 'Text',
      'name'    => 'Text',
      'surname' => 'Text',
      'comment' => 'Text',
      'status'  => 'Enum',
    );
  }
}
