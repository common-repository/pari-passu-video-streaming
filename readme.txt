=== Pari Passu Video Streaming ===
Contributors: miguelpeixe, memelabr
Donate link: http://memelab.com.br/
Tags: video streaming, twitter, html5, chat
Requires at least: 2.7
Tested up to: 3.2.1
Stable tag: 2.1

Facilitates live streaming management in HTML5 and Flash with Twitter stream and chat interaction.

== Description ==

Pari passu is a Latin phrase that literally means "equal footstep" or "equal footing." It is sometimes translated as "part and parcel," "hand-in-hand," "with equal force," or "moving together," and by extension, "fairly," "without partiality."

This plugin was created to facilitate your life when it comes to publishing live streaming video using open and new web technologies. It supports HTML5 video tag (OGG, WebM and MP4 supported) with multiple skins and a fallback to flash (RTMP and custom flash embedding supported) when necessary.

To promote interaction in your streamed event, it also comes with a customizable twitter stream and a customizable chat to include in your streaming page.

== Installation ==

1. Upload `pari_passu` directory to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Configure Pari Passu according to your streaming server, the event hashtag for Twitter and create a chat session for users interaction!
4. To use chat feature, change /wp-content/plugins/pari-passu-video-streaming/chat/logs directory permissions to 0777
5. Place [paripassu_video], [paripassu_twitter] and [paripassu_chat] in any page. For advanced usage directly on the theme, use &lt;?php echo paripassu_video(); ?&gt; and &lt;?php echo paripassu_twitter(); ?&gt;
6. Enjoy!

== Frequently Asked Questions ==

= Does Pari Passu host my streaming? =

No. This plugin is used only to manage inside WordPress your already hosted streaming.
Visit http://icecast.org/ or http://osflash.org/red5 for further information

= Does it save my streamed video somewhere? =

No. You have to check this with your host.

== Screenshots ==



== Changelog ==

= 2.1 =
Fixed slashes in video description.
Updated contact information.


= 2.0 =
Added chat support integrated with Wordpress.
Fix elements alignment.
Added alignment options for video, twitter and chat.

= 1.3 =
Fix flash streaming embedding.

= 1.2 =
Add Portuguese translation.

= 1.1 =
Fix textdomain.

= 1.0 =
First and latest stable version.
