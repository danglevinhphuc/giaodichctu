$(document).ready(function(){
		$("#hamburger").click(function(){
			$(this).css('display',"none");
			$('#hamburger_close').css('display',"block");
			$('main').css({'opacity':"0.6"});
			$('footer').css({'opacity':"0.6"});
			$('nav').animate({
				'margin-left': "0px",
				'display':'toggle',
			},"slow");
		});
		$("#hamburger_close").click(function(){
			$(this).css('display',"none");
			$('#hamburger').css('display',"block");
			$('main').css({'opacity':"1"});
			$('footer').css({'opacity':"1"});
			$('nav').animate({
				'margin-left': "-750px",
				'display':'toggle',
			},"slow");
		});
	});