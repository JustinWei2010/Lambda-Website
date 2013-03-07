<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title><?php echo $title; ?></title>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css" title = "main" />

	<link rel="shortcut icon" href="./favicon.ico" type="image/x-icon" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
</head>

<body id = '<?php echo $current_mode;?>'>
	<!-- Navigation Bar !-->
	<div id = 'navbar'>
		<h1><img src = './favicon.ico' alt="" /><a href = '?module=home'>fayum</a></h1>
		<h2>Egyptology Field Database Mode &#187; <?php echo ucwords($current_page); ?> </h2>
		<ul>
			<?php

			foreach ($links as $link) {
				if ($current_page == strtolower($link))
					echo '<li class = "current">'.ucwords($link).'</li>';
				else {
					echo "<li><a href = '?controller={$link}&method={$current_mode}'>".ucwords($link)."</a></li>";
				}
			}
			?>
			<li>|</li>
			<?php
			$user_arr = array('view', 'input', 'admin');
			foreach ($user_arr as $user) {
				if($user == $current_mode)
					echo '<li class = "current">'.ucwords($user).'</li>';
				else
					echo "<li><a href = '?controller=login&mode={$user}'>".ucwords($user)."</a></li>";
			}
			?>
			<li>|</li>
			<li><a href='?module=support'>Tech Support</a></li>
			<li><a href='?module=network'>Network Info</a></li>
			
		</ul>
		<div style='clear:both;'></div>
	</div>

	
	<?php
	//$large_size_mods = array('units', 'finds', 'images', 'gps', 'report', 'vtable');
	//if (in_array($_GET['module'],$large_size_mods)) // if the module requires larger size canvas for displaying
	//		$all_wrap_append = '_large';
	?>
	<div id = 'all_wrap<?php echo $all_wrap_append;?>'>
		<div id = 'header'>
			<h1><a href = '?module=home'>Egyptology Field Database</a></h1>
		</div>
	
		<div id = 'main'>
			<div id = 'content'>

<!--- BEGIN CONTENT -->