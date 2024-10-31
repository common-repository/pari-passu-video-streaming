<?php
/*
Plugin Name: Pari Passu
Plugin URI: http://wordpress.org/extend/plugins/pari-passu-video-streaming/
Description: Publish live streaming video using open and new web technologies. Supports HTML5 video tag (OGG, WebM and MP4 supported) with multiple skins and a fallback to flash (RTMP and custom flash embedding supported) when necessary. Also comes with customizables twitter and chat interaction.
Author: Miguel Peixe
Version: 2.1
Author URI: http://www.memelab.com.br
*/


function paripassu_textdomain() {
	load_plugin_textdomain( 'paripassu', false, 'pari-passu-video-streaming/languages' );
}

add_action('init','paripassu_textdomain');

include('pari_passu_functions.php');
include('chat/functions.php');

register_activation_hook(__FILE__, 'paripassu_activate');

function paripassu_twitter_js() {
	wp_enqueue_script('jscolor', WP_PLUGIN_URL . '/pari-passu-video-streaming/js/jscolor.js');
}

add_action('init', 'paripassu_twitter_js');

function paripassu_kalturaplayer() {
	wp_enqueue_script('kaltura-player', 'http://html5.kaltura.org/js');
}

function paripassu_jwplayer() {
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery.jwplayer', WP_PLUGIN_URL . '/pari-passu-video-streaming/html5/jw/jquery.jwplayer.js');
}

function paripassu_jsplayer() {
	wp_enqueue_script('js-player', WP_PLUGIN_URL . '/pari-passu-video-streaming/html5/video-js/video.js');
	wp_enqueue_script('js-player_setup', WP_PLUGIN_URL . '/pari-passu-video-streaming/html5/video-js/setup.js');
	wp_enqueue_style('js-player', WP_PLUGIN_URL . '/pari-passu-video-streaming/html5/video-js/video-js.css');
	wp_enqueue_style('js-player_hu', WP_PLUGIN_URL . '/pari-passu-video-streaming/html5/video-js/skins/hu.css');
	wp_enqueue_style('js-player_vim', WP_PLUGIN_URL . '/pari-passu-video-streaming/html5/video-js/skins/vim.css');
	wp_enqueue_style('js-player_tube', WP_PLUGIN_URL . '/pari-passu-video-streaming/html5/video-js/skins/tube.css');
}

if(get_option('paripassu_html5_player') == 'kaltura1' || get_option('paripassu_html5_player') == 'kaltura2') :
	add_action('init', 'paripassu_kalturaplayer');
elseif(get_option('paripassu_html5_player') == 'jw1' || get_option('paripassu_html5_player') == 'jw2') :
	add_action('init', 'paripassu_jwplayer');
elseif(get_option('paripassu_html5_player') == 'jsplayer' || get_option('paripassu_html5_player') == 'jsplayer_hu' || get_option('paripassu_html5_player') == 'jsplayer_vim' || get_option('paripassu_html5_player') == 'jsplayer_tube') :
	add_action('init', 'paripassu_jsplayer');
endif;

function paripassu_video_tit() {
	echo get_option('paripassu_video_titulo');
}

function paripassu_video_desc() {
	echo get_option('paripassu_video_descricao');
}

function paripassu_video_ativo() {
	if(get_option('paripassu_video_ativo') == 'true') {
		return true;
	} else {
		return false;
	}
}



//Video Streaming
function paripassu_video() {

	//Checa se streaming está ativado
	if(get_option('paripassu_video_ativo') == 'true') {
		echo get_paripassu_video();
	}
}

//Visualização no Painel (sem necessidade de estar Ativo para visualizar)
function paripassu_video_admin() {
	echo get_paripassu_video();
}

//Twitter
function paripassu_twitter() {
	if(get_option('paripassu_twitter_ativar') == 'Sim') {
		//Twitter
		get_paripassu_twitter();
	}
}

//Visualização no Painel (sem necessidade de estar Ativo para visualizar)
function paripassu_twitter_admin() {
	get_paripassu_twitter();
}

add_shortcode('paripassu_video', 'paripassu_video');
add_shortcode('paripassu_twitter', 'paripassu_twitter');
add_shortcode('paripassu_chat', 'paripassu_chat');

//*************** ADMIN ***************

function paripassu_admin() {
	include('pari_passu_admin.php');
}

function paripassu_admin_video() {
	include('pari_passu_admin_video.php');
}

function paripassu_admin_twitter() {
	include('pari_passu_admin_twitter.php');
}

function paripassu_admin_chat() {
	include('chat/admin.php');
}

function paripassu_admin_actions() {
	add_menu_page("Pari Passu", "Pari Passu", 1, "paripassu", "paripassu_admin");
	add_submenu_page("paripassu", __('General View', 'paripassu'), __('General View', 'paripassu'), 1, "paripassu", "paripassu_admin");
	add_submenu_page("paripassu", "Video Streaming", "Video Streaming", 2, "paripassu_videostreaming", "paripassu_admin_video");
	add_submenu_page("paripassu", "Twitter Streaming", "Twitter Streaming", 3, "paripassu_twitterstreaming", "paripassu_admin_twitter");
	add_submenu_page("paripassu", "Pari Passu Chat", "Chat", 4, "paripassu_chat", "paripassu_admin_chat");
}

add_action('admin_menu', 'paripassu_admin_actions');

?>
