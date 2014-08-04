<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
</head>
<body>
<?php
$planners = $planners->getRawValue();
?>
<style type='text/css'>
#calendar {
    width: 98%;
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
<script type="text/javascript">
$(document).ready(function(){
    var data = <?php echo json_encode($planners); ?>;
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek'
        },
        events: data
    });
});
</script>
<div style="width:100%;margin:auto">Legend : <span class="fc-event fc-event-skin fc-event-hori fc-corner-left fc-corner-right fc-event-inner fc-event-skin" style="font-size: 0.85em;font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif;margin-left:4px;background:green">&nbsp;&nbsp;New&nbsp;&nbsp;</span> - <span class="fc-event fc-event-skin fc-event-hori fc-corner-left fc-corner-right fc-event-inner fc-event-skin" style="font-size: 0.85em;font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif;margin-left:4px;background:orange">&nbsp;&nbsp;In Progress&nbsp;&nbsp;</span> - <span class="fc-event fc-event-skin fc-event-hori fc-corner-left fc-corner-right fc-event-inner fc-event-skin" style="font-size: 0.85em;font-family: 'Lucida Grande',Helvetica,Arial,Verdana,sans-serif;margin-left:4px;background:red">&nbsp;&nbsp;Closed&nbsp;&nbsp;</span></div><br/>
<div id='calendar'></div>
</body>
</html>
