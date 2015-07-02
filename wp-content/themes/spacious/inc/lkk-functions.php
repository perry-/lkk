<?php 

/**
* List all function files used in LKK
*/


function add_scripts() {
  wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places');
  wp_enqueue_script('google-jsapi','https://www.google.com/jsapi');     
}
add_action('wp_enqueue_scripts', 'add_scripts');


require_once( SPACIOUS_INCLUDES_DIR . '/kodeklubb-functions.php');

?>