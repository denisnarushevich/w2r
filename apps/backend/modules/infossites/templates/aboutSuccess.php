<script>
	$(function() {
		$( "#tabs" ).tabs();
	});
</script>
<div id="tabs">
	<ul>
      <?php foreach($langues as $langue): ?>
      <li><a href="#langue-<?php echo $langue->id ?>"><img src="/images/flags/<?php echo $langue->iso ?>.jpg" /><?php echo $langue->country ?></a></li>
      <?php endforeach; ?>
	</ul>
    <?php echo $form->renderFormTag(url_for('about')) ?>
    <?php foreach($langues as $langue): ?>
    <div id="langue-<?php echo $langue->id ?>">
		<?php echo $langue->country ?>
        <?php echo $form[$langue->iso]['value']->render(); ?>
	</div>
    <?php endforeach; ?>
      <?php echo $form->renderHiddenFields('') ?>
  <input type="submit" value="<?php echo __('Valider', null, 'admin') ?>"/>
    </form>
</div>