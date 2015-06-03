<?php 

/**
* testing 
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
			'supports'      => array( 'title', 'editor'),
			'has_archive'   => false,
	);

	register_post_type( 'kodeklubb', $args );
}


add_action( 'add_meta_boxes', 'kodeklubb_position_box' );

function kodeklubb_position_box() {
	add_meta_box( 
		'kodeklubb_position_box',
		__( 'Kodeklubbens plassering', 'kodeklubb_position' ),
		'kodeklubb_position_box_content',
		'kodeklubb',
		'side',
		'default'
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

	echo '<label for="kodeklubb_position_field">';
	_e( 'Kodeklubbens posisjon', 'kodeklubb_position' );
	echo '</label> ';
	echo '<input type="text" id="kodeklubb_position_field" name="kodeklubb_position_field" value="' . esc_attr( $value ) . '" size="25" />';
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
	if ( ! isset( $_POST['kodeklubb_position_field'] ) ) {
		return;
	}

	// Sanitize user input.
	$my_data = sanitize_text_field( $_POST['kodeklubb_position_field'] );

	// Update the meta field in the database.
	update_post_meta( $post_id, '_kodeklubb_position_value_key', $my_data );
}


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