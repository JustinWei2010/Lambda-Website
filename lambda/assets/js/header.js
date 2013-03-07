
$(function() {
	
	$('#header #menu li#define').bind('mouseenter',function(){
		var $elem = $(this);
		$elem.find('.main_tab')
			 .hide()
			 .andSelf()
			 .find('.sub_tab')
			 .show()
			 .animate({height:'115px'},500,'easeOutBack');
		
	}).bind('mouseleave',function(){
		var $elem = $(this);
		$elem.find('.sub_tab').stop(true)
			 .animate({height:'20px'},500)
			 .hide()
			 .andSelf()
			 .find('.main_tab').stop(true)
			 .show();
	});
	
	$('#header #menu li#brothers').bind('mouseenter',function(){
		var $elem = $(this);
		$elem.find('.main_tab').stop(true)
			 .hide()
			 .andSelf()
			 .find('.sub_tab').stop(true)
			 .show()
			 .animate({height:'69px'},500,'easeOutBack');
	}).bind('mouseleave',function(){
		var $elem = $(this);
		$elem.find('.sub_tab').stop(true)
			 .animate({height:'20px'},500)
			 .hide()
			 .andSelf()
			 .find('.main_tab').stop(true)
			 .show();
	});
	
	$('#header #menu li#rush').bind('mouseenter',function(){
		var $elem = $(this);
		$elem.find('.main_tab').stop(true)
			 .hide()
			 .andSelf()
			 .find('.sub_tab').stop(true)
			 .show()
			 .animate({height:'46px'},500,'easeOutBack');
	}).bind('mouseleave',function(){
		var $elem = $(this);
		$elem.find('.sub_tab').stop(true)
			 .animate({height:'20px'},500)
			 .hide()
			 .andSelf()
			 .find('.main_tab').stop(true)
			 .show();
	});
	
	
	//guestbook
	$("#guestbook_side_panel #click").click(function(){
		if(!$("#guestbook_side_panel").hasClass('open')){
			$("#guestbook_side_panel").animate({right:0},350,'easeOutCirc').addClass('open');
			$(this).find("h3").fadeTo(0,0).html("Close").css("top","65px").fadeTo(350,1);
			$(this).css("height","75px");
			

		}else{
			$("#guestbook_side_panel").animate({right:-490},350,'easeOutCirc').removeClass('open');
			$(this).find("h3").fadeTo(0,0).html("Guestbook").css("top","115px").fadeTo(350,1);
			$(this).css("height","125px");

		}
	
	});
});
