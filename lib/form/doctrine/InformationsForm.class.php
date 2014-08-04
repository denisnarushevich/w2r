<?php

/**
 * Informations form.
 *
 * @package    stag
 * @subpackage form
 * @author     Rainmaker
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class InformationsForm extends BaseInformationsForm
{
  public function configure()
  {
    $langues = Doctrine::getTable('Langues')->getAll();
    foreach ($langues as $langue) {
      $this->embedI18n(array($langue->getIso()));
      $this->widgetSchema->setLabel($langue->getIso(), $langue->getCountry());
      $this->widgetSchema[$langue->getIso()]['value'] = new sfWidgetFormCKEditor();
    }
  }
}
