
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="en-us" xmlns="http://www.w3.org/1999/xhtml">  
<head>  
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/scripts/fancybox/jquery.fancybox.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/general.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/photo.css" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/scripts/easing.js"></script>
	
	<title><?= $title ?></title>
	
</head>
<body>
	<?php $this->load->view('template/header') ?>
	<?php $this->load->view('template/background') ?>
	<?php $this->load->view('template/guestbook') ?>

	<div id="container">
		<div id="header_space"></div>
		<div id="wrapper">
			<h3>Albums</h3>
			<div id="photo_content">
				
			</div>
			<div id="load"></div>

		</div>
		<div id="photo_space"></div>
		<div class="push"></div>
	</div>
	<div id="photos_view">
		<div id="control">
			<h3 id="album_name"></h3>
			<div id="close">Close</div>
		</div>
		<img id="ajax_loader" src="<?php echo base_url(); ?>assets/img/ajax-loader.gif"/>
		<div id="photos_wrapper">
		
		</div>
	</div>
	
	<?php $this->load->view('template/footer') ?>
</body>
	
<script src="<?php echo base_url(); ?>assets/scripts/fancybox/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/header.js"></script>
<script>
$(function() {
	var base_url ="http://lalambdas.com/index.php/legacy/";
	//get album list in the beginning
	
	$('#photo_content').load(base_url+"album_list_ajax");
//two levels: album, photos
	$('#photos_view #control #close').live({
		click: function(){
			$("#photos_view").animate({bottom:-301},250,'easeOutCirc').removeClass('open');
			$('#photo_space').animate({height:0},250);
		}
	});
	
	$('#wrapper .album_wrapper').live({
		click: function(){
			var paid = $(this).attr('id');
			window.location = '#paid='+paid;
			if(!$(this).hasClass('album_opened'))
			{
				$('#wrapper .album_wrapper').removeClass('album_opened');
				$(this).addClass('album_opened');
				var album_name = $(this).find('.album_name span').html();
				
				if(!$("#photos_view").hasClass('open')){
				    $('#photo_space').animate({height:300},250);
					$("#photos_view").animate({bottom:0},250,'easeOutCirc').addClass('open');
				}
					$("#photos_view #photos_wrapper").fadeOut(function(){	
						
					
						//show loading animation
						$('#photos_view #ajax_loader').show();
						$(this).load(
							base_url+"photo_list_ajax", 
					        {paid:paid}, 
					        function() {
					        	//switch album name
								$('#photos_view #control #album_name').html('<span>'+album_name+'</span>').append($('#number_photos').html());
								
								//show content
					        	$('.photo_fancybox').fancybox({
										'transitionIn'	   : 'elastic',
										'transitionOut'	   : 'elastic',
										'cyclic'           : true
										
								});
					        	$(this).fadeIn(250);
					        	$('#photos_view #ajax_loader').hide();
					        }
				
					    );
					});	
			}	
				
	       
		},
		mouseover: function(){
			if(!$(this).hasClass('animated')){
				$(this).dequeue().stop().fadeTo('fast',0.7);
			}
		},
		mouseout: function(){
			//$(this).css( 'cursor', 'pointer' );
			$(this).addClass('animated').fadeTo('fast',1).removeClass('animated').dequeue();

		}
	});
	

	
	
});
</script>

</html>