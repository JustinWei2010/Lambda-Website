<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LaLambdas Photos Upload</title>

<!--Uploadify!-->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/scripts/uploadify/uploadify.css" />
<script type="text/javascript" language="javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/scripts/jquery-1.6.2.min.js"></script> 
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>assets/scripts/uploadify/jquery.uploadify.v2.1.4.min.js"></script>

<!--Date!-->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/scripts/jquery-ui/ui-darkness/jquery.ui.all.css">
<script src="<?php echo base_url(); ?>assets/scripts/jquery-ui/ui/jquery.ui.core.js"></script>
<script src="<?php echo base_url(); ?>assets/scripts/jquery-ui/ui/jquery.ui.widget.js"></script>
<script src="<?php echo base_url(); ?>assets/scripts/jquery-ui/ui/jquery.ui.datepicker.js"></script>

<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/edit_album.js"></script>	
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/edit_album.css" />

<script type="text/javascript">
$(document).ready(function(){	
	var base_url ="http://lalambdas.com/index.php/edit_album/";
	$("#upload").uploadify({
				uploader:  '<?php echo base_url();?>assets/scripts/uploadify/uploadify.swf',
				script:    '<?php echo base_url();?>assets/scripts/uploadify/uploadify.php',
				cancelImg: '<?php echo base_url();?>assets/scripts/uploadify/cancel.png',
				folder: '<?php echo PHOTO_FOLDER_PATH;?>',
				sizeLimit   : 1524000,
				queueID: 'uploadQueue',
				scriptAccess: 'always',
				fileDesc	 : 'Web Image Files (.JPG, .GIF, .PNG)',
				fileExt	 : '*.jpeg;*.jpg;*.gif;*.png',
				multi: true,
				
				'onError' : function (a, b, c, d) {
					 if (d.status == 404)
						alert('Could not find upload script.');
					 else if (d.type === "HTTP")
						alert('error '+d.type+": "+d.status);
					 else if (d.type ==="File Size")
						alert(c.name+' '+d.type+' Limit: '+Math.round(d.sizeLimit/1024)+'KB');
					 else
						alert('error '+d.type+": "+d.text);
					},
				
				'onComplete'   : function (event, queueID, fileObj, response, data) {
					//Post response back to controller
					var albumID = $("#album #album_list option:selected").attr('id');
					$.post(base_url+'add_photos',{filearray: response, albumID:albumID},function(info){
						$("#target").append(info);  //Add response returned by controller	
	
						if($('#album_photos #photos').attr('class')==albumID){
	  						$('#album_photos #photos').html("").load(base_url+'get_album_photos/'+albumID);
	  					}											
							
					});								 			
				}
		});		
});

</script>
	
	
</head>

<body>
	<div id="add_album">
		<h3>Add New Album</h3>
		<?php echo form_open('admin/edit_album/add_album') ?>
			<label for="name">Title: </label> 
			<input type="input" id="name" size ="12" name="name" />
			<label for="date">Date: </label>
			<input type="input" id="date" size ="13" name="date"/>
			
			<label for="type">type: </label>
			<select id="type">
				<option val="public">public</option>
				<option val="private">private</option>
			</select>
			<br>
			<input type="submit" id="submit"  name="submit" value="Create album" /> 
		</form>
	</div>
	
	<div id="edit_album">
		<h3>Edit Album: </h3>
		<select id="album_list">
			<?php $this->load->view('admin/edit/album/album_list') ?>
		</select>
		<input type="submit" id="get_update"  name="get_update" value="Get" /> 
		<div id="paid">paid: <span></span></div>
		<?php echo form_open('edit_album/album_edit') ?>
			<label for="name">Title: </label> 
			<input type="input" id="name" size ="12" name="name" />
			<label for="date">Date: </label>
			<input type="input" id="edit_date" size ="13" name="edit_date"/>
			
			<label for="type">type: </label>
			<select id="type">
				<option val="public">public</option>
				<option val="private">private</option>
			</select>
			
			<br>
			<input type="submit" id="submit"  name="submit" value="Update" /> 
		</form>
	</div>
	
	<div id="del_album">
		<h3>Delete Album</h3>
		<p>warning: All the album photos will also be deleted!</p>
		<select id="album_list">
			<?php $this->load->view('admin/edit/album/album_list') ?>
		</select>
		<input type="submit" id="submit"  name="submit" value="Delete album" /> 
	</div>
	
	<div id="album_photos">
		<h3>Album:</h3>
		<select id="album_list">
			<?php $this->load->view('admin/edit/album/album_list') ?>
		</select>
		<input type="submit" id="submit"  name="submit" value="Show photos" /> 
		<div id="photos">
			
		</div>
		
	</div>

	
	<div id="container">
		<h1>LALAMBDAS PHOTO UPLOAD</h1>
		<div id="album">
			<h3>Add to album: </h3>
			<select id="album_list">
				<?php $this->load->view('admin/edit/album/album_list') ?>
			</select>
		</div>
		<?php echo form_open_multipart('edit_album/index');?>
	    	
		    <p>
		    	<div id="uploadQueue"></div>
		    	<label for="Filedata">Choose a File</label><br/>
		        <?php echo form_upload(array('name' => 'Filedata', 'id' => 'upload'));?>
		        <p><a href="javascript:$('#upload').uploadifyUpload();">Upload File(s)</a></p>
		        <!--<p><a href="javascript:$('#upload').uploadifyClearQueue();">Clear Queue</a></p>!-->
		    </p>
	    
	    
	    <?php echo form_close();?>	    
		<div id="target">
		
		</div>
	</div>
	<?php
		$server = $_SERVER['DOCUMENT_ROOT'];
		$src = "/f5/lalambdas/public/new/photos/papawalk15.jpg";
		$s = str_replace($server,"/",$src);
		
	?>
		
</body>
</html>