<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
<html xml:lang="en-us" xmlns="http://www.w3.org/1999/xhtml">  
<head>  
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
	<title><?= $title ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/general.css" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/scripts/easing.js"></script>
	<style>
		img.founders{
			width: 500px;
			margin: 0 auto;
			margin: 0 50px;
			background-color: black;
			
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
			<img class="founders" src="<?php echo base_url(); ?>assets/img/founding_fathers.jpg" />
			<h3>Our History</h3>
			<p>On February 25, 1981, Mr. Craig Ishigo and a group of eighteen dedicated men founded Lambda Phi Epsilon here at UCLA. Dissatisfied with the state of the Asian-Greek system, the founders led the way by inspiring Brotherhood within Lambda Phi Epsilon, which is now the largest Asian-American interest fraternity in the country.</p>
			<p>Since its founding, Lambda Phi Epsilon has spread like wildfire to schools around the nation. Within ten years, chapters were established at all of the UC's and most of the CSU campuses. By 1990, Lambda Phi Epsilon was officially recognized as a national organization by the North-American Interfraternity Conference (NIC) and since then, the fraternity has continued to grow and inspire the same ideals that all the brothers from around the country live by.</p>
			<h3>And Our Legacy</h3>
			<p>The encompassing motto of our fraternity is "To Be Leaders Among Men." We not only seek to bring together a diverse group of men who share interests, concerns, backgrounds and cultures, but those who show the confidence of a leader.</p>
			<p>Grounded on the principles of wisdom, honor, and courage, our actives continue to teach young men the principles of leadership and strong moral character. Our alumni provide a way in which brothers may apply these beliefs and become true leaders of society. It is that unique life-long bond that makes Lambda Phi Epsilon the most respected and sought-after organization of its kind.</p>
		</div>
		<div class="push"></div>
	</div>
	
	<?php $this->load->view('template/footer') ?>
	</body>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/header.js"></script>
</html>