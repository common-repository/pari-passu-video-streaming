<?php 
	if($_POST['paripassu_hidden'] == 'Y') {
		//Form data sent

		$cabecalho = $_POST['paripassu_twitter_cabecalho'];
		update_option('paripassu_twitter_cabecalho', $cabecalho);

		$titulo = $_POST['paripassu_twitter_titulo'];
		update_option('paripassu_twitter_titulo', $titulo);

		$hashtag = $_POST['paripassu_twitter_hashtag'];
		update_option('paripassu_twitter_hashtag', $hashtag);

		$twit_ativar = $_POST['paripassu_twitter_ativar'];
		update_option('paripassu_twitter_ativar', $twit_ativar);

		$width = $_POST['paripassu_twitter_width'];
		update_option('paripassu_twitter_width', $width);

		$height = $_POST['paripassu_twitter_height'];
		update_option('paripassu_twitter_height', $height);

		$align = $_POST['paripassu_twitter_align'];
		update_option('paripassu_twitter_align', $align);

		$tema_caixa_bg = $_POST['paripassu_twitter_caixa_bg'];
		update_option('paripassu_twitter_caixa_bg', $tema_caixa_bg);

		$tema_caixa_color = $_POST['paripassu_twitter_caixa_color'];
		update_option('paripassu_twitter_caixa_color', $tema_caixa_color);

		$tema_tweets_bg = $_POST['paripassu_twitter_tweets_bg'];
		update_option('paripassu_twitter_tweets_bg', $tema_tweets_bg);

		$tema_tweets_color = $_POST['paripassu_twitter_tweets_color'];
		update_option('paripassu_twitter_tweets_color', $tema_tweets_color);

		$tema_tweets_links = $_POST['paripassu_twitter_tweets_links'];
		update_option('paripassu_twitter_tweets_links', $tema_tweets_links);

		$feature_scrollbar = $_POST['paripassu_twitter_scrollbar'];
		if($feature_scrollbar == '') : $feature_scrollbar = 'false'; endif;
		update_option('paripassu_twitter_scrollbar', $feature_scrollbar);

		$feature_loop = $_POST['paripassu_twitter_loop'];
		if($feature_scrollbar == '') : $feature_scrollbar = 'false'; endif;
		update_option('paripassu_twitter_loop', $feature_loop);

		$feature_avatar = $_POST['paripassu_twitter_avatar'];
		if($feature_avatar == '') : $feature_avatar = 'false'; endif;
		update_option('paripassu_twitter_avatar', $feature_avatar);

		$feature_time = $_POST['paripassu_twitter_time'];
		if($feature_time == '') : $feature_time = 'false'; endif;
		update_option('paripassu_twitter_time', $feature_time);

		$feature_hashtag = $_POST['paripassu_twitter_f_hashtag'];
		if($feature_hashtag == '') : $feature_hashtag = 'false'; endif;
		update_option('paripassu_twitter_f_hashtag', $feature_hashtag);

		$feature_interval = $_POST['paripassu_twitter_interval']*1000;
		update_option('paripassu_twitter_interval', $feature_interval);

?>
		<div class="updated"><p><strong><?php _e('Options saved.', 'paripassu' ); ?></strong></p></div>
<?php
	} else {
		//Normal page display
		$cabecalho = get_option('paripassu_twitter_cabecalho');
		$titulo = get_option('paripassu_twitter_titulo');
		$twit_ativar = get_option('paripassu_twitter_ativar');
		$hashtag = get_option('paripassu_twitter_hashtag');
		$width = get_option('paripassu_twitter_width');
		$height = get_option('paripassu_twitter_height');
		$align = get_option('paripassu_twitter_align');
		$tema_caixa_bg = get_option('paripassu_twitter_caixa_bg');
		$tema_caixa_color = get_option('paripassu_twitter_caixa_color');
		$tema_tweets_bg = get_option('paripassu_twitter_tweets_bg');
		$tema_tweets_color = get_option('paripassu_twitter_tweets_color');
		$tema_tweets_links = get_option('paripassu_twitter_tweets_links');
		$feature_scrollbar = get_option('paripassu_twitter_scrollbar');
		$feature_loop = get_option('paripassu_twitter_loop');
		$feature_avatar = get_option('paripassu_twitter_avatar');
		$feature_time = get_option('paripassu_twitter_time');
		$feature_hashtag = get_option('paripassu_twitter_f_hashtag');
		$feature_interval = get_option('paripassu_twitter_interval');
	}
?>

<div class="wrap">
<div style="float:left; width: 60%;">
<?php echo "<h2>Pari Passu: Twitter Streaming</h2>"; ?>
<div id="message" class="updated">
	<p><?php _e('After configuring your streaming, use <b>shorttags</b> in any page inside your WordPress or the <b>template tags</b> inside your theme to customize it as you want!', 'paripassu'); ?></p>

	<h4>Shorttag: <kbd>[paripassu_twitter]</kbd></h4>
	<h4>Template Tag: <kbd>&lt;?php echo paripassu_twitter(); ?&gt;</kbd></h4>
	
</div>
<?php echo "<h2>" . __('Settings', 'paripassu') . "</h2>"; ?>
<form name="paripassu_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
	<input type="hidden" name="paripassu_hidden" value="Y">
	<table class="form-table">
		<tbody>
			<tr valign="top">
				<th scope="row" style="white-space:nowrap;">
					<label for="cabecalho"><?php _e('Header', 'paripassu'); ?>:</label>
				</th>
				<td style="width: 100%;">
					<input id="cabecalho" type="text" name="paripassu_twitter_cabecalho" value="<?php echo $cabecalho; ?>" size="30" />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" style="white-space:nowrap;">
					<label for="titulo"><?php _e('Title', 'paripassu'); ?>:</label>
				</th>
				<td style="width: 100%;">
					<input id="titulo" type="text" name="paripassu_twitter_titulo" value="<?php echo $titulo; ?>" size="30" />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="hashtag"><?php _e('Hashtag', 'paripassu'); ?>:</label>
				</th>
				<td style="width: 100%;">
					#<input id="hashtag" type="text" name="paripassu_twitter_hashtag" value="<?php echo $hashtag; ?>" size="20" />
				</td>
			</tr>
		</tbody>
	</table>
	<div style="float:left;width:100%;margin-bottom:20px;">
	<div style="float:left;width: 50%;">
	<?php echo "<h4>" . __( 'Activate Twitter Streaming?', 'paripassu' ) . "</h4>"; ?>
	<table class="form-table">
		<tbody>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="twitativar_sim"><?php _e('Yes', 'paripassu') ?></label>
				</th>
				<td style="width: 100%;">
					<input id="twitativar_sim" type="radio" name="paripassu_twitter_ativar" value="Sim" <?php if($twit_ativar == 'Sim') : echo 'checked'; endif; ?> />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="twitativar_nao"><?php _e('No', 'paripassu') ?></label>
				</th>
				<td style="width: 100%;">
					<input id="twitativar_nao" type="radio" name="paripassu_twitter_ativar" value="Não" <?php if($twit_ativar != 'Sim') : echo 'checked'; endif; ?> />
				</td>
			</tr>
		</tbody>
	</table>
	</div>
	<div style="float:left;width: 50%;">
	<?php echo "<h4>" . __( 'Size', 'paripassu' ) . "</h4>"; ?>
	<table class="form-table">
		<tbody>
			<tr valign="top">
				<th scope="row" style="white-space:nowrap;">
					<label for="width"><?php _e('Width', 'paripassu') ?>:</label>
				</th>
				<td style="width:100%">
					<input id="width" type="text" name="paripassu_twitter_width" value="<?php echo $width; ?>" size="5" /> px
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" style="white-space:nowrap;">
					<label for="height"><?php _e('Height', 'paripassu') ?>:</label>
				</th>
				<td style="width: 100%;">
					<input id="height" type="text" name="paripassu_twitter_height" value="<?php echo $height; ?>" size="5" /> px
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="alignment"><?php _e('Alignment', 'paripassu'); ?>:</label>
				</th>
				<td style="width: 100%;">
					<select name="paripassu_twitter_align" id="alignment">
						<option value="none" <?php if($align == 'none') echo 'selected'; ?>><?php _e('none', 'paripassu'); ?></option>
						<option value="left" <?php if($align == 'left') echo 'selected'; ?>><?php _e('left', 'paripassu'); ?></option>
						<option value="right" <?php if($align == 'right') echo 'selected'; ?>><?php _e('right', 'paripassu'); ?></option>
					</select>
				</td>
			</tr>
		</tbody>
	</table>
	</div>

	</div>
	<div style="float:left;width:100%;margin-bottom:20px;">
	<div style="float:left;width:50%;">
	<?php echo "<h3>" . __ ( 'Appearance', 'paripassu' ) . "</h3>"; ?>
	<?php echo "<h4>" . __ ( 'Box', 'paripassu' ) . "</h4>"; ?>
	<table class="form-table">
		<tbody>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="tema_caixa_bg"><?php _e('Background color', 'paripassu'); ?>:</label>
				</th>
				<td style="width: 100%;">
					<input id="tema_caixa_bg" class="color" type="text" name="paripassu_twitter_caixa_bg" value="<?php echo $tema_caixa_bg; ?>" size="7" maxlength="7">
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="tema_caixa_color"><?php _e('Text color', 'paripassu'); ?>:</label>
				</th>
				<td style="width: 100%;">
					<input id="tema_caixa_color" class="color" type="text" name="paripassu_twitter_caixa_color" value="<?php echo $tema_caixa_color; ?>" size="7" maxlength="7">
				</td>
			</tr>
		</tbody>
	</table>
	<?php echo "<h4>" . __ ( 'Tweets', 'paripassu' ) . "</h4>"; ?>
	<table class="form-table">
		<tbody>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="tema_tweets_bg"><?php _e('Background color', 'paripassu'); ?>:</label>
				</th>
				<td style="width: 100%;">
					<input id="tema_tweets_bg" class="color" type="text" name="paripassu_twitter_tweets_bg" value="<?php echo $tema_tweets_bg; ?>" size="7" maxlength="7">
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" style="white-space:nowrap;">
					<label for="tema_tweets_color"><?php _e('Text color', 'paripassu'); ?>:</label>
				</th>
				<td style="width: 100%;">
					<input id="tema_tweets_color" class="color" type="text" name="paripassu_twitter_tweets_color" value="<?php echo $tema_tweets_color; ?>" size="7" maxlength="7">
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" style="white-space:nowrap;">
					<label for="tema_tweets_links"><?php _e('Links color', 'paripassu'); ?>:</label>
				</th>
				<td style="width: 100%;">
					<input id="tema_tweets_links" class="color" type="text" name="paripassu_twitter_tweets_links" value="<?php echo $tema_tweets_links; ?>" size="7" maxlength="7">
				</td>
			</tr>
		</tbody>
	</table>
	</div>
	<div style="float:left;width:50%;">
	<?php echo "<h3>" . __ ( 'Preferences', 'paripassu' ) . "</h3>"; ?>
	<table class="form-table">
		<tbody>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="features_scrollbar"><?php _e('Show scrollbar', 'paripassu'); ?></label>
				</th>
				<td style="width: 100%;">
					<input id="features_scrollbar" type="checkbox" name="paripassu_twitter_scrollbar" value="true" <?php if($feature_scrollbar == 'true') : echo 'checked="checked"'; endif; ?> />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="features_loop"><?php _e('Infinite rotation', 'paripassu'); ?></label>
				</th>
				<td style="width: 100%;">
					<input id="features_loop" type="checkbox" name="paripassu_twitter_loop" value="true" <?php if($feature_loop == 'true') : echo 'checked="checked"'; endif; ?> />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="features_avatar"><?php _e('Show avatars', 'paripassu'); ?></label>
				</th>
				<td style="width: 100%;">
					<input id="features_avatar" type="checkbox" name="paripassu_twitter_avatar" value="true" <?php if($feature_avatar == 'true') : echo 'checked="checked"'; endif; ?> />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="features_time"><?php _e('Show date/time', 'paripassu'); ?></label>
				</th>
				<td style="width: 100%;">
					<input id="features_time" type="checkbox" name="paripassu_twitter_time" value="true" <?php if($feature_time == 'true') : echo 'checked="checked"'; endif; ?> />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="features_hashtag"><?php _e('Show hashtag', 'paripassu'); ?></label>
				</th>
				<td style="width: 100%;">
					<input id="features_hashtag" type="checkbox" name="paripassu_twitter_f_hashtag" value="true" <?php if($feature_hashtag == 'true') : echo 'checked="checked"'; endif; ?> />
				</td>
			</tr>
			<tr valign="top">
				<th scope="row" style="white-space: nowrap;">
					<label for="features_interval"><?php _e('Interval between tweets', 'paripassu'); ?>:</label>
				</th>
				<td style="width: 100%;">
					<input id="features_interval" type="text" name="paripassu_twitter_interval" value="<?php echo $feature_interval / 1000; ?>" size="1" maxlength="1" /> <?php _e('seconds', 'paripassu'); ?>
				</td>
			</tr>
		</tbody>
	</table>
	</div>
	</div>
	<p class="submit">
	<input class="button-primary" type="submit" name="Submit" value="<?php _e('Save Changes', 'paripassu') ?>" />
	</p>	
</form>
</div>
<?php if($hashtag != '') : ?>
<div style="float:left; width: auto; margin-left: 20px;">
<h2><?php _e('Visualização'); ?></h2>
<?php echo paripassu_twitter(); ?>
<?php endif; ?>
</div>
</div>
