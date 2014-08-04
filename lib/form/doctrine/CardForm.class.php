<?php

/**
 * Card form.
 *
 * @package    stag
 * @subpackage form
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CardForm extends BaseCardForm
{
  public function configure()
  {
    $this->widgetSchema['valid_to'] = new sfWidgetFormJQueryDate(array(
      'config' => '{}',
    ));
  }
}
