<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
<html xml:lang="en-us" xmlns="http://www.w3.org/1999/xhtml">  

<head>  
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
	<title>Event List</title>
	
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/scripts/jquery-1.6.2.min.js"></script> 
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/edit_events.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/scripts/jquery-ui/ui-darkness/jquery.ui.all.css">
	
	<script src="<?php echo base_url(); ?>assets/scripts/jquery-ui/ui/jquery-ui-1.8.16.custom.js"></script>
	<script src="<?php echo base_url(); ?>assets/scripts/jquery-ui/ui/jquery-ui-timepicker-addon.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/scripts/easing.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/private_header.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/edit_events.js"></script> 
	
</head>

<body>
	<?php $this->load->view('template/private_header') ?>
	<?php $this->load->view('template/background') ?>
	<div id="add_event">
		<!--<?php echo validation_errors('<p class="error">'); ?>-->
		<label for="event">Event Name: </label> 
		<input type="input" id="event" name="event" />
	
		<label for="date">Date</label>
		<input type="input" id="date" name="date" />
	
		<label for="start">Start Time</label>
		<input type="input" id="start" name="start" />
	
		<label for="end">End Time</label>
		<input type="input" id="end" name="end" />
	
		<label for="location">Location</label>
		<input type="input" id ="location" name="location" />
		<input type="submit" id="submit"  name="submit" value="Add Event" /> 
	</div>
	
	<div id="container">
		<div id="main_wrapper">
			<?php $this->load->view('admin/edit/events/event_list') ?>
		</div>
	</div>
	
	<?php $this->load->view('template/footer') ?>
</body>

</html>
