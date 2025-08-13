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
