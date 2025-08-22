<?php

/**
 * Template name: Trang chủ
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

get_header();
?>

<?php
$banner = get_field('banner') ?? [];
if ($banner):
?>
	<div class="home_banner">
		<div class="home_banner_slider">
			<?php foreach ($banner as $item) : ?>
				<div>
					<div class="item" style="background-image: url('<?php echo $item['background']; ?>');">
						<div class="container">
							<div class="content">
								<?php if ($item['title']) : ?>
									<h2 class="title">
										<?php echo $item['title']; ?>
									</h2>
								<?php endif; ?>

								<?php if ($item['description']) : ?>
									<div class="desc">
										<?php echo $item['description']; ?>
									</div>
								<?php endif; ?>

								<?php if ($item['url']) : ?>
									<div class="d-flex">
										<a class="btn_1" href="<?php echo $item['url']; ?>">
											Khám phá ngay
										</a>
									</div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>

<?php
$best_selling_products = get_field('best_selling_products') ?? [];
if ($best_selling_products):
?>
	<div class="home_best_selling">
		<div class="heading">
			<div class="container">
				<h2 class="title">
					SẢN PHẨM BÁN CHẠY
				</h2>
			</div>
		</div>

		<div class="best_selling_slider">
			<?php
			foreach ($best_selling_products as $product_id) :
				// Lấy đối tượng sản phẩm WooCommerce
				$product = wc_get_product($product_id);

				if (!$product) continue;

				// Lấy thông tin cơ bản
				$product_name = $product->get_name();
				$product_image_url = wp_get_attachment_url($product->get_image_id());
				$product_url = get_permalink($product_id);
				$add_to_cart_url = esc_url(add_query_arg('add-to-cart', $product_id, wc_get_cart_url()));

				// Lấy ACF fields
				$introduce = get_field('introduce', $product_id) ?? '';
				$maximum_speed = get_field('maximum_speed', $product_id) ?? '';
				$distance_traveled = get_field('distance_traveled', $product_id) ?? '';
				$trunk_width = get_field('trunk_width', $product_id) ?? '';
				$minimum_price_from = get_field('minimum_price_from', $product_id) ?? '';
			?>
				<div>
					<div class="best_selling_item">
						<div class="content">
							<h3 class="title">
								<?php echo $product_name; ?>
							</h3>
							<div class="desc">
								<?php echo $introduce; ?>
							</div>

							<div class="feature">
								<div class="row">
									<div class="col-lg-3">
										<div class="value">
											<?php echo $maximum_speed ?? 'N/A'; ?>
										</div>
										<div class="title">
											TỐC ĐỘ TỐI ĐA
										</div>
									</div>
									<div class="col-lg-3">
										<div class="value">
											<?php echo $distance_traveled ?? 'N/A'; ?>
										</div>
										<div class="title">
											QUÃNG ĐƯỜNG DI CHUYỂN
										</div>
									</div>
									<div class="col-lg-3">
										<div class="value">
											<?php echo $trunk_width ?? 'N/A'; ?>
										</div>
										<div class="title">
											ĐỘ RỘNG CỐP XE
										</div>
									</div>
									<div class="col-lg-3">
										<div class="value">
											<?php echo $minimum_price_from ?? 'N/A'; ?>
										</div>
										<div class="title">
											GIÁ TỐI THIỂU TỪ
										</div>
									</div>
								</div>
							</div>

							<div class="list_btn">
								<a href="<?php echo $product_url; ?>" class="btn_2">
									XEM CHI TIẾT
								</a>
								<a href="<?php echo $add_to_cart_url; ?>" class="btn_3">
									ĐẶT CỌC
								</a>
							</div>
						</div>

						<div class="img_wrap">
							<img src="<?php echo $product_image_url; ?>" alt="<?php echo $product_name; ?>">
						</div>
					</div>
				</div>
			<?php
			endforeach;
			?>
		</div>
	</div>
<?php
endif;
?>


<?php
$about_us = get_field('about_us') ?? '';
if (!empty($about_us) && is_array($about_us)) :
?>
	<div class="home_about_us">
		<div class="container">
			<div class="row gy-3">
				<?php foreach ($about_us as $item) :
					$title = $item['title'] ?? '';
					$describe = $item['describe'] ?? '';
					$button = $item['button'] ?? null;
					$image = $item['image'] ?? '';
				?>
					<div class="col-lg-6">
						<div class="item_box">
							<div class="row gy-3 align-items-center h-100">
								<div class="col-12 col-lg-7">
									<div class="content">
										<?php if ($title) : ?>
											<h3 class="title"><?php echo $title; ?></h3>
										<?php endif; ?>

										<?php if ($describe) : ?>
											<div class="desc"><?php echo $describe; ?></div>
										<?php endif; ?>

										<?php if ($button && isset($button['url'])) : ?>
											<a class="btn_4" href="<?php echo $button['url']; ?>" <?php if (!empty($button['target'])) echo 'target="' . $button['target'] . '"'; ?>>
												<?php echo $button['title']; ?>
											</a>
										<?php endif; ?>
									</div>
								</div>

								<div class="col-12 col-lg-5">
									<?php if ($image) : ?>
										<img src="<?php echo $image; ?>" alt="<?php echo $title; ?>">
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php
$cta = get_field('cta');
if (!empty($cta) && is_array($cta)) :
	$title = $cta['title'] ?? '';
	$describe = $cta['describe'] ?? '';
	$button = $cta['button'] ?? null;
	$background = $cta['background'] ?? '';
?>
	<div class="home_box_cta">
		<div class="container">
			<div class="inner" <?php if ($background) echo 'style="background-image: url(' . $background . ');"'; ?>>
				<div class="row">
					<div class="col-lg-6">
						<div class="content">
							<?php if ($title) : ?>
								<h2 class="title"><?php echo $title; ?></h2>
							<?php endif; ?>

							<?php if ($describe) : ?>
								<div class="desc"><?php echo $describe; ?></div>
							<?php endif; ?>

							<?php if ($button && isset($button['url'])) : ?>
								<a href="<?php echo $button['url']; ?>" class="btn_5" <?php if (!empty($button['target'])) echo 'target="' . $button['target'] . '"'; ?>>
									<?php echo $button['title']; ?>
								</a>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php
$endow = get_field('endow');
if (!empty($endow) && is_array($endow)) :
?>
	<div class="home_endow">
		<div class="container">
			<div class="row">
				<?php foreach ($endow as $item) :
					$title = $item['title'] ?? '';
					$describe = $item['describe'] ?? '';
					$icon = $item['icon'] ?? '';
				?>
					<div class="col-lg-3">
						<div class="item">
							<?php if ($icon) : ?>
								<div class="icon">
									<img src="<?php echo $icon; ?>" alt="">
								</div>
							<?php endif; ?>

							<div class="content">
								<?php if ($title) : ?>
									<h3 class="title"><?php echo $title; ?></h3>
								<?php endif; ?>

								<?php if ($describe) : ?>
									<div class="desc"><?php echo $describe; ?></div>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
<?php endif; ?>


<div class="home_latest_news">
	<div class="container">
		<div class="heading">
			<div class="row align-items-center">
				<div class="col-lg-8">
					<h2 class="title">
						Tin Tức Mới Nhất
					</h2>
				</div>
				<div class="col-lg-4">
					<div class="d-flex justify-content-end">
						<a href="#" class="link">
							<span class="text">
								Xem thêm
							</span>
							<span class="icon">
								<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M16.1716 10.9999L10.8076 5.63589L12.2218 4.22168L20 11.9999L12.2218 19.778L10.8076 18.3638L16.1716 12.9999H4V10.9999H16.1716Z" fill="#3E6AE1" />
								</svg>
							</span>
						</a>
					</div>
				</div>
			</div>
		</div>

		<div class="list_post">
			<div class="row">
				<?php for ($i = 0; $i < 3; $i++): ?>
					<div class="col-lg-4">
						<div class="post_item">
							<a href="#" class="img_wrap">
								<img src="https://images2.thanhnien.vn/528068263637045248/2024/1/25/c3c8177f2e6142e8c4885dbff89eb92a-65a11aeea03da880-1706156293184503262817.jpg" alt="">
							</a>
							<div class="content">
								<div class="date">
									8 Aug 2025
								</div>
								<a class="d-flex" href="#">
									<h3 class="title">
										Buying Cheap used Transmissions isn't as risky as you think
									</h3>
								</a>
							</div>
						</div>
					</div>
				<?php endfor; ?>
			</div>
		</div>
	</div>
</div>

<?php
$more_info = get_field('more_info');
if (!empty($more_info) && is_array($more_info)) :
?>
	<div class="home_more_info">
		<div class="container">
			<div class="row gy-4">
				<?php foreach ($more_info as $item) :
					$title = $item['title'] ?? '';
					$url = $item['url'] ?? '';
					$image = $item['image'] ?? '';
				?>
					<div class="col-lg-6">
						<div class="item">
							<?php if ($image) : ?>
								<img src="<?php echo $image; ?>" alt="">
							<?php endif; ?>

							<div class="content">
								<?php if ($title) : ?>
									<h3 class="title"><?php echo $title; ?></h3>
								<?php endif; ?>

								<?php if ($url) : ?>
									<a href="<?php echo $url; ?>" class="link">Tìm hiểu thêm</a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
<?php endif; ?>


<?php
$contact_form = get_field('contact_form');
if (!empty($contact_form) && is_array($contact_form)) :
	$title = $contact_form['title'] ?? '';
	$description = $contact_form['description'] ?? '';
	$form_id = $contact_form['form'] ?? '';
	$image = $contact_form['image'] ?? '';
?>
	<div class="home_form_contact">
		<div class="row gx-0">
			<div class="col-lg-6">
				<div class="img_wrap">
					<?php if ($image) : ?>
						<img src="<?php echo $image; ?>" alt="Contact form">
					<?php endif; ?>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="inner">
					<div class="content">
						<div class="logo">
							<?php $logo_url = get_template_directory_uri() . '/assets/images/logo.svg'; ?>
							<img src="<?php echo $logo_url; ?>" alt="logo">
						</div>

						<?php if ($title) : ?>
							<h2 class="title"><?php echo $title; ?></h2>
						<?php endif; ?>

						<?php if ($description) : ?>
							<div class="desc"><?php echo $description; ?></div>
						<?php endif; ?>

						<?php
						if ($form_id) {
							echo do_shortcode('[contact-form-7 id="' . $form_id . '"]');
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php endif; ?>


<?php
/*
<div class="form_group">
	<div class="row">
		<div class="col-12">
			<div class="form_group_box">
				<label for="full_name" class="form_label">Họ và tên <span class="req">*</span></label>
				[text* full_name class:form_control]
			</div>
		</div>

		<div class="col-md-6">
			<div class="form_group_box">
				<label for="phone_number" class="form_label">Số điện thoại <span class="req">*</span></label>
				[tel* phone_number class:form_control]
			</div>
		</div>

		<div class="col-md-6">
			<div class="form_group_box">
				<label for="email" class="form_label">Email <span class="req">*</span></label>
				[email* email class:form_control]
			</div>
		</div>

		<div class="col-12">
			<div class="form_group_box">
				<label for="textarea-mess" class="form_label">Ghi chú <span class="optional">(không yêu cầu)</span></label>
				[textarea* textarea-mess class:form_textarea]
			</div>
		</div>

		<div class="col-12">
			<div class="tabs">
				<ul class="tab_titles">
					<li class="tab_title active" data-tab="tab-1">Cao cấp</li>
					<li class="tab_title" data-tab="tab-2">Trung cấp</li>
					<li class="tab_title" data-tab="tab-3">Phổ thông</li>
				</ul>

				<div class="tab_contents">
					<div class="tab_content active" id="tab-1">
						<input type="checkbox" class="checkbox_input" name="product_A" value="A" id="A"><label class="checkbox_label" for="A">Sản phẩm cao cấp A</label>
						<br>
						<input type="checkbox" class="checkbox_input" name="product_B" value="B" id="B"><label class="checkbox_label" for="B">Sản phẩm cao cấp B</label>
					</div>
					<div class="tab_content" id="tab-2">
						<input type="checkbox" class="checkbox_input" name="product_C" value="C" id="C"><label class="checkbox_label" for="C">Sản phẩm cao cấp C</label>
						<br>
						<input type="checkbox" class="checkbox_input" name="product_D" value="D" id="D"><label class="checkbox_label" for="D">Sản phẩm cao cấp D</label>
					</div>
					<div class="tab_content" id="tab-3">
						<input type="checkbox" class="checkbox_input" name="product_Motio" value="Motio" id="Motio"><label class="checkbox_label" for="Motio">Motio</label>
						<br>
						<input type="checkbox" class="checkbox_input" name="product_Evo200_Lite" value="Evo200 Lite" id="Evo200_Lite"><label class="checkbox_label" for="Evo200_Lite">Evo200 Lite</label>
					</div>
				</div>
			</div>


			<div class="tabs_input">
				[text* selected_product]
			</div>
		</div>

		<div class="col-12">
			<div class="note">Bằng cách đăng ký, quý khách xác nhận đã đọc, hiểu và đồng ý với <a href="#">Chính sách Bảo vệ Dữ liệu cá nhân</a> của VinFast.</div>
		</div>

		<div class="col-12">
			<div class="form_btn_block">
				[submit class:btn class:form_btn "ĐĂNG KÝ"]
			</div>
		</div>
	</div>
</div>
*/
?>

<?php
get_footer();
