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
					
					<h1><?php echo __('Sing in'); ?></h1>
					<div class="hr"></div>
					
					<form id="registerForm" action="<?php echo url_for('@signin') ?>" method="post">
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
						
						<?php echo $form->renderHiddenFields() ?>
						
						<div class="field">
							<div>
								<span class="label"></span>
							</div>
							<input type="submit" name="submit" value="<?php echo __('Sign in') ?> " />
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
