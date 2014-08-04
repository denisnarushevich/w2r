<?php

/**
 * Video filter form base class.
 *
 * @package    stag
 * @subpackage filter
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseVideoFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id_object'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'type_object' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'content'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'id_object'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'type_object' => new sfValidatorPass(array('required' => false)),
      'content'     => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('video_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Video';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'id_object'   => 'Number',
      'type_object' => 'Text',
      'content'     => 'Text',
    );
  }
}
