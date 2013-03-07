<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
<html xml:lang="en-us" xmlns="http://www.w3.org/1999/xhtml">  
<head>  
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
	<title><?= $title ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/general.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/scripts/fancybox/jquery.fancybox.css" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/scripts/easing.js"></script>
	<style>
		#rush_fb{
			text-decoration: none;
			color: white;
		}
		#rush_fb:hover{
			color: inherit;
		}
		.flyer_fancybox{
			margin: 0 5px;
		}
		.flyer{
			background-color: none;
			width: 580px;
			height: 375px;
			margin: 0 0 6px 0;
			float: left;
			padding: 2px;
			background-color: none;
		
		}
		.flyer:hover{
			background-color: white;
		}
		
		#clear_float{
			clear: both;
		}
	</style>

</head>
<body>
	<?php $this->load->view('template/header') ?>
	<?php $this->load->view('template/background') ?>
	<?php $this->load->view('template/guestbook') ?>

	<div id="container">
		<div id="header_space"></div>
		<div id="wrapper">

				<h3>Spring 2012 Rush<!--<a id="rush_fb"href="https://www.facebook.com/events/142933675819382/" target="_blank">FB page</a>--></h3>
				<a class="flyer_fancybox" href="<?php echo base_url(); ?>assets/flyers/rush_s2k12_f.jpg" data-fancybox-group="gallery">
					<img class="flyer" alt="spring_rush_f" src="<?php echo base_url(); ?>assets/flyers/rush_s2k12_f_thumb.jpg" />
				</a>
				<a class="flyer_fancybox" href="<?php echo base_url(); ?>assets/flyers/rush_s2k12_b.jpg" data-fancybox-group="gallery">
					<img class="flyer" alt="spring_rush_b" src="<?php echo base_url(); ?>assets/flyers/rush_s2k12_b_thumb.jpg" />
				</a>
				<div id="clear_float"></div>
		
			
			<h3>What is Rush?</h3>
			<p>Rush is the time when greek organizations hold events in order to find potential new members, selected from a pool of rushees. Lambda Phi Epsilon is no exception. Everyone is invited to attend our events, which have been catered to you, the rushee, so that you are well informed about our brotherhood if you do receive a bid.</p>
			
			<h3>What Is A Bid?</h3>
			<p>A bid is an invitation to enter the pledge process and continue on the path of becoming a brother. Bids are given at the end of rush to rushees who the brothers feel would be a good fit to our fraternity. You are not obligated to accept a bid if given one; rush is completely non-committal.</p>
			
			<h3>Should I Attend All Events?</h3>
			<p>You are definitely encouraged to attend all rush events from beginning to end. Every event is designed with the rushee in mind. We will be there to answer any questions that you may have about the fraternity or the chapters. It is an opportunity for you to get to know the brothers better, and vice versa. Ask questions and just be yourself.</p>
			
			<h3>What Type Of Person Are You Looking For?</h3>
			<p>The diversity of our fraternity is due to the individual personalities that make up the house. However, our motto, "To Be Leaders Among Men", applies to each and every brother. We are looking for the leaders among the crowd, who will ultimately become the faces of our fraternity.</p>
			<h3>Am I Required To Pledge If I Attend Rush?</h3>
			<p>No. Rush is simply an opportunity for you to introduce yourself and meet the brothers. So have fun, enjoy yourself, and allow us to show you what our brotherhood is about.</p>
			
			<h3>Do I Have To Pay?</h3>
			<p>No, all rush events are free. All costs are funded by Lambda Phi Epsilon. Rides to all events are provided as well.</p>
			
			<h3>Do I Have To Be Asian To Join?</h3>
			<p>No. There are many brothers in all different chapters of Lambda Phi Epsilon who are not Asian. Lambda Phi Epsilon stresses that it is an Asian INTEREST fraternity, which means that anyone who is interested in our goals, both Asian and non-Asian, are encouraged to join. If you feel that you have a strong understanding or wish to learn more about Asian awareness, Lambda Phi Epsilon can serve your purposes.</p>
			
			<h3>Will Joining A Fraternity Impact My Schooling?</h3>
			<p>You should definitely care about what you are about to join, but at the same time, do not forget why are at school. Be sure to find the right balance to have a rewarding college life both socially and academically. Remember, even the brothers are students first and foremost.</p>
			
			<p>Older brothers will be able to help you and offer you invaluable advice in getting through school. We also have test and textbook banks that will prepare you for your upcoming examinations. Fully utilizing these unique resources that Lambdas have to offer will definitely benefit your education at UCLA.</p>
			
			
		</div>
		<div class="push"></div>
	</div>
	
	<?php $this->load->view('template/footer') ?>
	</body>
	<script src="<?php echo base_url(); ?>assets/scripts/fancybox/jquery.fancybox.pack.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/header.js"></script>
<script>
$(function() {
	
    	$('.flyer_fancybox').fancybox({
				
				'transitionIn'	   : 'elastic',
				'transitionOut'	   : 'elastic',
				'cyclic'           : true
		});

	
});
</script>
</html>