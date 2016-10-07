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

function generate_school_levels($level) {
	return $level . '.';
}

function school_level() {
	$levels = array_merge(array_map('generate_school_levels', range(1, 10)), ['VG1', 'VG2', 'VG3', 'Barnehage']);

	echo '<div class="kodetimen-form__field">';
    echo  '<label for="level">Klassetrinn</label>';
	if(is_array($levels)){
		echo '<div class="kodetimen-form__checkboxgroup">';
		foreach ($levels as $level) {
			echo  '<label class="kodetimen-form__checkbox" id="level">';
				echo '<input class="kodetimen-form__checkbox-nativeinput kodetimen-form__input--vishidden" name="kodetimen_level[]" type="checkbox" id="kodetimen_level'. $level . '" value="' . $level . '"></input>';
				echo '<span class="kodetimen-form__checkbox-input" aria-hidden="true"></span>';
				echo '<span class="kodetimen-form__checkbox-label" for="kodetimen_level'. $level . '">'. $level .'</span>';
			echo  '</label>';
		}
		echo  '</div>';
	}
	echo '</div>';
}

function contact_person() {
	echo '
		<fieldset class="kodetimen-form__fieldset">
		     <legend class="kodetimen-form__legend">Kontaktperson</legend>

			 <div class="kodetimen-form__field">
				 <label for="name">Navn (påkrevd)</label>
				 <input type="text" required class="kodetimen-form__input" type="text" id="name" name="kodetimen_name" value=""/>
			 </div>

			 <div class="kodetimen-form__field">
				 <label for="email">E-post (påkrevd)</label>
				 <input type="text" required class="kodetimen-form__input" type="email" id="email" name="kodetimen_email" value=""/>
			 </div>

	     </fieldset>
	 ';
}

//Valider skolenavn basert på liste over tidligere påmeldte skoler
function html_form_code() {
	?>
	<form class="kodetimen-form" method="post">

		<?php echo contact_person(); ?>

		<fieldset class="kodetimen-form__fieldset">
			<p class="kodetimen-form__helptext">
				Det er mulig å søke opp skoler i kartet ved å bruke navnefeltet.
				Om du ikke finner skolen, kan du søke på adresse
				lengre nede i skjemaet (gateadresse).
			</p>
			<legend class="kodetimen-form__legend">Skole / barnehage</legend>

			<div class="kodetimen-form__field">
				<label for="school">Skolens / barnehagens navn (påkrevd)</label>
				<input type="text" required class="kodetimen-form__input" id="school" name="kodetimen_school" value="" placeholder=""></input>
			</div>

		 	<div class="kodetimen-form__map" id="kodetimen_map"></div>

		</fieldset>

		<fieldset class="kodetimen-form__fieldset">
			<legend class="kodetimen-form__legend">Skolens / barnehagens adresse</legend>

			<div class="kodetimen-form__field">
				<label for="street_address">Gateadresse</label>
				<input type="text" class="kodetimen-form__input" id="street_address" name="kodetimen_street_address" value="" placeholder=""></input>
			</div>

			<div class="kodetimen-form__field">
				<label for="postal_code">Postnummer</label>
				<input type="number" class="kodetimen-form__input" id="postal_code" name="kodetimen_postal_code" value=""></input>
			</div>

			<div class="kodetimen-form__field">
				<label for="locality">Sted (påkrevd)</label>
				<input type="text" required class="kodetimen-form__input" id="locality" name="kodetimen_locality" value=""></input>
			</div>

			<?php echo counties(); ?>
		</fieldset>

		<div class="kodetimen-form__fieldset">
			<div class="kodetimen-form__field">
			    <label for="number_of_students">Antall elever (påkrevd)</label>
			    <input type="number" required class="kodetimen-form__input" id="number_of_students" name="kodetimen_number_of_students" value=""></input>
			</div>

			<?php echo school_level(); ?>
	    </div>

		<div class="kodetimen-form__field kodetimen-form__field--hidden">
			<input class="kodetimen-form__input" id="kodetimen_lat" name="kodetimen_lat" value=""></input>
		</div>

		<div class="kodetimen-form__field kodetimen-form__field--hidden">
			<input class="kodetimen-form__input" id="kodetimen_long" name="kodetimen_long" value=""></input>
		</div>

		<button class="kodetimen-form__button" type="submit" name="kodetimen-submitted">Meld oss på!</button>
	</form>

	 <?php
}


function wp_kodetimen_enqueue_scripts()
{
    //register google maps api if not already registered
    if ( !wp_script_is( 'google-maps', 'registered' ) ) {
        wp_register_script( 'google-maps', ( is_ssl() ? 'https' : 'http' ) . '://maps.googleapis.com/maps/api/js?v=3.25&key=AIzaSyA_VKoV6XVMReOu2b6wpTTUwYFyQKkKnPk&libraries=places&language=no', array( 'jquery' ), false );
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


function save_kodetimen_post()
{
	$existing_attendee = get_page_by_title($_POST["kodetimen_school"], 'OBJECT', 'kodetimen');
	// If school is already attending, append contact, number of students, and school levels
	if($existing_attendee !== null){
		$number_of_students = $existing_attendee->_kodetimen_number_of_students_key;
		$school_levels = $existing_attendee->_kodetimen_school_level_key;
		$contact_people = $existing_attendee->_kodetimen_contact_people_key;

		$number_of_students = $number_of_students + $_POST["kodetimen_number_of_students"];
		$school_levels = array_merge($school_levels, $_POST["kodetimen_level"]);
		$contact_people[] = array(
			'name' => $_POST["kodetimen_name"],
			'email' => $_POST["kodetimen_email"]
		);

		$post_id = $existing_attendee->ID;
		update_post_meta($post_id, '_kodetimen_contact_people_key', $contact_people);
		update_post_meta($post_id, '_kodetimen_number_of_students_key', $number_of_students);
		update_post_meta($post_id, '_kodetimen_school_level_key', array_unique($school_levels));
		return;
	}

	// Create post object
	$new_kodetimen_attendee = array(
	  'post_title'    => $_POST["kodetimen_school"],
	  'post_content' => '',
	  'post_status'   => 'publish',
	  'post_type' => 'kodetimen'
	);

	// Insert the post into the database
	$post_id = wp_insert_post( $new_kodetimen_attendee );
	$contact_people = array(
		array(
			'name' => $_POST["kodetimen_name"],
			'email' => $_POST["kodetimen_email"]
		)
	);
	$school_levels = $_POST["kodetimen_level"];
	$number_of_students = $_POST["kodetimen_number_of_students"];

	add_post_meta($post_id, '_kodetimen_contact_people_key', $contact_people);
	add_post_meta($post_id, '_kodetimen_number_of_students_key', $number_of_students);
	add_post_meta($post_id, '_kodetimen_school_level_key', $school_levels);

	add_post_meta($post_id, '_kodetimen_position_lat_key', $_POST["kodetimen_lat"]);
	add_post_meta($post_id, '_kodetimen_position_long_key', $_POST["kodetimen_long"]);
	add_post_meta($post_id, '_kodetimen_street_address_key', $_POST["kodetimen_street_address"]);
	add_post_meta($post_id, '_kodetimen_county_key', $_POST["kodetimen_county"]);
	add_post_meta($post_id, '_kodetimen_locality_key', $_POST["kodetimen_locality"]);
	add_post_meta($post_id, '_kodetimen_year_key', '2016');
}

function submit_form() {

	// if the submit button is clicked, send the email
	if ( isset( $_POST['kodetimen-submitted'] ) ) {
		// validate form
		if( !isset($_POST["kodetimen_name"]) || empty($_POST["kodetimen_name"]) ){
			echo '<p class="kodetimen-form__errormessage">';
			echo 'Kontaktpersonens navn er påkrevd';
			echo '</p>';
			return;
		}

		if( !isset($_POST["kodetimen_school"]) || empty($_POST["kodetimen_school"])  ){
			echo '<p class="kodetimen-form__errormessage">';
			echo 'Skolens / barnehagens navn er obligatorisk';
			echo '</p>';
			return;
		}

		if( !isset($_POST["kodetimen_county"]) || empty($_POST["kodetimen_county"])  ){
			echo '<p class="kodetimen-form__errormessage">';
			echo 'Fylke er påkrevd';
			echo '</p>';
			return;
		}

		if( !isset($_POST["kodetimen_locality"]) || empty($_POST["kodetimen_locality"])  ){
			echo '<p class="kodetimen-form__errormessage">';
			echo 'Sted er påkrevd';
			echo '</p>';
			return;
		}

		if( !isset($_POST["kodetimen_street_address"]) || empty($_POST["kodetimen_street_address"])  ){
			echo '<p class="kodetimen-form__errormessage">';
			echo 'Adresse er påkrevd';
			echo '</p>';
			return;
		}

		if( !isset($_POST["kodetimen_email"]) || empty($_POST["kodetimen_email"])  ){
			echo '<p class="kodetimen-form__errormessage">';
			echo 'Epost er påkrevd';
			echo '</p>';
			return;
		}

		// sanitize form values
		$name    = sanitize_text_field( $_POST["kodetimen_name"] );
		$email    = sanitize_text_field( $_POST["kodetimen_email"] );
		$street_address    = sanitize_text_field( $_POST["kodetimen_street_address"] );
		$school    = sanitize_text_field( $_POST["kodetimen_school"] );
		$county    = sanitize_text_field( $_POST["kodetimen_county"] );
		$lat = sanitize_text_field( $_POST['kodetimen_lat'] );
		$long = sanitize_text_field( $_POST['kodetimen_long'] );
		$postal_code    = sanitize_text_field( $_POST["kodetimen_postal_code"] );
		$locality   = sanitize_text_field( $_POST["kodetimen_locality"] );
		$year   = '2016';
		$number_of_students   = sanitize_text_field( $_POST["kodetimen_number_of_students"] );
		$school_levels   = $_POST["kodetimen_level"];
        $subject = "Kodetimen";
        $locale = "no";

		$headers = array('Content-Type: text/html; charset=UTF-8', "From: Kodetimen <kodetimen@kidsakoder.no>" . "\r\n");
		$subject = 'Kodetimen 2016';

		$message = 	 '<div class="kodetimen-form__success">'
					.'<h2>Takk for din påmelding!</h2>'
					.'<p>Skole: ' . $school . '</p>'
					.'<p>Kontaktperson: ' . $name . '</p>'
					.'<p>Adresse: ' . $street_address . ', ' . $locality . ', ' . $county . '</p>'
					.'<p>Postnummer: ' . $postal_code . '</p>'
					.'</div>';

		natsort($school_levels);
		foreach ($school_levels as $key => $kodetimen_school_level) {
			if(empty($kodetimen_school_levels)) {
				$kodetimen_school_levels = $kodetimen_school_level;
			} else {
				$kodetimen_school_levels = $kodetimen_school_levels . ', ' . $kodetimen_school_level;
			}
		}

		$emailmessage = '<img src="http://1hzoda29f77r1yh9c33lm1ae.wpengine.netdna-cdn.com/wp-content/uploads/2013/10/kidsakoder-1-685x3001.jpg" alt="Kodetimen 2016"/>'
						.'<h2>Takk for din påmelding til Kodetimen 2016!</h2>'
						.'<p><span style="color: #9e96c8; font-weight: bold">Skole: </span>' . $school . ' ('. $number_of_students .' elever)</p>'
						.'<p><span style="color: #9e96c8; font-weight: bold">Klassetrinn: </span>' . $kodetimen_school_levels . '</p>'
						.'<p><span style="color: #9e96c8; font-weight: bold">Kontaktperson: </span>' . $name . '</p>'
						.'<p><span style="color: #9e96c8; font-weight: bold">Adresse: </span>' . $street_address . ', ' . $locality . ', ' . $county . '</p>'
						.'<p><span style="color: #9e96c8; font-weight: bold">Postnummer: </span>' . $postal_code . '</p>'
						.'</br>'
						.'<p>Om du har noen spørsmål, svar enten på denne mailen eller besøk <a style="color: #0FBE7C; text-decoration: none" href="http://kidsakoder.no/kodetimen/">nettsidene våre</a>.</p>';

		save_kodetimen_post();

		// Send email to admin
 		//wp_mail( get_option( 'admin_email' ), $subject, $message, $headers ) ;

		add_filter('wp_mail_content_type', function( $content_type ) {
            return 'text/html';
		});

		// Send email to user
		if ( wp_mail( $email, $subject, $emailmessage, $headers ) ) {
			echo $message;
		} else {
			echo '<p class="kodetimen-form__errormessage">';
			echo 'Det oppstod en feil under sending av epost til ' . $email;
			echo '</p>';
		}

	    //header("Location:".esc_url( $_SERVER['REQUEST_URI']));
	    //exit();
	}
}

function kodetimen_shortcode() {
	ob_start();
	submit_form();
	html_form_code();
	return ob_get_clean();
}

add_shortcode( 'kodetimen_form', 'kodetimen_shortcode' );

?>
