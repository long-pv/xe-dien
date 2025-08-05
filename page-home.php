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

.home_Best selling products

<?php
get_footer();
