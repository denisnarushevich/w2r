<?php

require_once 'C://dev//sf//symfony-1.4.14//lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin');
    $this->enablePlugins('ahDoctrineEasyEmbeddedRelationsPlugin');
    $this->enablePlugins('sfDoctrineGuardPlugin');
    $this->enablePlugins('sfJqueryReloadedPlugin');
    $this->enablePlugins('sfAdminDashPlugin');
    $this->enablePlugins('sfCKEditorPlugin');
    $this->enablePlugins('sfThumbnailPlugin');
    $this->enablePlugins('sfFormExtraPlugin');
    $this->enablePlugins('doAuthPlugin');
  }
}
