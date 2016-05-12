<?php

/**
* Everything that has to do with kodeklubbpost
*/
add_action( 'init', 'create_kodeklubb' );

function create_kodeklubb() {

	$labels = array(
		'name'               => _x( 'Kodeklubber', 'post type general name' ),
		'singular_name'      => _x( 'Kodeklubb', 'post type singular name' ),
		'add_new'            => _x( 'Legg til ny', 'book' ),
		'add_new_item'       => __( 'Legg til ny kodeklubb' ),
		'edit_item'          => __( 'Endre kodeklubb' ),
		'new_item'           => __( 'Ny kodeklubb' ),
		'all_items'          => __( 'Alle kodeklubber' ),
		'view_item'          => __( 'Vis kodeklubb' ),
		'search_items'       => __( 'Søk i kodeklubber' ),
		'not_found'          => __( 'Ingen kodeklubb funnet' ),
		'not_found_in_trash' => __( 'Ingen kodeklubb funnet i papirkurv' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Kodeklubber'
		);

	$args = array(
			'labels'        => $labels,
			'description'   => 'Her lagres kodeklubber med info',
			'public'        => true,
			'menu_position' => 5,
			'supports'      => array( 'title', 'editor', 'thumbnail'),
			'has_archive'   => false,
			'capabilities' => array(
								  'edit_post'          => 'edit_kodeklubb',
								  'read_post'          => 'read_kodeklubb',
								  'delete_post'        => 'delete_kodeklubb',
								  'edit_posts'         => 'edit_kodeklubbs',
								  'edit_others_posts'  => 'edit_others_kodeklubbs',
								  'publish_posts'      => 'publish_kodeklubbs',
								  'read_private_posts' => 'read_private_kodeklubbs',
								  'create_posts'       => 'create_kodeklubbs',
								)
	);

	register_post_type( 'kodeklubb', $args );
}

// Position metabox

add_action( 'add_meta_boxes', 'kodeklubb_position_box' );

function kodeklubb_position_box() {
	add_meta_box(
		'kodeklubb_position_box',
		__( 'Kodeklubbens plassering', 'kodeklubb_position' ),
		'kodeklubb_position_box_content',
		'kodeklubb',
		'normal',
		'high'
	);
}

function kodeklubb_position_box_content( $post ) {

	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'kodeklubb_position_box', 'kodeklubb_position_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$value = get_post_meta( $post->ID, '_kodeklubb_position_value_key', true );
	$value_lat = get_post_meta( $post->ID, '_kodeklubb_position_lat_key', true );
	$value_long = get_post_meta( $post->ID, '_kodeklubb_position_long_key', true );

	echo '<label for="kodeklubb_position_field">';
	_e( 'Kodeklubbens posisjon', 'kodeklubb_position' );
	echo '</label> ';
	echo '<input type="text" id="position_field" name="position_field" value="' . esc_attr( $value ) . '" size="25" />';
	echo '<label> lat: </label> <input type="text" id="field_lat" name="field_lat" value="' . esc_attr( $value_lat ) . '" size="10" />';
	echo '<label> long: </label> <input type="text" id="field_long" name="field_long" value="' . esc_attr( $value_long ) . '" size="10" />';

	require_once( SPACIOUS_INCLUDES_DIR . '/GMaps.php');

}

add_action( 'save_post', 'kodeklubb_position_save_meta_box_data' );

function kodeklubb_position_save_meta_box_data( $post_id ) {

	// Check if our nonce is set.
	if ( ! isset( $_POST['kodeklubb_position_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['kodeklubb_position_box_nonce'], 'kodeklubb_position_box' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	/* OK, it's safe for us to save the data now. */

	// Make sure that it is set.
	if ( ! isset( $_POST['position_field'] ) ) {
		return;
	}

	// Sanitize user input.
	$my_data = sanitize_text_field( $_POST['position_field'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, '_kodeklubb_position_value_key', $my_data );
	update_post_meta( $post_id, '_kodeklubb_position_lat_key', sanitize_text_field( $_POST['field_lat'] ) );
	update_post_meta( $post_id, '_kodeklubb_position_long_key', sanitize_text_field( $_POST['field_long'] ) );
}


// External link metabox

add_action( 'add_meta_boxes', 'kodeklubb_link_box' );

function kodeklubb_link_box() {
	add_meta_box(
		'kodeklubb_link_box',
		__( 'Kodeklubbens link', 'kodeklubb_link' ),
		'kodeklubb_link_box_content',
		'kodeklubb',
		'side',
		'default'
	);
}

function kodeklubb_link_box_content( $post ) {
	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'kodeklubb_link_box', 'kodeklubb_link_box_nonce' );
	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$value = get_post_meta( $post->ID, '_kodeklubb_link_value_key', true );
	$hasLink = get_post_meta( $post->ID, '_kodeklubb_has_link_key', true );
	echo '<label><input type="checkbox"' . (!empty($hasLink) ? ' checked="checked" ' : null) . 'value="1" name="has_link"/> Har egen nettside</label>';
	echo '<br>';
	echo '<label id="kodeklubb_link_label" style="'. (empty($hasLink) ? 'display:none' : null) .'" for="kodeklubb_link_field">';
	_e( 'Kodeklubbens link', 'kodeklubb_link' );
	echo '</label> ';
	echo '<input style="'. (empty($hasLink) ? 'display:none' : null) .'" type="text" id="kodeklubb_link_field" name="kodeklubb_link_field" value="' . esc_attr( $value ) . '" size="25" />';
}

add_action( 'save_post', 'kodeklubb_link_save_meta_box_data' );

function kodeklubb_link_save_meta_box_data( $post_id ) {

    // Check if our nonce is set.
    if ( ! isset( $_POST['kodeklubb_link_box_nonce'] ) ) {
        return;
    }

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $_POST['kodeklubb_link_box_nonce'], 'kodeklubb_link_box' ) ) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Check the user's permissions.
    if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }

    } else {

        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }

    /* OK, it's safe for us to save the data now. */

    // Make sure that it is set.
    if ( ! isset( $_POST['kodeklubb_link_field'] ) ) {
        return;
    }

    // Sanitize user input.
    $my_data = sanitize_text_field( $_POST['kodeklubb_link_field'] );
    $my_data2 =  $_POST['has_link'] ;

    // Update the meta field in the database.
    update_post_meta( $post_id, '_kodeklubb_link_value_key', $my_data );
    update_post_meta( $post_id, '_kodeklubb_has_link_key', $my_data2 );
}


// Facebook link metabox

add_action( 'add_meta_boxes', 'kodeklubb_facebook_link_box' );

function kodeklubb_facebook_link_box() {
	add_meta_box(
		'kodeklubb_facebook_link_box',
		__( 'Kodeklubbens Facebook-side', 'kodeklubb_facebook_link' ),
		'kodeklubb_facebook_link_box_content',
		'kodeklubb',
		'side',
		'default'
	);
}

function kodeklubb_facebook_link_box_content( $post ) {
	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'kodeklubb_facebook_link_box', 'kodeklubb_facebook_link_box_nonce' );
	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$value = get_post_meta( $post->ID, '_kodeklubb_facebook_link_value_key', true );
	$hasLink = get_post_meta( $post->ID, '_kodeklubb_has_facebook_link_key', true );
	echo '<label><input type="checkbox"' . (!empty($hasLink) ? ' checked="checked" ' : null) . 'value="1" name="has_facebook_link"/> Har Facebook-side</label>';
	echo '<br>';
	echo '<label id="kodeklubb_facebook_link_label" style="'. (empty($hasLink) ? 'display:none' : null) .'" for="kodeklubb_facebook_link_field">';
	_e( 'Kodeklubbens Facebook-side', 'kodeklubb_facebook_link' );
	echo '</label> ';
	echo '<input style="'. (empty($hasLink) ? 'display:none' : null) .'" type="text" id="kodeklubb_facebook_link_field" name="kodeklubb_facebook_link_field" value="' . esc_attr( $value ) . '" size="25" />';
}



add_action( 'save_post', 'kodeklubb_facebook_link_save_meta_box_data' );

function kodeklubb_facebook_link_save_meta_box_data( $post_id ) {

	// Check if our nonce is set.
	if ( ! isset( $_POST['kodeklubb_facebook_link_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['kodeklubb_facebook_link_box_nonce'], 'kodeklubb_facebook_link_box' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	/* OK, it's safe for us to save the data now. */

	// Make sure that it is set.
	if ( ! isset( $_POST['kodeklubb_facebook_link_field'] ) ) {
		return;
	}

	// Sanitize user input.
	$my_data = sanitize_text_field( $_POST['kodeklubb_facebook_link_field'] );
	$my_data2 =  $_POST['has_facebook_link'] ;

	// Update the meta field in the database.
	update_post_meta( $post_id, '_kodeklubb_facebook_link_value_key', $my_data );
	update_post_meta( $post_id, '_kodeklubb_has_facebook_link_key', $my_data2 );
}

// Meetup link metabox

add_action( 'add_meta_boxes', 'kodeklubb_meetup_link_box' );

function kodeklubb_meetup_link_box() {
	add_meta_box(
		'kodeklubb_meetup_link_box',
		__( 'Kodeklubbens Meetup.com-side', 'kodeklubb_meetup_link' ),
		'kodeklubb_meetup_link_box_content',
		'kodeklubb',
		'side',
		'default'
	);
}

function kodeklubb_meetup_link_box_content( $post ) {
	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'kodeklubb_meetup_link_box', 'kodeklubb_meetup_link_box_nonce' );
	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$value = get_post_meta( $post->ID, '_kodeklubb_meetup_link_value_key', true );
	$hasLink = get_post_meta( $post->ID, '_kodeklubb_has_meetup_link_key', true );
	echo '<label><input type="checkbox"' . (!empty($hasLink) ? ' checked="checked" ' : null) . 'value="1" name="has_meetup_link"/> Har Meetup.com-side</label>';
	echo '<br>';
	echo '<label id="kodeklubb_meetup_link_label" style="'. (empty($hasLink) ? 'display:none' : null) .'" for="kodeklubb_meetup_link_field">';
	_e( 'Kodeklubbens Meetup.com-side', 'kodeklubb_meetup_link' );
	echo '</label> ';
	echo '<input style="'. (empty($hasLink) ? 'display:none' : null) .'" type="text" id="kodeklubb_meetup_link_field" name="kodeklubb_meetup_link_field" value="' . esc_attr( $value ) . '" size="25" />';
}



add_action( 'save_post', 'kodeklubb_meetup_link_save_meta_box_data' );

function kodeklubb_meetup_link_save_meta_box_data( $post_id ) {

	// Check if our nonce is set.
	if ( ! isset( $_POST['kodeklubb_meetup_link_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['kodeklubb_meetup_link_box_nonce'], 'kodeklubb_meetup_link_box' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	/* OK, it's safe for us to save the data now. */

	// Make sure that it is set.
	if ( ! isset( $_POST['kodeklubb_meetup_link_field'] ) ) {
		return;
	}

	// Sanitize user input.
	$my_data = sanitize_text_field( $_POST['kodeklubb_meetup_link_field'] );
	$my_data2 =  $_POST['has_meetup_link'] ;

	// Update the meta field in the database.
	update_post_meta( $post_id, '_kodeklubb_meetup_link_value_key', $my_data );
	update_post_meta( $post_id, '_kodeklubb_has_meetup_link_key', $my_data2 );
}

// Truegroups link metabox

add_action( 'add_meta_boxes', 'kodeklubb_truegroups_link_box' );

function kodeklubb_truegroups_link_box() {
	add_meta_box(
		'kodeklubb_truegroups_link_box',
		__( 'Kodeklubbens Truegroups-side', 'kodeklubb_truegroups_link' ),
		'kodeklubb_truegroups_link_box_content',
		'kodeklubb',
		'side',
		'default'
	);
}

function kodeklubb_truegroups_link_box_content( $post ) {
	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'kodeklubb_truegroups_link_box', 'kodeklubb_truegroups_link_box_nonce' );
	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$value = get_post_meta( $post->ID, '_kodeklubb_truegroups_link_value_key', true );
	$hasLink = get_post_meta( $post->ID, '_kodeklubb_has_truegroups_link_key', true );
	echo '<label><input type="checkbox"' . (!empty($hasLink) ? ' checked="checked" ' : null) . 'value="1" name="has_truegroups_link"/> Har Truegroups-side</label>';
	echo '<br>';
	echo '<label id="kodeklubb_truegroups_link_label" style="'. (empty($hasLink) ? 'display:none' : null) .'" for="kodeklubb_truegroups_link_field">';
	_e( 'Kodeklubbens Truegroups-side', 'kodeklubb_truegroups_link' );
	echo '</label> ';
	echo '<input style="'. (empty($hasLink) ? 'display:none' : null) .'" type="text" id="kodeklubb_truegroups_link_field" name="kodeklubb_truegroups_link_field" value="' . esc_attr( $value ) . '" size="25" />';
}



add_action( 'save_post', 'kodeklubb_truegroups_link_save_meta_box_data' );

function kodeklubb_truegroups_link_save_meta_box_data( $post_id ) {

	// Check if our nonce is set.
	if ( ! isset( $_POST['kodeklubb_truegroups_link_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['kodeklubb_truegroups_link_box_nonce'], 'kodeklubb_truegroups_link_box' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	/* OK, it's safe for us to save the data now. */

	// Make sure that it is set.
	if ( ! isset( $_POST['kodeklubb_truegroups_link_field'] ) ) {
		return;
	}

	// Sanitize user input.
	$my_data = sanitize_text_field( $_POST['kodeklubb_truegroups_link_field'] );
	$my_data2 =  $_POST['has_truegroups_link'] ;

	// Update the meta field in the database.
	update_post_meta( $post_id, '_kodeklubb_truegroups_link_value_key', $my_data );
	update_post_meta( $post_id, '_kodeklubb_has_truegroups_link_key', $my_data2 );
}

// Eventbrite link metabox

add_action( 'add_meta_boxes', 'kodeklubb_eventbrite_link_box' );

function kodeklubb_eventbrite_link_box() {
	add_meta_box(
		'kodeklubb_eventbrite_link_box',
		__( 'Kodeklubbens Eventbrite-side', 'kodeklubb_eventbrite_link' ),
		'kodeklubb_eventbrite_link_box_content',
		'kodeklubb',
		'side',
		'default'
	);
}

function kodeklubb_eventbrite_link_box_content( $post ) {
	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'kodeklubb_eventbrite_link_box', 'kodeklubb_eventbrite_link_box_nonce' );
	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$value = get_post_meta( $post->ID, '_kodeklubb_eventbrite_link_value_key', true );
	$hasLink = get_post_meta( $post->ID, '_kodeklubb_has_eventbrite_link_key', true );
	echo '<label><input type="checkbox"' . (!empty($hasLink) ? ' checked="checked" ' : null) . 'value="1" name="has_eventbrite_link"/> Har Eventbrite-side</label>';
	echo '<br>';
	echo '<label id="kodeklubb_eventbrite_link_label" style="'. (empty($hasLink) ? 'display:none' : null) .'" for="kodeklubb_eventbrite_link_field">';
	_e( 'Kodeklubbens Eventbrite-side', 'kodeklubb_eventbrite_link' );
	echo '</label> ';
	echo '<input style="'. (empty($hasLink) ? 'display:none' : null) .'" type="text" id="kodeklubb_eventbrite_link_field" name="kodeklubb_eventbrite_link_field" value="' . esc_attr( $value ) . '" size="25" />';
}



add_action( 'save_post', 'kodeklubb_eventbrite_link_save_meta_box_data' );

function kodeklubb_eventbrite_link_save_meta_box_data( $post_id ) {

	// Check if our nonce is set.
	if ( ! isset( $_POST['kodeklubb_eventbrite_link_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['kodeklubb_eventbrite_link_box_nonce'], 'kodeklubb_eventbrite_link_box' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	/* OK, it's safe for us to save the data now. */

	// Make sure that it is set.
	if ( ! isset( $_POST['kodeklubb_eventbrite_link_field'] ) ) {
		return;
	}

	// Sanitize user input.
	$my_data = sanitize_text_field( $_POST['kodeklubb_eventbrite_link_field'] );
	$my_data2 =  $_POST['has_eventbrite_link'] ;

	// Update the meta field in the database.
	update_post_meta( $post_id, '_kodeklubb_eventbrite_link_value_key', $my_data );
	update_post_meta( $post_id, '_kodeklubb_has_eventbrite_link_key', $my_data2 );
}


// Contact metabox

add_action( 'add_meta_boxes', 'kodeklubb_contact_box' );

function kodeklubb_contact_box() {
	add_meta_box(
		'kodeklubb_contact_box',
		__( 'Kodeklubbens kontaktperson(er)', 'kodeklubb_contact' ),
		'kodeklubb_contact_box_content',
		'kodeklubb',
		'side',
		'default'
	);
}

function print_contact($contact){
	echo "<div>";

		if(is_admin()){
			echo "<a id=".$contact['id']." class='kodeklubb-delete-contact' href='javascript:void(0);'>Slett</a>";
		}
		echo "<div class='kodeklubb-contact-inner'>";
			echo "<strong>Navn:  </strong> <span>". $contact['name'] ."</span><br/>";
			echo "<strong>E-post:  </strong> <a href='mailto:". $contact['email'] ."'>". $contact['email'] ."</a><br/>";

			if(!empty($contact['phone'])){
				echo "<strong>Telefon:  </strong> <span>". $contact['phone'] ."</span><br/>";
			}

			if(!empty($contact['role'])){
				echo "<strong>Rolle:  </strong> <span>". $contact['role'] ."</span><br/>";
			}
		echo "</div>";
		echo "<hr/>";
	echo "</div>";
}

function kodeklubb_contact_delete_meta_box_data( $post_id ){

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		echo "autosave";
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

}


function kodeklubb_contact_box_content( $post ) {

	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'kodeklubb_contact_box', 'kodeklubb_contact_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$contacts = get_post_meta( $post->ID, '_kodeklubb_contact_value_key', true );

	echo "<div id='contact_list'>";
	if(!is_array($contacts)){
		$contacts = array();
	}
	array_map("print_contact", $contacts);
	echo "</div>";

    echo '<input type="text" style="display:none" id="kodeklubb_contact_field" name="kodeklubb_contact_field[]" size="25" />';
    echo '<input type="text" style="display:none" name="post_id" value="'. $post->ID .'"></input>';

	echo '<label for="kodeklubb_contact_name_field">';
	_e( 'Navn', 'kodeklubb_contact_name' );
	echo '</label> ';
    echo '<br>';
    echo '<input type="text" id="kodeklubb_contact_name_field" name="kodeklubb_contact_name_field" size="25" />';

    echo '</br><label for="kodeklubb_contact_email_field">';
	_e( 'E-post', 'kodeklubb_contact_email' );
	echo '</label> ';
    echo '<br>';
	echo '<input type="email" id="kodeklubb_contact_email_field" name="kodeklubb_contact_email_field" size="25" />';

	echo '</br><label for="kodeklubb_contact_phone_field">';
	_e( 'Telefon', 'kodeklubb_contact_phone' );
	echo '</label> ';
    echo '<br>';
	echo '<input type="tel" id="kodeklubb_contact_phone_field" name="kodeklubb_contact_phone_field" size="25" />';

	echo '</br><label for="kodeklubb_contact_role_field">';
	_e( 'Rolle', 'kodeklubb_contact_role' );
	echo '</label> ';
    echo '<br>';
	echo '<input type="text" id="kodeklubb_contact_role_field" name="kodeklubb_contact_role_field" size="25" />';

	echo '<div class="error-message"></div>';
    echo '<button class="button button-primary button-large" style="margin-top: 10px" name="append_contact" type="button">Legg til</button>';
}


add_action('wp_ajax_save_contact', 'kodeklubb_contact_save_meta_box_data');

function kodeklubb_contact_save_meta_box_data( ) {
	$post_id = $_POST['id'];

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

	$contact = $_POST['contact'];

	if( !isset( $contact['name'] ) || empty($contact['name'] )){
		return;
	}

	if( !isset( $contact['email'] ) || empty($contact['email'] )){
		return;
	}

	if( ! is_email( $contact['email'] )){
		echo "invalid_email";
		return;
	}

	$contact['id'] = uniqid();

    $contacts = get_post_meta($post_id, '_kodeklubb_contact_value_key', true);

	$contacts[] = $contact;

    update_post_meta( $post_id, '_kodeklubb_contact_value_key', $contacts );

	echo(json_encode($contact));

    wp_die(); // this is required to terminate immediately and return a proper response
}


add_action('wp_ajax_delete_contact', 'kodeklubb_contact_delete');

function kodeklubb_contact_delete( ) {
	$post_id = $_POST['id'];

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return;
		}

	} else {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}
	}

    $contacts = get_post_meta($post_id, '_kodeklubb_contact_value_key', true);

    $removethis = null;

	foreach ($contacts as $current_contact) {
		if($_POST['contact_id'] === $current_contact['id']){
			$removethis = $current_contact;
		}
	}

	if(is_null($removethis)){
		return;
	}

	if(($key = array_search($removethis, $contacts, false)) !== FALSE) {
        unset($contacts[$key]);
    }

    update_post_meta( $post_id, '_kodeklubb_contact_value_key', $contacts);
    echo "deleted";

    wp_die(); // this is required to terminate immediately and return a proper response
}


add_filter('manage_kodeklubb_posts_columns', 'kodeklubb_table_head');

//add_filter('manage_event_posts_columns', 'kodeklubb_table_head');
function kodeklubb_table_head( $columns  ) {
	$query = new WP_Query( array(
		'post_type' => 'kodeklubb' ,
		'orderby' => 'title',
		'order' => 'ASC',
		'posts_per_page' => -1
		) );

	$kodeklubb_contacts = "";
	$mailto = "";

	while ( $query->have_posts() ) : $query->the_post();
		$kodeklubb_contacts = get_post_meta( $query->post->ID, '_kodeklubb_contact_value_key', true );

		foreach ($kodeklubb_contacts as $kodeklubb_contact) {

			if( !empty($kodeklubb_contact['email'])){
				$mailto .= $kodeklubb_contact['email'];
			}

			if (!empty($kodeklubb_contact['email']) &&
				$kodeklubb_contact !== end($kodeklubb_contacts) &&
				count($kodeklubb_contacts) > 1){
				$mailto .= ',';
			}
		}

			$mailto .= ',';
	endwhile;

	$columns = array(
			'cb' => '<input type="checkbox" />',
			'title' => __( 'Kodeklubb' ),
			'kodeklubb_position_column' => __( 'Posisjon' ),
			'kodeklubb_contact_column' => __( 'Kontaktperson(er) <a target="_blank" href="mailto:' . $mailto . '">Send mail til alle</a>'),
			'date' => __( 'Lagt til' )
		);

	return $columns;
}
add_action( 'manage_kodeklubb_posts_custom_column', 'kodeklubb_table_content', 10, 2 );

function kodeklubb_table_content( $column_name, $post_id ) {
	if( $column_name == 'kodeklubb_contact_column' ) {
		$kodeklubb_contacts = get_post_meta( $post_id, '_kodeklubb_contact_value_key', true );

		if(!is_array($kodeklubb_contacts)){
			$kodeklubb_contacts = array();
		}

		foreach ($kodeklubb_contacts as $kodeklubb_contact) {

			if( !empty($kodeklubb_contact['name'])){
				echo "<a href='mailto:" .  $kodeklubb_contact['email'] . "'>" . $kodeklubb_contact['name'] . "</a>";
			}

			if (!empty($kodeklubb_contact['name']) &&
				$kodeklubb_contact !== end($kodeklubb_contacts) &&
				count($kodeklubb_contacts) > 1){
				echo ', ';
			}
		}
	}
	if( $column_name == 'kodeklubb_position_column' ) {
		$kodeklubb_position = get_post_meta( $post_id, '_kodeklubb_position_value_key', true );
		echo $kodeklubb_position;
	}
}

add_filter( 'manage_edit-kodeklubb_sortable_columns', 'kodeklubb_sortable_columns' );

function kodeklubb_sortable_columns( $columns ) {

	$columns['kodeklubb_position_column'] = 'kodeklubb_position_column';

	return $columns;
}
?>
