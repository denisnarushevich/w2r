<td>
  <ul class="sf_admin_td_actions">
    <li class="sf_admin_action_photos">
      <a href="#" onclick="openNZoombox('<?php echo url_for('admin_activity/ListPhotos?id=' . $activity->id) ?>', 800, 600);"><?php echo __('Photos', array(), 'sf_admin') ?></a>
    </li>
    <li class="sf_admin_action_videos">
      <a href="#" onclick="openNZoombox('<?php echo url_for('admin_activity/ListVideos?id=' . $activity->id) ?>', 800, 600);"><?php echo __('Videos', array(), 'sf_admin') ?></a>
    </li>
    <li class="sf_admin_action_sliders">
      <a href="#" onclick="openNZoombox('<?php echo url_for('admin_activity/ListSliders?id=' . $activity->id) ?>', 800, 600);"><?php echo __('Sliders', array(), 'sf_admin') ?></a>
    </li>
    <li class="sf_admin_action_edit"><a href="#" onclick="openZoombox('<?php echo url_for('@activity_edit?id=' . $activity->id) ?>', 800, 600);"><?php echo __('Edit', array(), 'sf_admin') ?></a></li>
    <?php echo $helper->linkToDelete($activity, array(  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',  'label' => 'Delete',)) ?>
  </ul>
</td>
