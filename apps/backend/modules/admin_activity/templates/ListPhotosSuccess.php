<h3><?php echo __('Photos for this activity :', null, 'admin') .' ' . $activity->getName()  ?></h3>
<?php if ($images->count() == 0): ?>
<?php echo __('No photos.', null, 'admin') ?>
<?php else: ?>
<table>
    <thead>
        <tr>
            <th><?php echo __('Image', null, 'admin') ?></th>
            <th><?php echo __('Actions', null, 'admin') ?></th>
        </tr>
    </thead>
<?php foreach ($images as $img) { ?>
    <tr>
        <td>
            <img src="/<?php echo basename(sfConfig::get('sf_upload_dir')).'/photos/thumb/'.$img->getPath() ?>"/>
        </td>
        <td>
            <a onclick="if (confirm('<?php echo __('Are you sure ?', null, 'admin') ?>')) { return true; } return false;" href="<?php echo url_for('admin_activity/delphoto?id=' . $img->getId()) ?>"><?php echo __('delete', null, 'admin') ?></a>
        </td>
    </tr>
<?php } ?>
</table>
<?php endif ?>
<h3><?php echo __('Add a photo for this activity', null, 'admin') ?></h3>
<div class="sf_admin_form">
    <form action="<?php echo url_for('admin_activity/ListPhotos?id=' . $activity->id) ?>" method="POST" enctype="multipart/form-data">
        <table>
            <?php echo $image->render() ?>
            <tr>
                <td colspan="2">
                <input type="submit" />
                </td>
            </tr>
        </table>
    </form>
</div>