$(function() {
	$('#header #menu li#news').bind('mouseenter',function(){
		var $elem = $(this);
		$elem.find('.main_tab')
			 .hide()
			 .andSelf()
			 .find('.sub_tab')
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
});
