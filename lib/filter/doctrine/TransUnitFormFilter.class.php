<?php

/**
 * TransUnit filter form.
 *
 * @package    stag
 * @subpackage filter
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TransUnitFormFilter extends BaseTransUnitFormFilter
{
  public function configure()
  {
    parent::configure();

    $this->widgetSchema['source']->setOption('with_empty', false);
    $this->widgetSchema['target']->setOption('with_empty', false);

    unset($this['id']);
    unset($this['comments']);
    unset($this['date_added']);
    unset($this['date_modified']);
    unset($this['author']);
  }
}
