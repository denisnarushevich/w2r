<?php

/**
 * faq actions.
 *
 * @package    stag
 * @subpackage faq
 * @author     Rainmaker
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class faqActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->lexiques = Doctrine_Core::getTable('Lexique')->GetLexique($this->getUser()->getCulture());
  }
}
