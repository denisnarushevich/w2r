<!-- Main Start --> 
<div id="content">
	<div id="highlightsContainer">
		<?php
			foreach($highlights as $nb => $hla){
				$hl = $hla['hl'];
				$act = $hla['act'];
		?>
			<div class="highlight">	
				<a href="<?php echo url_for('activity', $act) ?>">
					<img src="/<?php echo ($act->getImage() != '' ? basename(sfConfig::get('sf_upload_dir')) . '/activity/' . $act->getImage() : 'images/unknown.jpg') ?>" alt="<?php echo $act->getName() ?>" />
				</a>
				<div class="price">€ <?php echo $act->getDefaultPrice() ?></div>
				<div class="text">
					<?php echo $hl->getTitle().' '.$hl->getTitleBlue(); ?>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
<!-- Main End -->