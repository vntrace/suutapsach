<?php 

	// $a =  unserialize('a:10:{i:0;s:25:"adminimize/adminimize.php";i:1;s:43:"all-in-one-seo-pack/all_in_one_seo_pack.php";i:2;s:46:"another-wordpress-classifieds-plugin/awpcp.php";i:3;s:36:"google-sitemap-generator/sitemap.php";i:4;s:35:"jquery-colorbox/jquery-colorbox.php";i:5;s:45:"mechanic-visitor-counter/wp-statsmechanic.php";i:6;s:39:"really-simple-breadcrumb/breadcrumb.php";i:7;s:41:"wordpress-language/wordpress-language.php";i:8;s:40:"wp-no-category-base/no-category-base.php";i:9;s:67:"wp-sliding-login-register-panel/wp-sliding-login-register-panel.php";}');

	// $arr = array(
	// 	'adminimize/adminimize.php',
	// 	'all-in-one-seo-pack/all_in_one_seo_pack.php',
	// 	'another-wordpress-classifieds-plugin/awpcp.php',
	// 	'google-sitemap-generator/sitemap.php',
	// 	'jquery-colorbox/jquery-colorbox.php',
	// 	'mechanic-visitor-counter/wp-statsmechanic.php',
	// 	'really-simple-breadcrumb/breadcrumb.php',
	// 	'wordpress-language/wordpress-language.php',
	// 	'wp-no-category-base/no-category-base.php'
	// );

	// echo serialize($arr);

	// echo '<pre>';
	// var_dump($a);
	// die;
?>
<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 * We filter the output of wp_title() a bit -- see
	 * twentyten_filter_wp_title() in functions.php.
	 */
	wp_title( '|', true, 'right' );

	?>
</title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="shortcut icon" href="http://www.suutapsach.com/images/favicon.ico" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/js/jquery-ui.css" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>

<link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/style.css" />

<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url') ?>/js/jquery-ui.js"></script>

</head>

<body <?php body_class(); ?>>

<!-- Float menu -->
<div class="navbar navbar-default navbar-fixed-top top-bar" role="navigation">
	<div class="container">
	    <div class="navbar-header">
	      	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
	            <span class="sr-only">||</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	      	</button>
	      	<a class="navbar-brand" href="<?php bloginfo('url') ?>">
	      		<img src="http://www.suutapsach.com/images/logo.JPG" alt="Suutapsach.com">
	      	</a>
	    </div>
	    <div class="navbar-collapse collapse">
	      	<ul class="nav navbar-nav">
	            <li><a href="<?php bloginfo('url') ?>">Home</a></li>
	            <li><a href="<?php bloginfo('url') ?>/sach">Sách</a></li>
	            <li><a href="<?php bloginfo('url') ?>/cho">Chợ</a></li>
	            <li><a href="<?php bloginfo('url') ?>/gioi-thieu">Giới thiệu</a></li>
	            <li>
	            	<a href="#">
	            		<div class="fb-like" data-href="https://www.facebook.com/suutapsach.comcho" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div>
	            	</a>
	            </li>
	      	</ul>
	      	<?php 
				global $user_identity, $user_ID;
				if (is_user_logged_in()):
			?>
				<ul class="nav navbar-nav navbar-right">
		            <li class="dropdown">
		            	<a href="#" data-toggle="dropdown">
		            		<?php echo $user_identity; ?>
		            		<span class="caret"></span>
		            	</a>
		            	<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
		            		<li><a href="<?php echo site_url('wp-admin/profile.php') ?>"><?php _e('Xem profile') ?></a></li>
							<li><a href="<?php echo wp_logout_url(home_url()); ?>" title="<?php _e('Thoát'); ?>"><?php _e('Thoát'); ?></a></li>
					  	</ul>
		            </li>
		      	</ul>
	      	<?php else: ?>
		      	<ul class="nav navbar-nav navbar-right">
		            <?php if (get_option('users_can_register')) { ?>
		            	<li>
		            		<?php if (get_option('wpslr_lreg') == 1){ ?>
		            			<a id="register" href="<?php echo site_url('wp-signup.php'); ?>"><?php echo _e('Đăng Ký') ?></a>
		                	<?php } else { ?>
		                		<a id="register" href="<?php echo site_url('wp-signup.php'); ?>"><?php echo _e('Đăng Ký') ?></a>
		            		<?php } ?>
		                </li>
					<?php } ?>
		            <li><a href="<?php echo site_url('wp-login.php'); ?>"><?php _e('Đăng Nhập'); ?></a></li>
		      	</ul>
	      	<?php endif; ?>
	    </div><!--/.nav-collapse -->
	</div>
</div>

<div id="wrapper" class="container">
	