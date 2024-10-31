// jQuery Document
jQuery(document).ready(function(){
	//If user submits the form
	jQuery("#submitmsg").click(function(){	
		var clientmsg = jQuery("#usermsg").val();
		jQuery.post("<?php echo 'WP_PLUGIN_URL . /pari-passu-video-streaming/chat/post.php'; ?>", {text: clientmsg});				
		jQuery("#usermsg").attr("value", "");
		return false;
	});
	
	//Load the file containing the chat log
	function loadLog(){		
		var oldscrollHeight = jQuery("#chatbox").attr("scrollHeight") - 20;
		jQuery.ajax({
			url: "logs/log.html",
			cache: false,
			success: function(html){		
				jQuery("#chatbox").html(html); //Insert chat log into the #chatbox div				
				var newscrollHeight = jQuery("#chatbox").attr("scrollHeight") - 20;
				if(newscrollHeight > oldscrollHeight){
					jQuery("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal'); //Autoscroll to bottom of div
				}				
		  	},
		});
	}
	setInterval (loadLog, 2500);	//Reload file every 2.5 seconds
	
	//If user wants to end session
	jQuery("#exit").click(function(){
	var exit = confirm("Você tem certeza que deseja sair?");
	if(exit==true){
		window.location = '&logout=true';
	}
	});
});
