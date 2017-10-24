<?php

function va_ads_add_meta_box() {
    add_meta_box(
        'ad-details',                 // The HTML id attribute for the metabox section
        'Ad Details',                 // The title of metabox section
        'va_ads_meta_box_callback',   // The metabox callback function
        'va-ads',                     // Your custom post type slug
        'normal',                           // Position can be 'normal', 'side', and 'advanced'
        'default'                           // Priority can be 'high' or 'low'
    );
}
add_action( 'add_meta_boxes', 'va_ads_add_meta_box' );

function va_ads_meta_box_callback( $post ) {
    $post_id = get_post_custom( $post->ID );
    $ad_address = isset( $post_id['ad_address'] ) ? esc_attr( $post_id['ad_address'][0] ) : "";
    $ad_email = isset( $post_id['ad_email'] ) ? esc_attr( $post_id['ad_email'][0] ) : "";
    $ad_phone = isset( $post_id['ad_phone'] ) ? esc_attr( $post_id['ad_phone'][0] ) : "";
    $ad_additional_info = isset( $post_id['ad_additional_info'] ) ? esc_attr( $post_id['ad_additional_info'][0] ) : "";
    $ad_website_url = isset( $post_id['ad_website_url'] ) ? esc_url( $post_id['ad_website_url'][0] ) : "";
    $ad_facebook_url = isset( $post_id['ad_facebook_url'] ) ? esc_url( $post_id['ad_facebook_url'][0] ) : "";
    $ad_twitter_url = isset( $post_id['ad_twitter_url'] ) ? esc_url( $post_id['ad_twitter_url'][0] ) : "";
    $ad_map_url = isset( $post_id['ad_map_url'] ) ? esc_url( $post_id['ad_map_url'][0] ) : "";
    wp_nonce_field( 'ad_details_nonce_action', 'ad_details_nonce' );
    echo '<label>Address</label><br/><input type="text" name="ad_address" id="ad_address" size="100" value="'. $ad_address .'" /><br/>';
    echo '<label>Email</label><br/><input type="text" name="ad_email" id="ad_email" size="100" value="'. $ad_email .'" /><br/>';
    echo '<label>Phone</label><br/><input type="text" name="ad_phone" id="ad_phone" size="100" value="'. $ad_phone .'" /><br/>';
    echo '<label>Additional Info</label><br/><input type="text" name="ad_additional_info" id="ad_additional_info" size="100" value="'. $ad_additional_info .'" /><br/>';
    echo '<label>Website URL</label><br/><input type="text" name="ad_website_url" id="ad_website_url" size="100" value="'. esc_url( $ad_website_url ) .'" /><br/>';
    echo '<label>Facebook URL</label><br/><input type="text" name="ad_facebook_url" id="ad_facebook_url" size="100" value="'. esc_url( $ad_facebook_url ) .'" /><br/>';
    echo '<label>Twitter URL</label><br/><input type="text" name="ad_twitter_url" id="ad_twitter_url" size="100" value="'. esc_url( $ad_twitter_url ) .'" /><br/>';
    echo '<label>Map URL</label><br/><input type="text" name="ad_map_url" id="ad_map_url" size="100" value="'. esc_url( $ad_map_url ) .'" /><br/>';
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
 
    if( isset( $_POST['ad_address'] ) ) {
        update_post_meta( $post_id, 'ad_address', $_POST['ad_address']);
    }

    if( isset( $_POST['ad_email'] ) ) {
        update_post_meta( $post_id, 'ad_email', $_POST['ad_email']);
    }
 
    if( isset( $_POST['ad_additional_info'] ) ) {
        update_post_meta( $post_id, 'ad_additional_info', $_POST['ad_additional_info']);
    }

    if( isset( $_POST['ad_phone'] ) ) {
        update_post_meta( $post_id, 'ad_phone', $_POST['ad_phone']);
    }

    if( isset( $_POST['ad_website_url'] ) ) {
        update_post_meta( $post_id, 'ad_website_url', esc_url( $_POST['ad_website_url'] ) );
    }

    if( isset( $_POST['ad_facebook_url'] ) ) {
        update_post_meta( $post_id, 'ad_facebook_url', esc_url( $_POST['ad_facebook_url'] ) );
    }
    
    if( isset( $_POST['ad_twitter_url'] ) ) {
        update_post_meta( $post_id, 'ad_twitter_url', esc_url( $_POST['ad_twitter_url'] ) );
    }
    
    if( isset( $_POST['ad_map_url'] ) ) {
        update_post_meta( $post_id, 'ad_map_url', esc_url( $_POST['ad_map_url'] ) );
    }

}
add_action( 'save_post', 'va_ads_save_meta_box' );
