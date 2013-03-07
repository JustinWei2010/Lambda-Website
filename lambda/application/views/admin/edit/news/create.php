<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Create a news item</title>
	
	<!-- TinyMCE -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/scripts/tiny_mce/tiny_mce.js"></script>  
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/scripts/jquery-1.6.2.min.js"></script> 
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/scripts/jquery-ui/ui-darkness/jquery.ui.all.css">

	
	<script src="<?php echo base_url(); ?>assets/scripts/jquery-ui/ui/jquery.ui.core.js"></script>
	<script src="<?php echo base_url(); ?>assets/scripts/jquery-ui/ui/jquery.ui.widget.js"></script>
	<script src="<?php echo base_url(); ?>assets/scripts/jquery-ui/ui/jquery.ui.datepicker.js"></script>


	<script>
		$(function() {
			$( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
		});
	</script>

	<script type="text/javascript">
		tinyMCE.init({
			// General options
			mode : "textareas",
			theme : "advanced",
			plugins : "preview,media,paste,wordcount",
	
			// Theme options
			theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
			theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor|,media",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_resizing : true,
			media_strict: false,
	
			// Example content CSS (should be your site CSS)
			content_css : "css/content.css",
	
			// Drop lists for link/image/media/template dialogs
			template_external_list_url : "lists/template_list.js",
			external_link_list_url : "lists/link_list.js",
			external_image_list_url : "lists/image_list.js",
	
	
			// Style formats
			style_formats : [
				{title : 'Bold text', inline : 'b'},
				{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
				{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
				{title : 'Example 1', inline : 'span', classes : 'example1'},
				{title : 'Example 2', inline : 'span', classes : 'example2'},
				{title : 'Table styles'},
				{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
			],
	
			// Replace values for the template plugin
			template_replace_values : {
				username : "Some User",
				staffid : "991234"
			}
		});

	</script>
	<!-- /TinyMCE -->
	
	<style>
		*{
			
			padding: 0; 
			text-align: center;
		}
		label{
			margin: 10px 0;
		}
		#news_content {
		    display: block;
		    margin: 0 auto;
		    width: 700px;  
		}

	</style>
</head>

<body>
	<h2>Create a news item</h2>
	
	<?php echo validation_errors(); ?>

		
	<?php echo form_open('news/create') ?>
	
		<label for="title">Title</label> <br />
		<input type="input" name="title" /><br />
		
		<label for="date">Date(YYYY-MM-DD)</label><br />
		<input type="input" name="date" id="datepicker"/><br />
		
		<label for="location">Location</label><br />
		<input type="input" name="location" /><br />
		

		<div id="news_content">
			<textarea id="content" name="content" rows="50" cols="80"></textarea><br />
		</div>
		<input type="submit" name="submit" value="Create news item" /> 
	
	</form>

</body>

</html>