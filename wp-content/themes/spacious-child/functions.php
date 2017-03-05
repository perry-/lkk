<?php
/**
 * Define Directory Location Constants
 */
define( 'SPACIOUS_CHILD_THEME_DIR', get_stylesheet_directory() );

/**
	* Define child theme directory loaction constraints
	*/
define( 'SPACIOUS_CHILD_INCLUDES_DIR', SPACIOUS_CHILD_THEME_DIR. '/inc' );
define( 'SPACIOUS_CHILD_CSS_DIR', SPACIOUS_CHILD_THEME_DIR . '/css' );
define( 'SPACIOUS_CHILD_JS_DIR', SPACIOUS_CHILD_THEME_DIR . '/js' );
define( 'SPACIOUS_CHILD_LANGUAGES_DIR', SPACIOUS_CHILD_THEME_DIR . '/languages' );

define( 'SPACIOUS_CHILD_ADMIN_DIR', SPACIOUS_CHILD_INCLUDES_DIR . '/admin' );
define( 'SPACIOUS_CHILD_WIDGETS_DIR', SPACIOUS_CHILD_INCLUDES_DIR . '/widgets' );

define( 'SPACIOUS_CHILD_ADMIN_IMAGES_DIR', SPACIOUS_CHILD_ADMIN_DIR . '/images' );
define( 'SPACIOUS_CHILD_ADMIN_CSS_DIR', SPACIOUS_CHILD_ADMIN_DIR . '/css' );

/**
 * Define child theme URL Location Constants
 */
define( 'SPACIOUS_CHILD_THEME_URL', get_stylesheet_directory_uri() );

define( 'SPACIOUS_CHILD_INCLUDES_URL', SPACIOUS_CHILD_THEME_URL. '/inc' );
define( 'SPACIOUS_CHILD_CSS_URL', SPACIOUS_CHILD_THEME_URL . '/css' );
define( 'SPACIOUS_CHILD_JS_URL', SPACIOUS_CHILD_THEME_URL . '/js' );
define( 'SPACIOUS_CHILD_LANGUAGES_URL', SPACIOUS_CHILD_THEME_URL . '/languages' );

define( 'SPACIOUS_CHILD_ADMIN_URL', SPACIOUS_CHILD_THEME_URL . '/admin' );
define( 'SPACIOUS_CHILD_WIDGETS_URL', SPACIOUS_CHILD_THEME_URL . '/widgets' );

define( 'SPACIOUS_CHILD_ADMIN_IMAGES_URL', SPACIOUS_CHILD_THEME_URL . '/images' );
define( 'SPACIOUS_CHILD_ADMIN_CSS_URL', SPACIOUS_CHILD_THEME_URL . '/css' );

/** Load functions */
require_once( SPACIOUS_CHILD_INCLUDES_DIR . '/lkk-functions.php' );

/** Include styles */
function spacious_child_theme_enqueue_styles() {

    $parent_style = 'spacious_style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'spacious_child_style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'spacious_child_theme_enqueue_styles' );

function get_the_content_with_formatting ($content) {
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}
?>
