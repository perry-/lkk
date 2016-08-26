<?php
/*
Plugin Name: LKK Google Maps
Plugin URI: http://kidsakoder.no
Description: Kart til bruk for kodetimen og oversikt over kodeklubber
Version: 1.0
Author: LKK
*/

function html_form_code() {

}


function wp_kodetimen_enqueue_scripts()
{
    //register google maps api if not already registered
    if ( !wp_script_is( 'google-maps', 'registered' ) ) {
        wp_register_script( 'google-maps', ( is_ssl() ? 'https' : 'http' ) . '://maps.googleapis.com/maps/api/js?libraries=places', array( 'jquery' ), false );
    }

    //enqueue google maps api if not already enqueued
    if ( !wp_script_is( 'google-maps', 'enqueued' ) ) {
        wp_enqueue_script( 'google-maps' );
    }
}
add_action( 'wp_enqueue_scripts', 'wp_lkkmaps_enqueue_scripts' );



function cf_shortcode() {
	ob_start();
	html_form_code();

	return ob_get_clean();
}

add_shortcode( 'lkkmaps', 'cf_shortcode' );

?>
