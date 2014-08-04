<!--Footer Start--> 
<?php use_helper('Info') ?>
<?php $info = InformationsTable::getInstance(); ?>

<div id="footer">

	<div class="block">
		<div class="big">
			<?php echo getInfo($info, $sf_user, 'society', $sf_user) ?><br/>
			<?php echo getInfo($info, $sf_user, 'street', $sf_user) ?><br/>
			<?php echo getInfo($info, $sf_user, 'phone', $sf_user) ?><br/>
			<?php echo getInfo($info, $sf_user, 'email', $sf_user) ?><br/>
		</div>		
		<div class="small">
			Copyright © 2011<br/>
			<a href="<?php echo getInfo($info, $sf_user, 'urlsociety') ?>" target="_blank"><?php echo getInfo($info, $sf_user, 'urlsociety') ?></a><br/>
		</div>
	</div>
	<div class="pod2"></div>

	<div class="block">
		<div class="title"><?php echo __('More information') ?></div>
		<a href="<?php echo url_for('@page?page=' . __('about')) ?>" class="bigbutton">
			Contact us using our form by clicking here...
		</a>
	</div>

	<div class="pod2"></div>
	<div class="block networks">
		<div class="title"><?php echo __('Follow us on') ?></div>
		<a class="facebook" target="_blank" href="<?php echo getInfo($info, $sf_user, 'facebook', $sf_user) ?>"></a>
		<a class="twitter" target="_blank" href="<?php echo getInfo($info, $sf_user, 'twitter', $sf_user) ?>"></a>
		<a class="linkedin" target="_blank" href="<?php echo getInfo($info, $sf_user, 'linkedin ', $sf_user) ?>"></a>
	</div>

</div>
<!--Footer End--> 