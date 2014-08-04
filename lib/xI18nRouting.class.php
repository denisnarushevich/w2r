<?php

class xI18nRouting
{
  static public function listenToRoutingLoadConfigurationEvent(sfEvent $event)
  {
    $r = $event->getSubject();

    // preprend our routes
    $r->prependRoute('xI18nCatalogue_collection', new sfRoute('pear/submit', array('module' => 'xPear', 'action' => 'submit')));
  }
  
  static public function addRouteForAdminCatalogue(sfEvent $event)
  {
    $event->getSubject()->prependRoute('x_i18n_catalogue_collection', new sfDoctrineRouteCollection(array(
      'name'                => 'xI18nCatalogue',
      'model'               => 'catalogue',
      'module'              => 'xI18nCatalogue',
      'prefix_path'         => 'xI18nCatalogue',
      'column'              => 'cat_id',
      'with_wildcard_routes' => true,
      'collection_actions'  => array('filter' => 'post', 'batch' => 'post'),
      'requirements'        => array(),
    )));
  }
  
  static public function addRouteForAdminTransUnit(sfEvent $event)
  {
    $event->getSubject()->prependRoute('x_i18n_trans_unit_collection', new sfDoctrineRouteCollection(array(
      'name'                => 'xI18nTransUnit',
      'model'               => 'transUnit',
      'module'              => 'xI18nTransUnit',
      'prefix_path'         => 'xI18nTransUnit',
      'with_wildcard_routes' => true,
      'column'              => 'msg_id',
      'collection_actions'  => array('filter' => 'post', 'batch' => 'post'),
      'requirements'        => array(),
    )));
  }
}
