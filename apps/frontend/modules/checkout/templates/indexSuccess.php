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
				<div class="content" id="checkout">
					
					<div class="activitiesContainer">
						<h1><?php echo __('Your activities'); ?></h1>
						<div class="hr"></div>
						
						<div class="activities">
							<div class="activity">
								<img />
								<div>
									<h2></h2>
									<p>
										
									</p>
								</div>
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



<div class="clear"></div> 
<pre><?php 
//print_r($posts);
?></pre>
<script type="text/javascript">
  var transDate = '<?php echo __('Date') ?>';
  var transSelect = '<?php echo __('Selected') ?>';
  var transCulture = '<?php echo $sf_user->getCulture() ?>';
  var transNb = '<?php echo __('Number of persons') ?>';
  var oldFrom = new Date('<?php if (isset($date_from)): echo date('m/d/Y', $date_from); endif ?>');
  var oldTo = new Date('<?php if (isset($date_to)): echo date('m/d/Y', $date_to); endif ?>');
</script>
<form method="post" action="<?php echo url_for('@page?page=' . __('checkout')) ?>">
<div class="container"><big><?php echo __('Your activities') ?></big></div>
<div class="container formDiv">
  <?php if (isset($error)): ?>
    <?php if ($error == 1): ?>
    <span style="color: red;"><?php echo __('You must at least select one activity.') ?></span>
    <?php else: ?>
    <span style="color: red;"><?php echo __('You must fill the identification informations.') ?></span>
    <?php endif ?>
  <?php endif ?>
  <br/>
  <div style="float: left;">
    <?php echo __('Choose the date of your arrival') ?> :<br/>
    <input class="datepicker" id="date_from" name="date_from"<?php if (isset($date_from)): ?> value="<?php echo date('m/d/Y', $date_from) ?>"<?php endif ?>/><br/>
  </div>
  <div style="float: left; padding-left: 30px;">
    <?php echo __('Choose the date of your depart') ?> :<br/>
    <input class="datepicker" id="date_to" name="date_to"<?php if (isset($date_to)): ?> value="<?php echo date('m/d/Y', $date_to) ?>"<?php endif ?>/><br/>
  </div>
  <div class="clear"></div>
  <br/>
  <?php echo __('Change the number of participant for all activities selected') ?> :<br/>
  <br/>
  <select id="changePerson">
    <?php for ($i = 0; $i <= 200; $i++): ?>
    <option value="<?php echo $i ?>"><?php echo $i ?></option>
    <?php endfor ?>
  </select>
  <br/>
</div>
<div id="video"> 
  <?php if (count($bookings) > 0) { ?>
    <?php foreach($bookings as $book): 
        $activity = $book->getActivity() ?>
    <div class="container"> 
        <div class="vboxSmall boxPanier"> 
            <div class="framePanier"> 
                <a href="<?php echo url_for('activity', $activity) ?>"><img src="/<?php echo ($activity->getImage() != '' ? basename(sfConfig::get('sf_upload_dir')) . '/activity/' . $activity->getImage() : 'images/unknownCat.jpg') ?>" alt="" width="135" height="98"/></a> 
                <a href="<?php echo url_for('activity', $activity) ?>" title="<?php echo $activity->getName() ?>" id="pricetag"><span><?php echo $activity->getDefaultPrice() ?>€</span><span class="smallCap">/ person</span></a> 
            </div> 
            <h2><span><?php echo $activity->getName() ?></span></h2> 
            <div class="starSystemWrapper"> 
              <?php 
              $nbStars = 0;
              $actStars = $activity->getStars();
              while ($nbStars < $actStars): ?>
                  <img src="/images/starOk.png" alt="*"/> 
              <?php
                $nbStars++;
              endwhile;
              while ($nbStars < 5): ?>
                  <img src="/images/starOff.png" alt="*"/> 
                  <?php
                  $nbStars++;
              endwhile;
              ?>
            </div>
            <p><?php echo $activity->getSummary(ESC_RAW) ?></p>
            <div class="clear"></div>
            <input type="hidden" id="priceAct_<?php echo $activity->getId() ?>" value="<?php echo $activity->getDefaultPrice() ?>"/>
            <div class="container booking" id="planning_<?php echo $activity->getId() ?>">
                <?php if(isset($date_from)) :?>
                <div class="tableAct" id="thead_<?php echo $activity->getId() ?>">
                    <div>
                        <?php echo __('Date') ?>:
                    </div>
                    <div>
                        <?php echo __('Selected') ?>:
                    </div>
                    <div>
                        <?php echo __('Number of persons') ?>:
                    </div>
                </div>
                <?php
                    $runDat = $date_from;
                    while ($runDat <= $date_to) : 
                    $dateF = date('mdY', $runDat);
                    $dateFC = date('m/d/Y', $runDat);
                    $dateN = date('N', $runDat);
                ?>
                <div class="tableAct" id="act[<?php echo $activity->getId() ?>][<?php echo $dateF ?>]">
                    <div<?php if ($dateN > 5):?> style="font-weight: bold;"<?php endif ?>><?php echo $dateFC ?></div>
                    <div align="center">
                        <input type="checkbox" onclick="checkClick(this);" name="act[<?php echo $activity->getId() ?>][<?php echo $dateF ?>_tick]" id="act[<?php echo $activity->getId() ?>][<?php echo $dateF ?>_tick]"<?php 
                        if (isset($posts['act'][$activity->getId()][$dateF.'_tick'])): ?> checked="checked"<?php endif ?>/>
                    </div>
                    <div>
                        <select onchange="estimatePrice();" name="act[<?php echo $activity->getId() ?>][<?php echo $dateF ?>_nb]" id="act[<?php echo $activity->getId() ?>][<?php echo $dateF ?>_nb]">
                            <?php for ($i = 0; $i < 201; $i++): ?>
                            <option value="<?php echo $i ?>"<?php if ($posts['act'][$activity->getId()][$dateF.'_nb'] == $i):?> selected="selected"<?php endif ?>><?php echo $i ?></option>
                            <?php endfor ?>
                        </select>
                    </div>
                </div>
                <?php
                    $runDat += 86400;
                    endwhile; ?>
                <?php endif ?>
            </div>
        </div> 
    </div>
    <?php endforeach; 
    } else { ?>
  <div class="container">
    <?php echo __('There is no activity in your planning.') ?>
  </div>
  <?php } ?>
</div> 
<div class="z2colWrapper"> 
  <div class="formPa"> 
    <div class="container formDiv"> 
      <div class="divLe">
        <big><?php echo __('Bonus Code') ?></big>
        <span class="placeHolderInpt" style="color: red;" id="codeError"></span> 
        <span class="placeHolderInpt"><?php echo __('If you have a bonus code, enter it here, then check it.') ?></span> 
        <input id="bonuscheck" name="bonuscheck"/><br/>
        <a href="#" onclick="checkBonusCode(); return false;"><?php echo __('Check your bonus code') ?></a>
        <span class="placeHolderInpt" id="bonusCodeValue"></span>
        <input type="hidden" name="bonuscode" id="bonuscode"/>
        <input type="hidden" id="bonustype"/>
        <input type="hidden" id="bonusval"/>
      </div>
    </div>
  </div>
  <div class="formPaRight"> 
    <div class="container formDiv"> 
      <div class="divRi">
        <big><?php echo __('Estimated price') ?></big>
        <span id="estimated" class="estPrice">0&nbsp;€</span>
        <span id="reducText" style="display:none;"><?php echo __('After bonus :') ?></span>
        <span id="estimatedReduc" style="display:none;" class="estPrice">0&nbsp;€</span>
      </div>
    </div>
  </div>
  <div class="clear"></div>
  <div class="formPa">
    <div class="container formDiv"> 
      <div class="divLe">
        <big><?php echo __('Personal infos') ?></big> 
    <?php if (isset($form) && !$sf_user->isAuthenticated()): ?>
        <?php if ($form->hasErrors()): ?>
          <span class="placeHolderInpt" style="color: red;"><?php echo __('There is some errors in the registrations fields.') ?></span> 
        <?php endif ?>
          <span class="placeHolderInpt"><?php echo __('Your email') ?></span>
        <?php if ($form['email']->hasError()): ?>
          <span class="placeHolderInpt" style="color: red;"><?php echo $form['email']->getError() ?></span> 
        <?php endif ?>
          <?php echo $form['email']->render() ?>
          <span class="placeHolderInpt"><?php echo __('Your first name') ?></span>
        <?php if ($form['firstname']->hasError()): ?>
          <span class="placeHolderInpt" style="color: red;"><?php echo $form['firstname']->getError() ?></span> 
        <?php endif ?>
          <?php echo $form['firstname']->render() ?>
          <span class="placeHolderInpt"><?php echo __('Your last name') ?></span>
        <?php if ($form['lastname']->hasError()): ?>
          <span class="placeHolderInpt" style="color: red;"><?php echo $form['lastname']->getError() ?></span> 
        <?php endif ?>
          <?php echo $form['lastname']->render() ?>
          <span class="placeHolderInpt"><?php echo __('Your phone number') ?></span>
        <?php if ($form['phone']->hasError()): ?>
          <span class="placeHolderInpt" style="color: red;"><?php echo $form['phone']->getError() ?></span> 
        <?php endif ?>
          <?php echo $form['phone']->render() ?>
      <?php echo $form->renderHiddenFields() ?>
    <?php else: ?>
        <span class="placeHolderInpt">Your name</span>
        <input type="text" value="<?php echo $user->getLastname() ?>" READONLY/>
        <span class="placeHolderInpt">Your surname</span>
        <input type="text" value="<?php echo $user->getFirstname() ?>" READONLY/>
        <span class="placeHolderInpt">Your phone number</span>
        <input type="text" value="<?php echo $user->getPhone() ?>" READONLY/>
        <span class="placeHolderInpt">Your e-mail adress</span>
        <input type="text" value="<?php echo $user->getEmail() ?>" READONLY/>
    <?php endif ?>
      </div> 
    </div> 
  </div> 
  <div class="formPaRight"> 
    <div class="container formDiv"> 
      <div class="divRi">
	<?php if (isset($form) && !$sf_user->isAuthenticated()): ?>
        <big><?php echo __('Login informations') ?></big> 
        <span class="placeHolderInpt"><?php echo __('Login name') ?></span> 
        <?php if ($form['username']->hasError()): ?>
        <span class="placeHolderInpt" style="color: red;"><?php echo $form['username']->getError() ?></span> 
        <?php endif ?>
        <?php echo $form['username']->render() ?>
        <span class="placeHolderInpt"><?php echo __('Your password') ?></span>
        <?php if ($form['password']->hasError()): ?>
        <span class="placeHolderInpt" style="color: red;"><?php echo $form['password']->getError() ?></span> 
        <?php endif ?>
        <?php echo $form['password']->render() ?>
        <span class="placeHolderInpt"><?php echo __('Your password (again)') ?></span>
        <?php if ($form['repeat_password']->hasError()): ?>
        <span class="placeHolderInpt" style="color: red;"><?php echo $form['repeat_password']->getError() ?></span> 
        <?php endif ?>
        <?php echo $form['repeat_password']->render() ?>
	<?php endif ?>
      </div> 
    </div> 
  </div> 
  <div class="clear"></div> 
  <div class="container formDiv">
    <span class="placeHolderInpt"><?php echo __('Additionnal infos') ?></span> 
    <textarea style="width: 93%; height: 100px;" name="contact_otherInfos"></textarea> 
  </div>

</div> 
<input type="submit" class="ctaFreeQu" value="<?php echo __('Request a free quote') ?>"/> 
</form>
 