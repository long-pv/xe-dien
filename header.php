<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package xe_dien
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<div class="sign_up_consultation">
		<div class="container">
			<div class="inner">
				<div class="text">
					Đăng ký nhận tư vấn ngay! Ưu đãi mỗi ngày tại Vinfast Đức Nghĩa
				</div>
				<div class="icon">
					<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M11.9997 10.5865L16.9495 5.63672L18.3637 7.05093L13.4139 12.0007L18.3637 16.9504L16.9495 18.3646L11.9997 13.4149L7.04996 18.3646L5.63574 16.9504L10.5855 12.0007L5.63574 7.05093L7.04996 5.63672L11.9997 10.5865Z" fill="white" />
					</svg>
				</div>
			</div>
		</div>
	</div>

	<header id="header" class="header">
		<div class="container">
			<div class="header__inner">
				<div class="row align-items-center">
					<div class="col-6 col-lg-2">
						<a href="<?php echo home_url(); ?>" class="header__logo">
							<?php $logo_url = get_template_directory_uri() . '/assets/images/logo.svg'; ?>
							<img src="<?php echo $logo_url; ?>" alt="logo">
						</a>
					</div>

					<div class="col-6 col-lg-8">
						<div class="header__navInner">
							<!-- menu PC -->
							<?php
							if (has_nav_menu('menu-1')) {
								wp_nav_menu(
									array(
										'theme_location' => 'menu-1',
										'container' => 'nav',
										'container_class' => 'header__menupc',
										'depth' => 1,
									)
								);
							}
							?>
							<!-- end -->

							<!-- button toggle menu mobile -->
							<div class="header__toggle">
								<span class="header__toggleItem header__toggleItem--open"></span>
								<span class="header__toggleItem header__toggleItem--close"></span>
							</div>
							<!-- end -->
						</div>
					</div>

					<div class="col-6 col-lg-2">
						<div class="header_right">
							<div class="global">
								<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M13.9998 22.3333C9.39746 22.3333 5.6665 18.6023 5.6665 14C5.6665 9.39761 9.39746 5.66666 13.9998 5.66666C18.6022 5.66666 22.3332 9.39761 22.3332 14C22.3332 18.6023 18.6022 22.3333 13.9998 22.3333ZM12.0915 20.3895C11.2894 18.6882 10.7976 16.8118 10.6893 14.8333H7.38475C7.71484 17.4804 9.59683 19.6456 12.0915 20.3895ZM12.3588 14.8333C12.4841 16.8657 13.0647 18.7747 13.9998 20.46C14.935 18.7747 15.5156 16.8657 15.6409 14.8333H12.3588ZM20.6149 14.8333H17.3104C17.2021 16.8118 16.7103 18.6882 15.9082 20.3895C18.4028 19.6456 20.2848 17.4804 20.6149 14.8333ZM7.38475 13.1667H10.6893C10.7976 11.1881 11.2894 9.31171 12.0915 7.61046C9.59683 8.35443 7.71484 10.5196 7.38475 13.1667ZM12.3588 13.1667H15.6409C15.5156 11.1343 14.935 9.2252 13.9998 7.53998C13.0647 9.2252 12.4841 11.1343 12.3588 13.1667ZM15.9082 7.61046C16.7103 9.31171 17.2021 11.1881 17.3104 13.1667H20.6149C20.2848 10.5196 18.4028 8.35443 15.9082 7.61046Z" fill="black" />
								</svg>
							</div>
							<div class="cart_icon">
								<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M11.5 9.00001H16.5C16.5 7.6193 15.3807 6.50001 14 6.50001C12.6192 6.50001 11.5 7.6193 11.5 9.00001ZM9.83333 9.00001C9.83333 6.69883 11.6988 4.83334 14 4.83334C16.3012 4.83334 18.1667 6.69883 18.1667 9.00001H20.6667C21.1269 9.00001 21.5 9.37311 21.5 9.83334V21.5C21.5 21.9603 21.1269 22.3333 20.6667 22.3333H7.33333C6.8731 22.3333 6.5 21.9603 6.5 21.5V9.83334C6.5 9.37311 6.8731 9.00001 7.33333 9.00001H9.83333ZM8.16667 10.6667V20.6667H19.8333V10.6667H8.16667ZM11.5 12.3333C11.5 13.7141 12.6192 14.8333 14 14.8333C15.3807 14.8333 16.5 13.7141 16.5 12.3333H18.1667C18.1667 14.6345 16.3012 16.5 14 16.5C11.6988 16.5 9.83333 14.6345 9.83333 12.3333H11.5Z" fill="black" />
								</svg>
							</div>

							<div class="my_account">
								Tài khoản
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- menu Mobile -->
		<div class="header__menusp">
			<?php
			if (has_nav_menu('menu-1')) {
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'container' => 'nav',
						'container_class' => 'header__menuspInner',
						'depth' => 1,
					)
				);
			}
			?>
		</div>
	</header>

	<main class="mainBodyContent">