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

<div class="home_best_selling">
	<div class="heading">
		<div class="container">
			<h2 class="title">
				SẢN PHẨM BÁN CHẠY
			</h2>
		</div>
	</div>

	<div class="best_selling_slider">
		<?php for ($i = 0; $i < 3; $i++) : ?>
			<div>
				<div class="best_selling_item">
					<div class="content">
						<h3 class="title">
							FELIX NEO
						</h3>
						<div class="desc">
							Lướt êm, Phong cách
						</div>

						<div class="feature">
							<div class="row">
								<div class="col-lg-3">
									<div class="value">
										60 km/h
									</div>
									<div class="title">
										TỐC ĐỘ TỐI ĐA
									</div>
								</div>
								<div class="col-lg-3">
									<div class="value">
										114 km/1 lần sạc
									</div>
									<div class="title">
										QUÃNG ĐƯỜNG DI CHUYỂN
									</div>
								</div>
								<div class="col-lg-3">
									<div class="value">
										21 lít
									</div>
									<div class="title">
										ĐỘ RỘNG CỐP XE
									</div>
								</div>
								<div class="col-lg-3">
									<div class="value">
										28.800.000 VNĐ
									</div>
									<div class="title">
										GIÁ TỐI THIỂU TỪ
									</div>
								</div>
							</div>
						</div>

						<div class="list_btn">
							<a href="#" class="btn_2">
								XEM CHI TIẾT
							</a>
							<a href="#" class="btn_3">
								ĐẶT CỌC
							</a>
						</div>
					</div>

					<div class="img_wrap">
						<img src="<?php echo get_template_directory_uri() . '/assets/images/image_25.png'; ?>" alt="">
					</div>
				</div>
			</div>
		<?php endfor; ?>
	</div>
</div>


<div class="home_about_us">
	<div class="container">
		<div class="row">
			<?php for ($i = 0; $i < 2; $i++) : ?>
				<div class="col-lg-6">
					<div class="item_box">
						<div class="row align-items-center">
							<div class="col-7">
								<div class="content">
									<h3 class="title">
										Xe máy điện VinFast
									</h3>

									<div class="desc">
										Thiết kế đẹp, chạy êm, tiết kiệm, không xăng – không khí thải.
									</div>

									<a class="btn_4">
										Xem các mẫu
									</a>
								</div>
							</div>

							<div class="col-5">
								<img src="<?php echo get_template_directory_uri() . '/assets/images/Frame_48.png'; ?>" alt="">
							</div>
						</div>
					</div>
				</div>
			<?php endfor; ?>
		</div>
	</div>
</div>

<div class="home_box_cta">
	<div class="container">
		<div class="inner" style="background-image: url('<?php echo get_template_directory_uri() . '/assets/images/Frame_55.png'; ?>');">
			<div class="row">
				<div class="col-lg-6">
					<div class="content">
						<h2 class="title">
							VinFast Đức Nghĩa
						</h2>

						<div class="desc">
							VinFast Đức Nghĩa là đại lý ủy quyền chính thức, cung cấp đầy đủ các dòng xe điện - xe máy điện, đáp ứng mọi nhu cầu mua mới và trải nghiệm lái thử.
						</div>

						<a href="#" class="btn_5">
							Xem chi tiết dịch vụ
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="home_endow">
	<div class="container">
		<div class="row">
			<?php for ($i = 0; $i < 4; $i++): ?>
				<div class="col-lg-3">
					<div class="item">
						<div class="icon">
							<img src="<?php echo get_template_directory_uri() . '/assets/images/Frame_1.png'; ?>" alt="">
						</div>
						<div class="content">
							<h3 class="title">
								Free Ship
							</h3>
							<div class="desc">
								Free ship toàn Hà Nội trong vòng 3-5 ngày Free ship toàn Hà Nội trong vòng 3-5 ngày
							</div>
						</div>
					</div>
				</div>
			<?php endfor; ?>
		</div>
	</div>
</div>

<div class="home_more_info">
	<div class="container">
		<div class="row">
			<?php for ($i = 0; $i < 2; $i++): ?>
				<div class="col-lg-6">
					<div class="item">
						<img src="<?php echo get_template_directory_uri() . '/assets/images/Frame_60.png'; ?>" alt="">
						<div class="content">
							<h3 class="title">
								Showroom & Trạm sạc
							</h3>
							<a href="#" class="link">
								Tìm hiểu thêm
							</a>
						</div>
					</div>
				</div>
			<?php endfor; ?>
		</div>
	</div>
</div>

<div class="home_form_contact">
	<div class="row gx-0">
		<div class="col-lg-6">
			<div class="img_wrap">
				<img src="<?php echo get_template_directory_uri() . '/assets/images/Frame_92.png'; ?>" alt="">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="inner">
				<div class="content">
					<div class="logo">
						<?php $logo_url = get_template_directory_uri() . '/assets/images/logo.svg'; ?>
						<img src="<?php echo $logo_url; ?>" alt="logo">
					</div>
					<h2 class="title">
						ĐĂNG KÝ NHẬN ƯU ĐÃI
					</h2>
					<div class="desc">
						Quý khách vui lòng điền thông tin để nhận các ưu đãi mới nhất từ VinFast Đức Nghĩa
					</div>

					<?php echo do_shortcode('[contact-form-7 id="09113cc" title="Contact form 1"]'); ?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
