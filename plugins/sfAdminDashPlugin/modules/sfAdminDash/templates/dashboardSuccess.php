<?php
  use_helper('I18N');
  /** @var Array of menu items */ $items = $sf_data->getRaw('items');
  /** @var Array of categories, each containing an array of menu items and settings */ $categories = $sf_data->getRaw('categories');
?>
                       
<div id="sf_admin_container">
  <h1><?php echo __('Dashboard', null, 'admin'); ?></h1>
  <?php if (count($items)): ?>
    <?php include_partial('dash_list', array('items' => $items)); ?>
  <?php endif; ?>
  <?php if (count($categories)): ?>
    <?php foreach ($categories as $name => $category): ?>
      <?php if (sfAdminDash::hasPermission($category, $sf_user)): ?>
        <?php include_partial('dash_list', array('items' => $category['items'], 'name' => isset($category['name']) ? $category['name'] : $name)); ?>
      <?php endif; ?>
    <?php endforeach; ?>
  <?php elseif (!count($items)): ?>
    <?php echo __('sfAdminDashPlugin is not configured.  Please see the %documentation_link%.', array('%documentation_link%'=>link_to(__('documentation', null, 'admin'), 'http://www.symfony-project.org/plugins/sfAdminDashPlugin?tab=plugin_readme', array('title' => __('documentation', null, 'admin')))), 'admin'); ?>
  <?php endif; ?>
</div>