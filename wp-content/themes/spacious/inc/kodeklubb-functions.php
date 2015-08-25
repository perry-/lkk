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
			'has_archive'   => false
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
	$my_data2 =  $_POST['has_link'] ;

	// Update the meta field in the database.
	update_post_meta( $post_id, '_kodeklubb_facebook_link_value_key', $my_data );
	update_post_meta( $post_id, '_kodeklubb_has_facebook_link_key', $my_data2 );
}

// Contact metabox

add_action( 'add_meta_boxes', 'kodeklubb_contact_box' );

function kodeklubb_contact_box() {
	add_meta_box( 
		'kodeklubb_contact_box',
		__( 'Kodeklubbens kontaktperson', 'kodeklubb_contact' ),
		'kodeklubb_contact_box_content',
		'kodeklubb',
		'side',
		'default'
	);
}





function kodeklubb_contact_box_content( $post ) {

	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'kodeklubb_contact_box', 'kodeklubb_contact_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$value = get_post_meta( $post->ID, '_kodeklubb_contact_value_key', true );

	echo '<label for="kodeklubb_contact_field">';
	_e( 'Kodeklubbens kontaktperson', 'kodeklubb_contact' );
	echo '</label> ';
	echo '<input type="text" id="kodeklubb_contact_field" name="kodeklubb_contact_field" value="' . esc_attr( $value ) . '" size="25" />';
}

add_action( 'save_post', 'kodeklubb_contact_save_meta_box_data' );

function kodeklubb_contact_save_meta_box_data( $post_id ) {

	if ( ! isset( $_POST['kodeklubb_contact_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['kodeklubb_contact_box_nonce'], 'kodeklubb_contact_box' ) ) {
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
	if ( ! isset( $_POST['kodeklubb_contact_field'] ) ) {
		return;
	}

	// Sanitize user input.
	$my_data = sanitize_text_field( $_POST['kodeklubb_contact_field'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, '_kodeklubb_contact_value_key', $my_data );
}
add_filter('manage_kodeklubb_posts_columns', 'kodeklubb_table_head');

//add_filter('manage_event_posts_columns', 'kodeklubb_table_head');
function kodeklubb_table_head( $columns ) {

	$columns = array(
			'cb' => '<input type="checkbox" />',
			'title' => __( 'Kodeklubb' ),
			'kodeklubb_position_column' => __( 'Posisjon' ),
			'kodeklubb_contact_column' => __( 'Kontaktperson' ),
			'date' => __( 'Lagt til' )
		);

	return $columns;
}
add_action( 'manage_kodeklubb_posts_custom_column', 'kodeklubb_table_content', 10, 2 );

function kodeklubb_table_content( $column_name, $post_id ) {
	if( $column_name == 'kodeklubb_contact_column' ) {
		$kodeklubb_contact = get_post_meta( $post_id, '_kodeklubb_contact_value_key', true );
		echo $kodeklubb_contact;
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