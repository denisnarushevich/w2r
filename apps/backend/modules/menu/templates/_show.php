<a href="/"><img id="logo" src="/images/logo.png" alt="Stag" /></a>
<div id="profile-links">Hello <a href="#" onClick="return false;"><?php echo htmlentities($user['name']); ?></a><br/>
    <a target="_blank" href="http://www.theriganightlife.com">View the Site</a> | <a href="<?php echo url_for('@sf_guard_signout'); ?>" title="Sign Out">Sign Out</a>
</div>
<ul id="main-nav">
    <li><a href="<?php echo url_for('@homepage'); ?>" class="nav-top-item no-submenu<?php if ($sf_context->getModuleName() == 'homepage') echo ' current'; ?>"><?php echo __('Dashboard', null, 'admin') ?></a></li>
    <li><a href="<?php echo url_for('@planner'); ?>" class="nav-top-item no-submenu<?php if ($sf_context->getModuleName() == 'planner') echo ' current'; ?>"><?php echo __('Planner', null, 'admin') ?></a></li>
    <li><a href="<?php echo url_for('@comments'); ?>" class="nav-top-item no-submenu<?php if ($sf_context->getModuleName() == 'comments') echo ' current'; ?>"><?php echo __('Comments', null, 'admin') ?></a></li>
    <br/><br/><br/>
    <?php
    if ($user['is_admin'])
    {
        ?>
    <!-- Admin -->
    <li><a href="#" class="nav-top-item <?php
    if (substr($sf_request->getPathInfo(), 0, strlen('/admin/')) == '/admin/') echo 'current'; ?>"><?php echo __('Contents management', null, 'admin') ?></a>
        <ul>
            <li><a <?php if ($sf_context->getModuleName() == 'admin_category') echo 'class="current"'; ?> href="<?php echo url_for('@admin_category'); ?>"><?php echo __('Categories', null, 'admin') ?></a></li>
            <li><a <?php if ($sf_context->getModuleName() == 'admin_activity') echo 'class="current"'; ?> href="<?php echo url_for('@admin_activity'); ?>"><?php echo __('Activities', null, 'admin') ?></a></li>
            <li><a <?php if ($sf_context->getModuleName() == 'admin_activity_price') echo 'class="current"'; ?> href="<?php echo url_for('@admin_activity_price'); ?>"><?php echo __('Price Activities', null, 'admin') ?></a></li>
            <li><a <?php if ($sf_context->getModuleName() == 'admin_category_extra') echo 'class="current"'; ?> href="<?php echo url_for('@extra_category'); ?>"><?php echo __('Extra Categories', null, 'admin') ?></a></li>
            <li><a <?php if ($sf_context->getModuleName() == 'admin_extra') echo 'class="current"'; ?> href="<?php echo url_for('@extra'); ?>"><?php echo __('Extra', null, 'admin') ?></a></li>
        </ul>
    </li> 
    <br/>
    <li><a href="#" class="nav-top-item <?php
    if (substr($sf_request->getPathInfo(), 0, strlen('/client/')) == '/client/') echo 'current'; ?>"><?php echo __('Customers management', null, 'admin') ?></a>
        <ul>
            <li><a <?php if ($sf_context->getModuleName() == 'admin_client') echo 'class="current"'; ?> href="<?php echo url_for('@client'); ?>"><?php echo __('Customers', null, 'admin') ?></a></li>
            <li><a <?php if ($sf_context->getModuleName() == 'admin_card') echo 'class="current"'; ?> href="<?php echo url_for('@card'); ?>"><?php echo __('Cards', null, 'admin') ?></a></li>
            <li><a <?php if ($sf_context->getModuleName() == 'admin_planner') echo 'class="current"'; ?> href="<?php echo url_for('@planner_admin_planner'); ?>"><?php echo __('Planner', null, 'admin') ?></a></li>
            <li><a <?php if ($sf_context->getModuleName() == 'admin_booking') echo 'class="current"'; ?> href="<?php echo url_for('@booking'); ?>"><?php echo __('Booking', null, 'admin') ?></a></li>
        </ul>
    </li>
    <br/>
    <li>
      <a href="#" class="nav-top-item<?php if (substr($sf_request->getPathInfo(), 0, strlen('/home/')) == '/home/') echo ' current'; ?>"><?php echo __('Homepage management', null, 'admin') ?></a>
      <ul>
        <li><a <?php if ($sf_context->getModuleName() == 'admin_category') echo 'class="current" '; ?>href="#"><?php echo __('Slider', null, 'admin') ?></a></li>
        <li><a <?php if ($sf_context->getModuleName() == 'admin_category') echo 'class="current" '; ?>href="#"><?php echo __('Highlight activities', null, 'admin') ?></a></li>
        <li><a <?php if ($sf_context->getModuleName() == 'admin_category') echo 'class="current" '; ?>href="#"><?php echo __('Footer highlight', null, 'admin') ?></a></li>
        <li><a <?php if ($sf_context->getModuleName() == 'admin_category') echo 'class="current" '; ?>href="#"><?php echo __('Footer video block', null, 'admin') ?></a></li>
      </ul>
    </li>
    <br/>
    <li>
      <a href="#" class="nav-top-item<?php if (substr($sf_request->getPathInfo(), 0, strlen('/text/')) == '/text/') echo ' current'; ?>"><?php echo __('Texts management', null, 'admin') ?></a>
      <ul>
        <li><a <?php if ($sf_context->getModuleName() == 'text_langues') echo 'class="current" '; ?>href="<?php echo url_for('@text_langues') ?>"><?php echo __('Languages available', null, 'admin') ?></a></li>
        <li><a <?php if ($sf_context->getModuleName() == 'text_trans') echo 'class="current" '; ?>href="<?php echo url_for('@text_trans') ?>"><?php echo __('Languages translation', null, 'admin') ?></a></li>
        <li><a <?php if ($sf_context->getModuleName() == 'admin_category') echo 'class="current" '; ?>href="#"><?php echo __('Sites informations', null, 'admin') ?></a></li>
      </ul>
    </li>
    <!-- END Admin -->
    <?php
    }
    ?>
</ul>