<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
<html xml:lang="en-us" xmlns="http://www.w3.org/1999/xhtml">  
<head>  
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
	
	<title><?= $title ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/general.css" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/scripts/easing.js"></script>

</head>
<body>
	<?php $this->load->view('template/header') ?>
	<?php $this->load->view('template/background') ?>
	<?php $this->load->view('template/guestbook') ?>

	<div id="container">
		<div id="header_space"></div>
		<div id="wrapper">
			
			<object type="application/x-shockwave-flash" style="width:600px; height:325px;" data="http://vimeo.com/moogaloop.swf?clip_id=13277645&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00adef&amp;fullscreen=1">
				<param name="wmode" value="opaque">
				<param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=13277645&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00adef&amp;fullscreen=1" />
			</object>
			<h2>- Made by University of Houston, Pi chapters -</h2>
			<h3>Who Are We?</h3>
			<p>Lambda Phi Epsilon was first established here at UCLA in 1981. Since then, we have expanded across the country to become the first and only nationally recognized Asian interest fraternity. With 50 chapters, our fraternity has a strong presence throughout the United States and Canada. And while the brothers are diverse in culture and creed, we all share our bond in promoting Asian awareness, teaching leadership skills, maintaining our traditions, and exemplifying brotherhood.</p>
			<h3>Our Mission</h3>
			<p>We, the members of Lambda Phi Epsilon National Fraternity, strive to promote Asian-American awareness by helping philanthropic causes, educating the community, and preserving Asian-American culture.</p>
			<p>Since its inception, Lambda Phi Epsilon has maintained the highest standards of Academic Performance, Social Experience, Community Service, and most importantly, Brotherhood among its members.</p>
			<h3>Eternal Brotherhood</h3>
			<p>Why join Lambda Phi Epsilon when there are numerous other Asian organizations on campus? By joining, you will enter a brotherhood that is rich in tradition and strong in its bonds. The brotherhood that a fraternity offers forms friendships that last a lifetime. Brothers of both Asian and non-Asian descent have said that the reason they rushed Lambda Phi Epsilon was because they could see and feel the closeness of brotherhood that other fraternities did not portray, and wanted to play a part in it as well.</p>
		</div>
		<div class="push"></div>
	</div>
	
	<?php $this->load->view('template/footer') ?>
	</body>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/header.js"></script>
</html>