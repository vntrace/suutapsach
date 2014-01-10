<?php
/**
 * The template for displaying Category Archive pages.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
get_header(); 
?>
<div class="row">
	<div id="sidebar" class="col-xs-3">
		<h4>Chuyên Mục</h4>
		<ul class="nav">
			<li><a href="#">12 Chòm Sao</a></li>
			<li><a href="#">Âm Nhạc</a></li>
			<li class="active">
				<a href="#">Danh Nhân</a>
				<ul class="nav">
					<li><a href="#">Danh Nhân</a></li>
					<li><a href="#">Nhân Vật Lịch Sử</a></li>
				</ul>
			</li>
			<li><a href="#">Hồi Ký/Tùy Bút</a></li>
			<li><a href="#">Khoa Học Thần Bí</a></li>
			<li><a href="#">Kinh Tế</a></li>
		</ul>
	</div>
</div>

		<div id="container">
		<div id="site-search">
			<?php get_search_form(); ?>								
		</div>	
		<br>
		<?php 
			breadcrumb_css();
			simple_breadcrumb();
		?>
			<div id="content" role="main">

				<h1 class="page-title"><?php
					printf( __( 'Chuyên Mục: %s', 'twentyten' ), '<span>' . single_cat_title( '', false ) . '</span>' );
				?></h1>
				<?php
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo '<div class="archive-meta">' . $category_description . '</div>';

				/* Run the loop for the category page to output the posts.
				 * If you want to overload this in a child theme then include a file
				 * called loop-category.php and that will be used instead.
				 */
				get_template_part( 'loop', 'category' );
				?>

			</div><!-- #content -->
		</div><!-- #container -->

<?php // get_sidebar(); ?>
<?php get_footer(); ?>
