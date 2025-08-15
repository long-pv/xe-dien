<?php
defined('ABSPATH') || exit;

get_header('shop');

// Bắt đầu container
echo '<div class="container">';

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');

/**
 * Hook: woocommerce_shop_loop_header.
 *
 * @since 8.6.0
 *
 * @hooked woocommerce_product_taxonomy_archive_header - 10
 */
do_action('woocommerce_shop_loop_header');

if (woocommerce_product_loop()) {

	// Bắt đầu header shop (thông báo, bộ đếm, sắp xếp)
	// echo '<div class="col-12">';
	// do_action('woocommerce_before_shop_loop');
	// echo '</div>';

	woocommerce_product_loop_start();

	if (wc_get_loop_prop('total')) {
		echo '<div class="row">';
		while (have_posts()) {
			the_post();

			echo '<div class="col-lg-4 col-md-6 col-12 mb-4">';

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action('woocommerce_shop_loop');

			wc_get_template_part('content', 'product');

			echo '</div>';
		}
		echo '</div>';
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	echo '<div class="col-12">';
	do_action('woocommerce_after_shop_loop');
	echo '</div>';
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action('woocommerce_no_products_found');
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');

// Đóng row & container
echo '</div>'; // .container

// Xóa sidebar
// do_action('woocommerce_sidebar');

get_footer('shop');
