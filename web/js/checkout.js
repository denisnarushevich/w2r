$(function() {
    $.datepicker.setDefaults( $.datepicker.regional[ "en" ] );
    $( ".datepicker" ).datepicker({
        regional: transCulture,
        showOn: "both",
        buttonImage: "/images/calendar.png",
        dateFormat: 'mm/dd/yy',
        onSelect: function(dateText, inst) {
          treatDateChange(dateText, inst, this);
          estimatePrice();
        }
      });
    $('#changePerson').change(function () {
      var reg = new RegExp("_tick", "g");
      var val = $(this).children('[selected]').val();
      $('.booking input[type=checkbox]').each(function(index, value){
        if ($(value).is(':checked'))
        {
          var idAct = $(value).attr('name').replace(reg, '_nb');
          idAct = idAct.replace(reg, '_nb');
          reg = new RegExp('\\[', 'g');
          idAct = idAct.replace(reg, '\\[');
          reg = new RegExp('\\]', 'g');
          idAct = idAct.replace(reg, '\\]');
          $('#' + idAct).val(val);
        }
      });
      estimatePrice();
    });
  });
  
  
function checkBonusCode() {
  if ($('#bonuscheck').val() != '') {
    var data = "code=" + $('#bonuscheck').val();
    $.ajax({
       type:      "POST",
       url:       "/checkbonuscode.html",
       data:      data,
       dataType:  'json',
       success:   function(msg) {
         if (msg.error)
         {
           $('#codeError').html(msg.error);
           $('#reducText').hide();
           $('#estimatedReduc').hide();
           $('#bonusCodeValue').html('');
           $('#bonuscode').val('');
           $('#bonustype').val('');
           $('#bonusval').val('');
         } else {
           $('#codeError').html('');
           $('#bonusCodeValue').html(msg.value);
           $('#bonuscode').val(msg.num);
           $('#bonustype').val(msg.type);
           $('#bonusval').val(msg.val);
           $('#reducText').show();
           $('#estimatedReduc').show();
         }
         estimatePrice();
       }
     });
  }
}

function checkClick(e) {
  var id;

  if (e)
    id = $(e).attr('name');
  if (id == undefined)
    id = $(this).attr('name');
  var reg = new RegExp('_tick', 'g');
  id = id.replace(reg, '_nb');
  reg = new RegExp('\\[', 'g');
  id = id.replace(reg, '\\[');
  reg = new RegExp('\\]', 'g');
  id = id.replace(reg, '\\]');
  $('#'+id).val(1);
  estimatePrice();
};

function estimatePrice()
{
  if ($('#date_from').val() != '')
  {
    var estimated = 0;
    var dateTo;
    var dateFrom = new Date($('#date_from').val());
    if ($('#date_to').val() != '')
      dateTo = new Date($('#date_to').val());
    else
      dateTo = new Date($('#date_from').val());
    if (dateTo >= dateFrom)
    {
      $('.booking').each(function(index, value){
        var idAct = $(value).attr('id').substr(9);
        var dateRunning = new Date($('#date_from').val());
        while (dateRunning <= dateTo)
        {
          if ($('#act\\[' + idAct + '\\]\\[' + dateRunning.dateFormat('mdY') + '_tick\\]').is(':checked'))
          {
            var nb = $('#act\\[' + idAct + '\\]\\[' + dateRunning.dateFormat('mdY') + '_nb\\]').val();
            estimated = estimated + parseInt(parseInt(nb) * parseInt($('#priceAct_' + idAct).val()));
          }
          dateRunning.setDate(dateRunning.getDate() + 1);
        }
      });
      $('#estimated').html(estimated + '&nbsp;&euro;');
      // Check type of bonus
      if ($('#bonustype').val() != '')
      {
        var bonus = parseInt($('#bonusval').val());
        if ($('#bonustype').val() == '%')
        {
          $('#estimatedReduc').html(parseFloat(estimated * ((100 - bonus) / 100)).toFixed(2) + '&nbsp;&euro;');
        } else {
          $('#estimatedReduc').html(parseInt(estimated - bonus) + '&nbsp;&euro;');
        }
      }
    }
  }
}
    
function treatDateChange(dateText, inst, elem)
{
  if (dateText != null) {
      var d
      if ($(elem).attr('name') == 'date_from')
      {
          if ($('#date_to').val() == '')
          {
                addTableToActivity();
                remElemForActivity();
                addElemToActivity(dateText);
          } else {
                addTableToActivity();
                remElemsFromActivity(dateText, $('#date_to').val());
                addElem(dateText, $('#date_to').val());
          }
          d = new Date(dateText);
          if (d <= oldTo || oldTo == '')
            oldFrom = d;
      } else {
          addTableToActivity();
          if ($('#date_from').val() == '')
          {
                addTableToActivity();
                remElemForActivity();
                addElemToActivity(dateText);
          } else {
                addTableToActivity();
                remElemsFromActivity($('#date_from').val(), dateText);
                addElem($('#date_from').val(), dateText);
          }
          d = new Date(dateText);
          if (d >= oldFrom || oldFrom == '')
            oldTo = d;
      }
  }
}

function addTableToActivity()
{
  $('.booking').each(function(index, value){
    var idAct = $(value).attr('id').substr(9);

    if (!($('#thead_' + idAct).length > 0))
    {
      var div = document.createElement('div');
      var date = document.createElement('div');
      var select = document.createElement('div');
      var nb = document.createElement('div');
      $(div).addClass('tableAct');
      $(date).html(transDate + ':');
      $(select).html(transSelect + ':');
      $(nb).html(transNb + ':');
      div.appendChild(date);
      div.appendChild(select);
      div.appendChild(nb);
      div.setAttribute('id', 'thead_' + idAct);
      $(value).append(div);
    }
  });
}

function addElemToActivity(dateBook)
{

  $('.booking').each(function(index, value){
    var div = getNewElem(value, dateBook);
    $(value).append(div);
  });
}

function getNewElem(value, dateBook)
{
  var idAct = $(value).attr('id').substr(9);
  var reg = new RegExp("/", "g");
  var dateStr = dateBook.replace(reg, '');

  var nameForm = 'act[' + idAct + '][' + dateStr;
  var div = document.createElement('div');
  var date = document.createElement('div');
  var select = document.createElement('div');
  var tick = document.createElement('input');
  var nb = document.createElement('div');
  var nbInput = document.createElement('select');
  var opt, theText;
  for (var i = 0; i <= 200; i++)
  {
    opt = document.createElement('option');
    theText = document.createTextNode(i);
    opt.appendChild(theText);
    opt.setAttribute('value', i);
    nbInput.appendChild(opt);
  }
  nbInput.setAttribute('name', nameForm + '_nb]');
  nbInput.setAttribute('id', nameForm + '_nb]');
  $(nbInput).change(estimatePrice);
  tick.setAttribute('type', 'checkbox');
  tick.setAttribute('name', nameForm + '_tick]');
  tick.setAttribute('id', nameForm + '_tick]');
  $(tick).attr('onclick', '').click(checkClick);
  select.setAttribute('align', 'center');
  select.appendChild(tick);
  $(div).addClass('tableAct');
  $(date).html(dateBook);
  if ((new Date(dateBook)).getUTCDay() > 4)
    $(date).css('font-weight', 'bold');
  nb.appendChild(nbInput);
  div.appendChild(date);
  div.appendChild(select);
  div.appendChild(nb);
  div.setAttribute('id', nameForm + ']');

  return div;
}

function addElem(From, To)
{
  var dateFrom = new Date(From);
  var dateTo = new Date(To);
  if (dateTo >= dateFrom)
  {
    $('.booking').each(function(index, value){
      var idAct = $(value).attr('id').substr(9);
      var dateRunning = new Date(From);
      var done;
      while (dateRunning <= dateTo)
      {
        done = false;
        if (!($('#act\\[' + idAct + '\\]\\[' + dateRunning.dateFormat('mdY') + '\\]').length > 0))
        {
          var div = getNewElem(value, dateRunning.dateFormat('m/d/Y'))
//          console.log(oldFrom + ' _ '+ dateRunning + ' _ ' + dateFrom);
          if (oldFrom != '' && oldFrom >= dateFrom && dateRunning <= oldFrom)
          {
//            console.log('#act\\[' + idAct + '\\]\\[' + oldFrom.dateFormat('mdY') + '\\]');
            if ($('#act\\[' + idAct + '\\]\\[' + oldFrom.dateFormat('mdY') + '\\]').length)
            {
                $('#act\\[' + idAct + '\\]\\[' + oldFrom.dateFormat('mdY') + '\\]').before(div);
                done = true;
            }
          }
          if (oldTo != '' && oldTo >= dateTo && dateRunning >= oldTo && done == false)
          {
            if ($('#act\\[' + idAct + '\\]\\[' + oldTo.dateFormat('mdY') + '\\]').length)
            {
                $('#act\\[' + idAct + '\\]\\[' + oldTo.dateFormat('mdY') + '\\]').before(div);
                done = true;
            }
          }
          if (done == false)
          {
            $(value).append(div);
          }
        }
        dateRunning.setDate(dateRunning.getDate() + 1);
      }
    });
  }
}

function remElemsFromActivity(From, To)
{
  var dateFrom = new Date(From);
  var dateTo = new Date(To);
  if (dateTo >= dateFrom)
  {
    $('.booking').each(function(index, value){
      var idAct = $(value).attr('id').substr(9);

      $(value).children('.tableAct').each(function(idx, curr){
        if ($(curr).attr('id').substr(0, 5) != 'thead')
        {
          var d = $(curr).attr('id').substr($(curr).attr('id').indexOf('[',4) + 1, 8);
          d = new Date(d.substr(0,2) + '/' + d.substr(2,2) + '/' + d.substr(4,4));
          if (d > dateTo || d < dateFrom)
            $(curr).remove();
        }
      });
    });
  }
}

function remElemForActivity()
{
  $('.booking').each(function(index, value){
    var idAct = $(value).attr('id').substr(9);

    $(value).children('.tableAct').each(function(index, value){
      if ($(value).attr('id').substr(0, 5) != 'thead')
      {
          $(value).remove();
      }
    });
  });
}
