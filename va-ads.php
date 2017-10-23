<?php
/*
Plugin Name:    VA Ads
Plugin URI:     https://github.com/villearo/va-ads
Description:    Custom post type for ads. Shortcode usage: [ads] or more specific [ads class="box" order='desc' orderby='date' posts='10' columns='3' ids='60, 64']
Version:        1.0.0
Author:         Ville Aro
Author URI:     https://villearo.fi/
Text Domain:    va-ads
Domain Path:    /languages
License:        GPLv2 or later
License URI:    http://www.gnu.org/licenses/gpl-2.0.html
*/

/**
 * Global variables
 */
$plugin_file = plugin_basename(__FILE__);							// plugin file for reference
define( 'VA_ADS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );		// define the absolute plugin path for includes
define( 'VA_ADS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );			// define the plugin url for use in enqueue

/**
 * Includes
 */
include( VA_ADS_PLUGIN_PATH . 'functions/activation.php' );
include( VA_ADS_PLUGIN_PATH . 'functions/deactivation.php' );
include( VA_ADS_PLUGIN_PATH . 'functions/meta-boxes.php' );
include( VA_ADS_PLUGIN_PATH . 'functions/display-ad.php' );
include( VA_ADS_PLUGIN_PATH . 'functions/shortcode.php' );






/**
 * Enque styles and scripts in head
 */
function va_ads_styles_and_scripts() {
	wp_enqueue_style( 'va-ads-style', VA_ADS_PLUGIN_URL . 'styles/css/style.css' );
	//wp_enqueue_script( 'overlay-scripts', VA_OVERLAY_PLUGIN_URL . 'scripts/overlay-scripts.js', array(), '1.0.0', true );

//	// Options
//	$color_options = get_option('va_overlay_colors');
//	$textcolor = $color_options['text'];
//	$backgroundcolor = $color_options['background'];
//	$style_settings = "
//		#va-overlay .overlay-outer {
//			background: {$backgroundcolor};
//		}
//		#va-overlay .overlay-inner > *:not(button) {
//			color: {$textcolor};
//		}
//	";
//	wp_add_inline_style( 'overlay-styles', $style_settings );

	// Font Awesome
	wp_register_style( 'fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css', array(), '4.2.0' );
    wp_enqueue_style( 'fontawesome' );

}
add_action('wp_enqueue_scripts', 'va_ads_styles_and_scripts');
