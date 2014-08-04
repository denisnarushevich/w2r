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
				<div class="content" id="reviews">


					<div class="columns">
						<div class="left">
							
							<h1><?php echo __('Customer reviews'); ?></h1>
							<div class="hr"></div>
					
							<?php if (count($pager) == 0): ?>
								<div class="noReviews"><?php echo __('There is currently no review.') ?></div>
							<?php else: ?>
								
								
								
								
								<?php //TODO ?>
								<?php foreach ($pager->getResults() as $rev) { ?>
								<div class="titleRail"><span><?php echo $rev->getUser() ?></span><?php if ($rev->getCountry() != ''): ?><span class="citySpan">, <?php echo $rev->getCountry() ?></span><?php endif ?></div> 
								<div class="quoteVisual"> 
										<p>
										<?php if ($rev->getImage() != ''): ?>
												<img src="/<?php echo basename(sfConfig::get('sf_upload_dir')) . '/reviews/' . $rev->getImage() ?>" alt="<?php echo __('Customer image') ?>" style="float: left;"/>  
										<?php endif ?>
											<?php echo $rev->getDescription() ?>
										</p> 
								</div>
								<?php } ?>
								<div class="clear"></div>


								<?php if ($pager->haveToPaginate()): ?>
									<div class="pagination">
										<a href="<?php echo url_for('@page?page=' . __('reviews')) ?>?p=1">
											<img src="/images/first.png" alt="<?php echo __('First page') ?>" title="<?php echo __('First page') ?>" />
										</a>

										<a href="<?php echo url_for('@page?page=' . __('reviews')) ?>?p=<?php echo $pager->getPreviousPage() ?>">
											<img src="/images/previous.png" alt="<?php echo __('Previous page') ?>" title="<?php echo __('Previous page') ?>" />
										</a>

										<?php foreach ($pager->getLinks() as $page): ?>
											<?php if ($page == $pager->getPage()): ?>
												<?php echo $page ?>
											<?php else: ?>
												<a href="<?php echo url_for('@page?page=' . __('reviews')) ?>?p=<?php echo $page ?>"><?php echo $page ?></a>
											<?php endif; ?>
										<?php endforeach; ?>

										<a href="<?php echo url_for('@page?page=' . __('reviews')) ?>?p=<?php echo $pager->getNextPage() ?>">
											<img src="/images/next.png" alt="<?php echo __('Next page') ?>" title="<?php echo __('Next page') ?>" />
										</a>

										<a href="<?php echo url_for('@page?page=' . __('reviews')) ?>?p=<?php echo $pager->getLastPage() ?>">
											<img src="/images/last.png" alt="<?php echo __('Last page') ?>" title="<?php echo __('Last page') ?>" />
										</a>

									</div>
								<?php endif; ?>

								<div class="pagination_desc">
									<strong><?php echo count($pager) ?></strong> <?php echo (count($pager) == 1 ? __('review.') : __('reviews.')) ?>

									<?php if ($pager->haveToPaginate()): ?>
										- page <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
									<?php endif; ?>
								</div>
							<?php endif ?>
								
								
								
								
								
				
				
						</div>

						<div class="right">
				
							<h1><?php echo __('Add a review'); ?></h1>
							<div class="hr2"></div>
							
							<?php if (!$sf_user->isAuthenticated()): // User not logged in, must check it !! ?>
								<div class="mustLogin">
									<?php echo __('You must be logged in to add a review.') ?>
								</div>
							<?php else: ?>
								<div class="form">
									<?php echo form_tag(url_for('@page?page=' . __('reviews')), array('id' => 'newReview')); ?>
										
									
										<div class="label">
											<?php echo __('Your review'); ?>
											<?php if ($newReview['description']->hasError()): ?>
												<span class="error"><?php echo $newReview['description']->getError(); ?></span>
											<?php endif; ?>
										</div>
										<?php echo $newReview['description']->render(array('class' => 'field')); ?>



										<div class="label">
											<?php echo __('An image (optional)'); ?>
											<?php if ($newReview['image']->hasError()): ?>
												<span class="error"><?php echo $newReview['image']->getError(); ?></span>
											<?php endif; ?>
										</div>
										<?php echo $newReview['image']->render(array('class' => 'field')) ?>



										<div class="label">
											<?php echo __('Your country'); ?>
											<?php if ($newReview['country']->hasError()): ?>
												<span class="error"><?php echo $newReview['country']->getError(); ?></span>
											<?php endif; ?>
										</div>
										<?php echo $newReview['country']->render(array('class' => 'field')) ?>



										<div class="label">
											<?php echo __('Security question'); ?>
											<?php if ($newReview['captcha']->hasError()): ?>
												<span class="error"><?php echo $newReview['captcha']->getError(); ?></span>
											<?php endif; ?>
										</div>
										<?php echo $newReview['captcha']->render(array('class' => 'field')) ?>



										<?php echo $newReview->renderHiddenFields(); ?>

										<div class="submitContainer">
											<input type="submit" id="submit" name="submit" value="<?php echo __('Submit review'); ?> " />
										</div>
									</form>
								</div>
							<?php endif ?>
								
				
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