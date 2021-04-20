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
		<title>Mandomo</title>
		<script>
			window.addEventListener("orientationchange", function () {
				window.location.reload();
			});
		</script>
        <?php wp_head(); ?>
	</head>
	<body>
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
								<video class="hidden-mobile" playsinline autoplay muted loop>
									<source :src="defaultVideo" type="video/mp4" />
								</video>
								<video class="hidden-desktop" playsinline autoplay muted loop>
									<source :src="defaultVideoMobile" type="video/mp4" />
								</video>
							</div>
							<div class="menu-videos" :key="link.title" :class="{ active: index==currentMenuVideo }" v-for="(link,index) in menu">
								<video playsinline autoplay muted loop>
									<source :src="link.video" type="video/mp4" />
								</video>
							</div>
							<nav>
								<ul>
									<li>
										<img class="menu-logo" src="static/images/logo.png" alt="" />
									</li>
									<li v-for="(link,index) in menu" :key="link.title" @mouseover="menuHover(index)">
										<a @click.prevent="toggleMenu(index)" href="#"><span>{{link.title}}</span></a>
									</li>
								</ul>
							</nav>
							<div class="menu-bottom">
								<div>
									<p>ARCHITECTS OF IDENTITY</p>
								</div>
								<div>
									<p>COPTRIGHT 2021 MANDOMO LLC.</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>