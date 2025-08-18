<?php

/**
 * Proceed to checkout button
 *
 * Contains the markup for the proceed to checkout button on the cart.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/proceed-to-checkout-button.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

if (! defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}
?>

<a href="<?php echo esc_url(wc_get_checkout_url()); ?>" class="checkout-button button alt wc-forward<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>">
	<?php
	//esc_html_e( 'Proceed to checkout', 'woocommerce' ); 
	?>
	<span class="text">
		Nhập Thông Tin
	</span>
	<span class="icon">
		<svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M13.9765 9.16658L9.5065 4.69657L10.685 3.51807L17.1668 9.99992L10.685 16.4817L9.5065 15.3032L13.9765 10.8332H3.8335V9.16658H13.9765Z" fill="white" />
		</svg>
	</span>
</a>