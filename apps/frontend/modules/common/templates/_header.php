<!--Header Start--> 
<div id="headerContainer">

	<div id="topBar">
		<?php if ($sf_user->isAnonymous()): ?>
			<a href="<?php echo url_for('register') ?>"><?php echo __('Register') ?></a>
			<div class="separator"></div>
			<a href="<?php echo url_for('signin') ?>"><?php echo __('Sign in') ?></a>
		<?php else: ?>
			<a><?php echo __('Welcome, %%user%%', array('%%user%%' => $sf_user->getUsername())) ?></a>
			<div class="separator"></div>
			<a href="<?php echo url_for('signout') ?>"><?php echo __('Log out') ?></a>
		<?php endif ?>
	</div>			

	<div id="header">
		<a href="<?php echo url_for('@page?page=' . __('homepage')) ?>" class="logo"></a>
		
		<div class="languages">
			<?php foreach ($langues as $nb => $l): ?>
					<a class="flag <?php echo strtolower($l->getIso()); ?> <?php echo (strtolower($langue->getIso())==strtolower($l->getIso())?'active':null);?>" href="<?php echo url_for('@culture?iso=' . $l->getIso()) ?>">
						<div><?php echo __($flagLabels[strtolower($l->getIso())]); ?></div>
					</a>
			<?php endforeach; ?>
		</div>

		<?php include_component('common','cart') ?>

	</div>

</div>
<!--Header End--> 