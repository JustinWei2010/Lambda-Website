<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
<html xml:lang="en-us" xmlns="http://www.w3.org/1999/xhtml">  
<head>  
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/general.css" />
	<title><?= $title ?></title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script> 
     <script type="text/javascript" src="<?php echo base_url(); ?>assets/scripts/easing.js"></script>
	<style>


		#chapters h3,#associate h3, #colony h3{
			color: white;
			color: white;
			padding-bottom: 6px;
			border-bottom: white 1px dotted;
			font-size: 20px;
			text-transform: capitalize;
		}
		
		
		.chap{
			list-style: none;
			font-style: normal;
			padding: 10px 0;
			margin-left: 70px;
			font-size: 15px;
			width: 530px;
		
		}
		.chap >li{
			height: 20px;
			line-height: 20px;
			text-transform: capitalize;
		}
		.chap >li a{
			/*color: #6BF;*/
			color: #3469ff;
			text-decoration: none;
			font-weight: bold;
			font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;
		}
		#letters{
			color: white;
			margin: 0;
			padding: 0;
			position: absolute;
			
		
		}
		#chapters .chap >li a{
			position: absolute;
			margin-left: 60px;

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
			<div id="chapters">
				<h3>Chapters</h3>
				<ul class="chap">
					<?php foreach($chapters as $c): ?>	
						<li>
							<div id="letters"><?php echo $c['LETTER']?></div>
							<a href="<?= $c['LINK'] ?>" target="_blank"><?php echo $c['SCHOOL'] ?></a>
						</li>
						
					<?php endforeach ?>
				</ul>
			</div>
			
			<div id="associate">
				<h3>Associate Chapters</h3>
				<ul class="chap">
					<?php foreach($associate as $c): ?>	
						<li><a href="<?= $c['LINK'] ?>" target="_blank"><?php echo $c['SCHOOL'] ?></a></li>
						
					<?php endforeach ?>
				</ul>
			</div>
			
			<div id="colony">
				<h3>Colony Chapters</h3>
				<ul class="chap">
					<?php foreach($colony as $c): ?>	
						<li><a href="<?= $c['LINK'] ?>" target="_blank"><?php echo $c['SCHOOL'] ?></a></li>
						
					<?php endforeach ?>
				</ul>
			</div>
		</div>
		
		<div class="push"></div>
	</div>
	
	<?php $this->load->view('template/footer') ?>
	</body>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/header.js"></script>
</html>