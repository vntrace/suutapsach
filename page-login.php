<?php
/*
	Template Name: Login Page
*/

get_header(); ?>
<div class="row">
	<form name="loginform" id="loginform" class="form-signin" action="<?php echo get_option('home'); ?>/wp-login.php" method="post">
		<h2 class="form-signin-heading"><?php the_title(); ?></h2>
		<input name="log" id="user_login" type="text" class="form-control" placeholder="Tên Đăng Nhập" required="" autofocus="">
		<input name="pwd" id="user_pass" type="password" class="form-control" placeholder="Mật Khẩu" required="">
		<label class="checkbox">
          	<input name="rememberme" type="checkbox" id="rememberme" type="checkbox" value="remember-me"> Ghi Nhớ
        </label>
        <button name="wp-submit" id="wp-submit" class="btn btn-lg btn-primary btn-block" type="submit">Đăng Nhập</button>
	</form>
</div>
<?php get_footer(); ?>