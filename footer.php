</div>
<footer class="oops-footer">
	<div class="container">
		<div class="row">
			<div class="col-xs-6">
				<ul class="footer-link">
					<li><a href="#">Home</a></li>
					<li><a href="#">Sách</a></li>
					<li><a href="#">Chợ</a></li>
					<li><a href="#">Giới thiệu</a></li>
				</ul>
			</div>
			<div class="col-xs-6">
				<ul class="footer-link pull-right">
					<li><a href="#"><img width="32" height="32" src="<?php bloginfo('template_url') ?>/images/facebook_square.png"></a></li>
					<li><a href="#"><img width="32" height="32" src="<?php bloginfo('template_url') ?>/images/twitter_square.png"></a></li>
					<li><a href="#"><img width="32" height="32" src="<?php bloginfo('template_url') ?>/images/google_square.png"></a></li>
				</ul>
			</div>
		</div>
	</div>
</footer>

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */

	wp_footer();
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=137130636475970";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>
