<?php

/**
 * Template name: Trang đăng nhập
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package xe_dien
 */

// Nếu dùng trong template
if (is_user_logged_in()) {
	wp_redirect(home_url());
	exit;
}

get_header();
?>

<div class="container">
	<div class="auth-wrapper">
		<div class="auth-box">
			<h2 class="auth-title">Đăng nhập</h2>

			<form class="login-form" novalidate>
				<div class="form-group">
					<label for="login-email">Email <span>*</span></label>
					<input type="email" name="email" id="login-email" class="form-control" placeholder="Nhập email của bạn" required>
				</div>

				<div class="form-group input-password">
					<label for="login-password">Mật khẩu <span>*</span></label>
					<input type="password" name="password" id="login-password" class="form-control" placeholder="Nhập mật khẩu" required>
					<span class="toggle-password">👁</span>
				</div>

				<div class="form-group d-flex justify-content-between align-items-center" style="margin-bottom: 20px;">
					<div>
						<input type="checkbox" id="remember" name="remember">
						<label for="remember">Ghi nhớ tài khoản</label>
					</div>
					<a href="/forgot-password" class="forgot-link">Quên mật khẩu?</a>
				</div>

				<button type="submit" class="btn btn-primary w-100">Đăng nhập</button>
			</form>

			<div class="auth-footer">
				<p>Chưa có tài khoản?</p>
				<a href="/register" class="btn btn-outline w-100">Đăng ký tài khoản</a>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
