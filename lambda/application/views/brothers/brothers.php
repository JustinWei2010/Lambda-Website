<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
<html xml:lang="en-us" xmlns="http://www.w3.org/1999/xhtml">  
<head>  
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
	<title><?= $title ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/brothers.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/liteaccordion.css" />
	<link href='http://fonts.googleapis.com/css?family=Rock+Salt' rel='stylesheet' type='text/css' />
	<link href='http://fonts.googleapis.com/css?family=Josefin+Slab' rel='stylesheet' type='text/css' />
	
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/scripts/easing.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/scripts/liteaccordion.jquery.min.js"></script>
	
	
</head>
<body>
	<?php $this->load->view('template/header') ?>
	<?php $this->load->view('template/background') ?>
	<?php $this->load->view('template/guestbook') ?>


	<div id="container">
		<ul id="nav">
			<li id="eboard"><a href="#eboard">Executive Board</a></li>
			<li id="cabinet"><a href="#cabinet">CABINET</a></li>			
			<li id="active_house"><a href="#active_house">ACTIVE HOUSE</a></li>
		</li>
		
		<div id="content">
			<div class="slide_box">
				<div class="slide_info" id="eboard_info">
					<ul>
						<?php foreach ($eboard as $e): ?>
							<li class="brother_click" id="<?=$e['BROID']?>"><?php echo $e['TITLE']; ?>: <span><?php echo $e['FIRST_NAME']." ".$e['LAST_NAME']; ?></span></li>
						<?php endforeach ?>
					</ul>
				</div>
				<div class="slide_info" id="cabinet_info">
					<ul>				
						<?php foreach ($cabinet as $c): ?>
							<li class="brother_click" id="<?=$c['BROID']?>"><?php echo $c['TITLE']; ?>: <span><?php echo $c['FIRST_NAME']." ".$c['LAST_NAME']; ?></span></li>
						<?php endforeach ?>
					</ul>	
				</div>
				<div class="slide_info" id="active_house_info">
					<?php $count=0;?>
					<?php foreach($active_house as $ah): ?>
						
						<div class ="classes" id="<?=$ah[0]['CLASS'];?>">
							<?= $ah[0]['SYMBOL']?>
							<div class="class_roster">
								<h4 class="class_name"><?=$ah[0]['CLASS']?></h4>
								<h5 class="year"><?=$ah[0]['SEASON']." ".$ah[0]['YEAR']?></h5>
								<ul>
									<?php foreach ($ah as $a):?>
										<li class="brother_click" id="<?=$a['BROID']?>"><?php echo $a['FIRST_NAME']." ".$a['LAST_NAME']?></li>
									<?php endforeach?>
								
								</ul>
							</div>
						</div>
						<?php 
							$count++;
							if($count==4)
								echo '<div id="clear"></div>';
						?>
					<?php endforeach ?>
				</div>
				<div id="brother_info">
				</div>
			</div>
			
			
		</div>
		
		
		<!-- Stores Brother Information, For js!-->
		<div id="active_house_bro_info">
			<?php foreach($active_house as $ah): ?>		
				<?php foreach ($ah as $a):?>
					<div id="<?=$a['BROID']?>">
						<!--<div id="profile_pic"><img src="<?=$a['PATH']?>"/></div>!-->
						<div id="info_wrapper">
							<h2 id="name">
								<?php 
									echo $a['FIRST_NAME']."<br>".$a['LAST_NAME'];
								?>
							</h2>
							<div id="class"><?=$a['CLASS']?> <?=$a['SEASON']." ".$a['YEAR']?></div>
							<div id="home_town">From: <?=$a['HOME_TOWN']?></div>
							<div id="major">Major: <?=$a['MAJOR']?></div>
							<!--<div id="detail">Detail: <?=$a['DETAIL']?></div>!-->
						</div>
					</div>
				<?php endforeach?>
			<?php endforeach ?>
			
		</div>
	</div>
	<?php $this->load->view('template/footer') ?>
</body>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/header.js"></script>
<script type="text/javascript">
        $(function() {
			
            $('#nav > li').click(function(){
            	var navID = $(this).attr('id');
				$('.slide_info').hide().css('top', '-370px').removeClass('open');
				$('#nav li').removeClass('selected');
				if(!$('#' + navID +'_info').hasClass('open')){
					$('#' + navID +'_info').delay(100).show().animate({top:5},400,'easeOutCirc').addClass('open');
					$('#' + navID).addClass('selected');
				}
				return false;
			});
			
			$('#active_house_info .classes').bind('mouseenter',function(){
				$(this).find('.class_roster').show().animate({left:'100%'},400,'easeOutBack');
			}).bind('mouseleave',function(){
				$(this).find('.class_roster').hide().css('left', '50%');
			});
			
			$('#content .brother_click').click(function(){
				var broid = $(this).attr('id');
				var bro_html = $('div#active_house_bro_info').find("#" + broid).html();
				
				$('.slide_box #brother_info').hide().css('left', '280px').css('width', '0').removeClass('open');
				$('.slide_box #brother_info').html("").html(bro_html);
				if(!$('.slide_box #brother_info').hasClass('open')){
					$('.slide_box #brother_info').show().animate({width:520,left:295},450,'easeOutExpo',function(){
						$('#brother_info #profile_pic').fadeTo('fast',1);
						$('#brother_info #info_wrapper').fadeTo('fast',1);
					}).addClass('open');
					
				}
				
			});
			
			//initial triggers
			$('#eboard').trigger('click');
			$('#content li#23').trigger('click');
		});
	</script>
</html>