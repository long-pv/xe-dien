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

    // validate
    wp_enqueue_script('xe_dien-script-validate', get_template_directory_uri() . '/assets/inc/validate/validate.js', array('jquery'), _S_VERSION, true);

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
                            <?php echo get_field('distance_traveled') ?? 'N/A'; ?>
                        </div>
                        <div class="label">
                            Quãng đường di chuyển
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="item">
                        <div class="value">
                            <?php echo get_field('maximum_speed') ?? 'N/A'; ?>
                        </div>
                        <div class="label">
                            Tốc độ tối đa
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="item">
                        <div class="value">
                            <?php echo get_field('trunk_width') ?? 'N/A'; ?>
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
        <?php if (have_rows('info_details')): ?>
            <div class="list_uu_diem">
                <div class="row">
                    <?php while (have_rows('info_details')): the_row();
                        $icon = get_sub_field('icon'); // return url
                        $tieu_de = get_sub_field('tieu_de');
                        $mo_ta = get_sub_field('mo_ta');
                    ?>
                        <div class="col-md-6">
                            <div class="item">
                                <div class="heading">
                                    <div class="icon">
                                        <?php if ($icon): ?>
                                            <img src="<?php echo $icon; ?>" alt="">
                                        <?php endif; ?>
                                    </div>
                                    <div class="title">
                                        <?php echo $tieu_de; ?>
                                    </div>
                                </div>
                                <div class="desc">
                                    <?php echo $mo_ta; ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>


        <div class="list_btn">
            <div class="row gy-3">
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

    // Xoá gallery thumbnail khỏi single product
    remove_action('woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20);

    // thêm html dưới gallery image
    add_action('woocommerce_before_single_product_summary', 'custom_html_after_main_image', 25);
    function custom_html_after_main_image()
    {
    ?>
        <?php if (have_rows('phu_kien')): ?>
            <div class="list_phu_kien">
                <div class="row">
                    <?php while (have_rows('phu_kien')): the_row();
                        $image = get_sub_field('image'); // return url
                        $mo_ta = get_sub_field('mo_ta');
                    ?>
                        <div class="col_custom">
                            <div class="item" data-mh="item">
                                <div class="img_wrap">
                                    <?php if ($image): ?>
                                        <img src="<?php echo $image; ?>" alt="">
                                    <?php endif; ?>
                                </div>
                                <div class="content">
                                    <?php echo $mo_ta; ?>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        <?php endif; ?>
<?php
    }

    // Xoá breadcrumb mặc định
    remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
    add_action('woocommerce_before_main_content', 'my_custom_breadcrumb', 20);
    function my_custom_breadcrumb()
    {
        wp_breadcrumbs();
    }
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

/**
 * Breadcrumbs
 */
function wp_breadcrumbs()
{
    $delimiter = '
	<span class="icon">
		<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M13.5 12.0887L8.5 6.97642L9.63613 5.63672L16.0001 12.0007L9.63613 18.3646L8.5 16.8759L13.5 12.0887Z" fill="black" fill-opacity="0.8"/>
        </svg>
	</span>
	';

    $home = __('Home', 'basetheme');
    $before = '<span class="current">';
    $after = '</span>';
    if (!is_admin() && !is_home() && (!is_front_page() || is_paged())) {

        global $post;

        echo '<nav id="breadcrumbs" class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">';

        $homeLink = home_url();
        if ($post->post_type != 'product') {
            echo '<a href="' . $homeLink . '">' . $home . '</a>' . $delimiter . ' ';
        }

        switch (true) {
            case is_category() || is_archive():
                $cat_obj = get_queried_object();
                echo $before . $cat_obj->name . $after;
                break;

            case is_single() && !is_attachment():
                $post_type = $post->post_type;

                if ($post_type == 'post') {
                    $categories = get_the_category($post->ID);

                    if (!empty($categories)) {
                        $first_category = $categories[0];
                        echo '<a aria-label="' . $first_category->name . '" href="' . get_category_link($first_category->term_id) . '">' . $first_category->name . '</a>' . $delimiter . ' ';
                    }
                }

                if ($post_type == 'product') {
                    echo '<span>Sản phẩm</span>' . $delimiter;
                }

                echo $before . $post->post_title . $after;
                break;

            case is_page():
                if ($post->post_parent) {
                    $parent_id = $post->ID;
                    echo generate_page_parent($parent_id, $delimiter);
                }

                echo $before . get_the_title() . $after;
                break;

            case is_search():
                echo $before . 'Search' . $after;
                break;

            case is_404():
                echo $before . 'Error 404' . $after;
                break;
        }

        echo '</nav>';
    }
} // end wp_breadcrumbs()

// Generate breadcrumbs ancestor page
function generate_page_parent($parent_id, $delimiter)
{
    $breadcrumbs = [];
    $output = '';

    while ($parent_id) {
        $page = get_post($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id = $page->post_parent;
    }


    $breadcrumbs = array_reverse($breadcrumbs);
    array_pop($breadcrumbs);

    foreach ($breadcrumbs as $crumb) {
        $output .= $crumb . $delimiter;
    }

    return rtrim($output);
}

// Xử lý AJAX tạo user
add_action('wp_ajax_nopriv_register_user', 'handle_register_user');
add_action('wp_ajax_register_user', 'handle_register_user');
function handle_register_user()
{
    $name     = sanitize_text_field($_POST['name']);
    $email    = sanitize_email($_POST['email']);
    $password = sanitize_text_field($_POST['password']);

    if (username_exists($email) || email_exists($email)) {
        wp_send_json_error(['message' => 'Email đã tồn tại trong hệ thống.']);
    }

    $user_id = wp_create_user($email, $password, $email);
    if (is_wp_error($user_id)) {
        wp_send_json_error(['message' => $user_id->get_error_message()]);
    }

    // Cập nhật tên hiển thị
    wp_update_user([
        'ID'           => $user_id,
        'display_name' => $name,
        'first_name'   => $name,
    ]);

    // Auto login
    wp_set_current_user($user_id);
    wp_set_auth_cookie($user_id);

    // Trả về success kèm đường dẫn trang chủ
    wp_send_json_success([
        'message' => 'Tạo tài khoản thành công!',
        'redirect' => home_url() // hoặc home_url('/trang-chu/') nếu có slug riêng
    ]);
}


// Hook AJAX login
add_action('wp_ajax_nopriv_login_user', 'handle_login_user');
add_action('wp_ajax_login_user', 'handle_login_user');

function handle_login_user()
{
    $email    = sanitize_email($_POST['email']);
    $password = sanitize_text_field($_POST['password']);
    $remember = isset($_POST['remember']) && $_POST['remember'] == 1;

    $user = wp_authenticate($email, $password);

    if (is_wp_error($user)) {
        wp_send_json_error(['message' => 'Email hoặc mật khẩu không đúng.']);
    }

    // Đăng nhập user
    wp_set_current_user($user->ID);
    wp_set_auth_cookie($user->ID, $remember);

    wp_send_json_success([
        'message'  => 'Đăng nhập thành công!',
        'redirect' => home_url('/'), // redirect về trang chủ
    ]);
}

function limit_posts_on_archive($query)
{
    // Chỉ áp dụng ở trang main query, không chạy trong admin
    if (! is_admin() && $query->is_main_query()) {

        // Nếu là trang archive bất kỳ
        if ($query->is_archive()) {
            $query->set('posts_per_page', 9);
        }
    }
}
add_action('pre_get_posts', 'limit_posts_on_archive');
