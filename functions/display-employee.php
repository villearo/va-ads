<?php

function va_ads_display_ad( $class ) {

    $post_id = get_the_ID();
    $ad_job = get_post_meta( $post_id, 'ad_job', true );
    $ad_email = get_post_meta( $post_id, 'ad_email', true );
    $ad_phone = get_post_meta( $post_id, 'ad_phone', true );
    $ad_website_url = esc_url( get_post_meta( $post_id, 'ad_website_url', true ) );
    $image = get_the_post_thumbnail_url( $post_id, 'medium' );

    $output = '<div class="col">';

        $output .= '<div class="ad '. $class . '">';

            if ( $image ) {
                $output .= '<img src="' . $image . '" />';
            }

            $output .= '<div class="info">';
                $output .= '<h4>' . get_the_title() . '</h4>';

                if ( $ad_job ) {
                    $output .= '<div class="job">' . $ad_job . '</div>';
                }

                if ( $ad_email ) {
                    $output .= '<div class="email">' . $ad_email . '</div>';
                }

                if ( $ad_phone ) {
                    $output .= '<div class="phone">' . $ad_phone . '</div>';
                }

                if ( $ad_website_url ) {
                    $output .= '<a href="' . $ad_website_url . '" target="_blank">' . $ad_website_url . '</a>';
                }
            $output .= '</div>'; // Close .info

        $output .= '</div>'; // Close .ad

    $output .= '</div>'; // Close .col

    echo $output;

}
