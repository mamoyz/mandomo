<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- 
				





		███╗░░░███╗░█████╗░███╗░░██╗██████╗░░█████╗░███╗░░░███╗░█████╗░
		████╗░████║██╔══██╗████╗░██║██╔══██╗██╔══██╗████╗░████║██╔══██╗
		██╔████╔██║███████║██╔██╗██║██║░░██║██║░░██║██╔████╔██║██║░░██║
		██║╚██╔╝██║██╔══██║██║╚████║██║░░██║██║░░██║██║╚██╔╝██║██║░░██║
		██║░╚═╝░██║██║░░██║██║░╚███║██████╔╝╚█████╔╝██║░╚═╝░██║╚█████╔╝
		╚═╝░░░░░╚═╝╚═╝░░╚═╝╚═╝░░╚══╝╚═════╝░░╚════╝░╚═╝░░░░░╚═╝░╚════╝░





	-->

		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, viewport-fit=cover, target-densityDpi=device-dpi" name="viewport" />
    <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
	<script src="https://unpkg.com/typewriter-effect@latest/dist/core.js"></script>

<script>
	function twr(word,selector){
					let count = word.length;
					let repeat = 1;
					let counter = 0;
					let characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+~|></";
					let interval = setInterval(function(){
						let output = "";
						if (counter == repeat * count + 1) {
							clearInterval(interval);
						}
						for (let j = 0; j < count; j++) {
							let randomCharacter = Math.floor(Math.random() * characters.length);
							if ((j + 1) * repeat <= counter) {
								output += "<span class='finished'>"+word[j]+"</span>";
							} else {
								if (word[j] == " ") {
									output += "<span>  </span>";
								} else {
									output +=  "<span>"+characters[randomCharacter]+"</span>";
								}
							}
							document.querySelector(selector).innerHTML = output;
						}
						counter++;
					}, 60);
	}
		console.log("DOM LOADED");
		setTimeout(function() {
			twr("TO ELEVATE VISUAL IDENTITY","#preloader-typewriter div.twr1");
		}, 100);
		setTimeout(function() {
				twr("THROUGH BOLD CINEMATIC SOUND","#preloader-typewriter div.twr2");
		}, 1800);
		setTimeout(function() {
			document.querySelector("#preloader-typewriter").classList.remove("writing-out");
		}, 5000);
		</script>
		<script>
			//FULL STORY SCRIPT
window['_fs_debug'] = false;
window['_fs_host'] = 'fullstory.com';
window['_fs_script'] = 'edge.fullstory.com/s/fs.js';
window['_fs_org'] = '10WT9X';
window['_fs_namespace'] = 'FS';
(function(m,n,e,t,l,o,g,y){
    if (e in m) {if(m.console && m.console.log) { m.console.log('FullStory namespace conflict. Please set window["_fs_namespace"].');} return;}
    g=m[e]=function(a,b,s){g.q?g.q.push([a,b,s]):g._api(a,b,s);};g.q=[];
    o=n.createElement(t);o.async=1;o.crossOrigin='anonymous';o.src='https://'+_fs_script;
    y=n.getElementsByTagName(t)[0];y.parentNode.insertBefore(o,y);
    g.identify=function(i,v,s){g(l,{uid:i},s);if(v)g(l,v,s)};g.setUserVars=function(v,s){g(l,v,s)};g.event=function(i,v,s){g('event',{n:i,p:v},s)};
    g.anonymize=function(){g.identify(!!0)};
    g.shutdown=function(){g("rec",!1)};g.restart=function(){g("rec",!0)};
    g.log = function(a,b){g("log",[a,b])};
    g.consent=function(a){g("consent",!arguments.length||a)};
    g.identifyAccount=function(i,v){o='account';v=v||{};v.acctId=i;g(o,v)};
    g.clearUserCookie=function(){};
    g.setVars=function(n, p){g('setVars',[n,p]);};
    g._w={};y='XMLHttpRequest';g._w[y]=m[y];y='fetch';g._w[y]=m[y];
    if(m[y])m[y]=function(){return g._w[y].apply(this,arguments)};
    g._v="1.3.0";
})(window,document,window['_fs_namespace'],'script','user');
</script>
	
        <?php wp_head(); ?>

	</head>
	<body>
	<div id="preloader-typewriter" class="writing-out" style="position:fixed; z-index:999999999999;">
			<div class="twr1"></div>
			<div class="twr2"></div>
	</div> 
		<div class="landscape-notice"></div>
		<div id="app" :style="'--pageRight:'+pageRight" :class="{menuOpen,isReady}">
			<header :class="{loaded,isReady}">
				<a class="menu-toggle" href="#" @click.prevent="toggleMenu()">
					<span v-show="!menuOpen">MENU</span>
					<span v-show="menuOpen">CLOSE</span>
				</a>
				<div class="indicator"></div>
				<div class="menu" :class="{menuOpen,closing}">
					<div class="menu-bg"></div>
					<div class="container">
						<div class="wrapper">
							<div class="menu-videos default" :class="{ active: currentMenuVideo=='default' && menuOpen }">
								<video class="hidden-mobile" playsinline  muted loop>
									<source :src="defaultVideo" type="video/mp4" />
								</video>
								<video class="hidden-desktop" playsinline  muted loop>
									<source :src="defaultVideoMobile" type="video/mp4" />
								</video>
							</div>
							<div class="menu-videos" :key="link.title" :class="{ active: index==currentMenuVideo }" v-for="(link,index) in menu">
								<video playsinline  muted loop>
									<source :src="link.background_video" type="video/mp4" />
								</video>
							</div>
							<nav>
								<ul>
									<li>
										<img class="menu-logo" src="<?php the_field('static_logo'); ?>" alt="" />
									</li>
									<li v-for="(link,index) in menu" :key="link.title" @mouseover="menuHover(index)">
										<a @click.prevent="toggleMenu(index)" href="#"><span>{{link.title}}</span></a>
									</li>
								</ul>
							</nav>
							<div class="menu-bottom">
								<div>
									<p><?php the_field('footer_tagline'); ?></p>
								</div>
								<div>
									<p><?php the_field('copyright_text'); ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>