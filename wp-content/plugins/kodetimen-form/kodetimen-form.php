<?php
/*
Plugin Name: Kodetimen-skjema
Plugin URI: http://kidsakoder.no
Description: Skjema til bruk for kodetimen
Version: 1.0
Author: LKK
*/

function counties() {
	$counties = array(
		'Østfold',
		'Akershus',
		'Oslo',
		'Hedmark',
		'Oppland',
		'Buskerud',
		'Vestfold',
		'Telemark',
		'Aust-Agder',
		'Vest-Agder',
		'Rogaland',
		'Hordaland',
		'Sogn og Fjordane',
		'Møre og Romsdal',
		'Sør-Trøndelag',
		'Nord-Trøndelag',
		'Nordland',
		'Troms',
		'Finnmark'
	);

	echo '<div class="kodetimen-form__field">';
    echo  '<label for="administrative_area_level_1">Fylke</label>';
	echo  '<select class="kodetimen-form__input" name="kodetimen_county" id="administrative_area_level_1">';
	echo  '<option value="">Velg fylke</option>';
	if(is_array($counties)){
		foreach ($counties as $county) {
			echo '<option value="' . $county . '">' . $county . '</option>';
		}
	}
	echo  '</select>';
	echo '</div>';
}

function years() {
	$years = range(2013, date("Y"));

	echo '<div class="kodetimen-form__field">';
    echo  '<label for="year">Deltagerår</label>';
	echo  '<select class="kodetimen-form__input" name="kodetimen_year" id="year">';
	if(is_array($years)){
		foreach ($years as $year) {
			if($year == date('Y')){
				echo '<option value="' . $year . '" selected="selected">' . $year . '</option>';
			} else {
				echo '<option value="' . $year . '">' . $year . '</option>';
			}
		}
	}
	echo  '</select>';
	echo '</div>';
}

// Navn, Epost, Skole/Barnehage, Trinn (mange),
// Valider skolenavn basert på adresse
function html_form_code() {
	echo '<form class="kodetimen-form" action="' . esc_url( $_SERVER['REQUEST_URI'] ) . '" method="post">';

	echo '<fieldset class="kodetimen-form__fieldset">';
    echo '<legend class="kodetimen-form__legend">Skole / barnehage</legend>';

	echo '<div class="kodetimen-form__field">';
    echo  '<label for="autocomplete">Søk på skole/barnehage eller adresse</label>';
    echo  '  <input type="text" class="kodetimen-form__input" id="autocomplete" placeholder=""></input>';
	echo '</div>';

	echo '<div class="kodetimen-form__field">';
    echo  '<label for="school">Skole</label>';
    echo  '<input type="text" required class="kodetimen-form__input" id="school" name="kodetimen_school" value=""></input>';
	echo '</div>';

    echo '</fieldset>';

	echo '<fieldset class="kodetimen-form__fieldset">';
    echo '<legend class="kodetimen-form__legend">Skolens adresse</legend>';

	echo '<div class="kodetimen-form__field">';
    echo  '<label for="route">Gate</label>';
    echo  '<input type="text" class="kodetimen-form__input" id="route" name="kodetimen_street" value=""></input>';
	echo '</div>';

	echo '<div class="kodetimen-form__field">';
    echo  '<label for="street_number">Gatenummer</label>';
    echo  '<input type="number" class="kodetimen-form__input" id="street_number" name="kodetimen_street_number" value=""></input>';
	echo '</div>';

	counties();

	echo '<div class="kodetimen-form__field">';
    echo  '<label for="locality">By</label>';
    echo  '<input type="text" class="kodetimen-form__input" id="locality" name="kodetimen_locality" value=""></input>';
	echo '</div>';

	echo '<div class="kodetimen-form__field">';
    echo  '<label for="postal_code">Postnummer</label>';
    echo  '<input type="number" class="kodetimen-form__input" id="postal_code" name="kodetimen_postal_code" value=""></input>';
	echo '</div>';

    echo '</fieldset>';

	echo '<div class="kodetimen-form__fieldset">';

	echo '<div class="kodetimen-form__field">';
    echo  '<label for="number_of_students">Antall elever</label>';
    echo  '<input type="number" required class="kodetimen-form__input" id="number_of_students" name="kodetimen_number_of_students" value=""></input>';
	echo '</div>';

	years();

    echo '</div>';

    echo '<fieldset class="kodetimen-form__fieldset">';
    echo '<legend class="kodetimen-form__legend">Kontaktperson</legend>';

	echo '<div class="kodetimen-form__field">';
	echo '<label for="name">Navn (påkrevd)</label>';
	echo '<input type="text" required class="kodetimen-form__input" type="text" id="name" name="kodetimen_name" pattern="[a-zA-Z0-9 ]+" value=""/>';
	echo '</div>';

	echo '<div class="kodetimen-form__field">';
	echo '<label for="email">E-post (påkrevd)</label>';
	echo '<input type="text" required class="kodetimen-form__input" type="email" id="email" name="kodetimen_email" value=""/>';
	echo '</div>';

    echo '</fieldset>';

	echo '<div class="kodetimen-form__field kodetimen-form__field--hidden">';
	echo  '<input class="kodetimen-form__input" id="kodetimen_lat" name="kodetimen_lat" value=""></input>';
	echo '</div>';

	echo '<div class="kodetimen-form__field kodetimen-form__field--hidden">';
	echo  '<input class="kodetimen-form__input" id="kodetimen_long" name="kodetimen_long" value=""></input>';
	echo '</div>';

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


function save_kodetimen_post($content, $title, $lat, $long, $location) {
	// Create post object
	$new_kodetimen_attendee = array(
	  'post_title'    => $title,
	  'post_content'  => $content,
	  'post_status'   => 'publish',
	  'post_type' => 'kodetimen'
	);

	// Insert the post into the database
	$post_id = wp_insert_post( $new_kodetimen_attendee );

	add_post_meta($post_id, '_kodetimen_position_lat_key', $lat);
	add_post_meta($post_id, '_kodetimen_position_long_key', $long);
	add_post_meta($post_id, '_kodetimen_position_value_key', $location);
}

function deliver_mail() {

	// if the submit button is clicked, send the email
	if ( isset( $_POST['kodetimen-submitted'] ) ) {

		// sanitize form values
		$name    = sanitize_text_field( $_POST["kodetimen_name"] );
		$street    = sanitize_text_field( $_POST["kodetimen_street"] );
		$street_number    = sanitize_text_field( $_POST["kodetimen_street_number"] );
		$school    = sanitize_text_field( $_POST["kodetimen_school"] );
		$county    = sanitize_text_field( $_POST["kodetimen_county"] );
		$lat = sanitize_text_field( $_POST['kodetimen_lat'] );
		$long = sanitize_text_field( $_POST['kodetimen_long'] );
		$location = sanitize_text_field( $_POST['autocomplete'] );
		$postal_code    = sanitize_text_field( $_POST["kodetimen_postal_code"] );
		$locality   = sanitize_text_field( $_POST["kodetimen_locality"] );
		$year   = sanitize_text_field( $_POST["kodetimen_year"] );
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

		save_kodetimen_post($message, $school, $lat, $long, $location);

		// If email has been process for sending, display a success message
		/*
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
		*/
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
