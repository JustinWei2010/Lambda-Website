<div id = 'home'>
	<form action ="" method ='GET'>
		<input type="hidden" name="view" value="<?php echo $current_mode;?>" />
		<div class = 'home_btns_col'>
			<?php
				foreach($options as $option) {
					echo "<input type='submit' name='controller' value='{$option}'/>";
				}
			?>
		</div>
	</form>
	<br/><br/>
	
	<div class = 'home_select'>
		<form action='?module=report' method='POST' target='_blank'>
			Reports: 
			<select name='report_name'>
				<?php
					foreach ($reports as $report) {
						echo "<option value='{$report}'>{$report}</option>";
					}
				?>	
			</select>
			<input type='submit' class='search_button' name='submit_select_report' value='Select'/>
		</form>
	</div>
</div>

<div id = 'users'>
	<form action='' method='GET'>
		<input type="hidden" name="controller" value="login" />
		<?php
			$modes  = array('view', 'input', 'admin');
			foreach ($modes as $mode) {
				$disabled_txt = '';
				if($mode== $current_mode)
				{
					$disabled_txt = 'disabled';
				}
				echo "<input type='submit' name='mode' value='{$mode}' {$disabled_txt}/><br/>";
			}
		?>
		<input type='submit' name='method' value='logout'/>
	</form>
</div>

<div style = 'clear:both;'></div>


