<div class="paripassu_twitter" style="float: <?php echo $align; ?>;">
	<script src="http://widgets.twimg.com/j/2/widget.js"></script>
	<script>
	new TWTR.Widget({
	  version: 2,
	  type: 'search',
	  search: '<?= $hashtag ?>',
	  interval: '<?= $feature_interval; ?>',
	  title: '<?= $cabecalho ?>',
	  subject: '<?= $titulo ?>',
	  width: '<?= $width ?>',
	  height: '<?= $height ?>',
	  theme: {
	    shell: {
	      background: '#<?= $tema_caixa_bg ?>',
	      color: '#<?= $tema_caixa_color ?>'
	    },
	    tweets: {
	      background: '#<?= $tema_tweets_bg ?>',
	      color: '#<?= $tema_tweets_color ?>',
	      links: '#<?= $tema_tweets_links ?>'
	    }
	  },
	  features: {
	<?php if($feature_scrollbar == 'true') { ?>
	    scrollbar: true,
	<?php } else { ?>
	    scrollbar: false,
	<?php } ?>
	<?php if($feature_loop == 'true') { ?>
	    loop: true,
	<?php } else { ?>
	    loop: false,
	<?php } ?>
	    live: true,
	<?php if($feature_hashtag == 'true') { ?>
	    hashtags: true,
	<?php } else { ?>
	    hashtags: false,
	<?php } ?>
	<?php if($feature_time == 'true') { ?>
	    timestamp: true,
	<?php } else { ?>
	    timestamp: false,
	<?php } ?>
	<?php if($feature_avatar == 'true') { ?>
	    avatars: true,
	<?php } else { ?>
	    avatars: false,
	<?php } ?>
	    behavior: 'default'
	  }
	}).render().start();
	</script>
</div>
