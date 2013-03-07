<div id="event_wrapper">
	<div id="title">
		<h1>Event List</h1>
			<h2>Type of events</h2>
	</div>

	<table id="main_content">
		<tr>
			<th class="Name">Name</th>
			<th class="Date">Date</th>
			<th class="Start">Start Time</th>
			<th class="End">End Time</th>
			<th class="Place">Place</th>
		</tr>
		
		<?php foreach ($events as $event): ?>
		<tr id="<?=$event['EID']?>">
			<td class="entry-meta Name"><?= $event['NAME'] ?></td>
			<td class="entry-meta Date"><?= $event['DATE'] ?></td>
			<td class="entry-meta Start"><?= $event['START'] ?></td>
			<td class="entry-meta End"><?= $event['END'] ?></td>
			<td class="entry-meta Place"><?= $event['PLACE'] ?></td>
			
			<td class="form-meta Name"><input type="input" id="temp_event" name="event" value="<?= $event['NAME'] ?>"></td>
			<td class="form-meta Date"><input type="input" id="temp_date" name="date" value="<?= $event['DATE'] ?>"></td>
			<td class="form-meta Start"><input type="input" id="temp_start" name="start" value="<?= $event['START'] ?>"></td>
			<td class="form-meta End"><input type="input" id="temp_end" name="end" value="<?= $event['END'] ?>"></td>
			<td class="form-meta Place"><input type="input" id="temp_location" name="location" value="<?= $event['PLACE'] ?>"></td>
			
			<td class="Edit"><option>Edit</option></td>
			<td class="Attendance"><option>Attendance</option></td>
			<td class="Remove"><option>Delete</option></td>
		</tr>
		<?php endforeach ?>
	</table>
</div>

<div id="side_wrapper">
	<div id="add_button">
		<p>Add Event</p>
	</div>
</div>