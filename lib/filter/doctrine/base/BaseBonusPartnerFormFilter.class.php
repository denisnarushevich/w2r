<?php

/**
 * BonusPartner filter form base class.
 *
 * @package    stag
 * @subpackage filter
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseBonusPartnerFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'value'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'type'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_partner' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Partners'), 'add_empty' => true)),
      'code'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'name'       => new sfValidatorPass(array('required' => false)),
      'value'      => new sfValidatorPass(array('required' => false)),
      'type'       => new sfValidatorPass(array('required' => false)),
      'id_partner' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Partners'), 'column' => 'id')),
      'code'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bonus_partner_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BonusPartner';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'name'       => 'Text',
      'value'      => 'Text',
      'type'       => 'Text',
      'id_partner' => 'ForeignKey',
      'code'       => 'Text',
    );
  }
}
