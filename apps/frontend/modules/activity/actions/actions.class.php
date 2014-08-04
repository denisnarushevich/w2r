<?php

/**
 * activity actions.
 *
 * @package    stag
 * @subpackage activity
 * @author     Rainmaker
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class activityActions extends sfActions
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
    $this->activity = Doctrine_Core::getTable('Activity')->findActivity($lang, $slug);
    $this->forward404Unless($this->activity);
    $this->comments = Doctrine_Core::getTable('Comment')->findByIdActivityAndValide($this->activity->getId(), true);
    if ($this->getUser()->isAuthenticated())
    {
      $this->newComment = new CommentForm();
      $widgetSchema = $this->newComment->getWidgetSchema();
      unset($widgetSchema['id_client'], $widgetSchema['id_activity'], $widgetSchema['del'], $widgetSchema['valide']);
      $this->newComment->setWidgetSchema($widgetSchema);
      $widgetSchema = $this->newComment->getValidatorSchema();
      unset($widgetSchema['id_client'], $widgetSchema['id_activity'], $widgetSchema['del'], $widgetSchema['valide']);
      $this->newComment->setValidatorSchema($widgetSchema);
      if ($request->isMethod('post'))
      {
        if ($request->hasParameter('comment'))
        {
          $this->newComment->bind($request->getParameter('comment'));
          if ($this->newComment->isValid()) {
            $newCom = $this->newComment->getObject();
            $newCom->setActivity($this->activity);
            $newCom->setUser($this->getUser()->getAccount());
            $newCom->setValide(false);
            $this->newComment->save();
            $this->successComment = 1;
          } else {
            $this->errorComment - 1;
          }
        }
      }
    }
    $this->sliders = Doctrine_Core::getTable('SlidesActivity')->getAllByPosition($this->activity->getId(), 'Activity');
    $this->photos = Doctrine_Core::getTable('Image')->findByIdObjectAndTypeObject($this->activity->getId(), 'Activity');
    $this->videos = Doctrine_Core::getTable('Video')->findByIdObjectAndTypeObject($this->activity->getId(), 'Activity');
		
		
		
		
		//gettin' highlites
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
}
