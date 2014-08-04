<?php

/**
 * common components.
 *
 * @package    stag
 * @subpackage common
 * @author     Rainmaker
 * @version    SVN: $Id: components.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class commonComponents extends sfComponents
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeHeader(sfWebRequest $request)
  {
      $this->langues = Doctrine_Core::getTable('Langues')->getAll();
      $this->langue = Doctrine_Core::getTable('Langues')->findOneByIso($this->getUser()->getCulture());
			$this->flagLabels = array('lv'=>'Latvian','en'=>'English','es'=>'Spanish','ru'=>'Russian','fr'=>'French');
  }
  
  public function executeFooter(sfWebRequest $request)
  {
  }
  
  public function executeCart(sfWebRequest $request)
  {
      // Get the bookings from the user attribute
			// $this->getUser()->setAttribute('booking', array());
      $this->bookings = $this->getUser()->getAttribute('booking', array());
      $this->sum      = $this->getUser()->getAttribute('sum', 0);
  }

  public function executeMenu(sfWebRequest $request)
  {
  }
}
