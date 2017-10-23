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

