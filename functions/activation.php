<?php

function va_ads_setup_post_type() {

	$args = array(
	'labels' => array(
		'name' => __('Ads'),
		'singular_name' => __('Ad'),
		'all_items' => __('All Ads'),
		'add_new_item' => __('Add New Ad'),
		'edit_item' => __('Edit Ad'),
		'view_item' => __('View Ad')
	),
	'public' => true,
	'publicly_queryable' => false,
	'has_archive' => false,
	'rewrite' => array('slug' => 'ads'),
	'show_ui' => true,
	'show_in_menu' => true,
	'show_in_nav_menus' => true,
	'show_in_admin_bar' => true,
	'capability_type' => 'page',
	'taxonomies'  => array( 'category' ),
	'supports' => array('title', 'thumbnail'),
	'exclude_from_search' => true,
	'menu_position' => 20,
	'menu_icon' => 'dashicons-media-spreadsheet'
	);
	
	// https://codex.wordpress.org/Function_Reference/register_post_type
	register_post_type('va-ads', $args);

}
add_action( 'init', 'va_ads_setup_post_type' );





function va_ads_install() {

    // trigger our function that registers the custom post type
    va_ads_setup_post_type();
 
    // clear the permalinks after the post type has been registered
    flush_rewrite_rules();

}
register_activation_hook( __FILE__, 'va_ads_install' );
