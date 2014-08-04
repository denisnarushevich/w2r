<?php

/**
 * Slider filter form base class.
 *
 * @package    stag
 * @subpackage filter
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSliderFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'image'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'id_activity' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Activity'), 'add_empty' => true)),
      'title'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'position'    => new sfWidgetFormFilterInput(),
      'active'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'lang'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Langues'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'image'       => new sfValidatorPass(array('required' => false)),
      'id_activity' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Activity'), 'column' => 'id')),
      'title'       => new sfValidatorPass(array('required' => false)),
      'position'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'active'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'lang'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Langues'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('slider_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Slider';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'image'       => 'Text',
      'id_activity' => 'ForeignKey',
      'title'       => 'Text',
      'position'    => 'Number',
      'active'      => 'Boolean',
      'lang'        => 'ForeignKey',
    );
  }
}
