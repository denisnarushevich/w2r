<?php

/**
 * slider actions.
 *
 * @package    stag
 * @subpackage slider
 * @author     Rainmaker
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sliderActions extends autoSliderActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    $this->langues = Doctrine::getTable('Langues')->getAll();
    
    $this->sliders = array();
    $this->slidersPass = array();
    foreach($this->langues as $langue)
    {
      $this->sliders[$langue->getIso()] = Doctrine_Core::getTable('Slider')->getAllByPositionWithActivity($langue->getId());
      $this->slidersPass[$langue->getIso()] = Doctrine_Core::getTable('Slider')->findByActiveAndLang(false, $langue->getId());
    }
  }
  
  public function executeListActivate(sfWebRequest $request) {

      $toMove = $this->getRoute()->getObject();

      $last = Doctrine_Core::getTable('Slider')->getLastPosition($toMove->getLang());

      $toMove->setPosition($last + 1);
      $toMove->setActive(true);
      $toMove->save();
      
      $this->redirect('slider');
   }

  public function executeListDeactivate(sfWebRequest $request) {

      $toMove = $this->getRoute()->getObject();

      $toMove->setActive(false);
      $toMove->save();
      $sliders = Doctrine_Core::getTable('Slider')->getAllByPositionWithActivity($toMove->getLang());
      $nb = 1;
      foreach ($sliders as $slider) {
        $slider->setPosition($nb++);
        $slider->save();
      }
      
      $this->redirect('slider');
   }

  public function executeListPremier(sfWebRequest $request) {

      $toMove = $this->getRoute()->getObject();
      $sliders = Doctrine_Core::getTable('Slider')->getAllByPositionWithActivity($toMove->getLang(), "asc");

      foreach ($sliders as $slider) {
         $currentPosition = $slider->position;
         if ($currentPosition == $toMove->position) {
            $toMove->setPosition(1);
            $toMove->save();
            break;
         }
         else {
            $slider->setPosition($currentPosition + 1);
            $slider->save();
         }
      }
      $this->redirect('slider');
   }

   public function executeListDernier(sfWebRequest $request) {

      $toMove = $this->getRoute()->getObject();
      $sliders = Doctrine_Core::getTable('Slider')->getAllByPositionWithActivity($toMove->getLang(), "desc");

      $lastPosition = $sliders[0]->position;

      foreach ($sliders as $slider) {

         $currentPosition = $slider->position;

         if ($currentPosition == $toMove->position) {
            $toMove->setPosition($lastPosition);
            $toMove->save();
            break;
         }
         else {
            $slider->setPosition($currentPosition - 1);
            $slider->save();
         }
      }
      $this->redirect('slider');

   }

   public function executeListMonter(sfWebRequest $request) {
      
      $sliders[] = $this->getRoute()->getObject();
      $newPosition = $sliders[0]->position - 1;
      $oldPosition = $sliders[0]->position;

      if ($oldPosition == 1)
         ;
      else {
         $sliders[1] = Doctrine_Core::getTable('Slider')->getByPosition($newPosition, $sliders[0]->getLang());

         if (isset($sliders[1]) && $sliders[1]) {
            $sliders[1]->setPosition($oldPosition);
            $sliders[1]->save();
         }

         $sliders[0]->setPosition($newPosition);
         $sliders[0]->save();
      }
      $this->redirect('slider');
   }

   public function executeListDescendre(sfWebRequest $request) {

      $sliders[] = $this->getRoute()->getObject();
      $newPosition = $sliders[0]->position + 1;
      $oldPosition = $sliders[0]->position;

      if ($oldPosition == Doctrine_Core::getTable('Slider')->getLastPosition($sliders[0]->getLang()))
         ;
      else {
         $sliders[1] = Doctrine_Core::getTable('Slider')->getByPosition($newPosition, $sliders[0]->getLang());

         if (isset($sliders[1])) {
            $sliders[1]->setPosition($oldPosition);
            $sliders[1]->save();
         }

         $sliders[0]->setPosition($newPosition);
         $sliders[0]->save();
      }
      $this->redirect('slider');
   }
}
