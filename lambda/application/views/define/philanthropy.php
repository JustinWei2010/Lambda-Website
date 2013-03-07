<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
<html xml:lang="en-us" xmlns="http://www.w3.org/1999/xhtml">  
<head>  
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
	<title><?= $title ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/general.css" />	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/scripts/easing.js"></script>
	<style>
		img.a3m{
			width: 240px;

			float: right;
			margin: 5px;
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
			

			<h3>Philanthropy</h3>
			<p>In 1996, Evan Chen, a brother from Stanford University, was diagnosed with leukemia. All of the chapters of Lambda Phi Epsilon worked together to find a compatible match for a bone marrow transfusion, a procedure that is possibly life-saving. Eventually, through the efforts of the fraternity, family, and friends, a match was found, but Evan unfortunately passed away before the surgery could be performed.</p>
			<h3>A3M Foundation</h3>
			<img class="a3m" src="<?php echo base_url(); ?>assets/img/a3m.png" />
			<p>Through these circumstances, Lambda Phi Epsilon now works with the Asians for Miracle Marrow Matches (A3M) foundation for our national philanthropy. We continuously strive to help promote awareness for leukemia and other blood-related disorders as well as encouraging those of Asian descent to register for the bone marrow registry.</p>
			<p>Asians only make up a very small minority of registered possible bone marrow donors. As a result, those patients in need of a transplant simply cannot find one, as finding a match is highly selective in ethnic descent. We believe it is our duty to spread information on this live-saving action and encourage everyone to register. More information can be found at the A3M website.</p>
			<p>Our chapters holds bone marrow registry drives on campus several times annually and urges the UCLA student body to register and possibly save a life.</p>
		</div>
		<div class="push"></div>
	</div>
	
	<?php $this->load->view('template/footer') ?>
	</body>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/header.js"></script>
</html>