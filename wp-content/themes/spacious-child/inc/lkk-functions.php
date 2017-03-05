<?php

/**
* List all function files used in LKK
*/

function add_scripts() {
  wp_enqueue_script('google-maps', 'https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places');
  wp_enqueue_script('google-jsapi','https://www.google.com/jsapi');
  wp_enqueue_script(
      'lkk-checkbox', // name your script so that you can attach other scripts and de-register, etc.
      SPACIOUS_CHILD_JS_URL . '/checkbox.js', // this is the location of your script file
      array('jquery') // this array lists the scripts upon which your script depends
  );
  wp_enqueue_script(
      'lkk-accordion', // name your script so that you can attach other scripts and de-register, etc.
      SPACIOUS_CHILD_JS_URL . '/accordion.js', // this is the location of your script file
      array('jquery') // this array lists the scripts upon which your script depends
  );
}
add_action('wp_enqueue_scripts', 'add_scripts');

function add_admin_scripts() {
  wp_enqueue_script(
      'lkk-checkbox', // name your script so that you can attach other scripts and de-register, etc.
      SPACIOUS_CHILD_JS_URL . '/checkbox.js', // this is the location of your script file
      array('jquery') // this array lists the scripts upon which your script depends
  );
  wp_enqueue_script(
      'lkk-kodeklubb', // name your script so that you can attach other scripts and de-register, etc.
      SPACIOUS_CHILD_JS_URL . '/kodeklubb_contact.js', // this is the location of your script file
      array('jquery') // this array lists the scripts upon which your script depends
  );
}
add_action('admin_enqueue_scripts', 'add_admin_scripts');

function add_admin_styles() {
      wp_register_style( 'custom_wp_admin_css', SPACIOUS_CHILD_CSS_URL . '/admin-style.css', false, '1.0.0' );
      wp_enqueue_style( 'custom_wp_admin_css' );
}

add_action( 'admin_enqueue_scripts', 'add_admin_styles' );


require_once( SPACIOUS_CHILD_INCLUDES_DIR . '/kodeklubb-functions.php');
require_once( SPACIOUS_CHILD_INCLUDES_DIR . '/kodetimenpameldte-functions.php');
require_once( SPACIOUS_CHILD_INCLUDES_DIR . '/kodeklubb-updates-functions.php');

?>
