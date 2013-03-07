$(function() {
	var eid;
	var base_url ="http://localhost/lambda/edit_events/";
	var edit_trigger = false;
	var eid = -1;
	
	$('.form-meta').hide();
	$('#date').datepicker({ dateFormat: 'yy-mm-dd' });
	$('#start').timepicker({ampm:true});
	$('#end').timepicker({ampm:true});
	
	$(document).keyup(function(e) {
		if(edit_trigger)
		{
			//escape
			if(e.keyCode==27)
			{
				$('#'+eid).find('.form-meta').hide();
				$('#'+eid).find('.entry-meta').show();
				edit_trigger = false;
				eid = -1;
				
				//clear edit form
				$('#main_wrapper').load(base_url+"ajax", function(){
					$('.form-meta').hide();
				});
			}
			//return
			else if(e.keyCode==13)
			{
				var event = $('#'+eid).find('#temp_event').val();
				var date  = $('#'+eid).find('#temp_date').val();
				var start = $('#'+eid).find('#temp_start').val();
				var end  = $('#'+eid).find('#temp_end').val();
				var location = $('#'+eid).find('#temp_location').val();
				
				//alert(event + date + start + end + location);
				
				$.post(base_url+"edit", 
				{eid:eid, event:event, date:date, start:start, end:end, location:location}, 
				function(data) {
					data = JSON.parse(data);
					if(data.MSG=="Event Edited")
					{
						clear_form();
						//alert(base_url+"ajax");
						$('#main_wrapper').load(base_url+"ajax", function(){
						$('.form-meta').hide();
						});
						edit_trigger = false;
						eid = -1;
					}
					else
					{
						alert(data.MSG);
					}
				});
			}
		}
	});
	
	$('.Edit').live('click', function(e){
		if(!edit_trigger)
		{
			$(this).parent().find('.entry-meta').hide();
			$(this).parent().find('.form-meta').show();
			$(this).parent().find('#temp_date').datepicker({ dateFormat: 'yy-mm-dd' });
			$(this).parent().find('#temp_start').timepicker({ampm:true});
			$(this).parent().find('#temp_end').timepicker({ampm:true});
			edit_trigger = true;
			eid = $(this).parent().attr('id');
		}
		return false;
	});	
	
	$('#submit').live('click', function(){
		var event = $('#add_event #event').val();
        var date  = $('#add_event #date').val();
        var start = $('#add_event #start').val();
        var end  = $('#add_event #end').val();
		var location = $('#add_event #location').val();
		
		$.post(base_url+"add", 
	    {event:event, date:date, start:start, end:end, location:location}, 
	    function(data) 
		{
			data = JSON.parse(data);
	  		if(data.MSG=="Event Added")
			{
	  			clear_form();
	  			//alert(base_url+"ajax");
	  			$('#main_wrapper').load(base_url+"ajax", function(){
					$('.form-meta').hide();
				});
	        }
			else
			{
				alert(data.MSG);
			}
	    });
	});
	
	$('.Remove').live('click', function(){
		var answer = confirm('Do you really want to delete object.');
		if(answer)
		{
			eid = $(this).parent().attr('id');
			$.post(base_url+'delete', 
			{eid:eid},        
			function(data) {
				data = JSON.parse(data);
				$('#main_wrapper').load(base_url+"ajax", function(){
					$('.form-meta').hide();
				});
			});
		}
	});
	
	$('#add_button').live('click', function(){
		
	});
	
	$('.Attendance').live('click', function(){
		eid = $(this).parent().attr('id');
		window.location = base_url+'attendance'+'/' +eid;
	});
	
	//clear form content
	var clear_form = function(){
		$('#add_event #event').val("");
        $('#add_event #date').val("");
        $('#add_event #start').val("");
        $('#add_event #end').val("");
		$('#add_event #location').val("");
   	}	
	
});