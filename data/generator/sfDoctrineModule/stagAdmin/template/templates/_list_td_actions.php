<td>
  <ul class="sf_admin_td_actions">
<?php foreach ($this->configuration->getValue('list.object_actions') as $name => $params): ?>
<?php if ('_delete' == $name): ?>
    <?php echo $this->addCredentialCondition('[?php echo $helper->linkToDelete($'.$this->getSingularName().', '.$this->asPhp($params).') ?]', $params) ?>

<?php elseif ('_edit' == $name): ?>
    <li class="sf_admin_action_edit"><a href="#" onclick="openZoombox('[?php echo url_for('@<?php echo $this->getUrlForAction('edit') ?>?id=' . $<?php echo $this->getSingularName() ?>->id) ?]', 800, 600);">[?php echo __('Edit', array(), 'sf_admin') ?]</a></li>
<?php else: ?>
    <li class="sf_admin_action_<?php echo $params['class_suffix'] ?>">
      <?php echo $this->addCredentialCondition($this->getLinkToAction($name, $params, true), $params) ?>

    </li>
<?php endif; ?>
<?php endforeach; ?>
  </ul>
</td>
