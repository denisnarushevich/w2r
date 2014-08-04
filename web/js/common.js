/*Nivo Slider*/
$(window).load(function() {
    $('#slider').nivoSlider({
        effect:'random', //Specify sets like: 'fold,fade,sliceDown'
        slices:15,
        animSpeed:500, //Slide transition speed
        pauseTime:3000,
        startSlide:0, //Set starting Slide (0 index)
        directionNav:true, //Next & Prev
        directionNavHide:false, //Only show on hover
        controlNav:true, //1,2,3...
        controlNavThumbs:false, //Use thumbnails for Control Nav
        controlNavThumbsFromRel:false, //Use image rel for thumbs
        controlNavThumbsSearch: '.jpg', //Replace this with...
        controlNavThumbsReplace: '_thumb.jpg', //...this in thumb Image src
        keyboardNav:true, //Use left & right arrows
        pauseOnHover:true, //Stop animation while hovering
        manualAdvance:false, //Force manual transitions
        captionOpacity:0.8, //Universal caption opacity
        beforeChange: function(){},
        afterChange: function(){},
        slideshowEnd: function(){}, //Triggers after all slides have been shown
        lastSlide: function(){}, //Triggers when last slide is shown
        afterLoad: function(){} //Triggers when slider has loaded
    });
});

/*Nivo Slider*/
$(window).load(function() {
    $('#playerSlide').nivoSlider({
        effect:'random', //Specify sets like: 'fold,fade,sliceDown'
        slices:15,
        animSpeed:500, //Slide transition speed
        pauseTime:3000,
        startSlide:0, //Set starting Slide (0 index)
        directionNav:true, //Next & Prev
        directionNavHide:false, //Only show on hover
        controlNav:false, //1,2,3...
        controlNavThumbs:false, //Use thumbnails for Control Nav
        controlNavThumbsFromRel:false, //Use image rel for thumbs
        controlNavThumbsSearch: '.jpg', //Replace this with...
        controlNavThumbsReplace: '_thumb.jpg', //...this in thumb Image src
        keyboardNav:true, //Use left & right arrows
        pauseOnHover:true, //Stop animation while hovering
        manualAdvance:false, //Force manual transitions
        captionOpacity:0.8, //Universal caption opacity
        beforeChange: function(){},
        afterChange: function(){},
        slideshowEnd: function(){}, //Triggers after all slides have been shown
        lastSlide: function(){}, //Triggers when last slide is shown
        afterLoad: function(){} //Triggers when slider has loaded
    });
});

/*Lazy Load*/
//$(document).ready(function(){
//		$("img").lazyload({
//		    failurelimit : 150,
//		    effect : "fadeIn"
//		});
//});

/*Form Focus*/
$('fieldset *').each(function(){
	  var default_value = $(this).val();
	  $(this).focus(function(){
		  if ($(this).val() == default_value) $(this).val("").addClass('focus');
	  });
	  $(this).blur(function(){
		  if ($(this).val() == "") $(this).val(default_value).removeClass('focus');
	  });
});

/*Form Focus*/
$('#searchme').each(function(){
	  var default_value = $(this).val();
	  $(this).focus(function(){
		  if ($(this).val() == default_value) $(this).val("").addClass('focus');
	  });
	  $(this).blur(function(){
		  if ($(this).val() == "") $(this).val(default_value).removeClass('focus');
	  });
});



/*PANIER*/

$(document).ready(function(){
    $('#panierAjax').hover(function() {
      $('div#wrapperAjxToHide').slideToggle('slow', function() {});
    });
    
    $('#langSwitch').hover(function() {
      $('#langWrap').slideToggle('slow', function() {});
    });
})