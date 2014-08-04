<?php

/**
 * Extra filter form base class.
 *
 * @package    stag
 * @subpackage filter
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseExtraFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_category' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ExtraCategory'), 'add_empty' => true)),
      'del'         => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'id_category' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ExtraCategory'), 'column' => 'id')),
      'del'         => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('extra_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Extra';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'id_category' => 'ForeignKey',
      'del'         => 'Boolean',
    );
  }
}
