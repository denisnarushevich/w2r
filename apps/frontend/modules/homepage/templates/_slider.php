<!--Slideshow Start--> 
<?php if ($sliders->count()): ?>


<div class="contentBox slider">
	<div>
		<div></div>
		<div></div>
		<div></div>
	</div>
	<div>
		<div>
			<div class="content">
		
				<div id="slider">
					<div id="viewPort">
						<div id="sliderFilm">
							<?php foreach($sliders as $key => $slider): ?>
								<a href="<?php echo url_for('activity', $slider->getActivity()) ?>" id="sliderPhoto_<?php echo $key+1; ?>" activity_name="<?php echo $slider->getTitle() . ' - ' . $slider->getActivity()->getName() ?>">
									<img src="<?php echo '/'.basename(sfConfig::get('sf_upload_dir')) . '/sliders/' . $slider->getImage() ?>" alt="<?php echo $slider->getTitle() ?>"/>
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
		<div class="redline">
			
			<div id="sliderControls">
				<!-- inversed order because of float: right -->
				<a id="sliderPhotoButton_4"></a>
				<a id="sliderPhotoButton_3"></a>
				<a id="sliderPhotoButton_2"></a>
				<a id="sliderPhotoButton_1" class="active"></a>
			</div>

			<span id="sliderActivityName" class="text">
				<?php
					$slider = $sliders[0];
					echo $slider->getTitle() . ' - ' . $slider->getActivity()->getName();
				?>
			</span>
			
		</div>
		<div></div>
	</div>
</div>
<?php endif ?>
<!--Slideshow End--> 
