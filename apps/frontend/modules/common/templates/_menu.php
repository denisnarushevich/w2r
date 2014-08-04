<!--Menu Start--> 
<div id="mainMenu">
			
	<a class="red button" href="<?php echo url_for('@page?page=' . __('homepage')) ?>">
		<div class="container">
			<div class="body">
				<?php echo __('Homepage') ?>
			</div>
		</div>
	</a>

	<a class="purple button" href="<?php echo url_for('@page?page=' . __('offer')) ?>">
		<div class="container">
			<div class="body">
				<?php echo __('We Offer') ?>
			</div>
		</div>
	</a>

	<a class="blue button" href="<?php echo url_for('@page?page=' . __('reviews')) ?>">
		<div class="container">
			<div class="body">
				<?php echo __('Customer reviews') ?>
			</div>
		</div>
	</a>


	<a class="green button" href="<?php echo url_for('@page?page=' . __('faq')) ?>">
		<div class="container">
			<div class="body">
				<?php echo __('F.A.Q.') ?>
			</div>
		</div>
	</a>


	<a class="orange button" href="<?php echo url_for('@page?page=' . __('terms')) ?>">
		<div class="container">
			<div class="body">
				<?php echo __('Terms & Conditions') ?>
			</div>
		</div>
	</a>				


	<a class="brown button" href="<?php echo url_for('@page?page=' . __('about')) ?>">
		<div class="container">
			<div class="body">
				<?php echo __('About Us') ?>
			</div>
		</div>
	</a>				


</div>
<!--Menu End--> 