<?php

/**
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
if (is_cart() || is_checkout()) :
?>
	<div class="brc_woo">
		<div class="container">
			<div class="list">
				<a href="<?php echo wc_get_cart_url(); ?>" class="item <?php echo is_cart() ? 'active' : ''; ?>">
					Giỏ hàng
				</a>
				<span class="icon">
					<svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M14 12.0887L9 6.97642L10.1361 5.63672L16.5001 12.0007L10.1361 18.3646L9 16.8759L14 12.0887Z" fill="black" fill-opacity="0.8" />
					</svg>
				</span>
				<a href="<?php echo wc_get_checkout_url(); ?>" class="item <?php echo is_checkout() ? 'active' : ''; ?>">
					Nhập thông tin
				</a>
			</div>
		</div>
	</div>
<?php endif; ?>

<div class="container">
	<div class="py-mb py-lg-pc">
		<?php the_content(); ?>
	</div>
</div>

<?php
get_footer();
