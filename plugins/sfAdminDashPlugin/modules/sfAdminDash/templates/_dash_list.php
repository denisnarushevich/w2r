<?php
  use_helper('I18N');
  /** @var Array of menu items */ $items = $sf_data->getRaw('items');
?>

<div class="cpanel">
  <h2><?php echo __($name, null, 'admin'); ?></h2>
  <?php foreach ($items as $key => $item): ?>
    <?php if (sfAdminDash::hasPermission($item, $sf_user)):?>
      <div style="float: left">
        <div class="icon">
          <a href="<?php echo url_for($item['url']) ?>" title="<?php echo __($item['name'], null, 'admin'); ?>">    
            <?php echo image_tag($item['image'], array('alt' => __($item['name'], null, 'admin'))); ?>
            <span><?php echo __($item['name'], null, 'admin'); ?></span>
          </a>
        </div>        
      </div>
    <?php endif; ?>
  <?php endforeach; ?>
  <div class="clear"></div>
</div>