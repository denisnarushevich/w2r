<?php

/**
 * reviews actions.
 *
 * @package    stag
 * @subpackage reviews
 * @author     Rainmaker
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class reviewsActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {    
      
    // Listing with pager
    $this->pager = new sfDoctrinePager(
        'Review',
        10
      );
    $this->pager->setQuery(Doctrine_Core::getTable('Review')->getReviews());
    $this->pager->setPage($request->getParameter('p', 1));
    $this->pager->init();
    
    // Add a new review, only for auth user /!\
    $culture = $this->getUser()->getCulture();
    $this->newReview = new ReviewForm(array(), array('culture' => $culture));
		$this->newReview->getWidget('captcha')->setOption('theme', 'custom');
		
    $widgetSchema = $this->newReview->getWidgetSchema();
    unset($widgetSchema['id_client'], $widgetSchema['del'], $widgetSchema['valide']);
    $this->newReview->setWidgetSchema($widgetSchema);
    $widgetSchema = $this->newReview->getValidatorSchema();
    unset($widgetSchema['id_client'], $widgetSchema['image'], $widgetSchema['del'], $widgetSchema['valide']);
    $this->newReview->setValidatorSchema($widgetSchema);
    
    if ($request->isMethod('post'))
    {
      $captcha = array(
        'recaptcha_challenge_field' => $request->getParameter('recaptcha_challenge_field'),
        'recaptcha_response_field'  => $request->getParameter('recaptcha_response_field'),
        'id_client'                 => '1'
      );
      $this->newReview->bind(array_merge($request->getParameter('review'), array('captcha' => $captcha)),  $request->getFiles('review'));
      if ($this->newReview->isValid())
      {
        $this->newReview->save();
        $this->redirect('reviews/new');
      }
    }
  }
  
  public function executeNew(sfWebRequest $request)
  {
      
  }
}
