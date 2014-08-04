<script type="text/javascript">
    $(document).ready(function () {
        $( '.container' )
            .find( 'textarea.editor' )
                .ckeditor()
            .end();
    });
    $(function() {
        $( "#tabs" ).tabs();
    });
    $(document).ready(function () {
        $('.title_act').keyup(function() {
           var id = $(this).attr('name').substr(6); 
           $('#tit_' + id).text($(this).val());
        });
    });
</script>
<div id="main">
    <h1><?php echo __('Select the 3 highlighted activities below :') ?></h1>
    <div class="container">
        <form method="POST" action="<?php echo url_for('hlhomeactivities/index') ?>">
            <input type="submit" value="Apply changes ?"/><br/><br/>
            <div id="tabs">
                <ul>
                  <?php foreach($langues as $langue): ?>
                  <li><a href="#langue-<?php echo $langue->id ?>"><img src="/images/flags/<?php echo $langue->iso ?>.jpg" /><?php echo $langue->country ?></a></li>
                  <?php endforeach; ?>
                </ul>
                <?php foreach($langues as $langue): ?>
                <div id="langue-<?php echo $langue->id ?>" style="height: 60%;">
                    <img src="/images/flags/<?php echo $langue->iso ?>.jpg" /><br/>
                    <div class="vbox">
                        <?php echo __('Type the name of the activity and select it :', null, 'admin'); ?><br/>
                        <?php echo jq_input_auto_complete_tag('activity1_' . $langue->iso, (isset($activities['0']) ? $activities['0']['Translation'][$langue->iso]['activity_slug'] : ''), url_for('hlhomeactivities/getActivities'), null, array('minChars' => '2')) ?><br/>
                        <span><?php echo __('Input title :', null, 'admin') ?></span><br/>
                        <input class="title_act" name="title_1_<?php echo $langue->iso ?>" type="text" value="<?php echo (isset($activities['0']) ? $activities['0']['Translation'][$langue->iso]['title'] : '') ?>" style="width: 120px;"/>
                        <input class="title_act" name="title_1_blue_<?php echo $langue->iso ?>" type="text" value="<?php echo (isset($activities['0']) ? $activities['0']['Translation'][$langue->iso]['title_blue'] : '') ?>" style="width: 120px;"/><br/><br/>
                        <span><?php echo __('Preview title :', null, 'admin') ?></span><br/>
                        <h2><span id="tit_1_<?php echo $langue->iso ?>"><?php echo (isset($activities['0']) ? $activities['0']['Translation'][$langue->iso]['title'] : '') ?></span>&nbsp;<span class="blue_h2" id="tit_1_blue_<?php echo $langue->iso ?>"><?php echo (isset($activities['0']) ? $activities['0']['Translation'][$langue->iso]['title_blue'] : '') ?></span></h2>
                        <?php echo __('Type the front description of the Activity :', null, 'admin') ?><br/>
                        <textarea id="text1_<?php echo $langue->iso ?>" name="text1_<?php echo $langue->iso ?>" class="editor"><?php echo (isset($activities['0']) ? $activities['0']['Translation'][$langue->iso]['description'] : '') ?></textarea>
                    </div>
                    <div class="vbox">
                        <?php echo __('Type the name of the activity and select it :', null, 'admin'); ?><br/>
                        <?php echo jq_input_auto_complete_tag('activity2_' . $langue->iso, (isset($activities['1']) ? $activities['1']['Translation'][$langue->iso]['activity_slug'] : ''), url_for('hlhomeactivities/getActivities'), null, array('minChars' => '2')) ?><br/>
                        <span><?php echo __('Input title : ', null, 'admin') ?></span><br/>
                        <input class="title_act" name="title_2_<?php echo $langue->iso ?>" type="text" value="<?php echo (isset($activities['1']) ? $activities['1']['Translation'][$langue->iso]['title'] : '') ?>" style="width: 120px;"/>
                        <input class="title_act" name="title_2_blue_<?php echo $langue->iso ?>" type="text" value="<?php echo (isset($activities['1']) ? $activities['1']['Translation'][$langue->iso]['title_blue'] : '') ?>" style="width: 120px;"/><br/><br/>
                        <span><?php echo __('Preview title :', null, 'admin') ?></span><br/>
                        <h2><span id="tit_2_<?php echo $langue->iso ?>"><?php echo (isset($activities['1']) ? $activities['1']['Translation'][$langue->iso]['title'] : '') ?></span>&nbsp;<span class="blue_h2" id="tit_2_blue_<?php echo $langue->iso ?>"><?php echo (isset($activities['1']) ? $activities['1']['Translation'][$langue->iso]['title_blue'] : '') ?></span></h2>
                        <?php echo __('Type the front description of the Activity :', null, 'admin') ?><br/>
                        <textarea id="text2_<?php echo $langue->iso ?>" name="text2_<?php echo $langue->iso ?>" class="editor"><?php echo (isset($activities['1']) ? $activities['1']['Translation'][$langue->iso]['description'] : '') ?></textarea>
                    </div>
                    <div class="vbox last">
                        <?php echo __('Type the name of the activity and select it :', null, 'admin'); ?><br/>
                        <?php echo jq_input_auto_complete_tag('activity3_' . $langue->iso, (isset($activities['2']) ? $activities['2']['Translation'][$langue->iso]['activity_slug'] : ''), url_for('hlhomeactivities/getActivities'), null, array('minChars' => '2')) ?><br/>
                        <span><?php echo __('Input title : ', null, 'admin') ?></span><br/>
                        <input class="title_act" name="title_3_<?php echo $langue->iso ?>" type="text" value="<?php echo (isset($activities['2']) ? $activities['2']['Translation'][$langue->iso]['title'] : '') ?> " style="width: 120px;"/>
                        <input class="title_act" name="title_3_blue_<?php echo $langue->iso ?>" type="text" value="<?php echo (isset($activities['2']) ? $activities['2']['Translation'][$langue->iso]['title_blue'] : '') ?>" style="width: 120px;"/><br/><br/>
                        <span><?php echo __('Preview title :', null, 'admin') ?></span><br/>
                        <h2><span id="tit_3_<?php echo $langue->iso ?>"><?php echo (isset($activities['2']) ? $activities['2']['Translation'][$langue->iso]['title'] : '') ?></span>&nbsp;<span class="blue_h2" id="tit_3_blue_<?php echo $langue->iso ?>"><?php echo (isset($activities['2']) ? $activities['2']['Translation'][$langue->iso]['title_blue'] : '') ?></span></h2>
                        <?php echo __('Type the front description of the Activity :', null, 'admin') ?><br/>
                        <textarea id="text3_<?php echo $langue->iso ?>" name="text3_<?php echo $langue->iso ?>" class="editor"><?php echo (isset($activities['2']) ? $activities['2']['Translation'][$langue->iso]['description'] : '') ?></textarea>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </form>
    </div>
</div>