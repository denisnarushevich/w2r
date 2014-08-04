<h3><?php echo __('Videos for this activity :', null, 'admin') .' ' . $activity->getName()  ?></h3>
<?php if ($videos->count() == 0): ?>
<?php echo __('No videos.', null, 'admin') ?>
<?php else: ?>
<table>
    <thead>
        <tr>
            <th><?php echo __('Video', null, 'admin') ?></th>
            <th><?php echo __('Actions', null, 'admin') ?></th>
        </tr>
    </thead>
<?php foreach ($videos as $vid) { ?>
    <tr>
        <td>
            <?php echo $vid->getContent(ESC_RAW) ?>
        </td>
        <td>
            <a onclick="if (confirm('<?php echo __('Are you sure ?', null, 'admin') ?>')) { return true; } return false;" href="<?php echo url_for('admin_activity/delvideo?id=' . $vid->getId()) ?>"><?php echo __('delete', null, 'admin') ?></a>
        </td>
    </tr>
<?php } ?>
</table>
<?php endif ?>
<h3><?php echo __('Add a video for this activity', null, 'admin') ?></h3>
<div class="sf_admin_form">
    <form action="<?php echo url_for('admin_activity/ListVideos?id=' . $activity->id) ?>" method="POST" enctype="multipart/form-data">
        <table>
            <?php echo $video->render() ?>
            <tr>
                <td colspan="2">
                <input type="submit" />
                </td>
            </tr>
        </table>
    </form>
</div>