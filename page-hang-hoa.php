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
		<?php get_sidebar("cho")?>
	<?php //endif; ?>
	<div id="primary" class="rv-content">
	

		<div id="rv-content" role="main">
			
			<?php while ( have_posts() ) : the_post(); ?>
				<?php echo do_shortcode('[AWPCPSHOWAD]'); //get_template_part( 'content', 'page' ); ?>				
				<?php //comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
		<div class="fb-comments" data-href="<?php $Path=$_SERVER['REQUEST_URI'];
$URI='http://suutapsach.com'.$Path; echo $URI; ?>" data-width="470" data-num-posts="10"></div>	
	</div><!-- #primary -->
	
	
<?php //get_sidebar(); ?>
<?php get_footer(); ?>