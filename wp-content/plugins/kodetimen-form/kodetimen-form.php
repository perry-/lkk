<?php
/*
Plugin Name: Kodetimen-skjema
Plugin URI: http://kidsakoder.no
Description: Skjema til bruk for kodetimen
Version: 1.0
Author: LKK
*/

function html_form_code() {
	echo '<form action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';
    echo  '<div id="locationField">';
    echo  '  <input id="autocomplete" placeholder="Adresse" type="text"></input>';
    echo  '</div>';
    echo  '<label for="street_number">Gate</label>';
    echo  '<input class="field" id="street_number"';
    echo  '          disabled="true"></input>';
    echo  '<input class="field" id="route"';
    echo  '          disabled="true"></input>';
    echo  '<label for="locality">By</label>';
    echo  '<input class="field" id="locality"';
    echo  '          disabled="true"></input>';
    echo  '<label for="administrative_area_level_1">Fylke</label>';
    echo  '<input class="field"';
    echo  '          id="administrative_area_level_1" disabled="true"></input>';
    echo  '<label for="postal_code">Zip code</label>';
    echo  '<input class="field" id="postal_code"';
    echo  '          disabled="true"></input>';
    echo  '<label for="country">Country</label>';
    echo  '<input class="field"';
    echo  '          id="country" disabled="true"></input>';
	echo '<label for="name">Navn (påkrevd)</label>';
	echo '<input type="text" id="name" name="cf-name" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["cf-name"] ) ? esc_attr( $_POST["cf-name"] ) : '' ) . '"/>';
	echo '<label for="email">E-post (påkrevd)</label>';
	echo '<input type="email" id="email" name="cf-email" value="' . ( isset( $_POST["cf-email"] ) ? esc_attr( $_POST["cf-email"] ) : '' ) . '"/>';
	echo '<label for="age">Alder</label>';
	echo '<input type="number" id="age" name="cf-age" value="' . ( isset( $_POST["cf-age"] ) ? esc_attr( $_POST["cf-age"] ) : '' ) . '"/>';
	echo '<label for="gender">Kjønn</label>';
    echo '<select id="gender" name="cf-gender">';
    echo '<option value="Gutt"' . (selected( $options["gender"], "gutt" )) . '>Gutt</option>';
    echo '<option value="Jente"' . (selected( $options["gender"], "jente" )) . '>Jente</option>';
    echo '</select>';
	echo '<input type="submit" name="cf-submitted" value="Send">';
	echo '</form>';
}


function wp_kodetimen_enqueue_scripts()
{
    //register google maps api if not already registered
    if ( !wp_script_is( 'google-maps', 'registered' ) ) {
        wp_register_script( 'google-maps', ( is_ssl() ? 'https' : 'http' ) . '://maps.googleapis.com/maps/api/js?key=AIzaSyA_VKoV6XVMReOu2b6wpTTUwYFyQKkKnPk&libraries=places', array( 'jquery' ), false );
    }

    //enqueue google maps api if not already enqueued
    if ( !wp_script_is( 'google-maps', 'enqueued' ) ) {
        wp_enqueue_script( 'google-maps' );
    }

    wp_register_script( 'kodetimen-adress', plugins_url( '/js/kodetimen-adress.js', __FILE__ ));
    wp_enqueue_script( 'kodetimen-adress' );
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
