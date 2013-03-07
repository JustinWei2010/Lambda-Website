<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">  
<html xml:lang="en-us" xmlns="http://www.w3.org/1999/xhtml">  

<head>  
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
	<title>Attendance</title>
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/attendance.css" />
	
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/scripts/jquery-1.6.2.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/attendance.js"></script> 
	
	
</head>

<body>
	<div id="main_wrapper">
		<h1>Attendance</h1>
	
		<table id="attendance">
			<tr id="title"> 
				<th class="Class">Class</th>
				<th class="Name">Name</th>
			</tr>
			
			
			<?php foreach($attendance as $brother):?>
			<tr id="<?=$brother['UID'] . "/" .$brother['STATUS']?>">
				<td class="Class"><?=$brother['CLASS']?></td>
				<td class="Name"><?=$brother['FIRST_NAME'] . " " . $brother['LAST_NAME']?></td>
				
				<td><input type="radio" name="<?="role_state" . $brother['UID']?>" value="present"><label>Present</label></td>
				<td><input type="radio" name="<?="role_state" . $brother['UID']?>" value="tardy"><label>Tardy</label></td>
				<td><input type="radio" name="<?="role_state" . $brother['UID']?>" value="excused"><label>Excused</label></td>
				<td><input type="radio" name="<?="role_state" . $brother['UID']?>" value="absent"><label>Absent</label></td>
			</tr>
			<?php endforeach ?>
		</table>
	</div>
</body>

</html>
