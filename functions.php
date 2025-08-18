<?php

/**
 * xe dien functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package xe_dien
 */

if (! defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

function xe_dien_setup()
{
    $GLOBALS['content_width'] = apply_filters('xe_dien_content_width', 640);
    load_theme_textdomain('xe-dien', get_template_directory() . '/languages');
    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('customize-selective-refresh-widgets');
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'menu-1' => esc_html__('Primary', 'xe-dien'),
        )
    );
}
add_action('after_setup_theme', 'xe_dien_setup', 0);

/**
 * Enqueue scripts and styles.
 */
function xe_dien_scripts()
{
    // bootstrap js
    wp_enqueue_script('xe_dien-script-bootstrap_bundle', get_template_directory_uri() . '/assets/inc/bootstrap/bootstrap.bundle.min.js', array('jquery'), _S_VERSION, true);

    // matchHeight
    wp_enqueue_script('xe_dien-script-matchHeight', get_template_directory_uri() . '/assets/inc/matchHeight/jquery.matchHeight.js', array('jquery'), _S_VERSION, true);

    // slick
    wp_enqueue_style('xe_dien-style-slick-theme', get_template_directory_uri() . '/assets/inc/slick/slick-theme.css', array(), _S_VERSION);
    wp_enqueue_style('xe_dien-style-slick', get_template_directory_uri() . '/assets/inc/slick/slick.css', array(), _S_VERSION);
    wp_enqueue_script('xe_dien-script-slick', get_template_directory_uri() . '/assets/inc/slick/slick.min.js', array('jquery'), _S_VERSION, true);

    //add custom main css/js
    $main_css_file_path = get_template_directory() . '/assets/css/main.css';
    $main_js_file_path = get_template_directory() . '/assets/js/main.js';
    $ver_main_css = file_exists($main_css_file_path) ? filemtime($main_css_file_path) : _S_VERSION;
    $ver_main_js = file_exists($main_js_file_path) ? filemtime($main_js_file_path) : _S_VERSION;
    wp_enqueue_style('xe_dien-style-main', get_template_directory_uri() . '/assets/css/main.css', array(), $ver_main_css);
    wp_enqueue_script('xe_dien-script-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), $ver_main_js, true);

    // ajax admin
    wp_localize_script('xe_dien-script-main', 'custom_ajax', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'xe_dien_scripts');

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
    function xe_dien_woocommerce_setup()
    {
        add_theme_support(
            'woocommerce',
            array(
                'thumbnail_image_width' => 150,
                'single_image_width'    => 300,
                'product_grid'          => array(
                    'default_rows'    => 3,
                    'min_rows'        => 1,
                    'default_columns' => 4,
                    'min_columns'     => 1,
                    'max_columns'     => 6,
                ),
            )
        );
        add_theme_support('wc-product-gallery-zoom');
        add_theme_support('wc-product-gallery-lightbox');
        add_theme_support('wc-product-gallery-slider');
    }
    add_action('after_setup_theme', 'xe_dien_woocommerce_setup');

    // thêm class để tùy chỉnh css
    add_filter('body_class', function ($classes) {
        if (function_exists('is_woocommerce') && (
            is_woocommerce() ||
            is_cart() ||
            is_checkout() ||
            is_account_page()
        )) {
            $classes[] = 'xemer_woo_theme';
        }
        return $classes;
    });

    // lấy ảnh full sửa sản phẩm trong trang cart
    add_filter('woocommerce_cart_item_thumbnail', function ($product_image, $cart_item, $cart_item_key) {
        if (isset($cart_item['product_id'])) {
            $product_id = $cart_item['product_id'];
            $product_image = get_the_post_thumbnail($product_id, 'full');
        }
        return $product_image;
    }, 10, 3);

    // thêm thông tin ở box tính tổng của trang cart
    add_action('woocommerce_before_cart_totals', 'custom_before_cart_totals');
    function custom_before_cart_totals()
    {
?>
        <div class="cart_shipping_noti">
            <span class="icon">
                <svg width="27" height="20" viewBox="0 0 27 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.24951 17C9.24951 17.5304 9.0388 18.0391 8.66373 18.4142C8.28865 18.7893 7.77994 19 7.24951 19C6.71908 19 6.21037 18.7893 5.8353 18.4142C5.46023 18.0391 5.24951 17.5304 5.24951 17C5.24951 16.4696 5.46023 15.9609 5.8353 15.5858C6.21037 15.2107 6.71908 15 7.24951 15C7.77994 15 8.28865 15.2107 8.66373 15.5858C9.0388 15.9609 9.24951 16.4696 9.24951 17ZM9.24951 17H17.9995M17.9995 17C17.9995 17.5304 18.2102 18.0391 18.5853 18.4142C18.9604 18.7893 19.4691 19 19.9995 19C20.5299 19 21.0387 18.7893 21.4137 18.4142C21.7888 18.0391 21.9995 17.5304 21.9995 17C21.9995 16.4696 21.7888 15.9609 21.4137 15.5858C21.0387 15.2107 20.5299 15 19.9995 15C19.4691 15 18.9604 15.2107 18.5853 15.5858C18.2102 15.9609 17.9995 16.4696 17.9995 17Z" stroke="#3E6AE1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M21.9995 17H23.7495C24.0147 17 24.2691 16.8946 24.4566 16.7071C24.6441 16.5196 24.7495 16.2652 24.7495 16V2C24.7495 1.73478 24.6441 1.48043 24.4566 1.29289C24.2691 1.10536 24.0147 1 23.7495 1H5.24949C4.98427 1 4.72992 1.10536 4.54238 1.29289C4.35485 1.48043 4.24949 1.73478 4.24949 2V9.837L2.59949 11.2C2.49003 11.2939 2.40217 11.4103 2.34193 11.5413C2.28169 11.6723 2.2505 11.8148 2.25049 11.959V16C2.25049 16.2652 2.35585 16.5196 2.54338 16.7071C2.73092 16.8946 2.98527 17 3.25049 17H5.25049" stroke="#3E6AE1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M7.24951 12V6H8.99951M8.99951 9H7.24951M18.3125 6H16.5625V12H18.3125M18.3125 9H16.5625M22.4995 6H20.7495V12H22.4995M22.4995 9H20.7495M11.6245 12V6H12.8745C13.206 6 13.524 6.1317 13.7584 6.36612C13.9928 6.60054 14.1245 6.91848 14.1245 7.25C14.1245 7.58152 13.9928 7.89946 13.7584 8.13388C13.524 8.3683 13.206 8.5 12.8745 8.5H11.6245" stroke="#3E6AE1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M11.6245 8.5H12.1245C12.6549 8.5 13.1637 8.71071 13.5387 9.08579C13.9138 9.46086 14.1245 9.96957 14.1245 10.5V12" stroke="#3E6AE1" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>
            <span class="text">
                Đơn hàng đã đủ điều kiện Freeship Nội thành Hà Nội!
            </span>
        </div>
        <div class="my_cart_title">
            Giỏ Hàng Của Bạn
        </div>
    <?php
    }

    // Ẩn form nhập mã giảm giá ở trang checkout
    remove_action('woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10);

    // Thêm ảnh sản phẩm (size large) vào checkout
    // add_filter('woocommerce_cart_item_name', 'custom_checkout_product_image_large', 10, 3);
    // function custom_checkout_product_image_large($product_name, $cart_item, $cart_item_key)
    // {
    //     if (is_checkout()) {
    //         $product   = $cart_item['data'];
    //         $thumbnail = $product->get_image('large');
    //         $product_name = '<div class="checkout-product-thumb">'
    //             . $thumbnail
    //             . '<span>' . $product_name . '</span>'
    //             . '</div>';
    //     }
    //     return $product_name;
    // }

    // Xoá sản phẩm liên quan mặc định và thay thế bằng code mới
    remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
    // add_action('woocommerce_after_single_product_summary', 'custom_related_products_slider', 20);
    // function custom_related_products_slider()
    // {
    //     // Lấy 3 sản phẩm liên quan
    //     $related_products = wc_get_related_products(get_the_ID(), 3);

    //     if (! empty($related_products)) {
    //         echo '<div class="row">';
    //         foreach ($related_products as $related_id) {
    //             $post_object = get_post($related_id);
    //             setup_postdata($GLOBALS['post'] = &$post_object);
    //             echo '<div class="col-lg-4">';
    //             wc_get_template_part('content', 'product');
    //             echo '</div>';
    //         }
    //         wp_reset_postdata();
    //         echo '</div>';
    //     }
    // }

    // thay đổi style phân trang mặc định
    add_filter('woocommerce_pagination_args', function ($args) {
        // Số lượng trang hiển thị 2 bên
        $args['end_size']   = 1;
        $args['mid_size']   = 1;

        // Text nút trước / sau
        $args['prev_text']  = __('« Prev');
        $args['next_text']  = __('Next »');

        return $args;
    });

    // số sản phẩm trên mỗi trang shop và category
    add_filter('loop_shop_per_page', function ($cols) {
        return 9;
    }, 20);

    // Gỡ bỏ phần tabs mặc định
    add_filter('woocommerce_product_tabs', '__return_empty_array', 98);

    // tắt hoàn toàn text chính sách ở trang checkout
    add_action('wp', function () {
        remove_action('woocommerce_checkout_terms_and_conditions', 'wc_checkout_privacy_policy_text', 20);
        remove_action('woocommerce_checkout_terms_and_conditions', 'wc_terms_and_conditions_page_content', 30);
    });

    // thay text nút đặt hàng
    add_filter('woocommerce_order_button_text', function () {
        return 'Thanh toán';
    });

    // hook thay đổi trang single product
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);
    remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
    add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 35);

    // Fake Thông tin 1 (sau tên sp)
    add_action('woocommerce_single_product_summary', function () {

        $introduce = get_field('introduce') ?? "";
    ?>
        <?php if ($introduce): ?>
            <div class="gioi_thieu">
                <?php echo get_field('introduce'); ?>
            </div>
        <?php endif; ?>

        <div class="list_info">
            <div class="row">
                <div class="col-lg-4">
                    <div class="item">
                        <div class="value">
                            82 km/lần sạc
                        </div>
                        <div class="label">
                            Quãng đường di chuyển
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="item">
                        <div class="value">
                            49 km/h
                        </div>
                        <div class="label">
                            Tốc độ tối đa
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="item">
                        <div class="value">
                            22 lít
                        </div>
                        <div class="label">
                            Độ rộng cốp xe
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }, 6);

    // Thêm text quanh giá biến thể
    add_action('woocommerce_single_variation', 'custom_variation_price_wrapper', 9);
    function custom_variation_price_wrapper()
    {
        echo '<span class="custom-price-text">Giá bán</span>';
    }
    add_action('woocommerce_single_variation', 'custom_variation_price_note', 11);
    function custom_variation_price_note()
    {
        echo '<span class="custom-price-note">Đã bao gồm VAT, 01 Bộ sạc & Ắc quy</span>';
    }
    // end

    // Fake VAT note (sau giá)
    add_action('woocommerce_single_product_summary', function () {
    ?>
        <div class="list_uu_diem">
            <div class="row">
                <div class="col-lg-6">
                    <div class="item">
                        <div class="heading">
                            <div class="icon">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <rect width="20" height="20" fill="url(#pattern0_4117_133)" />
                                    <defs>
                                        <pattern id="pattern0_4117_133" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_4117_133" transform="scale(0.0208333)" />
                                        </pattern>
                                        <image id="image0_4117_133" width="48" height="48" preserveAspectRatio="none" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAAAERlWElmTU0AKgAAAAgAAYdpAAQAAAABAAAAGgAAAAAAA6ABAAMAAAABAAEAAKACAAQAAAABAAAAMKADAAQAAAABAAAAMAAAAADbN2wMAAADfUlEQVRoBe2XTVLbMBSAnxQWXXKADrE3pUwXzQ0abkBP0PQEpScoN4CeoOEG9ASYE2AWHUq7kAPdk3UnkfpeEk2EsGTZVrKpNePR099779PPkwzQpW4GuhnoZqCbgRYzwHxjbyeTDxzgGIDlIOffJUB+kKaFb8y225wA5PxBv3++hGBjw7EC5UyCyqTs3bxJX+ZG29ZFJ8Dd5F6gkycOCNPRAhjkSqmruexl2wZyAvwUkzPG2SeEGAVAmEBTBMoISElJWy4zG2PLTgBz6zSAMP2cMlwhxlg2m82uYgO5AYRIOO8J7UlLCK1mkSNQBgryOQaGtkBOALJE5wCzhGRKMSGWGjG+Icyrvb1DXa6bY5T0psxs5cDGOjoRjNnWVFYKhtdC7DYd7wVAJzNb8SYgXgAMbDuhZS8ASHlVpig2BAO+GYDVrTvdNASG67dlNkLq/Cuw1HDhUhRxJYYuG1X1lQBKqhufkkgQSdODXAkwh17mA6A2EwIffe+lnB/il5KMzQX1qUpND7L3HtBG8T54RHlXl505Oryfpk+2nMAQ+Xd5IXrH40p/fp32z5y6HQ2VK7AYp/DmDEj43J7a3dI0nXLOKh1repCDAOhhZjvmKBdl9TMpS+utvke40t9uhRha9d5iGADI3Ktl3ZisxbWEZ2S4LjmlXWwZ4fvrkm57Zy+rIegM0JjAc1DQAV7dHwtTP8SfwQ6X15bdyqJ+d1V1DAb4dX9/Se+WKoXYXihQXxXAYw/YAPMR1tHs1k4hEEFbiCzTez7Qg4QBO6XQis4f45g6zo9NGzo8m3W2HAxAPyP24Jhlmu39/t5Hyk29VRDBAHjR5Kh4aiqPJZtbhX5fSyDOXLaCASie06+hS1HTetN5rWOH80TLq9w5ccEApEjO/e8iy2hlscz53w8PX6RUJ8bgRWQzyk/EWgAK5MWT0S0KdZw3w7JtshbA4gdcQWuIWM4TTPA9YJLT05dej4zzAVPsHTCVoKqB2cclx3SebDQCKHPuOdTiPzcx+8Z2nnRHAzAdJZkeZpiNSF6lMcV5XaDcdWB9e94cT3KtM2AP9pXxTXRutY/MR1oM50n/xlaAlJPDdJOSrBNtI4rzZaGyzsxrfRsFICNlENr4Kn/2grXavcWNA5B1D0Qr50n3VgAcEK2d3yoAGbsT4gh475Rk+8eH6rrUzUA3A//hDPwDgz/roA6WrE4AAAAASUVORK5CYII=" />
                                    </defs>
                                </svg>
                            </div>
                            <div class="title">
                                Kiểu dáng
                            </div>
                        </div>
                        <div class="desc">
                            Thiết kế nhỏ gọn, trẻ trung, năng động với các đường nét bo tròn phù hợp với vóc dáng người Việt
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="item">
                        <div class="heading">
                            <div class="icon">
                                <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <rect x="0.5" width="20" height="20" fill="url(#pattern0_2035_2745)" />
                                    <defs>
                                        <pattern id="pattern0_2035_2745" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_2035_2745" transform="scale(0.0208333)" />
                                        </pattern>
                                        <image id="image0_2035_2745" width="48" height="48" preserveAspectRatio="none" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAAAERlWElmTU0AKgAAAAgAAYdpAAQAAAABAAAAGgAAAAAAA6ABAAMAAAABAAEAAKACAAQAAAABAAAAMKADAAQAAAABAAAAMAAAAADbN2wMAAAD7klEQVRoBe1ZXU4bMRC2vaFIvJBnpKS7ldoq6kPhBKQnKJyAcILCCQgnoD0B9ATlBk1P0H2pItqHTcIBun2poGLX/SYbR2b/bJKwaaVYWsb2/HhmPONxDGOrtvLAygMrD6w8MIcH+Ky8P66vT+JYHoE/jOPoTcvzBkpWPwhcIcQnxvi2ELz7vNE4VTiCZbw6nU1f2BClaYIgqEP5Lubr+FzOBBkybcmYb9ME0X0FvUKaeBWdLZzJgJtE8eka3OGb0wE66fHm+voUb+LV5dj0azZEiuZbEGwLVoM3pavmCCIO3X4w6qg5Gks1ALy5vd3pB9deMnWfl8WsDlybcDfszt/xvDChs/uLtcztKgj2mHDOQTkNBTPXjBScXfyOomNbQ4w7QAkJ5ZGQFTXJOhvcIUft26xozIF0gtoInZuGsz098cvkGXdAOPy11AIap8ppmcBZcY7Dd7FOW/E/QR6h76txETQakGZseU+76blFjPvBsIua0VayksNCjYphrgF0ogiH7RIbvOIWsz8exnHkydVodIBTJoyi6INeKPVVMwaMlRfsnGlhozNU1VfhRGqgqrcBdvBlWsYAziROANht0agurDnOmQVpHon/otk8zkNk55Kqnp1nLGPAOosv/jDnHYjdPAZ9juJUStnW52z73M5HY3FlB0fGAC+phN74/Ae7EM5nAHcsqcI/MpbHksWXuHqEZUUtY4DSUSXN1XCkpiqFkvFQ6VC2sLGQlTH/C7jCHVAhtCwl6TAhHUwhlNkBYkLYBIj98QcD3GUYwQU/Ix02hPOTfgAV6ZAxAGnbAbFbxLCMeZxCR0Xr5hnQKyJe4nxYtHYmB1peo4dqfKiuEqjIe2BGcau2oU70UIUHMpK/cJy+L1o9YwARtrzmBQB9DPnQBqjcgChiHyd6YPnilhNCxcT/Iua/NyA3hPTrNHKg8vChnXYcdoDr9C5fXadLAj85sQKvhGRBqEe6TpN2Nheuea2Y8zqdvHHOq8RD+aM42kf8+6a7UG4S02LKs99Ho1B/lXisSx5eJTb1dTir4TrdGJgMLzRAMVI1VH2CdMHSx4vq68qTzJjdhTayjXUgjtgXG0ELphm88jzfRqbRACrndC+xEbYwmjiy/LFv+/wAzcbFjbO3XCSFTT17TJSm7da3vI4xfZMmfc75FJ/mhYN8GTPkmhxGeFSw9T4JR6I/vFEi38sFvCi/bDYPlSRUUHpX6qjx2lrNfba1NaSxiVfx2EJjCNkKWhbdTAZMjtiBUjqd6KnxQHmf6E28SqYtNB6jRYLoH3v081Ow2IdSlzodJT5yBvEp6/S2o+Oor3jB36PrSBq/Gq88UKEH/gL06XVXbw5dLQAAAABJRU5ErkJggg==" />
                                    </defs>
                                </svg>
                            </div>
                            <div class="title">
                                Hệ thống giảm xóc
                            </div>
                        </div>
                        <div class="desc">
                            Hệ thống giảm chấn thủy lực cho phép người dùng di chuyển êm ái trên nhiều dạng địa hình
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="item">
                        <div class="heading">
                            <div class="icon">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <rect width="20" height="20" fill="url(#pattern0_2035_2751)" />
                                    <defs>
                                        <pattern id="pattern0_2035_2751" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_2035_2751" transform="scale(0.0208333)" />
                                        </pattern>
                                        <image id="image0_2035_2751" width="48" height="48" preserveAspectRatio="none" xlink:href="data:image/png;base64,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" />
                                    </defs>
                                </svg>
                            </div>
                            <div class="title">
                                Thân xe
                            </div>
                        </div>
                        <div class="desc">
                            Trọng tâm xe cân đối, sàn để chân rộng rãi giúp người dùng thoải mái trên những chặng đường dài
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="item">
                        <div class="heading">
                            <div class="icon">
                                <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <rect x="0.5" width="20" height="20" fill="url(#pattern0_2035_2756)" />
                                    <defs>
                                        <pattern id="pattern0_2035_2756" patternContentUnits="objectBoundingBox" width="1" height="1">
                                            <use xlink:href="#image0_2035_2756" transform="scale(0.0208333)" />
                                        </pattern>
                                        <image id="image0_2035_2756" width="48" height="48" preserveAspectRatio="none" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAAAERlWElmTU0AKgAAAAgAAYdpAAQAAAABAAAAGgAAAAAAA6ABAAMAAAABAAEAAKACAAQAAAABAAAAMKADAAQAAAABAAAAMAAAAADbN2wMAAACFUlEQVRoBe2Xy1HDMBCGJdtHDjQQYh8YoIvQAVRAOmBSAZMO6IBQAZSQDjgy4WInFeSSoyW0TJjIiexoo10xzFiHjCytVvv9emQlRF96BXoF/rUCkir6xXJVGl+5p7/qanhReNp2miWdvbjOHGGOse10SwnQORFXJwnAR1meYwP8LMscO8Zljz4DEOxZlj0qpceWQwBAQ1jjqySRs8vBYGq1eVXRAF/L1YsWYuzlfWdUmWq++3TXtNKT62L47O51t6K30CnBK1XfuqdvtspEPjVbjn+hAY67bFqYrfZ6UxRVs7X1C70NuQFM4GrWGi5BBysAUv2TcDgBKm71gZgNIIb6nABR1GcDiKU+F0A09VkAYqrPARBVfXKA2OoDQAY/RGXdde+bF9hB4rioVm9CiruQ+cn+B0x074icR/y8BwKDB3AygFrVU4ySaZKiM0+XfxIAo/4Mq/4JabkrfpoV+Cv1gSj4EEsp5uBo/43btiJgR6U+zBsMoLUYJUlagrO9cnDrQD/sfQNAVkjOgG801OrDvFEBqG4eW7BoABzqR10BDvWjAWzVH9lLT1WPsoWyLHswAedUQdt+2AFAfZOlju1JKevsAJzqgxCsANzqswNwq88KEEN9AAjOhcCJq7TkRy7ToDbWMxAUmedgNMBv+uzpH2UGDyPUAGOMBtjU9f12IvOIJytrqcV8o+oJmcfeUa+AnwLfLWyjC9BjTYcAAAAASUVORK5CYII=" />
                                    </defs>
                                </svg>
                            </div>
                            <div class="title">
                                Tiết kiệm
                            </div>
                        </div>
                        <div class="desc">
                            Tối ưu chi phí vận hành trong quá trình sử dụng so với các sản phẩm cùng phân khúc trên thị trường
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="list_btn">
            <div class="row">
                <div class="col-lg-6">
                    <a href="#" class="btn_1">
                        Nhận tư vấn
                    </a>
                </div>
                <div class="col-lg-6">
                    <a href="javascript:void(0);" class="add_to_cart_fake">
                        Thêm sản phẩm
                    </a>
                </div>
            </div>
        </div>
<?php
    }, 35);
}

// The function "write_log" is used to write debug logs to a file in PHP.
function write_log($log = null, $title = 'Debug')
{
    if ($log) {
        if (is_array($log) || is_object($log)) {
            $log = print_r($log, true);
        }

        $timestamp = date('Y-m-d H:i:s');
        $text = '[' . $timestamp . '] : ' . $title . ' - Log: ' . $log . "\n";
        $log_file = WP_CONTENT_DIR . '/debug.log';
        $file_handle = fopen($log_file, 'a');
        fwrite($file_handle, $text);
        fclose($file_handle);
    }
}

// Setup theme setting page
if (function_exists('acf_add_options_page')) {
    // Trang cài đặt chính
    acf_add_options_page(array(
        'page_title' => 'Theme Settings',
        'menu_title' => 'Theme Settings',
        'menu_slug'  => 'theme-settings',
        'capability' => 'edit_posts',
        'redirect'   => false,
        'position'   => 80
    ));
}

// stop upgrading ACF pro plugin
add_filter('site_transient_update_plugins', 'disable_plugins_update');
function disable_plugins_update($value)
{
    // disable acf pro
    if (isset($value->response['advanced-custom-fields-pro/acf.php'])) {
        unset($value->response['advanced-custom-fields-pro/acf.php']);
    }
    return $value;
}

// tối đa 5 revision cho mỗi bài viết
add_filter('wp_revisions_to_keep', function ($num, $post) {
    return 5;
}, 10, 2);

// tắt thông báo rác
add_action('admin_head', function () {
    remove_all_actions('admin_notices');
    remove_all_actions('all_admin_notices');
});

// tự động cài đặt lựa chọn hình ảnh căn giữa
function set_default_image_settings_on_login($user_login, $user)
{
    global $wpdb;

    $user_id = $user->ID;
    $prefix = $wpdb->prefix;
    $meta_key = $prefix . 'user-settings';
    $current_settings = get_user_meta($user_id, $meta_key, true);

    if (strpos($current_settings, '&align=') !== false) {
        $current_settings = preg_replace('/&align=([^"]*)/', '&align=center', $current_settings);
    } else {
        $current_settings .= '&align=center';
    }

    if (strpos($current_settings, '&imgsize=') !== false) {
        $current_settings = preg_replace('/&imgsize=([^"]*)/', '&imgsize=center', $current_settings);
    } else {
        $current_settings .= '&imgsize=center';
    }

    update_user_meta($user_id, $meta_key, $current_settings);
}
add_action('wp_login', 'set_default_image_settings_on_login', 10, 2);

// thêm item dropdown sửa dụng cho mobile
function add_dropdown_arrow_to_menu($items, $args)
{
    if (!empty($args->theme_location)) {
        $items = preg_replace('/(<a.*?>)(.*)<\/a>/i', '<span class="dropdown-arrow"></span>$1$2</a>', $items);
    }
    return $items;
}
add_filter('wp_nav_menu_items', 'add_dropdown_arrow_to_menu', 10, 2);
