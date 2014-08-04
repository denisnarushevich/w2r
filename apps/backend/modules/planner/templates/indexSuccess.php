<?php
$planners = $planners->getRawValue();
?>
<script type="text/javascript">
var base            = <?php echo json_encode($planners); ?>;
var urlAjaxActivity = '<?php echo url_for('planner/ajax'); ?>';
var urlAjaxClient   = '<?php echo url_for('planner/ajax'); ?>';
var urlAjaxGuide    = '<?php echo url_for('planner/ajax'); ?>';
</script>
<style type='text/css'>
#calendar {
    width: 90%;
    margin: 0 auto;
    font-size: 14px;
    font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
}
#calendar .fc-header tr td {
    border: none;
}
.fc-header-title h2 {
    font-size: 24px;
}
</style>
<div id="sf_admin_container">
    <div id="sf_admin_content">
        <div class="sf_admin_list">
            <ul class="sf_admin_actions">
                <li class="sf_admin_batch_actions_choice">
                    <label for="activity">Activity : </label>
                    <select id="activity" name="activity">
                        <option value="wait">Choose an activity</option>
                        <?php
                        foreach ($categoriesActivity AS $category)
                        {
                            echo sprintf('<optgroup label="%s">', $category->getName());
                            foreach ($category['Activity'] AS $activity)
                                echo sprintf('<option value="%d">%s</option>', $activity->getId(), $activity->getName());
                            echo '</optgroup>';
                        }
                        ?>
                    </select>
                </li>
                <li class="sf_admin_batch_actions_choice">
                    <label for="client">Client : </label>
                    <select id="client" name="client">
                        <option value="wait">Choose a client</option>
                        <?php
                        foreach ($clients AS $client)
                            echo sprintf('<option value="%d">%s %s</option>', $client->getId(), $client->getLastname(), $client->getFirstname());
                        ?>
                    </select>
                </li>
                <li class="sf_admin_batch_actions_choice">
                    <label for="guide">Guide : </label>
                    <select id="guide" name="guide">
                        <option value="wait">Choose a guide</option>
                        <?php
                        foreach ($guides AS $guide)
                            echo sprintf('<option value="%d">%s</option>', $guide->getId(), ($guide->getFirstName() == NULL && $guide->getLastName() == NULL ? $guide->username : $guide->getLastName().' '.$guide->getFirstName()));
                        ?>
                    </select>
                </li>
                <li>
                    <input type="submit" name="reset" value="reset" />
                </li>
                <li>
                    Legend : <span class="fc-event fc-event-skin fc-event-hori fc-corner-left fc-corner-right fc-event-inner fc-event-skin" style="font-size: 0.85em;font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif;margin-left:4px;background:green">&nbsp;&nbsp;New&nbsp;&nbsp;</span> - <span class="fc-event fc-event-skin fc-event-hori fc-corner-left fc-corner-right fc-event-inner fc-event-skin" style="font-size: 0.85em;font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif;margin-left:4px;background:orange">&nbsp;&nbsp;In Progress&nbsp;&nbsp;</span> - <span class="fc-event fc-event-skin fc-event-hori fc-corner-left fc-corner-right fc-event-inner fc-event-skin" style="font-size: 0.85em;font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif;margin-left:4px;background:red">&nbsp;&nbsp;Closed&nbsp;&nbsp;</span>
                </li>
                <li id="loading">
                    <img src="/images/ajax-loader-bar.gif" alt="Please wait" />
                </li>
            </ul>
        </div>
    </div>
</div>
<div id='calendar'></div>