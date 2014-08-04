<!--Main Start-->
<div class="contentBox">
	<div>
		<div></div>
		<div></div>
		<div></div>
	</div>
	<div>
		<div>
			<div>
				<div class="content" id="activity">
					
					<div class="columns">
						<div class="left">
							<div class="title">
								<h1><span><?php echo $activity->getActivityCategory(); ?></span> <?php echo $activity->getName(); ?></h1>
								<a class="otherTours" href="<?php echo url_for('category', $activity->getActivityCategory()); ?>"><?php echo __('Other tours'); ?></a>
							</div>
							<div class="hr"></div>
						
							<div id="prices">
								<a id="addToCart" href="javascript:addToCart('<?php echo $activity->getId() ?>', '<?php echo url_for('activity', $activity) ?>', '<?php echo $activity->getName() ?>', '<?php echo $activity->getDefaultPrice() ?>');" title="<?php echo __('Add to planner') ?>">
									<div>
										<div>
											<div><?php echo __('Add to planner') ?></div>
										</div>
									</div>
								</a>

								<div class="redPrice">
									<div class="number">€ <?php echo $activity->getDefaultPrice(); ?></div>
									<div class="description"><?php echo __('price per person'); ?></div>
								</div>

								<div class="grayPrice">
									<div class="number">Ls <?php echo $activity->getDefaultPrice()*0.7; ?></div>
									<div class="description"><?php echo __('price per person'); ?></div>
								</div>

							</div>
							
							<div id="summaryText">
								<div class="hr"></div>
								<?php echo $activity->getSummary(ESC_RAW); ?>
							</div>
							
							<div id="detailsText">
								<h1><span><?php echo __('Detail of'); ?></span> <?php echo $activity->getName(); ?></h1>
								<div class="hr"></div>
								<?php echo html_entity_decode($activity->getDescription()); ?>
							</div>
						</div>
						
						<div class="right">
							<h1><?php echo __('Photos & videos'); ?></h1>
							<div class="hr2"></div>
							
							<div id="photos">
								<?php foreach($photos as $nb => $photo): ?>
								<a <?php echo ($nb>=5 && sizeof($photos)!=6)?'style="display: none;" hideable':''?> href="/<?php echo basename(sfConfig::get('sf_upload_dir')) . '/photos/' . $photo->getPath() ?>"><img src="/<?php echo basename(sfConfig::get('sf_upload_dir')) . '/photos/' . $photo->getPath() ?>" alt=""/></a>
								<?php endforeach ?>
									
								<a id="viewFullGalleryButton">
									<?php echo __('View full gallery');?>
								</a>
							</div>
							
							
							
							
								<h1><?php echo __('Reviews'); ?></h1>
								<div class="hr2"></div>

								<div id="reviews">
									<div class="head">
										<div>
											<span><?php echo $comments->count(); ?></span> <?php echo strtolower(__('Reviews')); ?>
										</div>
										
										<?php if ($sf_user->isAuthenticated()): ?>
											<a id="addReviewButton"><?php echo __('Add your review'); ?></a>
										<?php else: ?>
											<a href="<?php echo url_for('signin') ?>"><?php echo __('Log in'); ?></a>
										<?php endif; ?>
									</div>
									
									
									<?php if ($sf_user->isAuthenticated()): ?>
									<div class="form">
										<?php echo form_tag(url_for('activity', $activity), array('id' => 'newReview')); ?>
											<?php echo $newComment['description']->render(array('class' => 'field')); ?>
											<?php echo $newComment->renderHiddenFields(); ?>
											
											<div class="submitContainer">
												<input type="submit" id="submit" name="submit" value="<?php echo __('Submit review'); ?> " />
											</div>
										</form>
									</div>
									<?php endif; ?>
										
									
									<div class="body">
										
										<?php if($comments->count()): ?>
											<?php foreach($comments as $nb => $comment): ?>
											 <div class="item" <?php echo $nb>=2?'style="display: none;" hideable':''?>>
												<img src="/images/anonymous.png"/> <?php //TODO add user image ?>

												<div class="author">
													<span class="name"><?php echo $comment->getUser()->getFirstname(); ?></span>
													<span class="date"> 11.11.2011</span>
												</div>

												<?php echo $comment->getDescription() ?>

											</div>
											<?php endforeach ?>
										<?php else: ?>
											<p><?php echo __('There is no review for this activity.') ?></p>											
										<?php endif; ?>
											
									</div>
									<div class="foot">
										<a id="showAllReviewsButton"><?php echo __('View more reviews'); ?></a>
									</div>
								</div>
							
							
							
							
							<h1><?php echo __('Tour promotions'); ?></h1>
							<div class="hr2"></div>
							
							<div id="promotions">
								<?php
									foreach($highlights as $nb => $hla){
										$hl = $hla['hl'];
										$act = $hla['act'];
								?>
									<a class="activityBox" href="<?php echo url_for('activity', $act) ?>">
										<img src="/<?php echo ($act->getImage() != '' ? basename(sfConfig::get('sf_upload_dir')) . '/activity/' . $act->getImage() : 'images/unknown.jpg') ?>" alt="<?php echo $act->getName() ?>" />
										<div class="price">€ <?php echo $act->getDefaultPrice() ?></div>
										<h2 class="labelBox"><?php echo $hl->getTitle().' '.$hl->getTitleBlue(); ?></h2>
									</a>
								<?php } ?>				
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
<!--Main End--> 
<script type="text/javascript">
		$(function(){
			$('#photos a[href]').lightBox(); // Select all links in object with gallery ID
		});
		
		//show all photos
		$(function(){
			if($('#photos > a[hideable]').length > 0){
				$('#viewFullGalleryButton').click(function(){
					$('#photos a').show();
					$(this).remove();
				});
			}else{
				$('#viewFullGalleryButton').hide();
			}
		});
		
		//show addReview form
		$(function(){
			$('#reviews > .form').hide(); 
			$('#addReviewButton').click(function(){
				$('#reviews > .form').slideDown();
				$(this).fadeOut();
			});
		});
		
		//show all reviews
		$(function(){
			if($('#reviews > .body > .item[hideable]').length > 0){
				$('#showAllReviewsButton').click(function(){
					$('#reviews > .body > .item').show();
					$(this).hide();
				});
			}else{
				$('#showAllReviewsButton').hide();
			}
		});
</script>