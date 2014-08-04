<?php

class menuComponents extends sfComponents
{
    public function executeShow(sfWebRequest $request)
    {
        if ($this->getUser()->isAuthenticated())
        {
            $this->user = array(
                'name'=>$this->getUser()->getName(),
                'is_admin'=>$this->getUser()->isSuperAdmin()
            );
        }
    }
}