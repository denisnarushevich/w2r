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
				<div class="content" id="about">


					<div class="columns">
						<div class="left">
							
							<h1><?php echo __('About us'); ?></h1>
							<div class="hr"></div>
							
							<div class="text">
								<?php echo $about->getValue(ESC_RAW) ?>
							</div>
						</div>
						
						
						
						
						
						
						
						
						

						<div class="right">
				
							<h1><?php echo __('Contact Us'); ?></h1>
							<div class="hr2"></div>
							

								<div class="form">
									<?php echo form_tag(url_for('@page?page=' . __('about')), array('id' => 'newReview')); ?>
										
									
										<div class="label">
											<?php echo __('Your email'); ?>
											<?php if ($contact['email']->hasError()): ?>
												<span class="error"><?php echo $contact['email']->getError(); ?></span>
											<?php endif; ?>
										</div>
										<?php echo $contact['email']->render(array('class' => 'field')); ?>



										<div class="label">
											<?php echo __('Your name'); ?>
											<?php if ($contact['name']->hasError()): ?>
												<span class="error"><?php echo $contact['name']->getError(); ?></span>
											<?php endif; ?>
										</div>
										<?php echo $contact['name']->render(array('class' => 'field')) ?>



										<div class="label">
											<?php echo __('Your surname'); ?>
											<?php if ($contact['surname']->hasError()): ?>
												<span class="error"><?php echo $contact['surname']->getError(); ?></span>
											<?php endif; ?>
										</div>
										<?php echo $contact['surname']->render(array('class' => 'field')) ?>

									
										<div class="label">
											<?php echo __('Your comment/question'); ?>
											<?php if ($contact['comment']->hasError()): ?>
												<span class="error"><?php echo $contact['comment']->getError(); ?></span>
											<?php endif; ?>
										</div>
										<?php echo $contact['comment']->render(array('class' => 'field')) ?>
									

										<div class="label">
											<?php echo __('Security question'); ?>
											<?php if ($contact['captcha']->hasError()): ?>
												<span class="error"><?php echo $contact['captcha']->getError(); ?></span>
											<?php endif; ?>
										</div>
										<?php echo $contact['captcha']->render(array('class' => 'field')) ?>



										<?php echo $contact->renderHiddenFields(); ?>

										<div class="submitContainer">
											<input type="submit" id="submit" name="submit" value="<?php echo __('Submit review'); ?> " />
										</div>
									</form>
								</div>
							
								
				
						</div>
					</div>
					

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
<!-- end main -->
