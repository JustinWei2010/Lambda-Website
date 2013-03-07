<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
<html xml:lang="en-us" xmlns="http://www.w3.org/1999/xhtml">  
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/login.css" />
</head>
<body>
	<div id=login_form>
		<h1>Active Login</h1>
		<?php echo validation_errors('<p class="error">'); ?>
		<?php 
			echo form_open('verifylogin'); 
			echo form_input('username', set_value('username', 'Username'));
			echo form_password('password', set_value('password', 'Password'));
			echo form_submit('submit', 'Login');
		?>
	</div>
</body>
</html>
