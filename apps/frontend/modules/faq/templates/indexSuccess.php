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
				<div class="content" id="faq">

					<h1><?php echo __('F.A.Q.'); ?></h1>
					<div class="hr"></div>
			

        <?php
        $oldLetter = '';
        foreach($lexiques as $lexique): ?>
					
					
						<?php if ($lexique->Translation[$sf_user->getCulture()]->name[0] != $oldLetter): ?>
							<?php if ($oldLetter != ''): ?>
							</ul>
							<?php endif; ?>
									<ul class="letterItem">
											<li><a href="" onclick="$('#word_<?php echo $lexique->id ?>').slideToggle('slow', function() {}); return false;" title="<?php echo __('See the answer for ') . ' ' . $lexique->getName() ?>"><?php echo $lexique->getName() ?></a>
												<div id="word_<?php echo $lexique->id ?>" style="display: none;">
													<?php echo $lexique->value ?>
												</div>
											</li>
						<?php
							$oldLetter = $lexique->Translation[$sf_user->getCulture()]->name[0];
									else: ?>


											<li><a href="" onclick="$('#word_<?php echo $lexique->id ?>').slideToggle('slow', function() {}); return false;" title="<?php echo __('See the answer for ') . ' ' . $lexique->getName() ?>"><?php echo $lexique->getName() ?></a>
												<div id="word_<?php echo $lexique->id ?>" style="display: none;">
													<?php echo $lexique->value ?>
												</div>
											</li>
						<?php endif ?>
						
        <?php endforeach; ?>
        </ul>
        <div class="clear"></div>


					
	
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