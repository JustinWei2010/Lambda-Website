<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title><?php echo $title; ?></title>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css" title = "main" />
	
	<link rel="shortcut icon" href="./favicon.ico" type="image/x-icon" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	
</head>


<body id = ''>
		
		<div id = 'all_wrap'>
		<div id = 'header'>
			<h1><a href = '?module=home'>Egyptology Field Database</a></h1>
		</div>
	
		<div id = 'main'>
			<div id = 'content'>

<!--- BEGIN CONTENT -->
<div id = 'login'>
<h3><?php echo ucfirst($mode); ?> Mode</h3>
<form  action="?controller=login&method=validate&mode=<?php echo $mode; ?>" method="POST">
	Password: <input type="password" name="password" />
	<input type="submit" name="login" value="Login" />
</form>	
</div>
<!--- END CONTENT -->

			</div> <!-- End content div -->
		</div> <!-- end main div -->
	</div> <!--end all wrap div -->

</body>
</html>