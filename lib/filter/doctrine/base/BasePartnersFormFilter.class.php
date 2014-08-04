<?php

/**
 * Partners filter form base class.
 *
 * @package    stag
 * @subpackage filter
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePartnersFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'adress'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cp'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'city'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'country'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'phone'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'contact_name' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'         => new sfValidatorPass(array('required' => false)),
      'adress'       => new sfValidatorPass(array('required' => false)),
      'cp'           => new sfValidatorPass(array('required' => false)),
      'city'         => new sfValidatorPass(array('required' => false)),
      'country'      => new sfValidatorPass(array('required' => false)),
      'phone'        => new sfValidatorPass(array('required' => false)),
      'contact_name' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('partners_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Partners';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'name'         => 'Text',
      'adress'       => 'Text',
      'cp'           => 'Text',
      'city'         => 'Text',
      'country'      => 'Text',
      'phone'        => 'Text',
      'contact_name' => 'Text',
    );
  }
}
