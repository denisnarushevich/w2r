<?php
  use_helper('I18N');
?>  

<div id='sf_admin_theme_footer'>
  <?php echo __('Copyright &copy; %current_year% %site_name%. - Powered by <a href="http://www.rainmaker.lv" target="_blank">Rainmaker</a> All rights reserved', array('%current_year%' => date('Y'), '%site_name%' => sfAdminDash::getProperty('site')), 'admin'); ?>
</div>
