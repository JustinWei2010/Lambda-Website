$(function() {
	var base_url ="http://localhost/lambda/edit_events/";
	
	//THE tr id tag will have undefined behavior if accessing status if the status is changed on page
	$('tr').each(function(){
		if($(this).attr('id') != 'title')
		{
			var temp = $(this).attr('id').split('/'); 
			var uid = temp[0];
			var status = temp[1];
			
			if(status == '1')
			{
				$('input:radio[name=role_state' + uid + ']:nth(0)').attr('checked', true);
			}
			else if(status == '2')
			{
				$('input:radio[name=role_state' + uid + ']:nth(1)').attr('checked', true);
			}
			else if(status == '3')
			{
				$('input:radio[name=role_state' + uid + ']:nth(2)').attr('checked', true);
			}
			else if(status == '4')
			{
				$('input:radio[name=role_state' + uid + ']:nth(3)').attr('checked', true);
			}
		}
	});
	
	$(':radio').change(function(){
		var temp1 = $(this).attr('name');
		var uid = temp1.substring(10);
		var temp2 = window.location.pathname;
		var eid = temp2.substring(31);
		var name = $(this).val();
		var status;
		
		if(name == 'present')
		{
			status = 1;
		}
		else if(name == 'tardy')
		{
			status = 2;
		}
		else if(name == 'excused')
		{
			status = 3;
		}
		else if(name == 'absent')
		{
			status = 4;
		}
		
		$.post(base_url+'edit_attendance', 
		{eid:eid, uid:uid, status:status},        
		function() {
			//alert("status changed");
		});
	});
});