<?php

/**
 * category actions.
 *
 * @package    stag
 * @subpackage category
 * @author     Rainmaker
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class categoryActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    if (!($request->hasParameter('slug') && $request->hasParameter('sf_culture')))
      $this->forward404();
    $lang = $request->getParameter('sf_culture');
    $slug = $request->getParameter('slug');
    $this->category = Doctrine_Core::getTable('ActivityCategory')->findCategory($lang, $slug);
    $this->forward404Unless($this->category);
		
		$this->otherCategories = Doctrine_Query::create()
						->from('ActivityCategory')
						->where('id <> ?', $this->category->getId())
						->execute();
  }
}
