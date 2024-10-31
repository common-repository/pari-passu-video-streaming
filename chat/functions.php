<?php

wp_enqueue_script('thickbox',null,array('jquery'));
wp_enqueue_style('thickbox.css', '/'.WPINC.'/js/thickbox/thickbox.css', null, '1.0');

function paripassu_chat() {

	$chat_name = get_option('paripassu_chat_name');
	$date_display = get_option('paripassu_chat_datedisplay');
	$chat_width = get_option('paripassu_chat_width');
	$chat_height = get_option('paripassu_chat_height');
	$chat_height_box = $chat_height-80;
	$chat_width_input = $chat_width-60;
	$chat_width_submit = ($chat_width-$chat_width_input)-9;
	$chat_width_input_name = $chat_width_input-45;
	$chat_textcolor = get_option('paripassu_chat_textcolor');
	$chat_bgcolor = get_option('paripassu_chat_bgcolor');
	$chat_textbgcolor = get_option('paripassu_chat_textbgcolor');
	$chat_bordercolor = get_option('paripassu_chat_bordercolor');

	session_start();
	$retval = "";

	if(is_user_logged_in()) {

		global $current_user;
		get_currentuserinfo();

		$_SESSION['name'] = $current_user->display_name;

	} elseif($_POST['chatuser'] != ""){

		$_SESSION['name'] = stripslashes(htmlspecialchars($_POST['chatuser']));

	}

	echo '<div id="paripassu_chat">';
	include( WP_PLUGIN_DIR . '/pari-passu-video-streaming/chat/chat.php' );
	echo '</div>';

	$aligncss = '';

	if(!is_admin()) {

		$aligncss = '
				#paripassu_chat {
					float: ' . get_option('paripassu_chat_align') . ';
				}
		';

	}

	$retval .= '
		<style type="text/css">
			#paripassu_chat {
				width: ' . $chat_width . 'px;
				height: ' . $chat_height . 'px;
				background-color: #' . $chat_bgcolor . ';
				border-color: #' . $chat_bordercolor . ';
				color: #' . $chat_textcolor . ';
			}

			#paripassu_chat #chatbox {
				background-color: #' . $chat_textbgcolor . ';
				height: ' . $chat_height_box . 'px;
				border-color: #' . $chat_bordercolor . ';
			}

			#paripassu_chat input {
				background-color: #' . $chat_textbgcolor . ';
				border-color: #' . $chat_bordercolor . ';
			}

			#paripassu_chat input#usermsg {
				width: ' . $chat_width_input . 'px;
			}

			#paripassu_chat input#submitmsg, #paripassu_chat input#chatenter {
				width: ' . $chat_width_submit . 'px;
			}

			#paripassu_chat input#chatuser {
				width: ' . $chat_width_input_name . 'px;
			}

			' . $aligncss . '
		</style>
	';

	$retval .= '<link media="screen" type="text/css" href="' . WP_PLUGIN_URL . '/pari-passu-video-streaming/chat/style.css" rel="stylesheet"/>';

	return $retval;
}
?>
