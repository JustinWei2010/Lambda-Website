<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
<html xml:lang="en-us" xmlns="http://www.w3.org/1999/xhtml">  
<head>  
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
	<title><?= $title ?></title>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/scripts/jquery-1.6.2.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/scripts/supersize.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Josefin+Slab' rel='stylesheet' type='text/css' />
	 <link href='http://fonts.googleapis.com/css?family=Rock+Salt' rel='stylesheet' type='text/css' />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/home.css" />
	<script>
		
		if ($.browser.msie) { 
			alert("Internet Explorer is not fully compatible for this website. Please use a more standards-compliant web browser such as firefox, chrome, and safari.");
			
		}
		
		$(document).ready(function() {
		    $("div#supersize").supersize();
       		 
		});
	
	</script>
	<style>
		
	</style>
	
</head>

<body>

	<!-- Resizable background image!-->
	<div id="supersize">        
    	<img src="<?php echo base_url(); ?>assets/img/home/background_new.jpg" />
	</div>
	<div class="ac_overlay"></div>

	<!--Menu!-->
	<div id="menu-bg1"></div>
	<div id="menu-bg2"></div>
	<div id="menu-bg3"></div>
	<div id="menu">
		<img id="crest" src="<?php echo base_url(); ?>assets/img/home/crest.png" />
		<a id="brothers" href="<?php echo base_url(); ?>brothers">
			<div id="circle1"></div>
			<div id="circle2"></div>
			BROTHERS
		</a>
		<a id="rush"   href="<?php echo base_url(); ?>rush">
			<div id="circle1"></div>
			<div id="circle2"></div>
			Rush
		</a>
		<a id="legacy"   href="<?php echo base_url(); ?>photos">
			<div id="circle1"></div>
			<div id="circle2"></div>
			Photos
		</a>
		<a id="news"     href="<?php echo base_url(); ?>news">
			<div id="circle1"></div>
			<div id="circle2"></div>
			NEWS
		</a>
		<a id="define"   href="<?php echo base_url(); ?>about">
			<div id="circle1"></div>
			<div id="circle2"></div>
			DEFINE
		</a>
	</div>
	
    

</body>

</html>