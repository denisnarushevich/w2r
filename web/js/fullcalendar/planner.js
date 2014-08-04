$(document).ready(function(){
    var activity = 'select[name=activity]';
    var client   = 'select[name=client]';
    var guide    = 'select[name=guide]';
    var reset    = 'input[name=reset]';
    var empty    = 'wait';

    $(activity).change(function () {
        $(activity).reset();
        if ($(activity).val() != empty)
        {
            var id = parseInt($(activity).val());
            $.ajax({
                url: urlAjaxActivity,
                data: { id:id, type:'activity' },
                dataType: 'json',
                beforeSend: function(){
                    $('#loading').show();
                },
                success: function(data){
                    calendar(data);
                    $('#loading').hide();
                }
            });
        }
        $(activity).reset();
    });
    $(client).change(function () {
        $(client).reset();
        if ($(client).val() != empty)
        {
            var id = parseInt($(client).val());
            $.ajax({
                url: urlAjaxClient,
                data: { id:id, type:'client' },
                dataType: 'json',
                beforeSend: function(){
                    $('#loading').show();
                },
                success: function(data){
                    calendar(data);
                    $('#loading').hide();
                }
            });
        }
        $(client).reset();
    });
    $(guide).change(function () {
        $(guide).reset();
        if ($(guide).val() != empty)
        {
            var id = parseInt($(guide).val());
            $.ajax({
                url: urlAjaxGuide,
                data: { id:id, type:'guide' },
                dataType: 'json',
                beforeSend: function(){
                    $('#loading').show();
                },
                success: function(data){
                    calendar(data);
                    $('#loading').hide();
                }
            });
        }
        $(guide).reset();
    });
    
    $(reset).click(function () {
        $(reset).reset();
        calendar(base);
    });
    
    $.fn.reset = function () {
        var name = $(this).attr('name');
    
        if (name != 'activity')
            $(activity).val(empty);
        if (name != 'client')
            $(client).val(empty);
        if (name != 'guide')
            $(guide).val(empty);
        if ($(activity).val() == empty && $(client).val() == empty && $(guide).val() == empty)
            calendar(base);
    }

   
    $('#loading').hide();
    calendar(base);
});

function calendar(data)
{
    $('#loading').show();
    $('#calendar').html('');
    $('#calendar').fullCalendar({
        header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek'
        },
        events: data,
        eventClick: function(event) {
            if (event.url) {
                openNZoombox(event.url);
                return false;
            }
        }
    });
    $('#loading').hide();
}