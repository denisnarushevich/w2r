<?php

//require_once dirname(__FILE__).'/../lib/infossitesGeneratorConfiguration.class.php';
//require_once dirname(__FILE__).'/../lib/infossitesGeneratorHelper.class.php';

/**
 * infossites actions.
 *
 * @package    stag
 * @subpackage infossites
 * @author     Rainmaker
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
//class infossitesActions extends autoInfossitesActions
class infossitesActions extends sfActions
{
  
  public function executeIndex(sfWebRequest $request)
  {
    $this->langues = Doctrine::getTable('Langues')->getAll();
    $infosName = array('sitename', 'undertitle', 'facebook', 'twitter', 'linkedin', 'society', 'urlsociety', 'copyright', 'street', 'phone', 'email');
    $this->infos = array();
    foreach ($infosName as $value) {
      $info = array();
      $info['name'] = $value;
      $info['form'] = new InformationsNoCKForm();
      $info['form']->setWidgetNameFormat($value);
      $this->doUpdateForInfos($request, $value, $info['form']);
      $this->infos[] = $info;
    }
  }

  public function executeMenu(sfWebRequest $request) {
    $this->langues = Doctrine::getTable('Langues')->getAll();
    
  }
  
  public function executeTerms(sfWebRequest $request) {
    $this->langues = Doctrine::getTable('Langues')->getAll();
    $this->form = new InformationsForm();
    
    $this->doUpdate($request, 'Terms', $this->form);
  }
  
  public function executeAbout(sfWebRequest $request) {
    $this->langues = Doctrine::getTable('Langues')->getAll();
    $this->form = new InformationsForm();
    
    $this->doUpdate($request, 'About', $this->form);
  }
  
  private function doUpdateForInfos(sfWebRequest $request, $field, &$form)
  {
    if ($request->isMethod('POST'))
    {
      if ($request->hasParameter($field))
      {
        $params = $request->getParameter($field);
        // If there is an id, we proceed
        if (isset($params['id']))
        {
          // If the id isn't empty, we get it from the DataBase
          if (trim($params['id']) != '')
            $trad = Doctrine_Core::getTable('Informations')->findOneById($params['id']);
          else
          {
            $trad = new Informations();
            $trad->setName($field);
          }
          $saveCulture = $this->getUser()->getCulture();
          foreach($this->langues as $langue)
          {
            //echo $trad['lang'];
            if (isset($params[$langue->getIso()]['value']))
            {
              $this->getUser()->setCulture($langue->getIso());
              $trad->setValue($params[$langue->getIso()]['value']);
              $trad->setName($field);
            }
          }
          $trad->save();
          $this->getUser()->setCulture($saveCulture);
        }
      }
    }
    if (isset($trad))
      $this->fieldToCheck = $trad;
    else
      $this->fieldToCheck = Doctrine_Core::getTable('Informations')->getDataFor($field);
    $defValue = array();
    $defValue['id'] = isset($this->fieldToCheck['id']) ? $this->fieldToCheck['id'] : '';
    foreach($this->langues as $langue)
    {
      $defValue[$langue->iso] = array(
        'name'  => $field,
        'value' => ((isset($this->fieldToCheck['Translation']) &&
                   isset($this->fieldToCheck['Translation'][$langue->iso]) && 
                   isset($this->fieldToCheck['Translation'][$langue->iso]['value'])) ? $this->fieldToCheck['Translation'][$langue->iso]['value'] : '')
      );
    }
    $form->setDefaults($defValue);
  }
  private function doUpdate(sfWebRequest $request, $field)
  {
    // If we have a post, then, we create or update the field in DB
    if ($request->isMethod('POST'))
    {
      if ($request->hasParameter('informations'))
      {
        $params = $request->getParameter('informations');
        // If there is an id, we proceed
        if (isset($params['id']))
        {
          // If the id isn't empty, we get it from the DataBase
          if (trim($params['id']) != '')
            $trad = Doctrine_Core::getTable('Informations')->findOneById($params['id']);
          else
          {
            $trad = new Informations();
            $trad->setName($field);
          }
          $saveCulture = $this->getUser()->getCulture();
          foreach($this->langues as $langue)
          {
            //echo $trad['lang'];
            if (isset($params[$langue->getIso()]['value']))
            {
              $this->getUser()->setCulture($langue->getIso());
              $trad->setValue($params[$langue->getIso()]['value']);
              $trad->setName($field);
            }
          }
          $trad->save();
          $this->getUser()->setCulture($saveCulture);
        }
      }
    }
    $this->fieldToCheck = Doctrine_Core::getTable('Informations')->getDataFor($field);
    $defValue = array();
    $defValue['id'] = isset($this->fieldToCheck['id']) ? $this->fieldToCheck['id'] : '';
    foreach($this->langues as $langue)
    {
      $defValue[$langue->iso] = array(
        'name'  => $field,
        'value' => ((isset($this->fieldToCheck['Translation']) &&
                   isset($this->fieldToCheck['Translation'][$langue->iso]) && 
                   isset($this->fieldToCheck['Translation'][$langue->iso]['value'])) ? $this->fieldToCheck['Translation'][$langue->iso]['value'] : '')
      );
    }
    $this->form->setDefaults($defValue);
  }
}
