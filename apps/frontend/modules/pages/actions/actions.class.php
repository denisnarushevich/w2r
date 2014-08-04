<?php

/**
 * pages actions.
 *
 * @package    stag
 * @subpackage pages
 * @author     Rainmaker
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pagesActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    if (!$request->hasParameter('page'))
      $this->forward404();
    $page = $request->getParameter('page');
    $trans = Doctrine_Core::getTable('TransUnit')->findPage($page, $this->getUser()->getCulture());
    if ($trans)
      $page = $trans->getSource();
    if (!is_dir(sfConfig::get('sf_apps_dir').'/frontend/modules/' . $page))
      $this->forward404();
    
    if (!in_array($page, array('homepage', 'about', 'terms', 'faq', 'reviews', 'offer', 'checkout', 'customer')))
      $this->forward404();
    $this->forward($page, 'index');
  }
}
