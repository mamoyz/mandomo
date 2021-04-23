<?php get_header(); ?>


			<section class="section hero">
				<div class="container">
					<div class="hero-wrapper">
						<div class="loading-overlay" :class="{loaded,isReady}">
							<!-- <video playsinline  muted loop>
								<source src="<?php the_field('background_video'); ?>" type="video/mp4" />
							</video> -->
						</div>
						<div class="logo-intro" :class="{loaded,isReady}">
							<img src="<?php the_field('static_logo'); ?>" alt="" />
						</div>
						<div @click="pausePlay()" :class="{loaded,isReady}" class="hero-video-play">
							<a class="hidden-desktop" @click.prevent.stop="unmute('mobile')" href="#">
								<span v-show="!playWithSoundMobile">
									<?php the_field('hero_title'); ?>
								</span>

								<svg v-show="!playWithSoundMobile" id="Capa_1" enable-background="new 0 0 494.942 494.942" height="512" viewBox="0 0 494.942 494.942" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m35.353 0 424.236 247.471-424.236 247.471z" /></svg>
							</a>
							<a class="hidden-mobile" @click.prevent.stop="unmute('desktop')" href="#">
								<span v-show="!playWithSoundDesktop">
									<?php the_field('hero_title'); ?>
								</span>

								<svg v-show="!playWithSoundDesktop" id="Capa_1" enable-background="new 0 0 494.942 494.942" height="512" viewBox="0 0 494.942 494.942" width="512" xmlns="http://www.w3.org/2000/svg"><path d="m35.353 0 424.236 247.471-424.236 247.471z" /></svg>
							</a>
						</div>
						<div class="logo" :class="{loaded,isReady}">
							<a href="#">
								<img src="<?php the_field('animated_logo'); ?>" alt="" />
							</a>
						</div>
						<video class="hidden-mobile heroVideo" playsinline  :muted="!playWithSoundDesktop" loop>
							<source src="<?php the_field('trailer_video'); ?>" type="video/mp4" />
						</video>
						<video class="hidden-desktop heroVideo" playsinline  :muted="!playWithSoundMobile" loop>
							<source src="<?php the_field('trailer_video_mobile'); ?>" type="video/mp4" />
						</video>
						<a :class="{loaded,isReady}" class="explore" href="#"><span>EXPLORE</span></a>
						<div :class="{loaded,isReady}" class="line line1"></div>
					</div>
				</div>
			</section>
			<section class="section sec-architects">
				<div class="container">
					<div class="wrapper">
						<div class="line line2"></div>
						<h2>
							<?php the_field('architects_main_title'); ?>
						</h2>
						<div class="sec2-content yz-animate">
							<div class="left yz-animate-mobile">
								<h3><?php the_field('architects_secondary_title'); ?></h3>
							</div>
							<div class="right yz-animate-mobile">
							<?php the_field('architects_content_text'); ?>
							</div>
							<div class="architects-video yz-animate-mobile">
								<video class="hidden-mobile floating-video" playsinline  muted loop>
									<source src="<?php the_field('architects_video'); ?>" type="video/mp4" />
								</video>
								<video class="hidden-desktop floating-video" playsinline  muted loop>
									<source src="<?php the_field('architects_video_mobile'); ?>" type="video/mp4" />
								</video>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="section sec-sampler">
				<div class="container">
					<div class="wrapper">
						<div class="line line3 line-on-scroll"></div>

						<div class="sec-title">
							<div :class="{loaded,isReady}" class="line line2 line-on-scroll"></div>
							<h2>
								<?php the_field('sampler_main_title'); ?>
							</h2>
						</div>
						<div class="sec-content yz-animate">
							<div class="left yz-animate-mobile">
								<video class="hidden-mobile floating-video" playsinline  muted loop>
									<source src="<?php the_field('sampler_video'); ?>" type="video/mp4" />
								</video>
								<video class="hidden-desktop floating-video" playsinline  muted loop>
									<source src="<?php the_field('sampler_video_mobile'); ?>" type="video/mp4" />
								</video>
							</div>
							<div class="right">
								<div class="audios">
									<?php 
									
									$tracks = get_field("audios");
									foreach ($tracks as $index=>$audio):
									?>
									<div class="audio-item yz-animate-mobile" data-src="<?php echo $audio['audio_file_mp3'] ?>" >
										<div class="controls" style="animation-delay:<?php  echo $index * 200 + 1000; ?>ms">
											<svg class="play" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 320.001 320.001" style="enable-background: new 0 0 320.001 320.001" xml:space="preserve">
												<path
													fill="#FFFFFF"
													d="M295.84,146.049l-256-144c-4.96-2.784-11.008-2.72-15.904,0.128C19.008,5.057,16,10.305,16,16.001v288
	c0,5.696,3.008,10.944,7.936,13.824c2.496,1.44,5.28,2.176,8.064,2.176c2.688,0,5.408-0.672,7.84-2.048l256-144
	c5.024-2.848,8.16-8.16,8.16-13.952S300.864,148.897,295.84,146.049z"
												/>
											</svg>

											<svg class="pause" height="327pt" viewBox="-45 0 327 327" width="327pt" xmlns="http://www.w3.org/2000/svg">
												<path fill="#FFFFFF" d="m158 0h71c4.417969 0 8 3.582031 8 8v311c0 4.417969-3.582031 8-8 8h-71c-4.417969 0-8-3.582031-8-8v-311c0-4.417969 3.582031-8 8-8zm0 0" />
												<path fill="#FFFFFF" d="m8 0h71c4.417969 0 8 3.582031 8 8v311c0 4.417969-3.582031 8-8 8h-71c-4.417969 0-8-3.582031-8-8v-311c0-4.417969 3.582031-8 8-8zm0 0" />
											</svg>
										</div>
										<div class="file-info" style="animation-delay:<?php  echo $index * 200 + 1000; ?>ms">
											<span class="filename"><?php echo $audio['title'] ?></span>
											<span class="duration"><?php echo $audio['duration'] ?></span>
										</div>
										<div class="soundwave" style="animation-delay:<?php  echo $index * 200 + 1500; ?>ms">
											<div class="audio-preloader">
												<svg id="wave" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 38.05">
													<path id="Line_1" data-name="Line 1" d="M0.91,15L0.78,15A1,1,0,0,0,0,16v6a1,1,0,1,0,2,0s0,0,0,0V16a1,1,0,0,0-1-1H0.91Z" />
													<path id="Line_2" data-name="Line 2" d="M6.91,9L6.78,9A1,1,0,0,0,6,10V28a1,1,0,1,0,2,0s0,0,0,0V10A1,1,0,0,0,7,9H6.91Z" />
													<path id="Line_3" data-name="Line 3" d="M12.91,0L12.78,0A1,1,0,0,0,12,1V37a1,1,0,1,0,2,0s0,0,0,0V1a1,1,0,0,0-1-1H12.91Z" />
													<path id="Line_4" data-name="Line 4" d="M18.91,10l-0.12,0A1,1,0,0,0,18,11V27a1,1,0,1,0,2,0s0,0,0,0V11a1,1,0,0,0-1-1H18.91Z" />
													<path id="Line_5" data-name="Line 5" d="M24.91,15l-0.12,0A1,1,0,0,0,24,16v6a1,1,0,0,0,2,0s0,0,0,0V16a1,1,0,0,0-1-1H24.91Z" />
													<path id="Line_6" data-name="Line 6" d="M30.91,10l-0.12,0A1,1,0,0,0,30,11V27a1,1,0,1,0,2,0s0,0,0,0V11a1,1,0,0,0-1-1H30.91Z" />
													<path id="Line_7" data-name="Line 7" d="M36.91,0L36.78,0A1,1,0,0,0,36,1V37a1,1,0,1,0,2,0s0,0,0,0V1a1,1,0,0,0-1-1H36.91Z" />
													<path id="Line_8" data-name="Line 8" d="M42.91,9L42.78,9A1,1,0,0,0,42,10V28a1,1,0,1,0,2,0s0,0,0,0V10a1,1,0,0,0-1-1H42.91Z" />
													<path id="Line_9" data-name="Line 9" d="M48.91,15l-0.12,0A1,1,0,0,0,48,16v6a1,1,0,1,0,2,0s0,0,0,0V16a1,1,0,0,0-1-1H48.91Z" />
												</svg>
												<span>Loading Audio</span>
											</div>
											<div class="waveform audio-item-<?php echo $index; ?>"></div>
										</div>
									</div>
									<?php endforeach; ?>
								</div>
								<div class="content yz-animate yz-animate-mobile">
									<?php the_field('sampler_text_content'); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="section sec-credits yz-animate">
				<div class="container">
					<div class="credits-video yz-animate-mobile">
						<video class="hidden-mobile floating-video" playsinline  muted loop>
							<source src="<?php the_field('credits_video'); ?>" type="video/mp4" />
						</video>
							<video class="hidden-desktop floating-video" playsinline  muted loop>
							<source src="<?php the_field('credits_video_mobile'); ?>" type="video/mp4" />
						</video>
					</div>
					<div class="wrapper">
						<div class="sec-title">
							<h2>
								<?php the_field('credits_main_title'); ?>
							</h2>
						</div>
						<div class="credits-logos yz-animate-mobile">
							<div class="credits-logos-wrapper">
								<div class="logo-item" :style="'animation-delay:'+ (index*100+1000)+'ms'" v-for="(logo,index) in logos" v-show="index < logos.length - 1">
									<credit-img :src="logo"></credit-img>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="section sec-contact yz-animate">
				<div class="container">
					<div class="wrapper">
						<div class="line line4 line-on-scroll"></div>

						<div class="contact-form">
					<?php
					$shortcode = '[contact-form-7 id="'.get_field("contact_form").'" title="Mandomo Contact Form"]';
					 echo do_shortcode($shortcode) ;
					?>
						</div>
						<div class="contact-right">
							<h2>
								<?php the_field('contact_main_title'); ?>
							</h2>
							<div class="contact-video yz-animate-mobile">
								<video class="hidden-mobile floating-video" playsinline  muted loop>
									<source src="<?php the_field('contact_video_copy'); ?>" type="video/mp4" />
								</video>
								<video class="hidden-desktop floating-video" playsinline  muted loop>
									<source src="<?php the_field('contact_video_mobile'); ?>" type="video/mp4" />
								</video>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- <div class="video-bg" :class="{loaded,isReady}">
				<video playsinline  muted loop>
					<source src="<?php the_field('background_video'); ?>" type="video/mp4" />
				</video>
			</div> -->

<?php get_footer(); ?>
