<?php

/**
 *  Use Advanced Custom Field as a part of theme
 *
 */

define( 'ACF_LITE', true );
include_once('advanced-custom-fields/acf.php');

/**
 *  Install Add-ons
 *
 *  The following code will include all 4 premium Add-Ons in your theme.
 *  Please do not attempt to include a file which does not exist. This will produce an error.
 *
 *  The following code assumes you have a folder 'add-ons' inside your theme.
 *
 *  IMPORTANT
 *  Add-ons may be included in a premium theme/plugin as outlined in the terms and conditions.
 *  For more information, please read:
 *  - http://www.advancedcustomfields.com/terms-conditions/
 *  - http://www.advancedcustomfields.com/resources/getting-started/including-lite-mode-in-a-plugin-theme/
 */

// Add-ons
// include_once('add-ons/acf-repeater/acf-repeater.php');
// include_once('add-ons/acf-gallery/acf-gallery.php');
// include_once('add-ons/acf-flexible-content/acf-flexible-content.php');
// include_once( 'add-ons/acf-options-page/acf-options-page.php' );

require_once('lkk-custom-fields/lkk-hompage-block-fields.php');
  
require_once("lkk-location/lkk-location-taxonomy.php");
require_once("lkk-location/lkk-location-widgets.php");
require_once("lkk-codeclub/lkk-codeclub-widgets.php");

remove_action( 'wp_head', 'jetpack_og_tags' );

/**
 * Functions that lists schools (can not be removed after kodetimen, since schools will continue to use them)
*/

function vis_skoler_func ( $atts ) {
    return @file_get_contents('http://monosolo.net/skoler.html');
}
 
add_shortcode( 'vis_skoler', 'vis_skoler_func' );

// populate school fields in forms automatically

// populate school fields in forms automatically
add_filter('gform_pre_render_16', 'populate_schools');
add_filter('gform_pre_render_13', 'populate_schools');
add_filter('gform_pre_render_14', 'populate_schools');

function populate_schools($form){
    $forms = array("13","14","16");
    $field_ids=array();

    //Tell Which field that contains the school list in each form
    $field_ids[]=array("form" => '16', "id"=>'1');
    $field_ids[]=array("form" => '13', "id"=>'7');
    $field_ids[]=array("form" => '14', "id"=>'5');

    //Check if we are on the right form. If not, get out
    if (in_array($forms, $form["id"], false)) {
       return $form;
    }

    $fieldid='';
    
    //Find the field ID (Perhaps WTF, it could be solved using if/else or case
    foreach($field_ids as $pair)
	if ($pair["form"]==$form["id"]){
		$fieldid=$pair["id"];
    }

    $schools = file('http://monosolo.net/skoleliste.txt');

    //Creating drop down item array.
    $items = array();

    //Adding schools to the array
    foreach($schools as $school)
        $items[] = array("value" => $school, "text" => $school );

    foreach($form["fields"] as &$field)
        if($field["id"] == $fieldid ){            
            $field["choices"] = $items;
        }

    return $form;
}

