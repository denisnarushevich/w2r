<h3><?php echo __('Slides actives for this activity :', null, 'admin') .' ' . $activity->getName()  ?></h3>
<?php if ($slides->count() == 0): ?>
<?php echo __('No actives slides.', null, 'admin') ?>
<?php else: ?>
<table>
    <thead>
        <tr>
            <th><?php echo __('Slide', null, 'admin') ?></th>
            <th><?php echo __('Actions', null, 'admin') ?></th>
        </tr>
    </thead>
<?php foreach ($slides as $nb => $slide) { ?>
    <tr>
        <td>
            <img src="/<?php echo basename(sfConfig::get('sf_upload_dir')).'/slides/thumb/'.$slide->getPath() ?>"/>
        </td>
        <td>
            <a href="<?php echo url_for('admin_activity/deactivslide?id=' . $slide->getId()) ?>"><?php echo __('deactivate', null, 'admin') ?></a>
            <?php if ($nb > 0): ?>
            <a href="<?php echo url_for('admin_activity/firstslide?id=' . $slide->getId()) ?>"><?php echo __('first', null, 'admin') ?></a>
            <a href="<?php echo url_for('admin_activity/upslide?id=' . $slide->getId()) ?>"><?php echo __('up', null, 'admin') ?></a>
            <?php endif ?>
            <?php if ($nb < $slides->count() - 1): ?>
            <a href="<?php echo url_for('admin_activity/downslide?id=' . $slide->getId()) ?>"><?php echo __('down', null, 'admin') ?></a>
            <a href="<?php echo url_for('admin_activity/lastslide?id=' . $slide->getId()) ?>"><?php echo __('last', null, 'admin') ?></a>
            <?php endif ?>
            <a onclick="if (confirm('<?php echo __('Are you sure ?', null, 'admin') ?>')) { return true; } return false;" href="<?php echo url_for('admin_activity/delslide?id=' . $slide->getId()) ?>"><?php echo __('delete', null, 'admin') ?></a>
        </td>
    </tr>
<?php } ?>
</table>
<?php endif ?>
<h3><?php echo __('Slides passives for this activity :', null, 'admin') .' ' . $activity->getName()  ?></h3>
<?php if ($passlides->count() == 0): ?>
<?php echo __('No passives slides.', null, 'admin') ?>
<?php else: ?>
<table>
    <thead>
        <tr>
            <th><?php echo __('Slide', null, 'admin') ?></th>
            <th><?php echo __('Actions', null, 'admin') ?></th>
        </tr>
    </thead>
<?php foreach ($passlides as $slide) { ?>
    <tr>
        <td>
            <img src="/<?php echo basename(sfConfig::get('sf_upload_dir')).'/slides/thumb/'.$slide->getPath() ?>"/>
        </td>
        <td>
            <a href="<?php echo url_for('admin_activity/activeslide?id=' . $slide->getId()) ?>"><?php echo __('activate', null, 'admin') ?></a>
            <a onclick="if (confirm('<?php echo __('Are you sure ?', null, 'admin') ?>')) { return true; } return false;" href="<?php echo url_for('admin_activity/delslide?id=' . $slide->getId()) ?>"><?php echo __('delete', null, 'admin') ?></a>
        </td>
    </tr>
<?php } ?>
</table>
<?php endif ?>
<h3><?php echo __('Add a video for this activity', null, 'admin') ?></h3>
<div class="sf_admin_form">
    <form action="<?php echo url_for('admin_activity/ListSliders?id=' . $activity->id) ?>" method="POST" enctype="multipart/form-data">
        <table>
            <?php echo $newslide->render() ?>
            <tr>
                <td colspan="2">
                <input type="submit" />
                </td>
            </tr>
        </table>
    </form>
</div>