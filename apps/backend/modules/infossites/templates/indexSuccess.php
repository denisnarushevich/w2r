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
    <?php echo $infos['0']['form']->renderFormTag(url_for('informations')) ?>
    <?php foreach($langues as $langue): ?>
    <div id="langue-<?php echo $langue->id ?>">
      <?php echo $langue->country ?><br/>
      <?php foreach($infos as $info): ?>
        <?php echo __($info['name']) ?>
        <br/>
        <?php echo $info['form'][$langue->iso]['value']->render(); ?>
        <?php echo $info['form']->renderHiddenFields() ?>
        <br/><br/>
      <?php endforeach ?>
	</div>
    <?php endforeach; ?>
  <input type="submit" value="<?php echo __('Valider', null, 'admin') ?>"/>
    </form>
</div>