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
<div class="row">
	<div class="col-xs-3">
		<ul id="cho-sidebar">
			<?php dynamic_sidebar('cho-sidebar-widget-area'); ?>
		</ul>
		<?php //get_sidebar('cho'); ?>
	</div>
	<div class="col-xs-9">
		<?php while ( have_posts() ) : the_post(); ?>
			<?php echo do_shortcode('[AWPCPSEARCHADS]'); //get_template_part( 'content', 'page' ); ?>				
			<?php //comments_template( '', true ); ?>
		<?php endwhile; // end of the loop. ?>
	</div>
</div>
<?php get_footer(); ?>