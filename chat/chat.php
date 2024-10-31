<?php

session_start();

if($_POST['chatuser']) {

	$_SESSION['name'] = $_POST['chatuser'];
	$WP_PLUGIN_URL = $_POST['pluginurl'];
	$chat_name = $_POST['chatname'];
	$date_display = $_POST['datedisplay'];

} else {

	$WP_PLUGIN_URL = WP_PLUGIN_URL;

}

?>

<div id="menu">
	<?php if(isset($_SESSION['name'])) { ?>

		<p class="welcome">Bem-vindo, <b><?php echo $_SESSION['name'] ?></b></p>

	<?php } else { ?>

		<p class="welcome">Insira seu nome e participe do chat!</p>

	<?php } ?>
	<div style="clear:both"></div>
</div>
<div id="chatbox">

	<?php

	if(file_exists("logs/$chat_name.htm") && filesize("logs/$chat_name.htm") > 0) {

		$handle = fopen("logs/$chat_name.htm", "r");
		$contents = fread($handle, filesize("logs/$chat_name.htm"));
		fclose($handle);

		echo $contents;
	}

	?>
</div>

<?php if(isset($_SESSION['name'])) { ?>

	<form name="message" action="">
		<input name="chatname" type="hidden" id="chatname" value="<?php echo $chat_name; ?>" />
		<input name="usermsg" type="text" id="usermsg" size="63" />
		<input name="submitmsg" type="submit"  id="submitmsg" value="Enviar" />
	</form>

	<script type="text/javascript">

	jQuery(document).ready(function(){

		jQuery("#submitmsg").click(function(){	
			var clientmsg = jQuery("#usermsg").val();
			var chatname = jQuery("#chatname").val();
			jQuery.post("<?php echo $WP_PLUGIN_URL; ?>/pari-passu-video-streaming/chat/post.php", {text: clientmsg, chatname: chatname, datedisplay: "<?php echo $date_display; ?>" });
			jQuery("#usermsg").attr("value", "");
			return false;
		});

	});

	</script>

<?php } else { ?>

	<form action="" method="post" id="chatlogin">
		<label for="chatuser">Nome:</label>
		<input type="text" name="chatuser" id="chatuser" />
		<input type="hidden" name="chatname" id="chatname" value="<?php echo get_option('paripassu_chat_name'); ?>" />
		<input type="submit" name="enter" id="chatenter" value="Entrar" />
	</form>

	<script type="text/javascript">

	jQuery(document).ready(function(){

		jQuery("#chatenter").click(function(){
			var user = jQuery("#chatuser").val();
			var chatname = jQuery("#chatname").val();
			jQuery.post("<?php echo $WP_PLUGIN_URL; ?>/pari-passu-video-streaming/chat/chat.php", { chatuser: user, pluginurl: "<?php echo $WP_PLUGIN_URL; ?>", chatname: chatname, datedisplay: "<?php echo get_option('paripassu_chat_datedisplay'); ?>" }, 
				function(data) {
					jQuery("#paripassu_chat").html(data);
				}
			);
			return false;
		});
	});

	</script>

<?php } ?>

<script type="text/javascript">

jQuery(document).ready(function(){

	function loadLog(){
		var oldscrollHeight = jQuery("#chatbox").attr("scrollHeight") - 20;
		jQuery.ajax({
			url: "<?php echo $WP_PLUGIN_URL; ?>/pari-passu-video-streaming/chat/logs/<?php echo $chat_name; ?>.htm",
			cache: false,
			success: function(html){
				jQuery("#chatbox").html(html); //Insert chat log into the #chatbox div				
				var newscrollHeight = jQuery("#chatbox").attr("scrollHeight") - 20;
				if(newscrollHeight > oldscrollHeight){
					jQuery("#chatbox").animate({ scrollTop: newscrollHeight }, "normal"); //Autoscroll to bottom of div
				}
		  	},
		});
	}
	setInterval (loadLog, 2500);	//Reload file every 2.5 seconds

});

</script>
