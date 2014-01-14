<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
 $NumberWord = 20;
?>

<?php /* Display navigation to next/previous pages when applicable */ ?>


<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
	<div class="well">
		<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyten' ); ?></p>
	</div>
<?php endif; ?>
<div class="row">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php if ( in_category( _x('gallery', 'gallery category slug', 'twentyfourteen') ) ) : ?>

			<!-- Display detail post with download link -->


		<?php else: ?>
		<?php
			$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
			$total_images = count( $images );
			$image = array_shift( $images );
			$image_img_src = wp_get_attachment_image_src( $image->ID, 'thumbnail' );
		?>
		<div class="oops-item col-xs-6 col-md-3">
			<a href="<?php the_permalink(); ?>" data-tooltip="true" class="" title="<?php the_title(); ?>">
	        	<img src="<?php echo $image_img_src[0] ?>" style="height: 162px; width: 114px;">
	      	</a>
	      	<p><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></p>
	      	<p class="small">
	      		<span class="glyphicon glyphicon-chevron-right"></span>
	      		<?php echo get_post_meta($post->ID, 'TenTacGia', true); ?>
	      	</p>

	      	<?php 
	      		$theContent = get_the_content();
				$theContent = strip_tags($theContent);
				$theContent = limit_words($theContent, 20);
	      	?>
	      	<div class="popover">
	      		<div class="arrow"></div>
		        <h3 class="popover-title"><b><?php the_title(); ?></b></h3>
		        <div class="popover-content">
		        	<?php echo $theContent; ?>
		        </div>
	      	</div>
		</div>
		<?php endif; ?>
	<?php endwhile; ?>
</div>

<?php 
/**
 * @author by Chris Coyier
 * @source http://css-tricks.com/snippets/php/truncate-string-by-words/
 */
function limit_words($words, $limit, $append = ' &hellip;') {
   // Add 1 to the specified limit becuase arrays start at 0
   $limit = $limit+1;
   // Store each individual word as an array element
   // Up to the limit
   $words = explode(' ', $words, $limit);
   // Shorten the array by 1 because that final element will be the sum of all the words after the limit
   array_pop($words);
   // Implode the array for output, and append an ellipse
   $words = implode(' ', $words) . $append;
   // Return the result
   return $words;
}
?>

<div class="row">
	<div class="col-xs-12">
		<div class="pagination pull-right">
		<?php
			global $wp_query;

			$big = 999999999; // need an unlikely integer

			echo paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'current' => max( 1, get_query_var('paged') ),
				'prev_text'    => __('«'),
				'next_text'    => __('»'),
				'mid_size'     => 8,
				'total' => $wp_query->max_num_pages,
				'type' => 'list'
			) );
		?>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$(document).tooltip({
	      	items: "[data-tooltip]",
	      	position: { 
	      		my: "left+5 center", at: "right center",
	      		using: function( position, feedback ) {
	      			$(this).css(position);

		          	var pClass = feedback.horizontal;

		          	if(pClass === "left") {
		          		pClass = "right"; 
		          	} else if(pClass === "right") {
		          		pClass = "left";	
		          	} else if(pClass === "top") { 
		          		pClass = "bottom"; 
		          	} else if(pClass === "bottom") {
		          		pClass = "top";	
		          	}

		          	$(this).find('.popover').addClass(pClass);
		        }
	      	},
	      	content: function() {
	      		// return "aaaaaa";
	      		return $(this).siblings('.popover').clone().wrap('<p>').parent().html();
        	}
	    });
	});
</script>