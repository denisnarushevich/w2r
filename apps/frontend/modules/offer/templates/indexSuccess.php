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
				<div class="content" id="offers">
					
					<h1><?php echo __('We Offer'); ?></h1>
					<div class="hr"></div>
					
					<div class="categoriesContainer">
						<?php foreach($categories as $nb => $category): ?>
						
							<div class="categoryBox">
								<a href="<?php echo url_for('category', $category) ?>">
									<img src="/<?php echo ($category->getImage() != '' ? basename(sfConfig::get('sf_upload_dir')) . '/category/' . $category->getImage() : 'images/unknown.jpg') ?>" alt="<?php echo $category->getName() ?>" />
								</a>
								<h2><span><?php echo $category->getName(); ?></span></h2>
								<p><?php echo strip_tags(html_entity_decode($category->getDescription())); ?></p>
							</div>
						
						<?php endforeach ?>
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