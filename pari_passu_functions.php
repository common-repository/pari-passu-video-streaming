<?php

function paripassu_activate() {
	//Cria estrutura do twitter no banco de dados
	if(get_option('paripassu_twitter_cabecalho') == '') update_option('paripassu_twitter_cabecalho', __("People are talking about", 'paripassu'));
	if(get_option('paripassu_twitter_titulo') == '') update_option('paripassu_twitter_titulo', '');
	if(get_option('paripassu_twitter_ativar') == '') update_option('paripassu_twitter_ativar', '');
	if(get_option('paripassu_twitter_hashtag') == '') update_option('paripassu_twitter_hashtag', '');
	if(get_option('paripassu_twitter_width') == '') update_option('paripassu_twitter_width', '250');
	if(get_option('paripassu_twitter_height') == '') update_option('paripassu_twitter_height', '300');
	if(get_option('paripassu_twitter_caixa_bg') == '') update_option('paripassu_twitter_caixa_bg', '7b7d83');
	if(get_option('paripassu_twitter_caixa_color') == '') update_option('paripassu_twitter_caixa_color', 'fffaff');
	if(get_option('paripassu_twitter_tweets_bg') == '') update_option('paripassu_twitter_tweets_bg', 'ffffff');
	if(get_option('paripassu_twitter_tweets_color') == '') update_option('paripassu_twitter_tweets_color', '262126');
	if(get_option('paripassu_twitter_tweets_links') == '') update_option('paripassu_twitter_tweets_links', '237396');
	if(get_option('paripassu_twitter_scrollbar') == '') update_option('paripassu_twitter_scrollbar', 'false');
	if(get_option('paripassu_twitter_loop') == '') update_option('paripassu_twitter_loop', 'true');
	if(get_option('paripassu_twitter_avatar') == '') update_option('paripassu_twitter_avatar', 'true');
	if(get_option('paripassu_twitter_time') == '') update_option('paripassu_twitter_time', 'true');
	if(get_option('paripassu_twitter_f_hashtag') == '') update_option('paripassu_twitter_f_hashtag', 'false');
	if(get_option('paripassu_twitter_interval') == '') update_option('paripassu_twitter_interval', '6000');

	//Cria estrutura do streaming de vídeo no banco de dados
	if(get_option('paripassu_video_titulo') == '') update_option('paripassu_video_titulo', '');
	if(get_option('paripassu_video_descricao') == '') update_option('paripassu_video_descricao', '');
	if(get_option('paripassu_video_ativo') == '') update_option('paripassu_video_ativo', '');
	if(get_option('paripassu_video_width') == '') update_option('paripassu_video_width', '480');
	if(get_option('paripassu_video_height') == '') update_option('paripassu_video_height', '320');
	if(get_option('paripassu_html5_autoplay') == '') update_option('paripassu_html5_autoplay', '');
	if(get_option('paripassu_html5_controls') == '') update_option('paripassu_html5_controls', 'controls');
	if(get_option('paripassu_html5_autobuffer') == '') update_option('paripassu_html5_autobuffer', 'autobuffer');
	if(get_option('paripassu_html5_player') == '') update_option('paripassu_html5_player', 'jsplayer');
	if(get_option('paripassu_ogv') == '') update_option('paripassu_ogv', '');
	if(get_option('paripassu_webm') == '') update_option('paripassu_webm', '');
	if(get_option('paripassu_mp4') == '') update_option('paripassu_mp4', '');
	if(get_option('paripassu_flash') == '') update_option('paripassu_flash', '');
	if(get_option('paripassu_rtmp_serv') == '') update_option('paripassu_rtmp_serv', '');
	if(get_option('paripassu_rtmp_arq') == '') update_option('paripassu_rtmp_arq', '');

	wp_register_script('kaltura-player', 'http://html5.kaltura.org/js');
	wp_register_script('jquery.jwplayer', WP_PLUGIN_URL . '/pari-passu-video-streaming/html5/jw/jquery.jwplayer.js', array('jquery'));
	wp_register_script('js-player', WP_PLUGIN_URL . '/pari-passu-video-streaming/html5/video-js/video.js');
	wp_register_script('js-player_setup', WP_PLUGIN_URL . '/pari-passu-video-streaming/html5/video-js/setup.js');
	wp_register_style('js-player', WP_PLUGIN_URL . '/pari-passu-video-streaming/html5/video-js/video-js.css');
	wp_register_style('js-player_hu', WP_PLUGIN_URL . '/pari-passu-video-streaming/html5/video-js/skins/hu.css');
	wp_register_style('js-player_vim', WP_PLUGIN_URL . '/pari-passu-video-streaming/html5/video-js/skins/vim.css');
	wp_register_style('js-player_tube', WP_PLUGIN_URL . '/pari-passu-video-streaming/html5/video-js/skins/tube.css');
	wp_register_script('jscolor', WP_PLUGIN_URL . '/pari-passu-video-streaming/js/jscolor.js');
}

function get_paripassu_video() {
	$video_ativo = get_option('paripassu_video_ativo');
	$video_width = get_option('paripassu_video_width');
	$video_height = get_option('paripassu_video_height');
	$video_autoplay = get_option('paripassu_html5_autoplay');
	$video_controls = get_option('paripassu_html5_controls');
	$video_autobuffer = get_option('paripassu_html5_autobuffer');
	$video_player = get_option('paripassu_html5_player');
	$video_ogv = get_option('paripassu_ogv');
	$video_webm = get_option('paripassu_webm');
	$video_mp4 = get_option('paripassu_mp4');
	$video_flash = get_option('paripassu_flash');
	$video_rtmp_serv = get_option('paripassu_rtmp_serv');
	$video_rtmp_arq = get_option('paripassu_rtmp_arq');

	if($video_width == '') : $video_width = '480'; endif;
	if($video_height == '') : $video_height = '320'; endif;

	if($video_player == 'jw1' || $video_player == 'jw2') $video_height = $video_height-24;

	$retval = '';
	//HTML5 Player Customizado para Video JS
	if($video_player == 'jsplayer') :
		$jsplayer = 'video-js-box';
	elseif($video_player == 'jsplayer_hu') :
		$jsplayer = 'video-js-box hu-css';
	elseif($video_player == 'jsplayer_vim') :
		$jsplayer = 'video-js-box vim-css';
	elseif($video_player == 'jsplayer_tube') :
		$jsplayer = 'video-js-box tube-css';
	else : 
		$jsplayer = '';
	endif;
	$retval .= '<div id="paripassu_video" class="' . $jsplayer . '" style="float: ' . get_option('paripassu_video_align') . ';">';
	//HTML5 Video Tag
	if($video_ogv != '' || $video_mp4 != '') :
		//HTML5 Player Customizado
		if($video_player == 'kaltura2') :
			$customplayer = 'class="kskin"';
		elseif($video_player == 'jw1' || $video_player == 'jw2') :
			$customplayer = 'id="player"';
			$video_controls = '';
		elseif($video_player == 'jsplayer' || $video_player == 'jsplayer_hu' || $video_player == 'jsplayer_vim' || $video_player == 'jsplayer_tube') :
			$customplayer = 'class="video-js"';
		else :
			$customplayer = '';
		endif;
		$retval .= '<video ' . $customplayer . ' width="' . $video_width . '" height="' . $video_height . '" ' . $video_autoplay . ' ' . $video_controls . ' ' . $video_autobuffer . '>';
	endif;
	//Fonte OGV
	if($video_ogv != '') {
		$retval .= '<source src="' . $video_ogv . '" type="video/ogg" />';
	}
	//Fonte WebM
	if($video_webm != '') {
		$retval .= '<source src="' . $video_webm . '" type="video/webm" />';
	}
	//Fonte MP4
	if($video_mp4 != '') {
		$retval .= '<source src="' . $video_mp4 . '" type="video/mp4" />';
	}
	//Fonte RTMP
	if($video_rtmp_serv != '' && $video_rtmp_arq != '') {
		$retval .= '<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="' . $video_width . '" height="' . $video_height . '" id="player1" name="player1">';
		$retval .= '<param name="movie" value="' . WP_PLUGIN_URL . '/pari-passu-video-streaming/jw/player.swf">';
		$retval .= '<param name="allowfullscreen" value="true">';
		$retval .= '<param name="allowscriptaccess" value="always">';
		$retval .= '<param name="flashvars" value="streamer=' . $video_rtmp_serv . '&file=' . $video_rtmp_arq . '&type=rtmp">';
		$retval .= '<embed id="player1" name="player1" src="' . WP_PLUGIN_URL . '/pari-passu-video-streaming/jw/player.swf" width="' . $video_width . '" height="' . $video_height . '" allowscriptaccess="always" allowfullscreen="true" flashvars="streamer=' . $video_rtmp_serv . '&file=' . $video_rtmp_arq . '&type=rtmp" />';
		$retval .= '</object>';
	}
	//Fallback FLASH para MP4 usando Video JS
	if($video_mp4 != '') :
		if($video_player == 'jsplayer' || $video_player == 'jsplayer_hu' || $video_player == 'jsplayer_vim' || $video_player == 'jsplayer_tube') :
			$retval .= '<object class="vjs-flash-fallback" width="' . $video_width . '" height="' . $video_height . '" type="application/x-shockwave-flash"
			data="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf">';
			$retval .= '<param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf" />';
			$retval .= '<param name="allowfullscreen" value="true" />';
			$retval .= '<param name="flashvars" '; $retval .= "value='config={"; $retval .= '"playlist":["http://video-js.zencoder.com/oceans-clip.png", {"url": "' . $video_mp4 . '","autoPlay":false,"autoBuffering":true}]}'; $retval .= "' />";
			$retval .= '</object>';
		endif;
	endif;
	//Fonte FLASH
	if($video_flash != '' && $video_rtmp_serv == '') {
		$retval .= $video_flash;
	}
	if($video_ogv != '' || $video_mp4 != '') :
		$retval .= '</video>';
		if($video_player == 'jw1') :
			$retval .= "<script type='text/javascript'> $('#player').jwplayer({ flashplayer:'" . WP_PLUGIN_URL . "/pari-passu-video-streaming/html5/jw/player.swf', skin:'" . WP_PLUGIN_URL . "/pari-passu-video-streaming/html5/jw/five/five.xml' }); </script>";
		endif;
	endif;
	$retval .= '</div>';

	return $retval;
}

function get_paripassu_twitter() {
	$cabecalho = get_option('paripassu_twitter_cabecalho');
	$titulo = get_option('paripassu_twitter_titulo');
	$ativar = get_option('paripassu_twitter_ativar');
	$hashtag = get_option('paripassu_twitter_hashtag');
	$width = get_option('paripassu_twitter_width');
	$height = get_option('paripassu_twitter_height');
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

	$align = get_option('paripassu_twitter_align');

	include('inc/twitter.php');
}
?>
