<?php

require_once dirname(__FILE__).'/../lib/text_transGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/text_transGeneratorHelper.class.php';

/**
 * trans_unit actions.
 *
 * @package    lempereur
 * @subpackage trans_unit
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class text_TransActions extends autotext_TransActions
{
  public function executeAjaxTarget(sfWebRequest $request)
  {
    $id = $request->getParameter('id');
    $target = $request->getParameter('target');
    
    $record = Doctrine::getTable('transUnit')->find($id);
    
    if($record)
    {
      $record->target = $target;
      $record->save();
      echo 'unit updated';
    }
    else
    {
      $record = new TransUnit;
//      $record->target = $target;
//      $record->id = $id;
//      $record->save();
      echo 'unit created';
    }
    exit;
  }
}
