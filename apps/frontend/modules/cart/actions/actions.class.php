<?php

/**
 * cart actions.
 *
 * @package    stag
 * @subpackage cart
 * @author     Rainmaker
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class cartActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */

  public function executeAdd(sfWebRequest $request)
  {
      
      if ($request->isMethod('POST') && $request->isXmlHttpRequest())
      {
          if ($request->hasParameter('id'))
          {
              $id = $request->getParameter('id');
              $lang = $this->getUser()->getCulture();
              $activity = Doctrine_Core::getTable('Activity')->findActivityById($lang, $id);
              if ($activity)
              {
                  $bookings = $this->getUser()->getAttribute('booking', array());
                  $booked = false;
                  foreach($bookings as $book)
                  {
                      if ($book->getActivity()->getId() == $id)
                      {
                          $booked = true;
                          break;
                      }
                  }
                  if ($booked == false)
                  {
                      $newBook = new Booking();
                      $newBook->setActivity($activity);
                      $bookings[] = $newBook;
                      $this->getUser()->setAttribute('booking', $bookings);
                      return $this->renderText(json_encode(array('act' => $activity->getId())));
                  }
              }
          }
      }
      return sfView::NONE;
  }
  
  public function executeRemove(sfWebRequest $request)
  {
      if ($request->isMethod('POST') && $request->isXmlHttpRequest())
      {
          if ($request->hasParameter('id'))
          {
              $id = $request->getParameter('id');
              $lang = $this->getUser()->getCulture();
              $activity = Doctrine_Core::getTable('Activity')->findActivityById($lang, $id);
              if ($activity)
              {
                  $bookings = $this->getUser()->getAttribute('booking', array());
                  $removed = false;
                  foreach($bookings as $key => $book)
                  {
                      if ($book->getActivity()->getId() == $id)
                      {
                          $removed = true;
                          unset($bookings[$key]);
                          break;
                      }
                  }
                  if ($removed == true)
                  {
                      $this->getUser()->setAttribute('booking', $bookings);
                      return $this->renderText(json_encode(array('act' => $activity->getId())));
                  }
              }
          }
      }
      return sfView::NONE;
  }
}
