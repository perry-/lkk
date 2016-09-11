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
    echo  '<label for="street">Gate</label>';
    echo  '<input class="kodetimen-form__input" id="street" name="kodetimen_street" value="' . ( isset( $_POST["kodetimen_street"] ) ? esc_attr( $_POST["kodetimen_street"] ) : '' ) . '"></input>';
	echo '</div>';

	echo '<div class="kodetimen-form__field">';
    echo  '<label for="street_number">Gatenummer</label>';
    echo  '<input class="kodetimen-form__input" id="street_number" name="kodetimen_street_number" value="' . ( isset( $_POST["kodetimen_street_number"] ) ? esc_attr( $_POST["kodetimen_street_number"] ) : '' ) . '"></input>';
	echo '</div>';

	echo '<div class="kodetimen-form__field">';
    echo  '<label for="locality">By</label>';
    echo  '<input class="kodetimen-form__input" id="locality" name="kodetimen_locality" value="' . ( isset( $_POST["kodetimen_locality"] ) ? esc_attr( $_POST["kodetimen_locality"] ) : '' ) . '"></input>';
	echo '</div>';

	echo '<div class="kodetimen-form__field">';
    echo  '<label for="administrative_area_level_1">Fylke</label>';
    echo  '<input class="kodetimen-form__input" id="administrative_area_level_1" name="kodetimen_county" value="' . ( isset( $_POST["kodetimen_county"] ) ? esc_attr( $_POST["kodetimen_county"] ) : '' ) . '"></input>';
	echo '</div>';

	echo '<div class="kodetimen-form__field">';
    echo  '<label for="postal_code">Postnummer</label>';
    echo  '<input class="kodetimen-form__input" id="postal_code" name="kodetimen_postal_code" value="' . ( isset( $_POST["kodetimen_postal_code"] ) ? esc_attr( $_POST["kodetimen_postal_code"] ) : '' ) . '"></input>';
	echo '</div>';

	echo '<div class="kodetimen-form__field">';
    echo  '<label for="school">Skole</label>';
    echo  '<input class="kodetimen-form__input" id="school" name="kodetimen_school" value="' . ( isset( $_POST["kodetimen_school"] ) ? esc_attr( $_POST["kodetimen_school"] ) : '' ) . '"></input>';
	echo '</div>';

    echo '</fieldset>';

    echo '<fieldset class="kodetimen-form__fieldset">';
    echo '<legend class="kodetimen-form__legend">Kontaktperson</legend>';

	echo '<div class="kodetimen-form__field">';
	echo '<label for="name">Navn (påkrevd)</label>';
	echo '<input class="kodetimen-form__input" type="text" id="name" name="kodetimen_name" pattern="[a-zA-Z0-9 ]+" value="' . ( isset( $_POST["kodetimen_name"] ) ? esc_attr( $_POST["kodetimen_name"] ) : '' ) . '"/>';
	echo '</div>';

	echo '<div class="kodetimen-form__field">';
	echo '<label for="email">E-post (påkrevd)</label>';
	echo '<input class="kodetimen-form__input" type="email" id="email" name="kodetimen_email" value="' . ( isset( $_POST["kodetimen_email"] ) ? esc_attr( $_POST["kodetimen_email"] ) : '' ) . '"/>';
	echo '</div>';

    echo '</fieldset>';

	echo '<button class="kodetimen-form__button" type="submit" name="kodetimen-submitted">Send</button>';

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
	if ( isset( $_POST['kodetimen-submitted'] ) ) {

		// sanitize form values
		$name    = sanitize_text_field( $_POST["kodetimen_name"] );
		$street    = sanitize_text_field( $_POST["kodetimen_street"] );
		$street_number    = sanitize_text_field( $_POST["kodetimen_street_number"] );
		$school    = sanitize_text_field( $_POST["kodetimen_school"] );
		$county    = sanitize_text_field( $_POST["kodetimen_county"] );
		$postal_code    = sanitize_text_field( $_POST["kodetimen_postal_code"] );
		$locality   = sanitize_text_field( $_POST["kodetimen_locality"] );
		$email   = sanitize_email( $_POST["kodetimen_email"] );
        $subject = "Kodetimen";
        $locale = "no";

		// get the blog administrator's email address
		$to = get_option( 'admin_email' );

		$headers = "From: $name <$email>" . "\r\n";
		$subject = 'Kodetimen 2016';

		$message = 	 '<div>'
					.'<p>Takk for din påmelding!</p>'
					.'<p>Navn: ' . $name . '</p>'
					.'<p>Adresse: ' . $street . ' ' . $street_number . ', ' . $county . '</p>'
					.'<p>By: ' . $locality . '</p>'
					.'<p>Postnummer: ' . $postal_code . '</p>'
					.'</div>';

		// If email has been process for sending, display a success message
		if ( wp_mail( $to, $subject, $message, $headers ) ) {
			echo '<div>';
			echo '<p>Takk for din påmelding!</p>';
			echo '<p>Navn: ' . $name . '</p>';
			echo '<p>Adresse: ' . $street . ' ' . $street_number . ', ' . $county . '</p>';
			echo '<p>By: ' . $locality . '</p>';
			echo '<p>Postnummer: ' . $postal_code . '</p>';
			echo '</div>';
		} else {
			echo 'En feil oppstod.';
		}
	}
}

function kodetimen_shortcode() {
	ob_start();
	deliver_mail();
	html_form_code();

	return ob_get_clean();
}

add_shortcode( 'kodetimen_form', 'kodetimen_shortcode' );

?>
