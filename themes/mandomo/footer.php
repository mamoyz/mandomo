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
		</script>

        <?php wp_footer(); ?>
		<script>
			<?php require("vue.php"); ?>
		</script>
	</body>
</html>
