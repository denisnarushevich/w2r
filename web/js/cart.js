function addToCart(id, url, name, price)
{
    var data = 'id=' + id
    
    $.ajax({
       type: "POST",
       url: "/addtocart.html",
       dataType: 'json',
       data: data,
       success: function(msg){
         //alert( "Data Saved: " + msg );
         if (msg.act) {
             var liste = $('#cart_list');
             var li = document.createElement('li');
             $(li).attr('id', 'act_' + id);
             var a = document.createElement('a');
             $(a).attr('href', url);
             $(a).html(name);
             var spM = document.createElement('span');
             $(spM).html('-');
             $(spM).addClass('minus');
             var js = 'removeFromCart(\''+ id +'\',\'' + price + '\'); return false;';
             var newclick = new Function(js);
             $(spM).attr('onclick', '').click(newclick);
             var spE = document.createElement('span');
             $(spE).html('€');
             $(spE).addClass('descrActiv');
             var spA = document.createElement('span');
             $(spA).html(price);
             $(spA).addClass('descrActiv');
             $(spA).attr('id', 'price_' + id);
             li.appendChild(a);
             li.appendChild(spM);
             li.appendChild(spE);
             li.appendChild(spA);
             $(liste).append(li);
             updateActivityText(1);
             updatePrice(price);
         }
       }
     });
}

function removeFromCart(id, price)
{
    var data = 'id=' + id
    
    $.ajax({
       type: "POST",
       url: "/removefromcart.html",
       data: data,
       dataType: 'json',
       success: function(msg){
         if ($('#act_' + msg.act).length > 0)
         {
             $('#act_' + msg.act).remove();
             updateActivityText(-1);
             updatePrice(price * -1);
         }
       }
     });
}

function updateActivityText(numb)
{
    var nb = parseInt($('#numberAct').html()) + numb;
    
    if (nb < 0)
        nb = 0;
    $('#numberAct').html(nb);
    if (nb < 2)
        $('#numberActTxt').html(single);
    else
        $('#numberActTxt').html(multi);
}

function updatePrice(price)
{
    var total = parseInt($('#sum').html());
    total = total + parseInt(price);
    if (total < 0)
        total = 0;
    $('#sum').html(total);

}