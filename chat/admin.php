<?php

if($_POST['paripassu_hidden'] == 'Y') {
	//Form data sent

	$width = $_POST['paripassu_chat_width'];
	update_option('paripassu_chat_width', $width);

	$height = $_POST['paripassu_chat_height'];
	update_option('paripassu_chat_height', $height);

	$datedisplay = $_POST['paripassu_chat_datedisplay'];
	update_option('paripassu_chat_datedisplay', $datedisplay);

	$align = $_POST['paripassu_chat_align'];
	update_option('paripassu_chat_align', $align);

	$textcolor = $_POST['paripassu_chat_textcolor'];
	update_option('paripassu_chat_textcolor', $textcolor);

	$bgcolor = $_POST['paripassu_chat_bgcolor'];
	update_option('paripassu_chat_bgcolor', $bgcolor);

	$textbgcolor = $_POST['paripassu_chat_textbgcolor'];
	update_option('paripassu_chat_textbgcolor', $textbgcolor);

	$bordercolor = $_POST['paripassu_chat_bordercolor'];
	update_option('paripassu_chat_bordercolor', $bordercolor);

?>
	<div class="updated"><p><strong><?php _e('Options saved.', 'paripassu' ); ?></strong></p></div>
<?php
} elseif($_POST['paripassu_chat_hidden'] == 'Y') {

	$chat_name = $_POST['paripassu_chat_name'];
	update_option('paripassu_chat_name', $chat_name);

	$fp = fopen(WP_PLUGIN_DIR . "/pari-passu-video-streaming/chat/logs/$chat_name.htm", 'a');
	fwrite($fp, "");
	fclose($fp);
?>
	<div class="updated"><p><strong><?php _e('Chat session created.', 'paripassu'); ?></strong></p></div>
<?php
}

//Normal page display
$name = get_option('paripassu_chat_name');
$width = get_option('paripassu_chat_width');
$height = get_option('paripassu_chat_height');
$datedisplay = get_option('paripassu_chat_datedisplay');
$align = get_option('paripassu_chat_align');
$textcolor = get_option('paripassu_chat_textcolor');
$bgcolor = get_option('paripassu_chat_bgcolor');
$textbgcolor = get_option('paripassu_chat_textbgcolor');
$bordercolor = get_option('paripassu_chat_bordercolor');

?>
<div class="wrap">
<h2>Pari Passu Chat</h2>
<?php

$logdir = WP_PLUGIN_DIR . '/pari-passu-video-streaming/chat/logs';

if(!is_writable($logdir)) {

?>

	<div id="message" class="error">

		<p><?php printf(__("Directory <b>%s</b> is not writable! Change directory permission to 0777 so we can store the chat logs!", "paripassu"), $logdir); ?></p>

	</div>

<?php } ?>

<div id="message" class="updated">
	<p><?php _e('After configuring your chat, use <b>shorttags</b> in any page inside your WordPress or the <b>template tags</b> inside your theme to customize it as you want!', 'paripassu'); ?></p>

	<h4>Shorttag: <kbd>[paripassu_chat]</kbd></h4>
	<h4>Template Tag: <kbd>&lt;?php echo paripassu_chat(); ?&gt;</kbd></h4>
</div>
<div style="width: 45%; float:left;">

	<h3><?php _e('Create new chat session' , 'paripassu'); ?></h3>
	<form name="paripassu_chat_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">

		<input type="hidden" name="paripassu_chat_hidden" value="Y">
		<input id="name" type="text" name="paripassu_chat_name" value="<?php echo $name; ?>" size="30" />
		<input type="submit" class="button-primary" name="Submit" value="<?php _e('Create', 'paripassu'); ?>">

	</form>
	<h3><?php _e('Style Options', 'paripassu'); ?></h3>
	<form name="paripassu_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">

		<input type="hidden" name="paripassu_hidden" value="Y">
		<table class="form-table">
			<tbody>
				<tr valign="top">
					<th scope="row" style="white-space:nowrap;">
						<label for="width"><?php _e('Width', 'paripassu'); ?>:</label>
					</th>
					<td style="width: 100%;">
						<input id="width" type="text" name="paripassu_chat_width" value="<?php echo $width; ?>" size="4" maxlength="4" />px
					</td>
				</tr>
				<tr valign="top">
					<th scope="row" style="white-space:nowrap;">
						<label for="height"><?php _e('Height', 'paripassu'); ?>:</label>
					</th>
					<td style="width: 100%;">
						<input id="height" type="text" name="paripassu_chat_height" value="<?php echo $height; ?>" size="4" maxlength="4" />px
					</td>
				</tr>
				<tr valign="top">
					<th scope="row" style="white-space: nowrap;">
						<label for="datedisplay"><?php _e('Date format', 'paripassu'); ?>:</label>
					</th>
					<td style="width: 100%;">
						<select name="paripassu_chat_datedisplay" id="datedisplay">
							<option value="h12a" <?php if($datedisplay == 'h12a') echo 'selected'; ?>>01:30 PM</option>
							<option value="h24" <?php if($datedisplay == 'h24') echo 'selected'; ?>>13:30</option>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row" style="white-space: nowrap;">
						<label for="alignment"><?php _e('Alignment', 'paripassu'); ?>:</label>
					</th>
					<td style="width: 100%;">
						<select name="paripassu_chat_align" id="alignment">
							<option value="none" <?php if($align == 'none') echo 'selected'; ?>><?php _e('none', 'paripassu'); ?></option>
							<option value="left" <?php if($align == 'left') echo 'selected'; ?>><?php _e('left', 'paripassu'); ?></option>
							<option value="right" <?php if($align == 'right') echo 'selected'; ?>><?php _e('right', 'paripassu'); ?></option>
						</select>
					</td>
				</tr>
				<tr valign="top">
					<th scope="row" style="white-space: nowrap;">
						<label for="textcolor"><?php _e('Text color', 'paripassu'); ?>: </label>
					</th>
					<td syle="width: 100%;">
						<input name="paripassu_chat_textcolor" class="color" id="textcolor" value="<?php echo $textcolor; ?>" type="text" size="6" maxlength="6" />
					</td>
				</tr>
				<tr valign="top">
					<th scope="row" style="white-space: nowrap;">
						<label for="bgcolor"><?php _e('Background color', 'paripassu'); ?>: </label>
					</th>
					<td syle="width: 100%;">
						<input name="paripassu_chat_bgcolor" class="color" id="bgcolor" value="<?php echo $bgcolor; ?>" type="text" size="6" maxlength="6" />
					</td>
				</tr>
				<tr valign="top">
					<th scope="row" style="white-space: nowrap;">
						<label for="textbgcolor"><?php _e('Text background color', 'paripassu'); ?>: </label>
					</th>
					<td syle="width: 100%;">
						<input name="paripassu_chat_textbgcolor" class="color" id="textbgcolor" value="<?php echo $textbgcolor; ?>" type="text" size="6" maxlength="6" />
					</td>
				</tr>
				<tr valign="top">
					<th scope="row" style="white-space: nowrap;">
						<label for="bordercolor"><?php _e('Border color', 'paripassu'); ?>: </label>
					</th>
					<td syle="width: 100%;">
						<input name="paripassu_chat_bordercolor" class="color" id="bordercolor" value="<?php echo $bordercolor; ?>" type="text" size="6" maxlength="6" />
					</td>
				</tr>
			</tbody>
		</table>
		<p class="submit">
			<input class="button-primary" type="submit" name="Submit" value="<?php _e('Save Changes', 'paripassu') ?>" />
		</p>

	</form>

	<h3><?php _e('Chat logs', 'paripassu'); ?></h3>
	<div id="logs">
		<?php
		$directory = WP_PLUGIN_DIR . "/pari-passu-video-streaming/chat/logs";
		// create an array to hold directory list
		$results = array();

		// create a handler for the directory
		$handler = opendir($directory);

		// open directory and walk through the filenames
		while ($file = readdir($handler)) {

			// if file isn't this directory or its parent, add it to the results
			if ($file != "." && $file != ".." && substr($file, strrpos($file, '.')) == '.htm') {
				$results[] = $file;
			}

		}

		// tidy up: close the handler
		closedir($handler);

		// done!
		if(empty($results)) {

			echo '<p>' . __('No chat session was found for log viewing.', 'paripassu') . '</p>';

		} else {

			echo '<table>';

			echo '<tbody>';

			foreach($results as $result) {

				echo '<tr valign="top">';

				echo '<th scope="row" style="white-space:nowrap;padding: 0 20px 0 0;">' . date('d/m/Y', filemtime(WP_PLUGIN_DIR . "/pari-passu-video-streaming/chat/logs/" . $result)) . '</th>';

				echo '<td style="width:100%;"><a class="thickbox" href="' . WP_PLUGIN_URL . '/pari-passu-video-streaming/chat/logs/' . $result . '?TB_iframe=true&width=676">' . $result . '</a></td>';

				echo '</tr>';

			}

			echo '</tbody>';

			echo '</table>';

		}

		?>
	</div>

</div>

<div style="width: 45%; float:right;">
	<h3><?php _e('Preview', 'paripassu'); ?></h3>
	<?php echo paripassu_chat(); ?>
</div>
