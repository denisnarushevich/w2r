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
				<div class="content" id="category">
					
					<div class="columns">
						<div class="left">
							<h1><?php echo __('We Offer'); ?></h1>
							<div class="hr"></div>
							
							<div class="description">
								<img src="/<?php echo ($category->getImage() != '' ? basename(sfConfig::get('sf_upload_dir')) . '/category/' . $category->getImage() : 'images/unknown.jpg') ?>" alt="<?php echo $category->getName() ?>" />
								<div class="textBox">
									<h2><?php echo $category->getName();?></h2>
									<p><?php echo strip_tags(html_entity_decode($category->getDescription())); ?></p>
								</div>
							</div>
						</div>
						
						<div class="right">
							<h1><?php echo strtoupper(__('Other tours')); ?></h1>
							<div class="hr"></div>
							<div class="other">
								<?php foreach($otherCategories as $nb => $otherCategory): ?>
									<a class="item" href="<?php echo url_for('category', $otherCategory) ?>"><span><?php echo $otherCategory->getName(); ?></span></a>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
					
					
					<div class="activities">
						<h1><?php echo $category->getName(); ?></h1>
						<div class="hr"></div>
							
						<div class="activitiesContainer">
							<?php foreach($category->getActivities() as $nb => $activity): ?>
							
									<a class="activityBox" href="<?php echo url_for('activity', $activity) ?>">
										
											<img src="/<?php echo ($activity->getImage() != '' ? basename(sfConfig::get('sf_upload_dir')) . '/activity/' . $activity->getImage() : 'images/unknown.jpg') ?>" alt="<?php echo $activity->getName() ?>" />
										
										
										<div class="price">€ <?php echo $activity->getDefaultPrice(); ?></div>
										
										<h2 class="labelBox"><?php echo $activity->getName(); ?></h2>
									</a>
							
							<?php endforeach ?>
							
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