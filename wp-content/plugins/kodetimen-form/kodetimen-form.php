<?php
/*
Plugin Name: Kodetimen-skjema
Plugin URI: http://kidsakoder.no
Description: Skjema til bruk for kodetimen
Version: 1.0
Author: LKK
*/

// Navn, Epost, Skole/Barnehage, Trinn (mange), Antall elever, Deltagerår; 2013, 2014, 2015, Adresse
// Valider skolenavn basert på adresse
function html_form_code() {
	echo '<form class="kodetimen-form" action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';

	echo '<fieldset class="kodetimen-form__fieldset">';
    echo '<legend class="kodetimen-form__legend">Skole / barnehage</legend>';

	echo '<div class="kodetimen-form__field">';
    echo  '<label for="autocomplete">Søk på skole/barnehage eller adresse</label>';
    echo  '  <input class="kodetimen-form__input" id="autocomplete" placeholder="" type="text"></input>';
	echo '</div>';

	echo '<div class="kodetimen-form__field">';
    echo  '<label for="street_number">Gate</label>';
    echo  '<input class="kodetimen-form__input" id="street_number"></input>';
	echo '</div>';

	echo '<div class="kodetimen-form__field">';
    echo  '<label for="route">Gatenummer</label>';
    echo  '<input class="kodetimen-form__input" id="route" ></input>';
	echo '</div>';

	echo '<div class="kodetimen-form__field">';
    echo  '<label for="locality">By</label>';
    echo  '<input class="kodetimen-form__input" id="locality" ></input>';
	echo '</div>';

	echo '<div class="kodetimen-form__field">';
    echo  '<label for="administrative_area_level_1">Fylke</label>';
    echo  '<input class="kodetimen-form__input" id="administrative_area_level_1" ></input>';
	echo '</div>';

	echo '<div class="kodetimen-form__field">';
    echo  '<label for="postal_code">Postnummer</label>';
    echo  '<input class="kodetimen-form__input" id="postal_code" ></input>';
	echo '</div>';

	echo '<div class="kodetimen-form__field">';
    echo  '<label for="school">Skole</label>';
    echo  '<input class="kodetimen-form__input" id="school"></input>';
	echo '</div>';

    echo '</fieldset>';

    echo '<fieldset class="kodetimen-form__fieldset">';
    echo '<legend class="kodetimen-form__legend">Kontaktperson</legend>';

	echo '<div class="kodetimen-form__field">';
	echo '<label for="name">Navn (påkrevd)</label>';
	echo '<input class="kodetimen-form__input" type="text" id="name" name="cf-name" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["cf-name"] ) ? esc_attr( $_POST["cf-name"] ) : '' ) . '"/>';
	echo '</div>';

	echo '<div class="kodetimen-form__field">';
	echo '<label for="email">E-post (påkrevd)</label>';
	echo '<input class="kodetimen-form__input" type="email" id="email" name="cf-email" value="' . ( isset( $_POST["cf-email"] ) ? esc_attr( $_POST["cf-email"] ) : '' ) . '"/>';
	echo '</div>';

	echo '<div class="kodetimen-form__field">';
	echo '<label for="age">Alder</label>';
	echo '<input class="kodetimen-form__input" type="number" id="age" name="cf-age" value="' . ( isset( $_POST["cf-age"] ) ? esc_attr( $_POST["cf-age"] ) : '' ) . '"/>';
	echo '</div>';

    echo '</fieldset>';

	echo '<button class="kodetimen-form__button" type="submit" name="cf-submitted">Send</button>';

	echo '</form>';
}


function wp_kodetimen_enqueue_scripts()
{
    //register google maps api if not already registered
    if ( !wp_script_is( 'google-maps', 'registered' ) ) {
        wp_register_script( 'google-maps', ( is_ssl() ? 'https' : 'http' ) . '://maps.googleapis.com/maps/api/js?key=AIzaSyA_VKoV6XVMReOu2b6wpTTUwYFyQKkKnPk&libraries=places&language=no', array( 'jquery' ), false );
    }
	$plugin_url = plugin_dir_url( __FILE__ );


    //enqueue google maps api if not already enqueued
    if ( !wp_script_is( 'google-maps', 'enqueued' ) ) {
        wp_enqueue_script( 'google-maps' );
    }

    wp_register_style( 'kodetimen-style', plugins_url( '/css/kodetimen-form.css', __FILE__ ));
	wp_enqueue_style( 'kodetimen-style' );

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
