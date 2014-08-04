  public function executeDelete(sfWebRequest $request)
  {
  
    $referer = $request->getReferer();
    
    $params = sfContext::getInstance()->getRouting()->findRoute($referer);

    $environment = sfConfig::get('sf_environment');
    if (!sfConfig::get('sf_no_script_name'))
    {
      $script = '/' . (($environment == 'prod') ? 'backend.php': 'backend_dev.php');
    }
    else
    {
      $script = $request->getHost();
    }
    $referer = substr($referer, strpos($referer, $script));

    $this->dispatcher->notify(new sfEvent($this, 'admin.delete_object', array('object' => $this->getRoute()->getObject())));

    if ($this->getRoute()->getObject()->delete())
    {
      $this->getUser()->setFlash('notice', 'The item was deleted successfully.');
    }

    if ($referer == $this->getController()->genUrl('@<?php echo $this->getUrlForAction('list') ?>'))
      $this->redirect('@<?php echo $this->getUrlForAction('list') ?>');
  }
