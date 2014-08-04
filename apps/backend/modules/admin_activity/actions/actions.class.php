<?php

require_once dirname(__FILE__).'/../lib/admin_activityGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/admin_activityGeneratorHelper.class.php';

/**
 * admin_activity actions.
 *
 * @package    stag
 * @subpackage admin_activity
 * @author     Rainmaker
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class admin_activityActions extends autoAdmin_activityActions
{
    public function executeListSliders(sfWebRequest $request)
    {
        $this->activity = $this->getRoute()->getObject();
        $this->newslide = new SlidesActivityForm();

        // Remove unneeded info
        $widgetSchema = $this->newslide->getWidgetSchema();
        unset($widgetSchema['id_object'], $widgetSchema['type_object'], $widgetSchema['position']);
        $this->newslide->setWidgetSchema($widgetSchema);
        
        if ($request->isMethod('post'))
        {
          $infos = array(
            'id_object'     => $this->activity->getId(),
            'type_object'   => 'Activity'          );
          $this->newslide->bind(array_merge($request->getParameter('slides_activity'), $infos),  $request->getFiles('slides_activity'));
          if ($this->newslide->isValid())
          {
            if ($this->newslide->getObject()->getActive())
              $this->newslide->getObject ()->setPosition (Doctrine_Core::getTable('SlidesActivity')->getLastPosition($this->activity->getId(), 'Activity') + 1);
            $this->newslide->save();
          }
        }
        
        $this->slides = Doctrine_Core::getTable('SlidesActivity')->getAllByPosition($this->activity->getId(), 'Activity');
        $this->passlides = Doctrine_Core::getTable('SlidesActivity')->findByIdObjectAndTypeObjectAndActive($this->activity->getId(), 'Activity', false);
    }
    
    public function executeListVideos(sfWebRequest $request)
    {
        $this->activity = $this->getRoute()->getObject();
        $this->video = new VideoForm();

        // Remove unneeded info
        $widgetSchema = $this->video->getWidgetSchema();
        unset($widgetSchema['id_object'], $widgetSchema['type_object']);
        $this->video->setWidgetSchema($widgetSchema);
        
        if ($request->isMethod('post'))
        {
          $infos = array(
            'id_object'     => $this->activity->getId(),
            'type_object'   => 'Activity',
          );
          $this->video->bind(array_merge($request->getParameter('video'), $infos),  $request->getFiles('video'));
          if ($this->video->isValid())
          {
            $this->video->save();
          }
        }
        
        $this->videos = Doctrine_Core::getTable('Video')->findByIdObjectAndTypeObject($this->activity->getId(), 'Activity');
    }
    
    public function executeListPhotos(sfWebRequest $request)
    {
        $this->activity = $this->getRoute()->getObject();
        $this->image = new ImageForm();

        // Remove unneeded info
        $widgetSchema = $this->image->getWidgetSchema();
        unset($widgetSchema['id_object'], $widgetSchema['type_object']);
        $this->image->setWidgetSchema($widgetSchema);
        
        if ($request->isMethod('post'))
        {
          $infos = array(
            'id_object'     => $this->activity->getId(),
            'type_object'   => 'Activity',
          );
          $this->image->bind(array_merge($request->getParameter('image'), $infos),  $request->getFiles('image'));
          if ($this->image->isValid())
          {
            $this->image->save();
          }
        }
        
        $this->images = Doctrine_Core::getTable('Image')->findByIdObjectAndTypeObject($this->activity->getId(), 'Activity');
    }
    
    public function executeDelvideo(sfWebRequest $request)
    {
        $referer = $this->getRequest()->getReferer();
        if ($request->hasParameter('id'))
        {
            $id = $request->getParameter('id');
            $video = Doctrine_Core::getTable('Video')->findOneById($id);
            $video->delete();
        }
        $this->redirect($referer);
    }

    public function executeDelphoto(sfWebRequest $request)
    {
        $referer = $this->getRequest()->getReferer();
        if ($request->hasParameter('id'))
        {
            $id = $request->getParameter('id');
            $image = Doctrine_Core::getTable('Image')->findOneById($id);
            $image->delete();
        }
        $this->redirect($referer);
    }
    
    public function executeDelslide(sfWebRequest $request)
    {
        $referer = $this->getRequest()->getReferer();
        if ($request->hasParameter('id'))
        {
            $id = $request->getParameter('id');
            $slide = Doctrine_Core::getTable('SlidesActivity')->findOneById($id);
            $slide->delete();
        }
        $this->redirect($referer);
    }
    
    public function executeActiveslide(sfWebRequest $request) 
    {
        $referer = $this->getRequest()->getReferer();
        if ($request->hasParameter('id'))
        {
          $toMove = Doctrine_Core::getTable('SlidesActivity')->findOneById($request->getParameter('id'));

          $last = Doctrine_Core::getTable('SlidesActivity')->getLastPosition($toMove->getIdObject(), 'Activity');

          $toMove->setPosition($last + 1);
          $toMove->setActive(true);
          $toMove->save();
        }
        $this->redirect($referer);
    }

    public function executeDeactivslide(sfWebRequest $request) {

      $referer = $this->getRequest()->getReferer();
      if ($request->hasParameter('id'))
      {
          $toMove = Doctrine_Core::getTable('SlidesActivity')->findOneById($request->getParameter('id'));

          $toMove->setActive(false);
          $toMove->setPosition(0);
          $toMove->save();
          $sliders = Doctrine_Core::getTable('SlidesActivity')->getAllByPosition($toMove->getIdObject(), 'Activity');
          $nb = 1;
          foreach ($sliders as $slider) {
            $slider->setPosition($nb++);
            $slider->save();
          }
      }
      $this->redirect($referer);
   }

   public function executeFirstslide(sfWebRequest $request) {

      $referer = $this->getRequest()->getReferer();
      if ($request->hasParameter('id'))
      {
          $toMove = Doctrine_Core::getTable('SlidesActivity')->findOneById($request->getParameter('id'));
          $sliders = Doctrine_Core::getTable('SlidesActivity')->getAllByPosition($toMove->getIdObject(), 'Activity');

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
      }
      $this->redirect($referer);
   }

   public function executeLastslide(sfWebRequest $request) 
   {
      $referer = $this->getRequest()->getReferer();
      if ($request->hasParameter('id'))
      {
          $toMove = Doctrine_Core::getTable('SlidesActivity')->findOneById($request->getParameter('id'));
          $sliders = Doctrine_Core::getTable('SlidesActivity')->getAllByPosition($toMove->getIdObject(), 'Activity', "desc");

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
      }
      $this->redirect($referer);

   }

   public function executeUpslide(sfWebRequest $request) 
   {
      $referer = $this->getRequest()->getReferer();
      if ($request->hasParameter('id'))
      {
          $sliders[] = Doctrine_Core::getTable('SlidesActivity')->findOneById($request->getParameter('id'));
          $this->redirectUnless($sliders[0], $referer);
          $newPosition = $sliders[0]->position - 1;
          $oldPosition = $sliders[0]->position;

          if ($oldPosition == 1)
             ;
          else {
             $sliders[1] = Doctrine_Core::getTable('SlidesActivity')->getByPosition($newPosition, $sliders[0]->getIdObject(), 'Activity');

             if (isset($sliders[1]) && $sliders[1]) {
                $sliders[1]->setPosition($oldPosition);
                $sliders[1]->save();
             } else {
                 $newPosition = $oldPosition;
             }

             $sliders[0]->setPosition($newPosition);
             $sliders[0]->save();
          }
      }
      $this->redirect($referer);
   }

   public function executeDownslide(sfWebRequest $request) 
   {
      $referer = $this->getRequest()->getReferer();
      if ($request->hasParameter('id'))
      {
          $sliders[] = Doctrine_Core::getTable('SlidesActivity')->findOneById($request->getParameter('id'));
          $this->redirectUnless($sliders[0], $referer);
          $newPosition = $sliders[0]->position + 1;
          $oldPosition = $sliders[0]->position;

          if ($oldPosition == Doctrine_Core::getTable('SlidesActivity')->getLastPosition($sliders[0]->getIdObject(), 'Activity'))
             ;
          else {
             $sliders[1] = Doctrine_Core::getTable('SlidesActivity')->getByPosition($newPosition, $sliders[0]->getIdObject(), 'Activity');

             if (isset($sliders[1]) && $sliders[1]) {
                $sliders[1]->setPosition($oldPosition);
                $sliders[1]->save();
             } else {
                 $newPosition = $oldPosition;
             }

             $sliders[0]->setPosition($newPosition);
             $sliders[0]->save();
          }
      }
      $this->redirect($referer);
   }
}
