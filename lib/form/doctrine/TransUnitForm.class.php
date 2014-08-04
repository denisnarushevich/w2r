<?php

/**
 * TransUnit form.
 *
 * @package    stag
 * @subpackage form
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TransUnitForm extends BaseTransUnitForm
{
  public function configure()
  {
    parent::configure();

    unset($this['id']);
    unset($this['date_added']);
    unset($this['date_modified']);
    unset($this['author']);
    unset($this['translated']);
  }
}
