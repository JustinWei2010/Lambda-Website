<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
<html xml:lang="en-us" xmlns="http://www.w3.org/1999/xhtml">  
<head>  
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/news.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/general.css" />
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
		<div id="wrap">
			<div id="contents">	
								
				<?php foreach ($news as $news_item): ?>
					<div id="<?=$news_item['NID']?>" class="hentry">
						<div class="entry-meta">
							<div class="date"> <?= $news_item['DATE'] ?></div>
							<div class="location"><?= $news_item['LOCATION']?></div>
						</div>
						<div class="main">
							<h2 class="entry-title"><?= $news_item['TITLE'] ?></h2>  
							<div class="entry-content"><p><?= html_entity_decode($news_item['CONTENT']) ?></p></div>
						</div>
					
					</div>
				<?php endforeach ?>
				
			</div>	
			<div class="push"></div>
		</div>
	</div>
	<?php $this->load->view('template/footer') ?>
</body>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/header.js"></script>

</html>