<?php

/**
 * common components.
 *
 * @package    stag
 * @subpackage common
 * @author     Rainmaker
 * @version    SVN: $Id: components.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class homepageComponents extends sfComponents
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeSlider(sfWebRequest $request)
  {
    // Fix for the lang in a filter
    $lang = Doctrine_Core::getTable('Langues')->findOneByIso($this->getUser()->getCulture());
    if (!$lang)
      $lang = Doctrine_Core::getTable('Langues')->findOneByIso('en');
    $this->sliders = Doctrine_Core::getTable('Slider')->getAllByPositionWithActivity($lang->getId());
  }

  public function executeHighlight(sfWebRequest $request)
  {
    // Fix for the lang in a filter
    $lang = Doctrine_Core::getTable('Langues')->findOneByIso($this->getUser()->getCulture());
    if (!$lang)
      $lang = Doctrine_Core::getTable('Langues')->findOneByIso('en');
    $hls = Doctrine_Core::getTable('HighlightActivity')->getAll($lang->getIso());
    $this->highlights = array();
    foreach($hls as $nb => $hl)
    {
      $this->highlights[$nb] = array();
      $this->highlights[$nb]['hl'] = $hl;
      $this->highlights[$nb]['act'] = Doctrine_Core::getTable('Activity')->findOneById($hl->getActivity());
    }
  }
  
  public function executeMenuTab(sfWebRequest $request)
  {
  }

  public function executeVideo(sfWebRequest $request)
  {
  }
}
