<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

<div class="container">
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

			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div class="row" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="col-xs-5">
						<div class="well">
							<?php  
								$images = get_children( array( 'post_parent' => $post->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'numberposts' => 999 ) );
								$total_images = count( $images );
								$image = array_shift( $images );
								$image_img_src = wp_get_attachment_image_src( $image->ID, 'large' );
							?>
							<img class="oops-book-image img-responsive" src="<?php echo $image_img_src[0] ?>">
						</div>
					</div>
					<div class="col-xs-7">
						<h3><?php the_title(); ?></h3>
						<small>Tác giả: <a href="#"><?php echo get_post_meta($post->ID, 'TenTacGia', true) ?></a></small>
						<p>
							<?php 
								$theContent = get_the_content();
								$shortContent = strip_tags($theContent);
								$shortContent = limit_words($shortContent, 50);
								echo $shortContent;
							?>
						</p>
						<a href="#oops-detail" class="btn btn-primary">Xem chi tiết</a>
						<?php if ( is_user_logged_in() ): ?>
							<a href="<?php echo get_post_meta($post->ID, 'LinkDownLoad', true); ?>" class="btn btn-danger"><span class="glyphicon glyphicon-download-alt"></span>Tải sách về máy</a>
						<?php else: ?>
							<a href="http://suutapsach.com/wp-login.php?redirect_to=http://www.suutapsach.com<?php echo get_permalink( $post->ID ); ?>" class="btn btn-danger"><span class="glyphicon glyphicon-download-alt"></span>Tải sách về máy</a>
						<?php endif; ?>	
						<hr/>
						<div class="oops-share">
							<div class="fb-like" data-href="<?php the_permalink(); ?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<ul class="nav nav-tabs" id="oops-detail">
						  	<li class="active"><a href="#gioi-thieu" data-toggle="tab">Giới thiệu</a></li>
						  	<li>
						  		<a href="#binh-luan" data-toggle="tab">
						  			Bình luận
						  			(<fb:comments-count href=<?php the_permalink(); ?>/></fb:comments-count>)
						  		</a>
						  	</li>
						</ul>

						<div class="tab-content">
						  	<div class="tab-pane active" id="gioi-thieu">
						  		<?php the_content(); ?>
						  	</div>
						  	<div class="tab-pane" id="binh-luan">
								<div class="fb-comments" data-href="<?php the_permalink(); ?>" data-num-posts="10"></div>	
						  	</div>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>
	</div>
</div><!-- #container -->
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
<?php get_footer(); ?>