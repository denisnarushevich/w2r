<?php

/**
 * Booking form.
 *
 * @package    stag
 * @subpackage form
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BookingForm extends BaseBookingForm
{
  public function configure()
  {
    $this->widgetSchema['date_begin'] = new sfWidgetFormJQueryDate(array(
      'config' => '{}',
    ));
    $this->widgetSchema['date_end'] = new sfWidgetFormJQueryDate(array(
      'config' => '{}',
    ));
  }
}
