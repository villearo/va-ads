<?php

function va_ads_display_ad( $class ) {

    $post_id = get_the_ID();
    $ad_address = get_post_meta( $post_id, 'ad_address', true );
    $ad_email = get_post_meta( $post_id, 'ad_email', true );
    $ad_phone = get_post_meta( $post_id, 'ad_phone', true );
    $ad_website_url = esc_url( get_post_meta( $post_id, 'ad_website_url', true ) );
    $ad_facebook_url = esc_url( get_post_meta( $post_id, 'ad_facebook_url', true ) );
    $ad_twitter_url = esc_url( get_post_meta( $post_id, 'ad_twitter_url', true ) );
    $ad_map_url = esc_url( get_post_meta( $post_id, 'ad_map_url', true ) );
    $image = get_the_post_thumbnail_url( $post_id, 'medium' );

    $output = '<div class="col">';

        $output .= '<div class="ad '. $class . '">';

            if ( $image ) {
                $output .= '<div class="image" style="background-image: url(' . $image . ');" /></div>';
            }

            $output .= '<div class="info">';
                $output .= '<h4>' . get_the_title() . '</h4>';

                if ( $ad_address ) {
                    $output .= '<div class="address">' . $ad_address . '</div>';
                }

                if ( $ad_email ) {
                    $output .= '<div class="email">' . $ad_email . '</div>';
                }

                if ( $ad_phone ) {
                    $output .= '<div class="phone">' . $ad_phone . '</div>';
                }

                if ( $ad_website_url ) {
                    $output .= '<a href="' . $ad_website_url . '" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i></a>';
                }

                if ( $ad_facebook_url ) {
                    $output .= '<a href="' . $ad_facebook_url . '" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>';
                }

                if ( $ad_twitter_url ) {
                    $output .= '<a href="' . $ad_twitter_url . '" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>';
                }

                if ( $ad_map_url ) {
                    $output .= '<a href="' . $ad_map_url . '" target="_blank"><i class="fa fa-map-marker" aria-hidden="true"></i></a>';
                }

            $output .= '</div>'; // Close .info

        $output .= '</div>'; // Close .ad

    $output .= '</div>'; // Close .col

    echo $output;

}
