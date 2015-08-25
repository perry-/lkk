<?php 

/**
* List all function files used in LKK
*/


function add_scripts() {
  wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places');
  wp_enqueue_script('google-jsapi','https://www.google.com/jsapi');
  wp_enqueue_script(
      'lkk-checkbox', // name your script so that you can attach other scripts and de-register, etc.
      SPACIOUS_JS_URL . '/checkbox.js', // this is the location of your script file
      array('jquery') // this array lists the scripts upon which your script depends
  );
}
add_action('wp_enqueue_scripts', 'add_scripts');

function add_admin_scripts() {
  wp_enqueue_script(
      'lkk-checkbox', // name your script so that you can attach other scripts and de-register, etc.
      SPACIOUS_JS_URL . '/checkbox.js', // this is the location of your script file
      array('jquery') // this array lists the scripts upon which your script depends
  );
}
add_action('admin_enqueue_scripts', 'add_admin_scripts');


require_once( SPACIOUS_INCLUDES_DIR . '/kodeklubb-functions.php');

?>