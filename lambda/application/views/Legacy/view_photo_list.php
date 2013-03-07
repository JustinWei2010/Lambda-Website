<?php 
	
	$img_folder = PHOTO_FOLDER_PATH;
	$num = count($photos);
	
?>

<div id="number_photos"> (<?php echo $num;?>)</div>


<?php foreach ($photos as $p): ?>

<?php
	$path =$p['PATH'];
	$ext = "." . pathinfo($path, PATHINFO_EXTENSION);
	$thumb = str_replace($ext, "_thumb".$ext ,$path);
?>

	<a class="photo_fancybox" id=<?=$p['PID']?> href="<?php echo $img_folder .$path;?>" data-fancybox-group="gallery">
		<img class ="thumbs" src="<?php echo $img_folder .$thumb;?>"alt="" />
	</a>
	
<?php endforeach ?>
