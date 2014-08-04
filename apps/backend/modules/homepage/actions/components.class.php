<?php

class homepageComponents extends sfComponents
{
    public function executeLastPlanner(sfWebRequest $request)
    {
      $this->planners = array();
      $this->planners = Doctrine_Core::getTable('Planner')->getLastPlanner(); 
      //$this->planners = Doctrine_Core::getTable('Planner')->getLastPlanner();
      //$this->pager = new sfDoctrinePager('Planner',10);
      //$this->pager->setQuery(Doctrine_Core::getTable('Planner')->getLastPlannerQuery());
      //$this->pager->setPage($request->getParameter('p', 1));
      //$this->pager->init();
    }
    
    public function executeLastPlannerRunning(sfWebRequest $request)
    {
      $this->planners = array();
      $this->planners = Doctrine_Core::getTable('Planner')->getLastPlanner('InProgress'); 
    }
    
    public function executeNewComments(sfWebRequest $request)
    {
      $this->comments = array();
      $this->comments = Doctrine_Core::getTable('Comment')->findByValideAndDel(false, false); 
    }

    public function executeNewContacts(sfWebRequest $request)
    {
      $this->contacts = array();
      $this->contacts = Doctrine_Core::getTable('Contact')->getLastContacts('New'); 
    }
    
    public function executeNewReviews(sfWebRequest $request)
    {
      $this->reviews = array();
      $this->reviews = Doctrine_Core::getTable('Review')->findByValideAndDel(false, false); 
    }
}