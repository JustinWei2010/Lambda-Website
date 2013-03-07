$(function() {
	var form_mode = "ADD";
	var nid;
	var base_url ="http://lalambdas.com/index.php/edit_news/";
	
	$("#date" ).datepicker({ dateFormat: 'yy-mm-dd' });
	$("#show_add_news").click(function(){
		if(!$("#add_news").hasClass('open')){
			$("#add_news").animate({top:0},200).addClass('open');
			$("#space").animate({height:570},200);
			$("#show_add_news").html("CLOSE");
		}else{
			$("#add_news").animate({top:-571},200).removeClass('open');
			$("#space").animate({height:0},200);
			$("#show_add_news").html(form_mode);
		}
	
	});
	

	$('#submit').live("click", function(){
 		tinyMCE.triggerSave();
        var title    = $('#add_news #title').val();
        var date     = $('#add_news #date').val();
        var location = $('#add_news #location').val();
        var content  = $('#add_news #news_content_text').val();
		
		if(form_mode =="ADD"){
			$.post(base_url+"add", 
	        {title:title, date:date, location:location, content:content}, 
	        function(data) {
				data = JSON.parse(data)
				alert(data.MSG);
	  			if(data.MSG=="News Added"){
	  				clear_form();
	  				alert(base_url+"ajax");
	  				$('#contents').load(base_url+"ajax");
	  				$('#show_add_news').trigger('click');
	        	}
	        });
        }else if(form_mode=="UPDATE"){
        	$.post(base_url+"update", 
	        {nid:nid,title:title, date:date, location:location, content:content}, 
	        function(data) {
				data = JSON.parse(data)
				alert(data.MSG);
	  			if(data.MSG=="News Updated"){
	  				clear_form();
	  				$('#contents').load(base_url+"ajax");
	  				change_mode();
	  				$('#show_add_news').trigger('click');
	        	}
	        });
        }
 		return false;
    });
    
    $('.hentry .entry-meta .remove').live("click", function(){
    	//get news id
        nid = $(this).parent().parent().attr('id');
		//alert(nid);
    	//delete the news
        $.post(base_url+"delete", 
        {nid:nid}, 
        function(data) {
			data = JSON.parse(data);
			alert(data.MSG);
			$('#contents').load(base_url+"ajax");
        });

    });
    
    $('.edit').live("click", function(){
    	//get news values
        nid = $(this).parent().parent().attr('id');
    	var date = $(this).parent().find(".date").html();
    	var location = $(this).parent().find(".location").html();
    	var title = $(this).parent().parent().find(".main").find(".entry-title").html();
    	var content = $(this).parent().parent().find(".main").find(".entry-content").html();
    	    	
    	//set form values
    	$('#add_news #title').val(title);
      	$('#add_news #date').val(date);
        $('#add_news #location').val(location);
        tinyMCE.getInstanceById('news_content_text').setContent(content);
        
        if($("#show_add_news").html()!="CLOSE")
       		$("#show_add_news").trigger('click');
       		
       	//change to updating mode
       	if(form_mode=="ADD"){
       		change_mode();
       		$('#switch_mode').show();
       	}


    });
    
    $('#switch_mode').live("click", function(){
    	clear_form();
    	change_mode();
	});    	
    
	var change_mode = function(){   
     	if(form_mode=="ADD"){
     		if($("#show_add_news").html()!="CLOSE")
     			$("#show_add_news").html("UPDATE");
        	$("#submit").val("update");
       		form_mode="UPDATE";
     	}else if(form_mode=="UPDATE"){
     		if($("#show_add_news").html()!="CLOSE")
     			$("#show_add_news").html("ADD");
        	$("#submit").val("Create news item");
       		form_mode="ADD";
       		 $('#switch_mode').hide();
     	}
     };

   	var clear_form = function(){
   		//clear form content
		$('#add_news #title').val("");
		$('#add_news #date').val("");
		$('#add_news #location').val("");
		tinyMCE.getInstanceById('news_content_text').setContent('');
   	}	
	
	
});

tinyMCE.init({
	// General options
	mode : "textareas",
	theme : "advanced",
	plugins : "preview,media,paste,wordcount",

	// Theme options
	theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
	theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor|,media",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_statusbar_location : "bottom",
	theme_advanced_resizing : true,
	media_strict: false,

	// Example content CSS (should be your site CSS)
	content_css : "css/content.css",

	// Drop lists for link/image/media/template dialogs
	template_external_list_url : "lists/template_list.js",
	external_link_list_url : "lists/link_list.js",
	external_image_list_url : "lists/image_list.js",


	// Style formats
	style_formats : [
		{title : 'Bold text', inline : 'b'},
		{title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
		{title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
		{title : 'Example 1', inline : 'span', classes : 'example1'},
		{title : 'Example 2', inline : 'span', classes : 'example2'},
		{title : 'Table styles'},
		{title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
	],
	//valid_elements : "-p"
});
