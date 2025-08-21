<?php

/**
 * Template name: Trang đăng ký
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

<div class="container py-pc">
	<div class="register-container">
		<h2>Đăng ký tài khoản</h2>
		<form class="register-form" id="register-form">
			<div class="form-group mb-3">
				<input type="text" name="name" placeholder="Họ và tên *" required>
			</div>

			<div class="form-group mb-3">
				<input type="email" name="email" placeholder="Email *" required>
			</div>

			<div class="form-group mb-3">
				<input type="password" name="password" placeholder="Mật khẩu *" required>
			</div>

			<div class="form-group mb-3">
				<input type="password" name="confirm_password" placeholder="Nhập lại mật khẩu mới *" required>
			</div>

			<div class="password-rules mb-3">
				<p>Mật khẩu bao gồm:</p>
				<ul>
					<li>✔ Ít nhất 8 ký tự</li>
					<li>✔ Chữ hoa & chữ thường</li>
					<li>✔ Ít nhất 1 số</li>
				</ul>
			</div>

			<p class="policy mb-3">
				Bằng cách đăng ký, bạn xác nhận đã đọc, hiểu và đồng ý với
				<a href="#">Chính sách Bảo vệ Dữ liệu cá nhân</a>.
			</p>

			<button type="submit" class="btn-primary">Đăng ký tài khoản</button>

			<p class="login-text">Đã có tài khoản?</p>
			<button type="button" class="btn-secondary">Đăng nhập</button>
		</form>
	</div>
</div>

<?php
get_footer();
