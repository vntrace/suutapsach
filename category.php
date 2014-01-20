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
	<div class="col-xs-3">
		<?php get_sidebar(); ?>
	</div>
	<div class="col-xs-9">
		<div id="site-search">
			<?php get_search_form(); ?>								
		</div>	
		<?php 
			breadcrumb_css();
			simple_breadcrumb();
		?>

		<?php
			get_template_part( 'loop', 'category' );
		?>
	</div>
</div>
<?php get_footer(); ?>
