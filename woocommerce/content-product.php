<?php

/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 9.4.0
 */

defined('ABSPATH') || exit;

global $product;

// Check if the product is a valid WooCommerce product and ensure its visibility before proceeding.
if (! is_a($product, WC_Product::class) || ! $product->is_visible()) {
	return;
}
?>
<div class="product_loop_item">
	<div class="img_wrap">
		<?php
		echo $product->get_image('full');
		?>
	</div>
	<div class="content">
		<div class="row align-items-center">
			<div class="col-6">
				<h3 class="title">
					<?php the_title(); ?>
				</h3>
			</div>
			<div class="col-6 text-end">
				<a href="<?php the_permalink(); ?>" class="link">
					Chi tiết →
				</a>
			</div>
		</div>
		<div class="row align-items-center">
			<div class="col-6">
				<div class="real_price">
					<?php echo $product->get_price_html(); ?>
				</div>
			</div>
			<div class="col-6 text-end">
				<?php if ($product->is_on_sale() && $product->get_regular_price()) : ?>
					<div class="old_price">
						<?php echo wc_price($product->get_regular_price()); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>