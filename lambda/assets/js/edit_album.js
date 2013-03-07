
$(document).ready(function(){	

	var base_url ="http://lalambdas.com/index.php/edit_album/";
	$("#add_album #date").datepicker({ dateFormat: 'yy-mm-dd' });
	$("#edit_album #edit_date").datepicker({ dateFormat: 'yy-mm-dd' });
	
		
	
	$('#add_album #submit').live("click", function(){

        var name    = $('#add_album #name').val();
        var date    = $('#add_album #date').val();
        var type=-1;
        
        if($("#add_album #type option:selected").val() =="public")
        	type = 0;
        else if($("#add_album #type option:selected").val() =="private")
        	type = 1;
        	
		$.post(base_url+"album_add", 
        {name:name, date:date ,type: type}, 
        function(data) {
			
			data = JSON.parse(data);
			alert(data.MSG);
  			if(data.MSG=="Album Added"){
  				$('#add_album #name').val("");
				$('#add_album #date').val("");
				
				//refresh album list
  				$('#album #album_list').load(base_url+"ajax");
  				$('#edit_album #album_list').load(base_url+"ajax");
  				$('#del_album #album_list').load(base_url+"ajax");
  				$('#album_photos #album_list').load(base_url+"ajax");
        	}
        });

 		return false;
    });
    
    $('#del_album #submit').live("click", function(){
    	var albumID = $("#del_album #album_list option:selected").attr('id');
    	
    	$.post(base_url+"album_del", 
        {paid:albumID}, 
        function(data) {
			
			data = JSON.parse(data);
			alert(data.MSG);
  			if(data.MSG=="Album Deleted"){
  				//refresh album list
  				$('#album #album_list').load(base_url+"ajax");
  				$('#edit_album #album_list').load(base_url+"ajax");
  				$('#del_album #album_list').load(base_url+"ajax");
  				$('#album_photos #album_list').load(base_url+"ajax");
  				
  				//clear photo_list if the album is currently open
  				if($('#album_photos #photos').attr('class')==albumID){
  					$('#album_photos #photos').html("");
  				}

        	}
        });
        return false;
    });
    
     $('#album_photos #submit').live("click", function(){
    	var albumID = $("#album_photos #album_list option:selected").attr('id');

    	$('#album_photos #photos').html("").load(base_url+'get_album_photos/'+albumID)
    							.removeClass().addClass(albumID);	    	
    
        return false;
    });
	
	
	$("#album_photos #photos .photo_wrap").live({
		
		
		mouseover: function(){
			$(this).find('.delete').show();
		},
		mouseout: function(){
			$(this).find('.delete').hide();
		}
	});
	
	$('#album_photos #photos .photo_wrap img.delete').live({
		click: function(){
			var pid = $(this).parent().attr('id');
			$.post(base_url+"photo_del", 
		        {pid:pid}, 
		        function(data) {
					
					data = JSON.parse(data);
					alert(data.MSG);
					//remove image
					

					$("#album_photos #photos #"+pid).fadeTo(600, 0, function() {$(this).remove();});
		        });
		},
		mouseover: function(){
			$(this).parent().fadeTo('fast',0.6);
		},
		mouseout: function(){
			$(this).parent().fadeTo('fast',1);
		}
	});
	
	$('#album_photos #photos .photo_wrap #submit').live("click", function(){

		var name    = $(this).parent().find(".photo_name").val();
		var pid = $(this).parent().parent().attr('id');
		
		$.post(base_url+"photo_rename", 
        {pid:pid,name:name}, 
        function(data) {
			data = JSON.parse(data);
			alert(data.MSG);
			if(data.MSG=="Photo Renamed"){
				var albumID = $("#album #album_list option:selected").attr('id');
  				$('#album_photos #photos').html("").load(base_url+'get_album_photos/'+albumID);
        	}
        });
		return false;
	});
	
	//Edit Album Script
	
	$('#edit_album #get_update').live("click", function(){
		var albumID = $("#edit_album #album_list option:selected").attr('id');
		
		$('#edit_album #submit').removeClass();

		$.post(base_url+"get_album_edit", 
        {paid:albumID}, 
        function(data) {
    
			data = JSON.parse(data);
        	$('#edit_album #name').val(data.NAME);
			$('#edit_album #edit_date').val(data.DATE);
			
			if(data.PRIVATE==0)
				$('#edit_album #type').val('public');
			else if(data.PRIVATE==1)
				$('#edit_album #type').val('private');
			//save paid as class name 
			$('#edit_album #submit').addClass('id_got');
			$('#edit_album #paid span').html(data.PAID);
        });
		
		return false;
	});
	
	$('#edit_album #submit').live("click", function(){
		if($(this).hasClass('id_got')){
	        var name    = $('#edit_album #name').val();
	        var date    = $('#edit_album #edit_date').val();
	        var type=-1;
	        
	        if($("#edit_album #type option:selected").val() =="public")
	        	type = 0;
	        else if($("#edit_album #type option:selected").val() =="private")
	        	type = 1;
	        albumID = $('#edit_album #paid span').html();
	        
			$.post(base_url+"album_edit", 
	        {paid: albumID, name:name, date:date,type: type}, 
	        function(data) {
	        
				data = JSON.parse(data);
				alert(data.MSG);
	  			if(data.MSG=="Album Updated"){
	  				$('#edit_album #name').val("");
					$('#edit_album #edit_date').val("");
					
					//refresh album list
	  				$('#album #album_list').load(base_url+"ajax");
	  				$('#edit_album #album_list').load(base_url+"ajax");
	  				$('#del_album #album_list').load(base_url+"ajax");
	  				$('#album_photos #album_list').load(base_url+"ajax");
	  				
	  				//remove class
	  				$('#edit_album #submit').removeClass();
	  				$('#edit_album #paid span').html("");
	        	}
	        });
		}else{
			alert("Haven't selected an album");
		}

 		return false;
    });

	


});
	