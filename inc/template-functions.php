<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package xe_dien
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function xe_dien_body_classes($classes)
{
	// Adds a class of hfeed to non-singular pages.
	if (! is_singular()) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if (! is_active_sidebar('sidebar-1')) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter('body_class', 'xe_dien_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function xe_dien_pingback_header()
{
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
	}
}
add_action('wp_head', 'xe_dien_pingback_header');


// longpv
// 
// 
// stop upgrading wp cerber plugin
add_filter('site_transient_update_plugins', 'disable_plugins_update');
function disable_plugins_update($value)
{
	// disable acf pro
	if (isset($value->response['advanced-custom-fields-pro/acf.php'])) {
		unset($value->response['advanced-custom-fields-pro/acf.php']);
	}

	// disable All-in-One WP Migration
	if (isset($value->response['all-in-one-wp-migration-master/all-in-one-wp-migration.php'])) {
		unset($value->response['all-in-one-wp-migration-master/all-in-one-wp-migration.php']);
	}
	return $value;
}

// Setup theme setting page
if (function_exists('acf_add_options_page')) {
	acf_add_options_page(
		array(
			'page_title' => 'Theme Settings',
			'menu_title' => 'Theme Settings',
			'menu_slug' => 'theme-settings',
			'capability' => 'edit_posts',
			'redirect' => false,
			'position' => 80
		)
	);
}

// tối đa revision
add_filter('wp_revisions_to_keep', function ($num, $post) {
	return 3;
}, 10, 2);

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



// vucoder
// 
// 