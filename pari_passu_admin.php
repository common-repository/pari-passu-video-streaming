<div class="wrap">
	<?php echo "<h2>Pari Passu</h2>"; ?>
	<div style="width: 100%;float:left;margin-bottom:20px;">
		<span class="description" style="width: 70%;float:left;clear:both;">
			<?php _e('Pari passu is a Latin phrase that literally means "equal footstep" or "equal footing". It is sometimes translated as "part and parcel", "hand-in-hand", "with equal force" or "moving together" and by extension, "fairly", "without partiality".', 'paripassu'); ?>
		</span>
	</div>
	<p>
		<?php _e('This plugin was created to facilitate your life when it comes to publishing live streaming video using open and new web technologies. It supports HTML5 video tag (OGG, WebM and MP4 supported) with multiple skins and a fallback to flash (RTMP and custom flash embedding supported) when necessary.<br />To promote interaction in your streamed event, it also comes with a customizable twitter stream to include in your streaming page.', 'paripassu'); ?>
	</p>
	<p><?php _e('In case of doubt, sugestion or bug, report to:', 'paripassu'); ?> <a href="http://memelab.com.br/" target="_blank">contato@memelab.com.br</a></p>
	<p><?php _e('Enjoy!', 'paripassu'); ?></p>
	<div style="width: 50%;float:left;">
		<h2>Video Streaming</h2>
		<a href="<?php echo get_bloginfo('wpurl'); ?>/wp-admin/admin.php?page=paripassu_videostreaming" class="button button-highlighted"><?php _e('Edit settings', 'paripassu'); ?></a>
		<h4>Shorttag: <kbd>[paripassu_video]</kbd></h4>
		<div style="float:left;width:100%;margin-bottom:10px;margin-top:-15px;">
			<span class="description" style="float:left;width: 70%;"><?php _e('Use the shorttag inside any page in your WordPress to show your live streaming!', 'paripassu'); ?></span>
		</div>
		<h4>Template Tag: <kbd>&lt;?php echo paripassu_video(); ?&gt;</kbd></h4>
		<div style="float:left;width:100%;margin-bottom:10px;margin-top:-15px;">
			<span class="description" style="float:left;width: 70%;"><?php _e('Use the template tag inside your theme and customize it as you want!', 'paripassu'); ?></span>
		</div>
		<hr />
		<?php $titulo = get_option('paripassu_video_titulo'); $ogv = get_option('paripassu_ogv'); ?>
		<?php if($titulo != '' || $ogv != '') : ?>
			<h3><?php _e('Visualization', 'paripassu'); ?></h3>
			<h2><?php echo $titulo; ?></h2>
			<?php echo paripassu_video_admin(); ?>
		<?php endif; ?>
	</div>
	<div style="width: 50%;float:left;">
		<h2>Twitter Streaming</h2>
		<a href="<?php echo get_bloginfo('wpurl'); ?>/wp-admin/admin.php?page=paripassu_twitterstreaming" class="button button-highlighted"><?php _e('Edit settings', 'paripassu'); ?></a>
		<h4>Shorttag: <kbd>[paripassu_twitter]</kbd></h4>
		<div style="float:left;width:100%;margin-bottom:10px;margin-top:-15px;">
			<span class="description" style="float:left;width: 70%;"><?php _e('Use the shorttag inside any page in your WordPress to show your live streaming!', 'paripassu'); ?></span>
		</div>
		<h4>Template Tag: <kbd>&lt;?php echo paripassu_twitter(); ?&gt;</kbd></h4>
		<div style="float:left;width:100%;margin-bottom:10px;margin-top:-15px;">
			<span class="description" style="float:left;width: 70%;"><?php _e('Use the template tag inside your theme and customize it as you want!', 'paripassu'); ?></span>
		</div>
		<hr />
		<h3><?php _e('Visualization', 'paripassu'); ?></h3>
		<?php echo paripassu_twitter_admin(); ?>
	</div>
</div>
