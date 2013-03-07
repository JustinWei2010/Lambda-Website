<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
<html xml:lang="en-us" xmlns="http://www.w3.org/1999/xhtml">  
<head>  
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
	<title><?= $title ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/general.css" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/scripts/easing.js"></script>
	
	<style>
		#container img{
			position: absolute;
			width: 400px;
			left: 50%;
			margin-top: 150px;
			margin-left: -200px;
		}
	</style>
</head>
<body>
	<?php $this->load->view('template/header') ?>
	<?php $this->load->view('template/background') ?>
	<?php $this->load->view('template/guestbook') ?>

	<div id="container">
		<img src="http://googlemelogin.com/wp-content/uploads/2010/10/coming-soon.jpg"/>
		<div class="push"></div>
	</div>
	
	<?php $this->load->view('template/footer') ?>
	</body>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/header.js"></script>
</html>