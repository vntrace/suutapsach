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
 $NumberWord = 50;
?>

<?php /* Display navigation to next/previous pages when applicable */ ?>


<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
	<div id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'twentyten' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyten' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</div><!-- #post-0 -->
<?php endif; ?>

<?php
	/* Start the Loop.
	 *
	 * In Twenty Ten we use the same loop in multiple contexts.
	 * It is broken into three main parts: when we're displaying
	 * posts that are in the gallery category, when we're displaying
	 * posts in the asides category, and finally all other posts.
	 *
	 * Additionally, we sometimes check for whether we are on an
	 * archive page, a search page, etc., allowing for small differences
	 * in the loop on each template without actually duplicating
	 * the rest of the loop that is shared.
	 *
	 * Without further ado, the loop:
	 */ ?>
	 <style type="text/css">
#left{
    float: left; 
    width:  50%; 
    
}
#right{
    float: right; 
    width: 50%;    
}
.clr{clear: both;}

#inline3{	
	position:relative;
}
.clear{
	height:1px;
	font-size:1px;
	float:none;
	clear:both;
}
#columnpage {
  column-width:15em;
  column-gap: 4em
}
</style>
	<?php $i = 0; ?> 	
<?php while ( have_posts() ) : the_post(); ?>
<?php if($i%2 == 0){?>
<div id="inline3">
<div id="left">
<?php } ?>

<?php if($i%2 != 0){?>
<div id="right">
<?php } ?>
<?php /* How to display posts in the Gallery category. */ ?>

	<?php if ( in_category( _x('gallery', 'gallery category slug', 'twentyten') ) ) : ?>
		<div id="post-<?php //the_ID(); ?> " style='border-width: 4px; border-style: double; border-color: red;' <?php //post_class(); ?>>
			<h2 class="entry-title"><a href="<?php //the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php echo '<span style="color:blue">Tên Sách: </span>';the_title(); ?></a></h2>

			<div class="entry-meta">
				<?php //twentyten_posted_on(); ?>
			</div><!-- .entry-meta -->

			<div class="entry-content">
<?php if ( post_password_required() ) : ?>
				<?php 				
				$theContent = get_the_content();
				$theContent = explode(' ', $theContent, $NumberWord);
				array_pop($theContent);
				$theContent = str_replace("height=", "", $theContent);
				$theContent = str_replace("width=", "", $theContent);
				$theContent = ReplaceStringTag($theContent);		
				$theContent = str_replace('<img', '<img style="float:left" height="162" width="114"', $theContent);
				$theContent = implode(" ",$theContent)."...";				
				echo $theContent; ?> <a href="<?php the_permalink(); ?>">Xem Chi Tiết</a>
				<?php //the_content('Xem Chi Tiết...');  ?>
<?php else : ?>
				<div class="gallery-thumb">
<?php 
	$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
	$total_images = count( $images );
	$image = array_shift( $images );
	$image_img_tag = wp_get_attachment_image( $image->ID, 'thumbnail' );
?>
					<a class="size-thumbnail" href="<?php //the_permalink(); ?>"><?php echo $image_img_tag; ?></a>
				</div><!-- .gallery-thumb -->
				<p><em><?php printf( __( 'This gallery contains <a %1$s>%2$s photos</a>.', 'twentyten' ),
						'href="' . /*get_permalink() .*/ '" title="' . sprintf( esc_attr__( 'Permalink to %s', 'twentyten' ), the_title_attribute( 'echo=0' ) ) . '" rel="bookmark"',
						$total_images
					); ?></em></p>

				<?php //the_excerpt(); 
				
				$theContent = get_the_content();
				$theContent = explode(' ', $theContent, $NumberWord);
				array_pop($theContent);
				$theContent = str_replace("height=", "", $theContent);
				$theContent = str_replace("width=", "", $theContent);
				$theContent = ReplaceStringTag($theContent);		
				$theContent = str_replace('<img', '<img style="float:left" height="162" width="114"', $theContent);
				$theContent = implode(" ",$theContent)."...";				
				echo $theContent; ?> <a href="<?php the_permalink(); ?>">Xem Chi Tiết</a>?>
				<?php //global $more;    // Declare global $more (before the loop).
				//$more = 0;       // Set (inside the loop) to display all content, including text below more.
				?>
				<?php //the_content('Xem Chi Tiết...');  ?>
<?php endif; ?>
			</div><!-- .entry-content -->

			<div class="entry-utility">
				<a href="<?php  echo get_term_link( _x('gallery', 'gallery category slug', 'twentyten'), 'category' ); ?>" title="<?php esc_attr_e( 'View posts in the Gallery category', 'twentyten' ); ?>"><?php _e( 'More Galleries', 'twentyten' ); ?></a>
				<span class="meta-sep">|</span>
				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'twentyten' ), __( '1 Comment', 'twentyten' ), __( '% Comments', 'twentyten' ) ); ?></span>
				<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
			</div><!-- .entry-utility -->
		</div><!-- #post-## -->

<?php /* How to display posts in the asides category */ ?>

	<?php elseif ( in_category( _x('asides', 'asides category slug', 'twentyten') ) ) : ?>
		<div id="post-<?php //the_ID(); ?>" style='border-width: 4px; border-style: double; border-color: red; ' <?php //post_class(); ?>>

		<?php if ( is_archive() || is_search() ) : // Display excerpts for archives and search. ?>
			<div class="entry-summary">
				<?php 			
					
				$theContent = get_the_content();
				$theContent = explode(' ', $theContent, $NumberWord);
				array_pop($theContent);
				$theContent = str_replace("height=", "", $theContent);
				$theContent = str_replace("width=", "", $theContent);
				$theContent = ReplaceStringTag($theContent);	
				$theContent = str_replace('<img', '<img style="float:left" height="162" width="114"', $theContent);
				$theContent = implode(" ",$theContent)."...";				
				echo $theContent; ?> <a href="<?php the_permalink(); ?>">Xem Chi Tiết</a>
				<?php //the_content('Xem Chi Tiết...');  ?>
			</div><!-- .entry-summary -->
		<?php else : ?>
			<div class="entry-content">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?>
			</div><!-- .entry-content -->
		<?php endif; ?>
<!--
			<div class="entry-utility">
				<?php //twentyten_posted_on(); ?>
				<span class="meta-sep">|</span>
				<span class="comments-link"><?php //comments_popup_link( __( 'Leave a comment', 'twentyten' ), __( '1 Comment', 'twentyten' ), __( '% Comments', 'twentyten' ) ); ?></span>
				<?php //edit_post_link( __( 'Edit', 'twentyten' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
			</div><!-- .entry-utility -->
		<!--</div>--><!-- #post-## -->

<?php /* How to display all other posts. */ ?>

	<?php else : ?>
		<div id="post-<?php //the_ID(); ?>" style='border-width: 1px; border-style: solid; border-color: black; height:300px'<?php //post_class(); ?>>
			<h1 class="entry-title"><?php echo '<span style="color:blue">Tên Sách: </span>';the_title() ?></h1>
			<h2 class="entry-title"><?php echo '<span style="color:blue">Tên Tác Giả: </span>'; echo get_post_meta($post->ID, 'TenTacGia', true); ?></h2>

			<div class="entry-meta">
				<?php //twentyten_posted_on(); ?>
			</div><!-- .entry-meta -->

	<?php if ( is_archive() || is_search() ) : // Only display excerpts for archives and search. ?>
			<div class="entry-summary">
				<?php //the_excerpt(); ?>				
				<?php 							
				$theContent = get_the_content();
				$theContent = explode(' ', $theContent, $NumberWord);
				array_pop($theContent);
				$theContent = str_replace("height=", "", $theContent);
				$theContent = str_replace("width=", "", $theContent);
				$theContent = ReplaceStringTag($theContent);	
				$theContent = str_replace('<img', '<img style="float:left" height="162" width="114"', $theContent);
				$theContent = implode(" ",$theContent)."...";				
				echo $theContent; ?> <a href="<?php the_permalink(); ?>">Xem Chi Tiết</a>
				<?php //global $more;    // Declare global $more (before the loop).
				//$more = 0;       // Set (inside the loop) to display all content, including text below more.
				//the_content('Xem Chi Tiết...');  ?>
			</div><!-- .entry-summary -->
	<?php else : ?>
			<div class="entry-content">
			
				<?php 
				
				$theContent = get_the_content();
				$theContent = explode(' ', $theContent, $NumberWord);
				array_pop($theContent);
				$theContent = str_replace("height=", "", $theContent);
				$theContent = str_replace("width=", "", $theContent);
				$theContent = ReplaceStringTag($theContent);
				
				//$theContent = preg_replace('/<address>.*<\/<address>/', '', $theContent);
				$theContent = str_replace('<img', '<img style="float:left" height="162" width="114"', $theContent);
				$theContent = implode(" ",$theContent)."...";				
				echo $theContent; ?> <a href="<?php the_permalink(); ?>">Xem Chi Tiết</a>
				<?php // the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentyten' ) ); ?>				
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->
	<?php endif; ?>

			<div class="entry-utility">
				<?php if ( count( get_the_category() ) ) : ?>
					<span class="cat-links">
						<?php //printf( __( '<span class="%1$s">Posted in</span> %2$s', 'twentyten' ), 'entry-utility-prep entry-utility-prep-cat-links', get_the_category_list( ', ' ) ); ?>
					</span>
					<span class="meta-sep"></span>
				<?php endif; ?>
				<?php
					$tags_list = get_the_tag_list( '', ', ' );
					if ( $tags_list ):
				?>
					<span class="tag-links">
						<?php //printf( __( '<span class="%1$s">Tagged</span> %2$s', 'twentyten' ), 'entry-utility-prep entry-utility-prep-tag-links', $tags_list ); ?>
					</span>
					<span class="meta-sep"></span>
				<?php endif; ?>
				<span class="comments-link"><?php //comments_popup_link( __( 'Leave a comment', 'twentyten' ), __( '1 Comment', 'twentyten' ), __( '% Comments', 'twentyten' ) ); ?></span>
				<?php //edit_post_link( __( 'Edit', 'twentyten' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
			</div><!-- .entry-utility -->
		</div><!-- #post-## -->

		<?php comments_template( '', true ); ?>

	<?php endif; // This was the if statement that broke the loop into three parts based on categories. ?>
</div>

<?php if($i%2 != 0){?>	
</div>
<div class="clear"> </div>
<?php } ?>

<?php $i ++;?>
<?php endwhile; // End the loop. Whew. ?>
<?php if($i%2 != 0){?>	
</div>
<?php } ?>
<div class="clr">
<br>
<br>
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
	'total' => $wp_query->max_num_pages
) );
?>
</div>
<?php 
function content($num) {
$theContent = get_the_content();
$output = preg_replace('/<img[^>]+./','', $theContent);
$output = preg_replace( '/<blockquote>.*<\/blockquote>/', '', $output );
$output = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $output );
$limit = $num+1;
$content = explode(' ', $output, $limit);
array_pop($content);
$content = implode(" ",$content)."...";
echo $content;
}
function ReplaceStringTag($theContent)
{
	$theContent = str_replace("<strong>", "", $theContent);				
	$theContent = str_replace("</strong>", "", $theContent);	
	
	$theContent = str_replace("<h2>", "", $theContent);				
	$theContent = str_replace("</h2>", "", $theContent);		
	
	$theContent = str_replace("<address>", "", $theContent);				
	$theContent = str_replace("</address>", "", $theContent);
	
	$theContent = str_replace("<div>", "", $theContent);				
	$theContent = str_replace("</div>", "", $theContent);	
	
	//$theContent = preg_replace("<>", '', $theContent);
	
	return $theContent;
}
?>
