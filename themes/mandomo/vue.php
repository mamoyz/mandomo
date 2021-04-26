
let data = {
		hideTypeWriter: false,
        loaded: false,
		percentage: 0,
		isReady: false,
		menuOpen: false,
		playWithSoundDesktop: false,
		playWithSoundMobile: false,
		isPlaying: true,
		// tracks: <?php echo  json_encode(get_field("audios"), JSON_UNESCAPED_SLASHES);?>,
		logos: <?php echo  json_encode(get_field("logos"), JSON_UNESCAPED_SLASHES);?>,
		spareLogo: "",
		textarea: "",
		pageRight: 0,
		closing: false,
		menu: <?php echo json_encode(get_field('nav_menu_links'),JSON_UNESCAPED_SLASHES); ?>,
		currentMenuVideo: "default",
		defaultVideo: "<?php the_field('nav_default_background_video'); ?>",
		defaultVideoMobile: "<?php the_field('nav_default_background_video_mobile'); ?>",
	}
	