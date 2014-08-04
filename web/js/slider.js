function switchToPhoto(onum){
	var width = $('#sliderFilm a').width();
	var currentLeft = -($('#sliderFilm').css('left').replace(/[^-\d\.]/g, ''));
	var currentOnum = (currentLeft/width)+1;
	var newLeft = width*(onum-1);		
	var dLeft = currentLeft-newLeft;
	
	$('#sliderActivityName').text('');
	$('#sliderActivityName').text($('#sliderPhoto_'+onum).attr('activity_name'));
	$('#sliderControls > a').removeClass('active');
	$('#sliderPhotoButton_'+onum).addClass('active');
	
	$('#sliderFilm').animate({'left': '+='+dLeft}, 400, function(){
		var onum = clickStack.pop();
		if(onum){
			switchToPhoto(onum);
		}else{
			lock = false;
		}
	});
};

var clickStack = new Array();
var lock = false;

$(document).ready(function(){
	var nMax=0;
	
	$('#sliderControls > a').each(function(){
		$(this).click(function(){
			clearInterval(intervalId);
			
			var id = $(this).attr('id').split('_');
			id=id[1];
			
			clickStack.push(id);
			if(!lock){
				switchToPhoto(id);
			}
			lock = true;
		});
		nMax++;
	});
	
	switchToPhoto(1);
	var n=2;
	var intervalId = setInterval(function(){
		if(n>nMax){
			n=1;
		}
		
		switchToPhoto(n);
		
		n++;
		
	}, 2500);
});