<script>
    $(function() {
      $("#tabs").tabs();
    });
    $(function() {
      $('.images a').lightBox(); // Select all links in object with gallery ID
    });
</script>
<div id="main">
    <h1><?php echo __('Select the sliders below :', null, 'admin') ?></h1>
    <div class="container">
      <span style="padding-left: 20px;">
        <?php echo __('Click on the link below if you want to add a new slide :', null, 'admin') ?><br/>
        <a href="#" onclick="openZoombox('<?php echo url_for('slider/new') ?>', 800, 600);" style="padding-left: 20px;"><?php echo __('Add a new slide ?', null, 'admin') ?></a>
      </span>
      <br/><br/>
      <form method="POST" action="<?php echo url_for('slider/index') ?>">
<?php /*          <input type="submit" value="Apply changes ?"/><br/><br/> */ ?>
          <div id="tabs">
              <ul>
                <?php foreach($langues as $langue): ?>
                <li><a href="#langue-<?php echo $langue->id ?>"><img src="/images/flags/<?php echo $langue->iso ?>.jpg" /><?php echo $langue->country ?></a></li>
                <?php endforeach; ?>
              </ul>
              <?php foreach($langues as $langue): ?>
              <div id="langue-<?php echo $langue->id ?>" style="height: 60%;">
                  <img src="/images/flags/<?php echo $langue->iso ?>.jpg" /><br/>
                  <div style="width: 100%; position: relative;" class="sf_admin_list">
                      <?php echo __('Active sliders :', null, 'admin') ?>
                      <table class="tab_slide" width="100%">
                        <thead>
                            <tr>
                                <th width="5%"><?php echo __('Position', null, 'admin') ?></th>
                                <th width="15%"><?php echo __('Title', null, 'admin') ?></th>
                                <th width="15%"><?php echo __('Activity', null, 'admin') ?></th>
                                <th width="15%"><?php echo __('Image', null, 'admin') ?></th>
                                <th width="40%"><?php echo __('Actions', null, 'admin') ?></th>
                            </tr>
                        </thead>
                      <?php foreach($sliders[$langue->getIso()] as $slide): ?>
                        <tr>
                          <td><?php echo $slide->getPosition() ?></td>
                          <td><?php echo $slide->getTitle() ?></td>
                          <td><?php echo $slide->getActivity() ?></td>
                          <td class="images">
                              <a href="<?php echo '/'.basename(sfConfig::get('sf_upload_dir')).'/sliders/'.$slide->getImage() ?>" title="<?php echo $slide->getTitle() ?>">
                                  <img src="<?php echo '/'.basename(sfConfig::get('sf_upload_dir')).'/sliders/thumb/'.$slide->getImage() ?>" alt="<?php echo $slide->getTitle() ?>"/>
                              </a>
                          </td>
                          <td>
                            <ul class="sf_admin_td_actions">
                                <li><a href="<?php echo url_for('slider/ListDeactivate?id=' . $slide->id) ?>" class="action_deactivate"><?php echo __('Deactivate', null, 'admin') ?></a></li>
                                <?php if($slide->position > 1): ?>
                                <li><a href="<?php echo url_for('slider/ListPremier?id=' . $slide->id) ?>" class="action_first"><?php echo __('First', null, 'admin') ?></a></li>
                                <li><a href="<?php echo url_for('slider/ListMonter?id=' . $slide->id) ?>" class="action_up"><?php echo __('Up', null, 'admin') ?></a></li>
                                <?php endif ?>
                                <?php if($slide->position < $sliders[$langue->getIso()]->count()): ?>
                                <li><a href="<?php echo url_for('slider/ListDescendre?id=' . $slide->id) ?>" class="action_down"><?php echo __('Down', null, 'admin') ?></a></li>
                                <li><a href="<?php echo url_for('slider/ListDernier?id=' . $slide->id) ?>" class="action_last"><?php echo __('Last', null, 'admin') ?></a></li>
                                <?php endif ?>
                                <li><a href="#" onclick="openZoombox('<?php echo url_for('@slider_edit?id=' . $slide->id) ?>', 800, 600);" class="action_edit"><?php echo __('Edit', null, 'admin') ?></a></li>
                                <?php echo $helper->linkToDelete($slide, array(  'label' => 'Delete',  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',)) ?>
                            </ul>
                          </td>
                        </tr>
                      <?php endforeach ?>
                      </table>
                  </div>
                  <div style="width: 100%; position: relative; padding-top: 20px;" class="sf_admin_list">
                      <?php echo __('Passive sliders :', null, 'admin') ?>
                      <table class="tab_slide" width="100%">
                          <thead>
                            <tr>
                                <th width="5%" class="sf_admin_text"></th>
                                <th width="15%" class="sf_admin_text"><?php echo __('Title', null, 'admin') ?></th>
                                <th width="15%" class="sf_admin_text"><?php echo __('Activity', null, 'admin') ?></th>
                                <th width="15%" class="sf_admin_text"><?php echo __('Image', null, 'admin') ?></th>
                                <th width="40%" class="sf_admin_text"><?php echo __('Actions', null, 'admin') ?></th>
                            </tr>
                          </thead>
                      <?php foreach($slidersPass[$langue->getIso()] as $slide): ?>
                        <tr>
                          <td></td>
                          <td><?php echo $slide->getTitle() ?></td>
                          <td><?php echo $slide->getActivity() ?></td>
                          <td class="images">
                              <a href="<?php echo '/'.basename(sfConfig::get('sf_upload_dir')).'/sliders/'.$slide->getImage() ?>" title="<?php echo $slide->getTitle() ?>">
                                  <img src="<?php echo '/'.basename(sfConfig::get('sf_upload_dir')).'/sliders/thumb/'.$slide->getImage() ?>" alt="<?php echo $slide->getTitle() ?>"/>
                              </a>
                          </td>
                          <td>
                            <ul class="sf_admin_td_actions">
                              <li><a href="<?php echo url_for('slider/ListActivate?id=' . $slide->id) ?>" class="action_activate"><?php echo __('Activate', null, 'admin') ?></a></li>
                              <li><a href="#" onclick="openZoombox('<?php echo url_for('@slider_edit?id=' . $slide->id) ?>', 800, 600);" class="action_edit"><?php echo __('Edit', null, 'admin') ?></a></li>
                              <?php echo $helper->linkToDelete($slide, array(  'label' => 'Delete',  'params' =>   array(  ),  'confirm' => 'Are you sure?',  'class_suffix' => 'delete',)) ?>
                            </ul>
                          </td>
                        </tr>
                      <?php endforeach ?>
                      </table>
                  </div>
              </div>
              <?php endforeach; ?>
          </div>
        </form>
    </div>
</div>
