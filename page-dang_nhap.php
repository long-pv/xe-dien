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

<div class="container py-mb py-lg-pc">
	<div class="auth">
		<div class="auth_box">
			<h2 class="auth_title">Đăng nhập</h2>

			<form class="auth_form" novalidate>
				<div class="auth_form_group">
					<input
						type="email"
						name="email"
						id="login-email"
						class="auth_input"
						placeholder="Email *"
						required>
				</div>

				<div class="auth_form_group register_form_group_pass">
					<input
						type="password"
						name="password"
						id="login-password"
						class="auth_input"
						placeholder="Mật khẩu *"
						required>
					<div class="icon_eye">
						<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3ZM12.0003 19C16.2359 19 19.8603 16.052 20.7777 12C19.8603 7.94803 16.2359 5 12.0003 5C7.7646 5 4.14022 7.94803 3.22278 12C4.14022 16.052 7.7646 19 12.0003 19ZM12.0003 16.5C9.51498 16.5 7.50026 14.4853 7.50026 12C7.50026 9.51472 9.51498 7.5 12.0003 7.5C14.4855 7.5 16.5003 9.51472 16.5003 12C16.5003 14.4853 14.4855 16.5 12.0003 16.5ZM12.0003 14.5C13.381 14.5 14.5003 13.3807 14.5003 12C14.5003 10.6193 13.381 9.5 12.0003 9.5C10.6196 9.5 9.50026 10.6193 9.50026 12C9.50026 13.3807 10.6196 14.5 12.0003 14.5Z" fill="black" fill-opacity="0.2" />
						</svg>
					</div>
				</div>

				<div class="auth_form_group auth_form_group_options">
					<div class="auth_remember">
						<input type="checkbox" id="remember" name="remember" class="auth_checkbox">
						<label for="remember" class="auth_checkbox_label">Ghi nhớ tài khoản</label>
					</div>
					<a href="/forgot-password" class="auth_forgot_link">Quên mật khẩu?</a>
				</div>

				<button type="submit" class="auth_btn auth_btn_primary">Đăng nhập</button>
			</form>

			<?php
			$registration_page = get_field('registration_page', 'option'); // ID trang đăng ký
			$registration_url  = $registration_page ? get_permalink($registration_page) : '#';
			?>

			<div class="auth_footer">
				<p class="auth_footer_text">Chưa có tài khoản?</p>
				<a href="<?php echo $registration_url; ?>" class="auth_btn auth_btn_outline">Đăng ký tài khoản</a>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
