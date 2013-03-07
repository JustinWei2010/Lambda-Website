<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
<html xml:lang="en-us" xmlns="http://www.w3.org/1999/xhtml">  
<head>  
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
	<title><?= $title ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/edit_news.css" />

<!-aa-!>
<!-- TinyMCE -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/scripts/tiny_mce/tiny_mce.js"></script>  
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/scripts/jquery-1.6.2.min.js"></script> 
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/scripts/jquery-ui/ui-darkness/jquery.ui.all.css">

	
	<script src="<?php echo base_url(); ?>assets/scripts/jquery-ui/ui/jquery.ui.core.js"></script>
	<script src="<?php echo base_url(); ?>assets/scripts/jquery-ui/ui/jquery.ui.widget.js"></script>
	<script src="<?php echo base_url(); ?>assets/scripts/jquery-ui/ui/jquery.ui.datepicker.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/edit_news.js"></script> 


</head>
<body>
<div id="add_news">
	
	<?php echo form_open('edit_news/add') ?>
		
		<label for="title">Title</label> 
		<input type="input" id="title" name="title" />
		
		<label for="date">Date(YYYY-MM-DD)</label>
		<input type="input" id="date" name="date"/>
		
		<label for="location">Location</label>
		<input type="input" id ="location" name="location" />
		</br></br>

		<div id="news_content">
			<textarea id="news_content_text" name="content" rows="35" cols="130"></textarea><br />
		</div>
		<input type="submit" id="submit"  name="submit" value="Create news item" /> 
		
		
	</form>
	<div id="show_add_news">ADD</div>
	<div id="switch_mode">Switch Mode</div>
</div>
<div id="space"></div>
<div id="container">
	
	<div id="contents">	

		<?php $this->load->view('admin/edit/news/edit_news_list') ?>
		
	</div>	
</div>
</body>

</html>