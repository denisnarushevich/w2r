/*$(document).ready(function(){
	//animation bind
	if(jQuery.browser.mozilla){
		//mozilla and opera doesnt support background position coordinates separately
	}else{
		$('#mainMenu a').css({backgroundPositionY: '-140px'});	
		$('#mainMenu a div.container').css({backgroundPositionY: '-4px'});	
		$('#mainMenu a div.body').css({backgroundPositionY: '-72px'});	
			
		$('#mainMenu a').each(function(){
			$(this).hover(function(){
				//alert($(this).attr('class'));
				$(this).animate({backgroundPositionY: '-170px'},200);
				$('div.container', this).animate({backgroundPositionY: '-34px'},200);
				$('div.body', this).animate({backgroundPositionY: '-102px'},200);
			},function(){
				$(this).animate({backgroundPositionY: '-140px'},200);
				$('div.container', this).animate({backgroundPositionY: '-4px'},200);
				$('div.body', this).animate({backgroundPositionY: '-72px'},200);
			});
		});
	}
	
	//start-up "wavy" animation
	setTimeout(function(){
		$('#mainMenu a').each(function(key, value){
			var that = this;

			setTimeout(function(){
				$(that).trigger('mouseover');
				$(that).trigger('mouseout');			
			},key*150);
			
			if(key<5){
				setTimeout(function(){
					setTimeout(function(){
						$(that).trigger('mouseover');
						$(that).trigger('mouseout');			
					},(6-key)*150);
				},650);
			}
		});
	},1000);
}); */

$(document).ready(function(){
	//animation bind
	//if($.browser.mozilla || $.browser.opera){
		//mozilla and opera doesnt support background position coordinates separately
	//}else{
		$('#mainMenu a').css({backgroundPosition: '0px -140px'});	
		$('#mainMenu a div.container').css({backgroundPosition: '100% -4px'});	
		$('#mainMenu a div.body').css({backgroundPosition: '0px -72px'});	
			
		$('#mainMenu a').each(function(key, value){
			$(this).mouseover(function(){
				$('#mainMenu a').each(function(key2, value){
					var d = Math.abs(key2-key)+1;
					//var k = 30/d;
					var k = 30/(1+(d-1)*(d-1));
					
					$(this).stop(true); //stop all running animation and remove it from queue
					$('div.container', this).stop(true); //same for container
					$('div.body', this).stop(true); //same for body
					
					$(this).animate({backgroundPosition: '0px -'+(140+k)+'px'},{duration:200,queue:false});
					$('div.container', this).animate({backgroundPosition: '100% -'+(4+k)+'px'},{duration:200,queue:false});
					$('div.body', this).animate({backgroundPosition: '0px -'+(72+k)+'px'},{duration:200,queue:false});
				});
			});
		});
		
		$('#mainMenu').mouseleave(function(){
				$('a', this).each(function(){
					$(this).animate({backgroundPosition: '0px -140px'},{duration:800,queue:false});
					$('div.container', this).animate({backgroundPosition: '100% -4px'},{duration:800,queue:false});
					$('div.body', this).animate({backgroundPosition: '0px -72px'},{duration:800,queue:false});
				});			
		});
	//}
});