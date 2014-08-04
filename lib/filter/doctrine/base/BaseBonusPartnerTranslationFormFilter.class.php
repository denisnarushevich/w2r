<?php

/**
 * BonusPartnerTranslation filter form base class.
 *
 * @package    stag
 * @subpackage filter
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseBonusPartnerTranslationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'comment' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'comment' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('bonus_partner_translation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'BonusPartnerTranslation';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'comment' => 'Text',
      'lang'    => 'Text',
    );
  }
}
