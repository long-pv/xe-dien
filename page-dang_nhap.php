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
	<div class="auth">
		<div class="auth_box">
			<h2 class="auth_title">Đăng nhập</h2>

			<form class="auth_form" novalidate>
				<div class="auth_form-group">
					<label for="login-email" class="auth_label">Email <span>*</span></label>
					<input
						type="email"
						name="email"
						id="login-email"
						class="auth_input"
						placeholder="Nhập email của bạn"
						required>
				</div>

				<div class="auth_form-group auth_form-group_password">
					<label for="login-password" class="auth_label">Mật khẩu <span>*</span></label>
					<input
						type="password"
						name="password"
						id="login-password"
						class="auth_input"
						placeholder="Nhập mật khẩu"
						required>
					<span class="auth_toggle-password">👁</span>
				</div>

				<div class="auth_form-group auth_form-group_options">
					<div class="auth_remember">
						<input type="checkbox" id="remember" name="remember" class="auth_checkbox">
						<label for="remember" class="auth_checkbox-label">Ghi nhớ tài khoản</label>
					</div>
					<a href="/forgot-password" class="auth_forgot-link">Quên mật khẩu?</a>
				</div>

				<button type="submit" class="auth_btn auth_btn-primary">Đăng nhập</button>
			</form>

			<div class="auth_footer">
				<p class="auth_footer-text">Chưa có tài khoản?</p>
				<a href="/register" class="auth_btn auth_btn-outline">Đăng ký tài khoản</a>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
