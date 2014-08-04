<!-- main -->
<div class="contentBox">
	<div>
		<div></div>
		<div></div>
		<div></div>
	</div>
	<div>
		<div>
			<div>
				<div class="content" id="register">
					
					<h1><?php echo __('Register'); ?></h1>
					<div class="hr"></div>
					
					<form id="registerForm" action="<?php echo url_for('@register') ?>" method="post">
						<div class="field">
							<div>
								<?php if ($form['username']->hasError()): ?>
									<span class="error"><?php echo $form['username']->getError() ?></span>
								<?php endif ?>
								<span class="label"><?php echo __('Your login') ?></span>
							</div>
							<?php echo $form['username']->render() ?>
						</div>
						
						<div class="field">
							<div>
								<?php if ($form['password']->hasError()): ?>
									<span class="error"><?php echo $form['password']->getError() ?></span>
								<?php endif ?>
								<span class="label"><?php echo __('Your password') ?></span>
							</div>
							<?php echo $form['password']->render() ?>
						</div>
						
						<div class="field">
							<div>
								<?php if ($form['repeat_password']->hasError()): ?>
									<span class="error"><?php echo $form['repeat_password']->getError() ?></span>
								<?php endif ?>
								<span class="label"><?php echo __('Your password (again)') ?></span>
							</div>
							<?php echo $form['repeat_password']->render() ?>
						</div>
						
						<div class="field">
							<div>
								<?php if ($form['email']->hasError()): ?>
									<span class="error"><?php echo $form['email']->getError() ?></span>
								<?php endif ?>
								<span class="label"><?php echo __('Your email') ?></span>
							</div>
							<?php echo $form['email']->render() ?>
						</div>
						
						<div class="field">
							<div>
								<?php if ($form['firstname']->hasError()): ?>
									<span class="error"><?php echo $form['firstname']->getError() ?></span>
								<?php endif ?>
								<span class="label"><?php echo __('Your first name') ?></span>
							</div>
							<?php echo $form['firstname']->render() ?>
						</div>
						
						<div class="field">
							<div>
								<?php if ($form['lastname']->hasError()): ?>
									<span class="error"><?php echo $form['lastname']->getError() ?>/span>
								<?php endif ?>
								<span class="label"><?php echo __('Your surname') ?></span>
							</div>
							<?php echo $form['lastname']->render() ?>
						</div>
						
						<div class="field">
							<div>
								<?php if ($form['phone']->hasError()): ?>
									<span class="error"><?php echo $form['phone']->getError() ?></span>
								<?php endif ?>
								<span class="label"><?php echo __('Your phone') ?></span>
							</div>
							<?php echo $form['phone']->render() ?>
						</div>
						
						<?php echo $form->renderHiddenFields() ?>
						
						<div class="field">
							<div>
								<span class="label"></span>
							</div>
							<input type="submit" name="submit" value="<?php echo __('Register') ?> " />
						</div>
						
						
						
						
					</form>	
				</div>
			</div>
		</div>
	</div>
	<div>
		<div></div>
		<div></div>
		<div></div>
	</div>
</div>
<!--Main End--> 