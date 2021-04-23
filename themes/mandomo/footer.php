			<footer>
				<div class="container">
					<div class="wrapper">
						<div>
							<div class="footer-logo">
								<img src="<?php the_field('static_logo'); ?>" alt="" />
							</div>
						</div>
						<div>
							<p><?php the_field('footer_tagline'); ?></p>
						</div>
						<div><?php the_field('copyright_text'); ?></div>
					</div>
				</div>
			</footer>
		</div>
		<script>
			if (navigator.userAgent.indexOf("Trident") > 0) {
				document.querySelector("#app").innerHTML = "<div id='ie-notice'><p>Please Upgrade Your Browser!</p></div>";
			}
		window.addEventListener("load", function(){
			setTimeout(function() {
					let wavesurfers = [];
			$.each($(".audio-item"), function (index) {
				let src = $(this).attr("data-src");
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
			}, 1000);
		});

		</script>

        <?php wp_footer(); ?>
		<script>
			<?php require("vue.php"); ?>
		</script>
	</body>
</html>
