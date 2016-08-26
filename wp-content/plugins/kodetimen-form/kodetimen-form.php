<?php
/*
Plugin Name: Kodetimen-skjema
Plugin URI: http://kidsakoder.no
Description: Skjema til bruk for kodetimen
Version: 1.0
Author: LKK
*/

function html_form_code() {
    echo  '<div id="locationField">';
    echo  '  <input id="autocomplete" placeholder="Adresse" type="text"></input>';
    echo  '</div>';
    echo  '<table id="address">';
    echo  '  <tr>';
    echo  '    <td class="label">Street address</td>';
    echo  '    <td class="slimField"><input class="field" id="street_number"';
    echo  '          disabled="true"></input></td>';
    echo  '    <td class="wideField" colspan="2"><input class="field" id="route"';
    echo  '          disabled="true"></input></td>';
    echo  '  </tr>';
    echo  '  <tr>';
    echo  '    <td class="label">City</td>';
    echo  '    <td class="wideField" colspan="3"><input class="field" id="locality"';
    echo  '          disabled="true"></input></td>';
    echo  '  </tr>';
    echo  '  <tr>';
    echo  '    <td class="label">State</td>';
    echo  '    <td class="slimField"><input class="field"';
    echo  '          id="administrative_area_level_1" disabled="true"></input></td>';
    echo  '    <td class="label">Zip code</td>';
    echo  '    <td class="wideField"><input class="field" id="postal_code"';
    echo  '          disabled="true"></input></td>';
    echo  '  </tr>';
    echo  '  <tr>';
    echo  '    <td class="label">Country</td>';
    echo  '    <td class="wideField" colspan="3"><input class="field"';
    echo  '          id="country" disabled="true"></input></td>';
    echo  '  </tr>';
    echo  '</table>';
	echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';
	echo '<p>';
	echo 'Navn (påkrevd) <br/>';
	echo '<input type="text" name="cf-name" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["cf-name"] ) ? esc_attr( $_POST["cf-name"] ) : '' ) . '" size="40" />';
	echo '</p>';
	echo '<p>';
	echo 'E-post (påkrevd) <br/>';
	echo '<input type="email" name="cf-email" value="' . ( isset( $_POST["cf-email"] ) ? esc_attr( $_POST["cf-email"] ) : '' ) . '" size="40" />';
	echo '</p>';
	echo '<p>';
	echo 'Alder <br/>';
	echo '<input type="number" name="cf-age" value="' . ( isset( $_POST["cf-age"] ) ? esc_attr( $_POST["cf-age"] ) : '' ) . '" size="40" />';
	echo '</p>';
	echo '<p>';
	echo 'Kjønn <br/>';
    echo '<select name="cf-gender">';
    echo '<option value="Gutt"' . (selected( $options["gender"], "gutt" )) . '>Gutt</option>';
    echo '<option value="Jente"' . (selected( $options["gender"], "jente" )) . '>Jente</option>';
    echo '</select>';
	echo '</p>';
    echo '<p>';
    echo 'Alder <br/>';
    echo '<input type="number" name="cf-age" value="' . ( isset( $_POST["cf-age"] ) ? esc_attr( $_POST["cf-age"] ) : '' ) . '" size="40" />';
    echo '</p>';
	echo '<p><input type="submit" name="cf-submitted" value="Send"></p>';
	echo '</form>';
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

    wp_register_script( 'adress', plugins_url( '/js/adress.js', __FILE__ ));
    wp_enqueue_script( 'adress' );
}
add_action( 'wp_enqueue_scripts', 'wp_kodetimen_enqueue_scripts' );

function deliver_mail() {

	// if the submit button is clicked, send the email
	if ( isset( $_POST['cf-submitted'] ) ) {

		// sanitize form values
		$name    = sanitize_text_field( $_POST["cf-name"] );
		$email   = sanitize_email( $_POST["cf-email"] );
		$gender = sanitize_text_field( $_POST["cf-gender"] );
		$age = sanitize_text_field( $_POST["cf-age"] );
        $message = "Alder: " . $age . ", Kjønn: " . $gender;
        $subject = "Kodetimen";
        $locale = "no";

		// get the blog administrator's email address
		$to = get_option( 'admin_email' );

		$headers = "From: $name <$email>" . "\r\n";

		// If email has been process for sending, display a success message
		if ( wp_mail( $to, $subject, $message, $headers ) ) {
			echo '<div>';
			echo '<p>Takk for din påmelding!</p>';
			echo '</div>';
		} else {
			echo 'En feil oppstod.';
		}
	}
}

function cf_shortcode() {
	ob_start();
	deliver_mail();
	html_form_code();

	return ob_get_clean();
}

add_shortcode( 'kodetimen_form', 'cf_shortcode' );

?>
