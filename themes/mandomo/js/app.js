Vue.component("credit-img", {
	name: "credit-img",
	props: {
		src: String,
	},
	data() {
		return {
			updating: false,
			dataSrc: "",
		};
	},
	template: `
	<div class="logo-item-wrapper">
		<div class='logo-item-inner' :class='{hidden:updating}'>
			<img  :src='dataSrc'>
		</div>
		<div class='logo-item-inner'  :class='{visible:!updating}'>
			<img :src='dataSrc'>
		</div>
	</div>
	`,
	created() {
		this.dataSrc = this.src;
	},
	watch: {
		src: function (val, oldVal) {
			this.updating = true;
			setTimeout(() => {
				this.updating = false;
				this.dataSrc = this.src;
			}, 200);
		},
	},
});
var app = new Vue({
	el: "#app",
	data: {
		message: "Hello Vue!",
		loaded: false,
		percentage: 0,
		isReady: false,
		menuOpen: false,
		playWithSoundDesktop: false,
		playWithSoundMobile: false,
		isPlaying: true,
		tracks: [
			{ duration: "02:42", title: "Dawn of War", src: "static/audios/0_Dansonn_DawnOfWar_Cmin_75BPM_MP3.mp3" },
			{ duration: "02:23", title: "Unbreakable", src: "static/audios/1_Dansonn_Unbreakable_Emin_124BPM_MP3.mp3" },
			{ duration: "02:50", title: "Risen", src: "static/audios/3_Dansonn_Risen_Dmin_104BPM_MP3.mp3" },
			{ duration: "02:28", title: "Burn", src: "static/audios/4_Dansonn_Burn_CSharpmin_118BPM_MP3.mp3" },
		],
		logos: [
			{ id: 0, src: "static/images/logos/Mandomo_Credit_Logos_0010_espn.png" },
			{ id: 1, src: "static/images/logos/Mandomo_Credit_Logos_0011_netflix.png" },
			{ id: 2, src: "static/images/logos/Mandomo_Credit_Logos_0012_NBA.png" },
			{ id: 3, src: "static/images/logos/Mandomo_Credit_Logos_0013_Vossen.png" },
			{ id: 4, src: "static/images/logos/Mandomo_Credit_Logos_0014_Maverik.png" },
			{ id: 5, src: "static/images/logos/Mandomo_Credit_Logos_0015_Salomon.png" },
			{ id: 6, src: "static/images/logos/Mandomo_Credit_Logos_0016_Whistler.png" },
			{ id: 7, src: "static/images/logos/Mandomo_Credit_Logos_0017_TheForeigner.png" },
			{ id: 8, src: "static/images/logos/Mandomo_Credit_Logos_0000_tencent.png" },
			{ id: 9, src: "static/images/logos/Mandomo_Credit_Logos_0001_HSBC.png" },
			{ id: 10, src: "static/images/logos/Mandomo_Credit_Logos_0002_special-olympics.png" },
			{ id: 11, src: "static/images/logos/Mandomo_Credit_Logos_0003_BET.png" },
			{ id: 12, src: "static/images/logos/Mandomo_Credit_Logos_0004_tennis-logo.png" },
			{ id: 13, src: "static/images/logos/Mandomo_Credit_Logos_0005_the-CW.png" },
			{ id: 14, src: "static/images/logos/Mandomo_Credit_Logos_0006_NFL.png" },
			{ id: 15, src: "static/images/logos/Mandomo_Credit_Logos_0007_PGA.png" },
			{ id: 16, src: "static/images/logos/Mandomo_Credit_Logos_0008_sketchers.png" },
			{ id: 17, src: "static/images/logos/Mandomo_Credit_Logos_0009_new-balance.png" },
			{ id: 18, src: "static/images/logos/Mandomo_Credit_Logos_0019_Golf_Channel.png" },
		],
		spareLogo: "",
		textarea: "",
		pageRight: 0,
		closing: false,
		menu: [
			{ title: "Home", video: "static/videos/menu/home.mp4" },
			{ title: "About", video: "static/videos/menu/architects.mp4" },
			{ title: "Music", video: "static/videos/menu/sampler.mp4" },
			{ title: "Credits", video: "static/videos/menu/credits.mp4" },
			{ title: "Contact", video: "static/videos/menu/contact.mp4" },
		],
		currentMenuVideo: "default",
		defaultVideo: "static/videos/menu/mandomo_generalmenu.mp4",
		defaultVideoMobile: "static/videos/menu/mandomo_generalmenu_mobile.mp4",
	},
	methods: {
		menuHover(index) {
			if (!this.closing) this.currentMenuVideo = index;
		},
		toggleMenu(index) {
			this.currentMenuVideo = "default";

			if (!this.menuOpen) {
				this.menuOpen = true;
			} else {
				this.closing = true;
				setTimeout(() => {
					this.menuOpen = false;
					this.closing = false;
					if (index) {
						$(".indicator > a").eq(index).click();
					}
				}, 3000);

				if (index) {
					setTimeout(() => {
						$(".indicator > a").eq(index).click();
					}, 3500);
				}
			}
		},
		progress() {
			let int = setInterval(() => {
				this.loaded = document.readyState === "complete";
				if (this.loaded) {
					window.scrollTo(0, 0);

					console.log("LOADED");
					this.initSoundWave();
					$(".heroVideo.hidden-desktop")[0].currentTime = 11;
					$(".heroVideo.hidden-mobile")[0].currentTime = 11;
					setTimeout(() => {
						this.isReady = true;
						$("body").css({ "overflow-y": "scroll", height: "auto" });
					}, 8000);
					// }, 1000);
					return clearInterval(int);
				}
			}, 100);
		},
		unmute(device) {
			if (device == "desktop") {
				if (this.playWithSoundDesktop) {
					this.playWithSoundDesktop = false;
				} else {
					this.playWithSoundDesktop = true;
					$(".heroVideo:visible")[0].play();
					$(".heroVideo:visible")[0].currentTime = 0;
					this.isPlaying = true;
				}
			}
			if (device == "mobile") {
				if (this.playWithSoundMobile) {
					this.playWithSoundMobile = false;
				} else {
					this.playWithSoundMobile = true;
					$(".heroVideo:visible")[0].play();
					$(".heroVideo:visible")[0].currentTime = 0;
					this.isPlaying = true;
				}
			}
		},
		randomTitle(word) {
			let count = word.length;
			let repeat = 2;
			let output = "";
			let counter = 0;
			let interval = setInterval(() => {
				let output = "";
				if (counter == repeat * count + 1) {
					clearInterval(interval);
				}
				for (let j = 0; j < count; j++) {
					let randomCharacter = Math.floor(Math.random() * this.characters.length);
					// const element = array[j];
					if ((j + 1) * repeat <= counter) {
						output += word[j];
					} else {
						output += this.characters[randomCharacter];
					}
					// console.log(output);
				}
				counter++;
			}, 30);
			// return interval;
		},
		randomizeLogos() {
			const randomIndex = Math.floor(Math.random() * (this.logos.length - 1));
			const tmp = this.logos[randomIndex];
			this.logos[randomIndex] = this.logos[this.logos.length - 1];
			this.logos[this.logos.length - 1] = tmp;
			this.$forceUpdate();
			// if (lastAddIndex != addIndex || removeIndex != lastRemoveIndex) {
			// 	lastAddIndex = addIndex;
			// 	lastRemoveIndex = removeIndex;
			// 	this.logos[removeIndex] = this.logos[addIndex];
			// 	this.$forceUpdate();
			// 	setTimeout(() => {
			// 		this.logos[addIndex] = tmp;
			// 	}, 2000);
			// }
			// const randomIndex = Math.floor(Math.random() * this.logos.length);
			// const randomIndex2 = Math.floor(Math.random() * this.logos.length);
		},
		calcPageRight() {
			this.pageRight = parseInt((window.innerWidth - 1920) / 2) + 170 + "px";
			let vh = window.innerHeight * 0.01;
			document.documentElement.style.setProperty("--vh", `${vh}px`);
		},
		pausePlay() {
			if (this.isPlaying) {
				$(".heroVideo:visible")[0].pause();
				this.playWithSoundDesktop = false;
				this.playWithSoundMobile = false;
			} else {
				$(".heroVideo:visible")[0].stop();

				$(".heroVideo:visible")[0].play();
			}
			this.isPlaying = !this.isPlaying;
		},
		initSoundWave() {
			let wavesurfers = [];
			$.each($(".audio-item"), function (index) {
				let src = $(this).data("src");
				const waveHeight = parseInt((70 / 1920) * $(window).innerWidth());

				let wavesurfer = WaveSurfer.create({
					container: ".audio-item-" + index,
					progressColor: "#FFFFFF",
					cursorColor: "transparent",
					waveColor: "#36373f",
					normalize: true,
					barHeight: waveHeight,
					height: waveHeight,
					partialRender: true,
					responsive: true,
				});
				wavesurfer.load(src);
				wavesurfers.push(wavesurfer);
				wavesurfer.on("loading", function (e) {
					$(".audio-item")
						.eq(index)
						.find(".soundwave .audio-preloader span")
						.html("LOADING " + e + "%");
				});
				wavesurfer.on("ready", function () {
					$(".audio-item").eq(index).find(".soundwave").addClass("loaded");
				});
				$(this)
					.find(".play")
					.click(function () {
						$(".controls").removeClass("playing");
						$(this).closest(".controls").addClass("playing");
						for (const w in wavesurfers) {
							wavesurfers[w].pause();
						}
						$(".heroVideo:visible")[0].pause();
						wavesurfers[index].play();
					});
				$(this)
					.find(".pause")
					.click(function () {
						$(this).closest(".controls").removeClass("playing");
						wavesurfers[index].pause();
					});
			});
		},
	},
	created() {
		this.spareLogo = this.logos[this.logos.length - 1];
		this.progress();
	},
	computed: {
		filteredLogos() {
			return this.logos.slice(0, this.logos.length - 1);
		},
	},
	mounted() {
		console.log(`



		

█▀▄▀█ ▄▀█ █▄░█ █▀▄ █▀█ █▀▄▀█ █▀█
█░▀░█ █▀█ █░▀█ █▄▀ █▄█ █░▀░█ █▄█





		`);

		let template = "";
		for (let index = 0; index < $(".section").length; index++) {
			if (index == 0) {
				template += '<a href="#" class="active"><span></span></a>';
			} else {
				template += '<a href="#"><span></span></a>';
			}
		}
		$(".indicator").html(template);
		window.addEventListener("resize", this.calcPageRight);
		window.addEventListener("load", this.calcPageRight);
		var pageMainTitle = document.getElementById("pageMainTitle");
		var typewriter = new Typewriter(pageMainTitle, {
			loop: true,
			delay: 50,
		});

		setTimeout(() => {
			-(-(-(-typewriter.typeString("<strong>We should work together</strong>").pauseFor(3000).deleteAll(15).typeString("<strong>Let's build the world you imagine</strong>").pauseFor(3000).deleteAll(15).typeString("<strong>Construct a world with us</strong>").pauseFor(3000).deleteAll(15).typeString("<strong>Partner with the future</strong>").pauseFor(3000).pauseFor(3000).start())));
		}, 0);

		setInterval(() => {
			// this.randomizeLogos();
			this.randomizeLogos();
		}, 700);

		let wTop = 0;

		$(window).on("scroll", (e) => {
			e.preventDefault();

			let wHeight = $(window).innerHeight();
			let $line1 = $(".line.line1");
			let $line1Top = $line1.offset().top;
			let $line1Height = $line1.css("height").replace("px", "");
			let $newHeight = wTop + wHeight * 0.9 - $line1Top;
			// if (wTop % 5 == 0) {
			$.each($(".line-on-scroll"), function () {
				if (wTop < $(window).scrollTop()) {
					// Direction == DOWN
					if (wTop + wHeight * 0.9 > $(this).offset().top) {
						$(this).css({
							height: wTop + wHeight * 0.9 - $(this).offset().top + "px",
						});
					}
				} else {
					// direction == UP
					$(this).css({
						height: wTop + wHeight * 0.9 - $(this).offset().top + "px",
					});
				}
			});
			if (wTop < $(window).scrollTop()) {
				// Direction == DOWN
				if (wTop + wHeight * 0.9 > $line1Top) {
					$line1.css({
						height: $newHeight + "px",
					});
				}
			} else {
				// direction == UP
				$line1.css({
					height: $newHeight + "px",
				});
			}
			// }
			wTop = $(window).scrollTop();

			$.each($(".random-title").not(".animated"), function () {
				let word = $(this).data("content");
				if (wTop + wHeight * 0.5 > $(this).offset().top) {
					let count = word.length;
					let repeat = 2;
					let counter = 0;
					let characters = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%^&*()_+~|></";
					let interval = setInterval(() => {
						$(this).addClass("animated");
						let output = "";
						if (counter == repeat * count + 1) {
							clearInterval(interval);
						}
						for (let j = 0; j < count; j++) {
							let randomCharacter = Math.floor(Math.random() * characters.length);

							if ((j + 1) * repeat <= counter) {
								output += word[j];
							} else {
								if (word[j] == " ") {
									output += " ";
								} else {
									output += characters[randomCharacter];
								}
							}

							$(this).text(output);
						}
						counter++;
					}, 70);
				}
			});
			$.each($(".yz-animate"), function () {
				let orientation = $(window).innerWidth() > $(window).innerHeight() ? "landscape" : "portrait";
				if ($(window).innerWidth() > 1023 || ($(window).innerWidth() <= 1023 && orientation == "landscape")) {
					if (wTop + wHeight * 0.7 > $(this).offset().top) {
						$(this).addClass("init");
					}
				}
			});
			$.each($(".yz-animate-mobile"), function () {
				if ($(window).innerWidth() < 1024) {
					if (wTop + wHeight * 0.7 > $(this).offset().top) {
						$(this).addClass("init");
					}
				}
			});
			$.each($(".section"), function () {
				if ($(this).index() > 1) {
					if (wTop + wHeight > $(this).offset().top && wTop < $(this).offset().top + $(this).innerHeight()) {
						let offset = (wTop + wHeight - $(this).offset().top) / $(this).innerHeight();

						let translate = offset.toFixed(2) * 30 * -1;
						let translateVideo = offset.toFixed(2) * 45 * -1;
						$(this).css({ transform: "translate(0," + translate + "px)" });
						$(this)
							.find(".floating-video")
							.css({ transform: "translate(0," + translateVideo + "px)" });
					}
				}
				if (wTop + wHeight * 0.3 > $(this).offset().top) {
					$(".indicator a").removeClass("active");
					$(".indicator a")
						.eq($(this).index() - 1)
						.addClass("active");
				}
			});
		});

		$(document).on("click", ".indicator a", function (e) {
			e.preventDefault();

			let $target = $(".section").eq($(this).index())[0];
			let $targetTop = $($target).offset().top - $(window).innerHeight() * 0.05 + "px";
			if ($(this).index() == 1) {
				$targetTop = $($target).offset().top + "px";
			}
			$("html, body").animate(
				{
					scrollTop: $targetTop,
				},
				2000,
				"swing"
			);
		});
	},
});
