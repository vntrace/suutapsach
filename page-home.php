<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>
<?php get_header();?>
<div class="starter">
		<h1>Chào mừng đến với Sưu tập sách</h1>
		<p>Download sách và Trao đổi hàng hoá!</p>
	</div>
<div class="row">
	<div class="col-xs-6">
		<div class="oops pull-right">
			<a class="oops-content" href="<?php bloginfo('url') ?>/sach">
				<!-- <img src="http://placehold.it/80x80"> -->
				<img src="<?php bloginfo('template_url') ?>/images/1389387083_Book.png">
				<h3>Sách</h3>
				<p class="summary">Trang Sách nơi bạn tìm sách, truyện, tài liệu</p>
			</a>
		</div>
	</div>
	<div class="col-xs-6">
		<div class="oops pull-left">
			<a class="oops-content" href="<?php bloginfo('url') ?>/cho">
				<img src="<?php bloginfo('template_url') ?>/images/1389387923_sell.png">
				<h3>Chợ</h3>
				<p class="summary">Nơi mua bán, trao đổi hàng hoá.</p>
			</a>
		</div>
	</div>
</div>
<?php get_footer(); ?>