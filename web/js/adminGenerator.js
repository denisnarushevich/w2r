$(document).ready(function(){
  $('.sf_admin_filter').prepend('<div class="sf_admin_filter_title"><div id="sf_title">Filter</div><div id="filter_img" class="down_img"></div></div>');

  $('.sf_admin_filter form').hide();
  $('.sf_admin_filter').draggable({
    stop: function(event, ui) {
      
    }
  });

  var state_filter = 0;

  $('#filter_img').click(function(e) {
    if (state_filter == 0) {
      $('#filter_img').removeClass('down_img');
      $('#filter_img').addClass('up_img');
      $('.sf_admin_filter form').show();
      state_filter = 1;
    } else {
      $('#filter_img').removeClass('up_img');
      $('#filter_img').addClass('down_img');
      $('.sf_admin_filter form').hide();
      state_filter = 0;
    }
  })
});