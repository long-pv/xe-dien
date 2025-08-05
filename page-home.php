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
				</div>
			</div>
		<?php endfor; ?>
	</div>
</div>

<?php
get_footer();
