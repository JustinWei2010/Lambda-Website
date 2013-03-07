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
		#lil_sis_fb{
			text-decoration: none;
			color: white;
		}
		#lil_sis_fb:hover{
			color: inherit;
		}
		img.flyer{
			width: 600px;
			margin: 0 0 6px 0;
			padding: 2px;
			background-color: none;
		}
		
		img.flyer:hover{
			background-color: white;
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
		<h3>Winter 2012 Lambda Little Sis Rush - <a id="lil_sis_fb"href="https://www.facebook.com/events/356487141032252/" target="_blank">FB page</a></h3>
		<a class="flyer_fancybox" href="<?php echo base_url(); ?>assets/flyers/lilsis_w2k11_f.jpg" data-fancybox-group="gallery">
			<img class="flyer" src="<?php echo base_url(); ?>assets/flyers/lilsis_w2k11_f.jpg" />
		</a>
		<a class="flyer_fancybox" href="<?php echo base_url(); ?>assets/flyers/lilsis_w2k11_b.jpg" data-fancybox-group="gallery">
			<img class="flyer" src="<?php echo base_url(); ?>assets/flyers/lilsis_w2k11_b.jpg" />
		</a>
		
		<h3>Lambda Little Sisses</h3>
		<p>The Lambda Lil Sis program is designed to provide close-knit bonds of friendship to a select group of girls. Whether you're looking for a group of friends to go clubbing, to study, or just to hang out, Lambda Lil Sis gives you the opportunity to meet cool people, make lifelong friendships, and make the most out of your college experience. Our goal is not only for you to get to know us, but to bond with your fellow Lambda Lil Sisses as well, and come to consider them as your sisters.</p>
		
		<h3>Why Lambda Little Sis?</h3>
		<p>As the First, Largest, and Only Nationally recognized Asian Interest Fraternity, you will get to enjoy many benefits as a Lambda Lil Sis such as traveling to many different Lambda chapters for various events, receiving hospitality and respect from other Lil Sisses and Brothers nationwide, greatly expanding your social network, and of course, joining us for our biggest event of the year, Convention!
		Through the Lambda Lil Sis program, you will build and maintain a meaningful relationship that will last throughout college, be exposed to an alternative social group and a family for support, and escape the cliques through many opportunities to attend off-campus events. Each Lil Sis will be paired up with a Big Bro, who will be their caretaker, mentor, brother and friend. For those who may have never had a sister or brother, this program was developed to help build those bonds of trust and family.</p>
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