<!--Cart start--> 	
<script type="text/javascript">
		var single = '<?php echo __('activity') ?>';
		var multi = '<?php echo  __('activities') ?>';
</script>

<div id="checkoutBlock">
	<div class="nmbrActivity" id="numberAct"><?php echo count($bookings) ?></div>
	<div class="text">
		<span class="activityTxt" id="numberActTxt"><?php echo (count($bookings) < 2 ? __('activity') : __('activities')) ?></span>
		<span class="inUrPlanner"><?php echo __('in your planner') ?></span>
	</div>
	<a href="<?php echo url_for('@page?page=' . __('checkout')) ?>" title="<?php echo __('Checkout') ?>" class="button" ><?php echo __('Checkout') ?></a>
</div>
<!--Cart end--> 