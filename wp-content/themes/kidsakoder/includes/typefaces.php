<?php
/**
* Google Fonts Implementation
*
* @package Organic Themes
* @since NonProfit 4.0
*/

/**
* Register Google Fonts
*
* @since Photographer 1.0
*/
function organic_register_fonts() {
$protocol = is_ssl() ? 'https' : 'http';
wp_register_style( 'nunito', "$protocol://fonts.googleapis.com/css?family=Nunito:400,300,700" );
wp_register_style( 'open sans', "$protocol://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800,800italic,700italic,600italic,400italic,300italic" );
wp_register_style( 'merriweather', "$protocol://fonts.googleapis.com/css?family=Merriweather:400,700,300,900" );
}
add_action( 'init', 'organic_register_fonts' );

/**
* Enqueue Google Fonts on Front End
*
* @since NonProfit 4.0
*/

function organic_fonts() {
wp_enqueue_style( 'nunito' );
wp_enqueue_style( 'open sans' );
wp_enqueue_style( 'merriweather' );
}
add_action( 'wp_enqueue_scripts', 'organic_fonts' );

/**
* Enqueue Google Fonts on Custom Header Page
*
* @since NonProfit 4.0
*/
function organic_admin_fonts( $hook_suffix ) {
if ( 'appearance_page_custom-header' != $hook_suffix )
return;

wp_enqueue_style( 'nunito' );
wp_enqueue_style( 'open sans' );
wp_enqueue_style( 'merriweather' );
}
add_action( 'admin_enqueue_scripts', 'organic_admin_fonts' );