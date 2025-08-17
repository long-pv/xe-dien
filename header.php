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

	<!-- fonts -->
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
								<a class="icon" href="<?php echo wc_get_cart_url(); ?>">
									<svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M11.5 9.00001H16.5C16.5 7.6193 15.3807 6.50001 14 6.50001C12.6192 6.50001 11.5 7.6193 11.5 9.00001ZM9.83333 9.00001C9.83333 6.69883 11.6988 4.83334 14 4.83334C16.3012 4.83334 18.1667 6.69883 18.1667 9.00001H20.6667C21.1269 9.00001 21.5 9.37311 21.5 9.83334V21.5C21.5 21.9603 21.1269 22.3333 20.6667 22.3333H7.33333C6.8731 22.3333 6.5 21.9603 6.5 21.5V9.83334C6.5 9.37311 6.8731 9.00001 7.33333 9.00001H9.83333ZM8.16667 10.6667V20.6667H19.8333V10.6667H8.16667ZM11.5 12.3333C11.5 13.7141 12.6192 14.8333 14 14.8333C15.3807 14.8333 16.5 13.7141 16.5 12.3333H18.1667C18.1667 14.6345 16.3012 16.5 14 16.5C11.6988 16.5 9.83333 14.6345 9.83333 12.3333H11.5Z" fill="black" />
									</svg>

									<?php
									if (WC()->cart) {
										$count = WC()->cart->get_cart_contents_count();
										echo '<span class="count">' . $count . '</span>';
									}
									?>
								</a>

								<?php
								if (! is_cart() && ! is_checkout()) :
								?>
									<div class="cart_mini">
										<div class="list_product">
											<?php if (WC()->cart->is_empty()) : ?>
												<p>Giỏ hàng trống.</p>
											<?php else : ?>
												<?php foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) :
													$product   = $cart_item['data'];
													$product_id = $cart_item['product_id'];
													$quantity  = $cart_item['quantity'];
													$price     = $product->get_price_html();
													$name      = get_the_title($product_id);
													$thumbnail = $product->get_image('large');
												?>
													<div class="item">
														<div class="row align-items-center">
															<div class="col-4">
																<div class="img_wrap">
																	<a href="<?php echo get_permalink($product_id); ?>">
																		<?php echo $thumbnail; ?>
																	</a>
																</div>
															</div>
															<div class="col-8">
																<div class="content">
																	<a class="title" href="<?php echo get_permalink($product_id); ?>">
																		<?php echo $name; ?>
																	</a>
																	<?php if ($product->is_type('variation')) : ?>
																		<div class="type">
																			<?php echo wc_get_formatted_variation($product); ?>
																		</div>
																	<?php endif; ?>
																	<div class="total">
																		<?php echo $quantity; ?> x <span class="price"><?php echo $price; ?></span>
																	</div>
																</div>
															</div>
														</div>
													</div>
												<?php endforeach; ?>
											<?php endif; ?>
										</div>

										<?php if (! WC()->cart->is_empty()) : ?>
											<div class="sub_total">
												<div class="row align-items-center">
													<div class="col-4">
														<div class="title">Tổng cộng:</div>
													</div>
													<div class="col-8">
														<div class="price">
															<?php wc_cart_totals_subtotal_html(); ?>
														</div>
													</div>
												</div>
											</div>

											<div class="shipping">
												<div class="icon">
													<svg width="27" height="21" viewBox="0 0 27 21" fill="none" xmlns="http://www.w3.org/2000/svg">
														<g clip-path="url(#clip0_4006_734)">
															<path d="M9.24951 17.4849C9.24951 18.0153 9.0388 18.524 8.66373 18.8991C8.28865 19.2741 7.77994 19.4849 7.24951 19.4849C6.71908 19.4849 6.21037 19.2741 5.8353 18.8991C5.46023 18.524 5.24951 18.0153 5.24951 17.4849C5.24951 16.9544 5.46023 16.4457 5.8353 16.0707C6.21037 15.6956 6.71908 15.4849 7.24951 15.4849C7.77994 15.4849 8.28865 15.6956 8.66373 16.0707C9.0388 16.4457 9.24951 16.9544 9.24951 17.4849ZM9.24951 17.4849H17.9995M17.9995 17.4849C17.9995 18.0153 18.2102 18.524 18.5853 18.8991C18.9604 19.2741 19.4691 19.4849 19.9995 19.4849C20.5299 19.4849 21.0387 19.2741 21.4137 18.8991C21.7888 18.524 21.9995 18.0153 21.9995 17.4849C21.9995 16.9544 21.7888 16.4457 21.4137 16.0707C21.0387 15.6956 20.5299 15.4849 19.9995 15.4849C19.4691 15.4849 18.9604 15.6956 18.5853 16.0707C18.2102 16.4457 17.9995 16.9544 17.9995 17.4849Z" stroke="#3E6AE1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
															<path d="M21.9995 17.4849H23.7495C24.0147 17.4849 24.2691 17.3795 24.4566 17.192C24.6441 17.0044 24.7495 16.7501 24.7495 16.4849V2.48486C24.7495 2.21965 24.6441 1.96529 24.4566 1.77776C24.2691 1.59022 24.0147 1.48486 23.7495 1.48486H5.24949C4.98427 1.48486 4.72992 1.59022 4.54238 1.77776C4.35485 1.96529 4.24949 2.21965 4.24949 2.48486V10.3219L2.59949 11.6849C2.49003 11.7787 2.40217 11.8952 2.34193 12.0262C2.28169 12.1572 2.2505 12.2997 2.25049 12.4439V16.4849C2.25049 16.7501 2.35585 17.0044 2.54338 17.192C2.73092 17.3795 2.98527 17.4849 3.25049 17.4849H5.25049" stroke="#3E6AE1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
															<path d="M7.24951 12.4849V6.48486H8.99951M8.99951 9.48486H7.24951M18.3125 6.48486H16.5625V12.4849H18.3125M18.3125 9.48486H16.5625M22.4995 6.48486H20.7495V12.4849H22.4995M22.4995 9.48486H20.7495M11.6245 12.4849V6.48486H12.8745C13.206 6.48486 13.524 6.61656 13.7584 6.85098C13.9928 7.0854 14.1245 7.40334 14.1245 7.73486C14.1245 8.06638 13.9928 8.38433 13.7584 8.61875C13.524 8.85317 13.206 8.98486 12.8745 8.98486H11.6245" stroke="#3E6AE1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
															<path d="M11.6245 8.98486H12.1245C12.6549 8.98486 13.1637 9.19558 13.5387 9.57065C13.9138 9.94572 14.1245 10.4544 14.1245 10.9849V12.4849" stroke="#3E6AE1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
														</g>
														<defs>
															<clipPath id="clip0_4006_734">
																<rect width="27" height="20" fill="white" transform="translate(0 0.484863)" />
															</clipPath>
														</defs>
													</svg>
												</div>
												<div class="text">
													Giao hàng miễn phí trong nội thành Hà Nội
												</div>
											</div>

											<div class="bottom">
												<div class="row">
													<div class="col-6">
														<a class="link_2" href="#">
															Nhận Tư Vấn
														</a>
													</div>
													<div class="col-6">
														<a class="link_1" href="<?php echo wc_get_cart_url(); ?>">
															Xem Giỏ Hàng
														</a>
													</div>
												</div>
											</div>
										<?php endif; ?>
									</div>
								<?php endif; ?>
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

		<div class="menu_products">
			<?php
			$tabs_san_pham = get_field('tabs_san_pham', 'option') ?? [];
			if ($tabs_san_pham) :
			?>
				<!-- Tabs -->
				<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
					<?php
					foreach ($tabs_san_pham as $key => $item) :
					?>
						<li class="nav-item" role="presentation">
							<button class="nav-link <?php echo $key == 0 ? 'active' : ''; ?>" id="menu_prod_<?php echo $key; ?>_tab" data-bs-toggle="tab" data-bs-target="#menu_prod_<?php echo $key; ?>_content"
								type="button" role="tab" aria-controls="#menu_prod_<?php echo $key; ?>_content" aria-selected="<?php echo $key == 0 ? 'true' : 'false'; ?>">
								<span>
									<?php echo $item['tieu_de']; ?>
								</span>
							</button>
						</li>
					<?php endforeach; ?>
				</ul>

				<!-- Tab Content -->
				<div class="tab-content p-0" id="myTabContent">
					<?php
					foreach ($tabs_san_pham as $key => $item):
						$list = $item['danh_sach_san_pham'] ?? [];
					?>
						<div class="tab-pane fade <?php echo $key == 0 ? 'show active' : ''; ?>" id="menu_prod_<?php echo $key; ?>_content" role="tabpanel" aria-labelledby="#menu_prod_<?php echo $key; ?>_tab">
							<div class="tab_product_slider">
								<?php
								foreach ($list as $product_id) {
									$post_object = get_post($product_id);
									setup_postdata($GLOBALS['post'] = &$post_object);
									echo '<div>';
									wc_get_template_part('content', 'product');
									echo '</div>';
								}
								wp_reset_postdata();
								?>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
	</header>

	<main class="mainBodyContent">