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

get_header(); ?>
<?php //if ( is_active_sidebar( 'sidebar-1' ) ) : ?>		
	<?php //endif; ?>
	<div id="secondary" class="rv-menu" role="complementary">
		<div id="mainlayout" class="awpcp-categories-list">
		<div class="menu-ad">
		<ul class="top-level-categories showcategoriesmainlist clearfix">
		<li style="border-top:1px solid #DDD" class="columns-1">
		<a title="Home" href="http://www.suutapsach.com/home/">Home</a>
		</li>
		</ul>
		<ul class="top-level-categories showcategoriesmainlist clearfix">
		<li style="border-top:1px solid #DDD" class="columns-1">
		<a title="Sách" href="http://www.suutapsach.com/sach/">Sách</a>
		</li>
		</ul>	
		<ul class="top-level-categories showcategoriesmainlist clearfix">
		<li style="border-top:1px solid #DDD" class="columns-1">
		<a title="Chợ" href="http://www.suutapsach.com/cho/">Chợ</a>
		</li>
		</ul>	
<ul class="top-level-categories showcategoriesmainlist clearfix">
		<li style="border-top:1px solid #DDD" class="columns-1">
		<a title="Giới Thiệu" href="http://www.suutapsach.com/gioi-thieu/">Giới Thiệu</a>
		</li>
		</ul>		
			</div>		
	</div><!-- #secondary -->	
	</div>
	<div id="primary" class="rv-content" style="padding-bottom:150px">	
		<div id="rv-content" role="main">
			<div id="classiwrapper">
			<span><b>Giới Thiệu:</b></span>

			<br>
			<br>
			<span>Sưu tầm kiến thức và chia sẻ cho tất cả.</span>

			<br>
			<br>
			<span>Mua bán trao đổi hàng hoá.</span>

			<br>
			<br>
			<span>Mọi thông tin thắc mắc xin vui lòng gửi về email sau: sts@suutapsach.com!<span>

			<br>
			<br>
			<span>Sưu Tập Sách rất mong ủng hộ của mọi người để Sưu Tập Sách ngày càng hoàn thiện hơn và phụ vụ tốt hơn nữa. Sưu Tập Sách cảm ơn cả nhà!<span>
			</div>
		</div><!-- #content -->
	</div><!-- #primary -->
	
	
<?php //get_sidebar(); ?>
<?php get_footer(); ?>