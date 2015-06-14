<?php
/**
 * Widget template. This template can be overriden using the "sp_template_image-widget_widget.php" filter.
 * See the readme.txt file for more info.
 */

// Block direct requests
if ( !defined('ABSPATH') )
	die('-1');

echo $before_widget;

$aspectratio = round(abs( $instance['width'] ) / abs( $instance['height'] ), 2);

echo '<div class="widget_sp_image_wrapper ',($aspectratio > 1 ? 'widget_sp_image_landscape' : 'widget_sp_image_portrait'),'">';
echo $this->get_image_html( $instance, true );
echo '</div>';

if ( !empty( $title ) ) { echo $before_title . $title . $after_title; }

if ( !empty( $description ) ) {
	echo '<div class="'.$this->widget_options['classname'].'-description" >';
	echo wpautop( $description );
	echo "</div>";
}
echo $after_widget;
?>