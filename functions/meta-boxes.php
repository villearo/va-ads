<?php

function va_ads_add_meta_box() {
    add_meta_box(
        'ad-details',                 // The HTML id attribute for the metabox section
        'ad Details',                 // The title of metabox section
        'va_ads_meta_box_callback',   // The metabox callback function
        'va-ads',                     // Your custom post type slug
        'normal',                           // Position can be 'normal', 'side', and 'advanced'
        'default'                           // Priority can be 'high' or 'low'
    );
}
add_action( 'add_meta_boxes', 'va_ads_add_meta_box' );

function va_ads_meta_box_callback( $post ) {
    $post_id = get_post_custom( $post->ID );
    $ad_job = isset( $post_id['ad_job'] ) ? esc_attr( $post_id['ad_job'][0] ) : "";
    $ad_email = isset( $post_id['ad_email'] ) ? esc_attr( $post_id['ad_email'][0] ) : "";
    $ad_phone = isset( $post_id['ad_phone'] ) ? esc_attr( $post_id['ad_phone'][0] ) : "";
    $ad_website_url = isset( $post_id['ad_website_url'] ) ? esc_url( $post_id['ad_website_url'][0] ) : "";
    wp_nonce_field( 'ad_details_nonce_action', 'ad_details_nonce' );
    echo '<label>ad Job</label><br/><input type="text" name="ad_job" id="ad_job" size="100" value="'. $ad_job .'" /><br/>';
    echo '<label>ad Email</label><br/><input type="text" name="ad_email" id="ad_email" size="100" value="'. $ad_email .'" /><br/>';
    echo '<label>ad Phone</label><br/><input type="text" name="ad_phone" id="ad_phone" size="100" value="'. $ad_phone .'" /><br/>';
    echo '<label>ad Website URL</label><br/><input type="text" name="ad_website_url" id="ad_website_url" size="100" value="'. esc_url( $ad_website_url ) .'" /><br/>';
}

function va_ads_save_meta_box( $post_id ) {

    // Check if our nonce is set.
    if ( ! isset( $_POST['ad_details_nonce'] ) ) {
        return;
    }

    $nonce = $_POST['ad_details_nonce'];

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $nonce, 'ad_details_nonce_action' ) ) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Check the user's permissions.
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
 
    if( isset( $_POST['ad_job'] ) ) {
        update_post_meta( $post_id, 'ad_job', $_POST['ad_job']);
    }

    if( isset( $_POST['ad_email'] ) ) {
        update_post_meta( $post_id, 'ad_email', $_POST['ad_email']);
    }
 
    if( isset( $_POST['ad_phone'] ) ) {
        update_post_meta( $post_id, 'ad_phone', $_POST['ad_phone']);
    }

    if( isset( $_POST['ad_website_url'] ) ) {
        update_post_meta( $post_id, 'ad_website_url', esc_url( $_POST['ad_website_url'] ) );
    }

}
add_action( 'save_post', 'va_ads_save_meta_box' );
