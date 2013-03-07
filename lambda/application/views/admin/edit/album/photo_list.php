<?php
	$img_folder = PHOTO_FOLDER_PATH;
	//$img_folder ="/test_upload/";
	//print_r($album_pics);
    if(!empty($album_pics)){ 
?>
    
	<?php foreach ($album_pics as $a): ?>
		<div class="photo_wrap" id="<?php echo $a['PID'];?>">
		<?php
			$path =$a['PATH'];
			$ext = "." . pathinfo($path, PATHINFO_EXTENSION);
			$thumb = str_replace($ext, "_thumb".$ext ,$path);
		?>
			<img class="photo" src ="<?php echo $img_folder. $thumb;?>"/>
		
			
			<?php echo form_open('edit_album/photo_rename') ?>
				<label for="name">Name: </label> 
				<input type="input" class="photo_name" size ="13" name="name" value ="<?php echo $a['PNAME'];?>" />
				<br>
				<input type="submit" id="submit"  name="submit" value="rename" /> 
			</form>
			<img class="delete" src="<?php echo base_url(); ?>assets/img/edit/close.png"/>

		</div>

	<?php endforeach ?>


<?php }else{
	echo "<p>empty album, no pictures</p>";
}
?>