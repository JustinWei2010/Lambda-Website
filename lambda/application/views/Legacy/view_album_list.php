<?php 
	$img_folder = PHOTO_FOLDER_PATH;
	
?>

<?php foreach ($album as $a): ?>

<?php
	$path =$a['PATH'];
	$ext = "." . pathinfo($path, PATHINFO_EXTENSION);
	$thumb = str_replace($ext, "_thumb".$ext ,$path);
?>

	<div id ="<?php echo $a['PAID'];?>"class="album_wrapper">
		<h3 class="album_name">- <span><?php echo $a['NAME'];?></span> -</h3>
		<h3 class="album_date"><?php echo $a['DATE'];?></h3>
		<div class="album_img">
			<!--<img src="<?php //echo $img_folder.$a['PATH'];?>"/>!-->
			<a><img src="<?php echo $img_folder .$thumb;?>"/></a>
		</div>
	
	</div>
	
<?php endforeach ?>
