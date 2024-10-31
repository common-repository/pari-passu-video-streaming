<?php 
	if($_POST['paripassu_hidden'] == 'Y') {
		//Form data sent

		$titulo = $_POST['paripassu_video_titulo'];
		update_option('paripassu_video_titulo', $titulo);

		$descricao = stripslashes($_POST['paripassu_video_descricao']);
		update_option('paripassu_video_descricao', $descricao);

		$ativo = $_POST['paripassu_video_ativo'];
		update_option('paripassu_video_ativo', $ativo);

		$width = $_POST['paripassu_video_width'];
		update_option('paripassu_video_width', $width);

		$height = $_POST['paripassu_video_height'];
		update_option('paripassu_video_height', $height);

		$align = $_POST['paripassu_video_align'];
		update_option('paripassu_video_align', $align);

		$autoplay = $_POST['paripassu_html5_autoplay'];
		update_option('paripassu_html5_autoplay', $autoplay);

		$controls = $_POST['paripassu_html5_controls'];
		update_option('paripassu_html5_controls', $controls);

		$autobuffer = $_POST['paripassu_html5_autobuffer'];
		update_option('paripassu_html5_autobuffer', $autobuffer);

		$player = $_POST['paripassu_html5_player'];
		update_option('paripassu_html5_player', $player);

		$ogv = $_POST['paripassu_ogv'];
		update_option('paripassu_ogv', $ogv);

		$webm = $_POST['paripassu_webm'];
		update_option('paripassu_webm', $webm);
		
		$mp4 = $_POST['paripassu_mp4'];
		update_option('paripassu_mp4', $mp4);
		
		$flash = stripslashes($_POST['paripassu_flash']);
		update_option('paripassu_flash', $flash);
		
		$rtmp_serv = $_POST['paripassu_rtmp_serv'];
		update_option('paripassu_rtmp_serv', $rtmp_serv);

		$rtmp_arq = $_POST['paripassu_rtmp_arq'];
		update_option('paripassu_rtmp_arq', $rtmp_arq);
?>
		<div class="updated"><p><strong><?php _e('Options saved.', 'paripassu' ); ?></strong></p></div>
<?php
	} else {
		//Normal page display
		$titulo = get_option('paripassu_video_titulo');
		$ativo = get_option('paripassu_video_ativo');
		$descricao = get_option('paripassu_video_descricao');
		$width = get_option('paripassu_video_width');
		$height = get_option('paripassu_video_height');
		$align = get_option('paripassu_video_align');
		$autoplay = get_option('paripassu_html5_autoplay');
		$controls = get_option('paripassu_html5_controls');
		$autobuffer = get_option('paripassu_html5_autobuffer');
		$player = get_option('paripassu_html5_player');
		$ogv = get_option('paripassu_ogv');
		$webm = get_option('paripassu_webm');
		$mp4 = get_option('paripassu_mp4');
		$flash = get_option('paripassu_flash');
		$rtmp_serv = get_option('paripassu_rtmp_serv');
		$rtmp_arq = get_option('paripassu_rtmp_arq');
	}
?>

<div class="wrap">
<?php echo "<h2>Pari Passu: Video Streaming</h2>"; ?>
<div id="message" class="updated">
	<p><?php _e('After configuring your streaming, use <b>shorttags</b> in any page inside your WordPress or the <b>template tags</b> inside your theme to customize it as you want!', 'paripassu'); ?></p>

	<h4>Shorttag: <kbd>[paripassu_video]</kbd></h4>
	<h4>Template Tag: <kbd>&lt;?php echo paripassu_video(); ?&gt;</kbd></h4>
</div>
<?php echo "<h2>" . __( 'Settings' , 'paripassu' ) . "</h2>"; ?>
<form name="paripassu_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	<input type="hidden" name="paripassu_hidden" value="Y">
	<table class="form-table">
		<tbody>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="titulo"><?php _e('Title', 'paripassu'); ?>:</label>
				</th>
				<td style="width: 100%;">
					<input id="titulo" type="text" name="paripassu_video_titulo" value="<?php echo $titulo; ?>" size="30" />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="descricao"><?php _e('Description', 'paripassu' ); ?>:</label>
				</th>
				<td style="width: 100%;">
					<textarea id="descricao" name="paripassu_video_descricao" rows="7" cols="70"><?php echo htmlspecialchars($descricao); ?></textarea>
				</td>
			</tr>
		</tbody>
	</table>
	<?php echo "<h4>" . __( 'Activate Video Streaming?', 'paripassu' ) . "</h4>"; ?>
	<table class="form-table">
		<tbody>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="streamativar_sim"><?php _e('Yes', 'paripassu'); ?></label>
				</th>
				<td style="width: 100%;">
					<input id="streamativar_sim" type="radio" name="paripassu_video_ativo" value="true" <?php if($ativo == 'true') : echo 'checked'; endif; ?> />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="streamativar_nao"><?php _e('No', 'paripassu'); ?></label>
				</th>
				<td style="width: 100%;">
					<input id="streamativar_nao" type="radio" name="paripassu_video_ativo" value="false" <?php if($ativo == 'false') : echo 'checked'; endif; ?> />
				</td>
			</tr>
		</tbody>
	</table>
	<?php echo "<h4>" . __( 'Size', 'paripassu' ) . "</h4>"; ?>
	<table class="form-table">
		<tbody>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="width"><?php _e('Width', 'paripassu'); ?>:</label>
				</th>
				<td style="width:100%;">
					<input id="width" type="text" name="paripassu_video_width" value="<?php echo $width; ?>" size="6" /> px
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="height"><?php _e('Height', 'paripassu'); ?>:</label>
				</th>
				<td style="width:100%;">
					<input id="height" type="text" name="paripassu_video_height" value="<?php echo $height; ?>" size="6" /> px
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="alignment"><?php _e('Alignment', 'paripassu'); ?>:</label>
				</th>
				<td style="width: 100%;">
					<select name="paripassu_video_align" id="alignment">
						<option value="none" <?php if($align == 'none') echo 'selected'; ?>><?php _e('none', 'paripassu'); ?></option>
						<option value="left" <?php if($align == 'left') echo 'selected'; ?>><?php _e('left', 'paripassu'); ?></option>
						<option value="right" <?php if($align == 'right') echo 'selected'; ?>><?php _e('right', 'paripassu'); ?></option>
					</select>
				</td>
			</tr>
		</tbody>
	</table>
	<?php echo "<h2>" . __( 'HTML5 Options', 'paripassu' ) . "</h2>"; ?>
	<span class="description"><?php _e('These options only apply to browsers that support HTML5 video tag.', 'paripassu'); ?></span>
	<table class="form-table">
		<tbody>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="autoplay">autoplay</label>
				</th>
				<td>
					<input id="autoplay" type="checkbox" name="paripassu_html5_autoplay" value="autoplay" <?php if($autoplay == 'autoplay') : echo 'checked="checked"'; endif; ?> />
				</td>
				<td style="width: 100%;">
					<label for="autoplay"><?php _e('Play streaming on page load', 'paripassu'); ?></label>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="controls">controls</label>
				</th>
				<td>
					<input id="controls" type="checkbox" name="paripassu_html5_controls" value="controls" <?php if($controls == 'controls') : echo 'checked'; endif; ?> />
				</td>
				<td style="width: 100%;">
					<label for="controls"><?php _e('Show video controls', 'paripassu'); ?></label>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="autobuffer">autobuffer</label>
				</th>
				<td>
					<input id="autobuffer" type="checkbox" name="paripassu_html5_autobuffer" value="autobuffer" <?php if($autobuffer == 'autobuffer') : echo 'checked'; endif; ?> />
				</td>
				<td style="width: 100%;">
					<label for="autobuffer"><?php _e('Start buffering on page load. (Only if autoplay is off)', 'paripassu'); ?></label>
				</td>
			</tr>
		</tbody>
	</table>
	<?php echo "<h3>" . __( 'Appearance', 'paripassu' ) . " <span class='description'>(beta)</span></h3>"; ?>
	<table class="form-table">
		<tbody>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="padrao"><?php _e('Browser default player', 'paripassu'); ?></label>
				</th>
				<td>
					<input id="padrao" type="radio" name="paripassu_html5_player" value="" <?php if($player == '') : echo 'checked'; endif; ?> />
				</td>
				<td style="width:100%;">
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="kaltura1"><?php _e('Kaltura HTML5 Player default', 'paripassu'); ?></label>
				</th>
				<td>
					<input id="kaltura1" type="radio" name="paripassu_html5_player" value="kaltura1" <?php if($player == 'kaltura1') : echo 'checked'; endif; ?> />
				</td>
				<td style="width:100%;">
					<a href="http://www.html5video.org/" target="_blank"><?php _e('see more', 'paripassu'); ?></a>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="kaltura2"><?php _e('Kaltura HTML5 Player theme <i>kskin</i>', 'paripassu'); ?></label>
				</th>
				<td>
					<input id="kaltura2" type="radio" name="paripassu_html5_player" value="kaltura2" <?php if($player == 'kaltura2') : echo 'checked'; endif; ?> />
				</td>
				<td style="width:100%;">
					<a href="http://www.html5video.org/" target="_blank"><?php _e('see more', 'paripassu'); ?></a>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="jw1"><?php _e('JW Player for HTML5', 'paripassu'); ?></label>
				</th>
				<td>
					<input id="jw1" type="radio" name="paripassu_html5_player" value="jw1" <?php if($player == 'jw1') : echo 'checked'; endif; ?> />
				</td>
				<td style="width:100%;">
					<a href="http://www.longtailvideo.com/support/jw-player/jw-player-for-html5/11895/single-mp4-video" target="_blank"><?php _e('see more', 'paripassu'); ?></a>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="jsplayer"><?php _e('Video JS Original', 'paripassu'); ?></label>
				</th>
				<td>
					<input id="jsplayer" type="radio" name="paripassu_html5_player" value="jsplayer" <?php if($player == 'jsplayer') : echo 'checked'; endif; ?> />
				</td>
				<td style="width:100%;">
					<a href="http://videojs.com/skins.html" target="_blank"><?php _e('see more', 'paripassu'); ?></a>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="jsplayer_vim"><?php _e('Video JS VimCSS', 'paripassu'); ?></label>
				</th>
				<td>
					<input id="jsplayer_vim" type="radio" name="paripassu_html5_player" value="jsplayer_vim" <?php if($player == 'jsplayer_vim') : echo 'checked'; endif; ?> />
				</td>
				<td style="width:100%;">
					<a href="http://videojs.com/skins.html" target="_blank"><?php _e('see more', 'paripassu'); ?></a>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="jsplayer_hu"><?php _e('Video JS HuCSS', 'paripassu'); ?></label>
				</th>
				<td>
					<input id="jsplayer_hu" type="radio" name="paripassu_html5_player" value="jsplayer_hu" <?php if($player == 'jsplayer_hu') : echo 'checked'; endif; ?> />
				</td>
				<td style="width:100%;">
					<a href="http://videojs.com/skins.html" target="_blank"><?php _e('see more', 'paripassu'); ?></a>
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="jsplayer_tube"><?php _e('Video JS TubeCSS', 'paripassu'); ?></label>
				</th>
				<td>
					<input id="jsplayer_tube" type="radio" name="paripassu_html5_player" value="jsplayer_tube" <?php if($player == 'jsplayer_tube') : echo 'checked'; endif; ?> />
				</td>
				<td style="width:100%;">
					<a href="http://videojs.com/skins.html" target="_blank"><?php _e('see more', 'paripassu'); ?></a>
				</td>
			</tr>
		</tbody>
	</table>
	<?php echo "<h2>" . __( 'URLs and Fallbacks', 'paripassu' ) . "</h2>"; ?>
	<table class="form-table">
		<tbody>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="ogv"><?php _e('OGG URL: ', 'paripassu'); ?>
				</th>
				<td style="width: 100%;">
					<input id="ogv" type="text" name="paripassu_ogv" value="<?php echo $ogv; ?>" size="50" />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="webm"><?php _e('WebM URL: ', 'paripassu'); ?>
				</th>
				<td style="width: 100%;">
					<input id="webm" type="text" name="paripassu_webm" value="<?php echo $webm; ?>" size="50" />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="mp4"><?php _e('MP4 (h264) URL: ', 'paripassu' ); ?></label>
				</th>
				<td style="width: 100%;">
					<input id="mp4" type="text" name="paripassu_mp4" value="<?php echo $mp4; ?>" size="50" />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="rtmp_serv"><?php _e('RTMP Server: ', 'paripassu'); ?></label>
				</th>
				<td style="width: 100%;">
					<input id="rtmp_serv" type="text" name="paripassu_rtmp_serv" value="<?php echo $rtmp_serv; ?>" size="50" />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="rtmp_arq"><?php _e('RTMP File: ', 'paripassu'); ?></label>
				</th>
				<td style="width: 100%;">
					<input id="rtmp_arq" type="text" name="paripassu_rtmp_arq" value="<?php echo $rtmp_arq; ?>" size="20" />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="flash"><?php _e('Flash embed: ', 'paripassu' ); ?></label>
				</th>
				<td style="width: 100%;">
					<textarea id="flash" name="paripassu_flash" rows="5" cols="50"><?php echo htmlspecialchars($flash); ?></textarea>
				</td>
			</tr>
		</tbody>
	</table>

	<p class="submit">
	<input class="button-primary" type="submit" name="Submit" value="<?php _e('Save Changes', 'paripassu') ?>" />
	</p>
</form>
</div>
</div>
