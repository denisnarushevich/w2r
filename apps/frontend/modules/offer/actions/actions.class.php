<?php

/**
 * offer actions.
 *
 * @package    stag
 * @subpackage offer
 * @author     Rainmaker
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class offerActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
      // Get all category
      $this->categories = Doctrine_Core::getTable('ActivityCategory')->getAll();
  }
}
