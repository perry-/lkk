<?php

/**
* Everything that has to do with kodetimen post
*/
add_action( 'init', 'create_kodetimenpameldte' );

function create_kodetimenpameldte() {

	$labels = array(
		'name'               => _x( 'Påmeldte kodetimen', 'post type general name' ),
		'singular_name'      => _x( 'Påmeldt kodetimen', 'post type singular name' ),
		'add_new'            => _x( 'Meld på ny skole', 'book' ),
		'add_new_item'       => __( 'Meld på ny skole' ),
		'edit_item'          => __( 'Endre påmeldt' ),
		'new_item'           => __( 'Ny påmeldt' ),
		'all_items'          => __( 'Alle påmeldte' ),
		'view_item'          => __( 'Vis påmeldt' ),
		'search_items'       => __( 'Søk i påmeldte' ),
		'not_found'          => __( 'Ingen påmeldte til kodetimen funnet' ),
		'not_found_in_trash' => __( 'Ingen påmeldte til kodetimen funnet i papirkurv' ),
		'parent_item_colon'  => '',
		'menu_name'          => 'Påmeldte kodetimen'
		);

	$args = array(
			'labels'        => $labels,
			'description'   => 'Her lagres påmeldte til kodetimen med info',
			'public'        => true,
			'menu_position' => 5,
			'supports'      => array( 'title'),
			'has_archive'   => false,
			'show_ui' => true,
			'show_in_menu' => true
	);
	register_post_type( 'kodetimenpameldte', $args );
}

add_filter('manage_kodetimenpameldte_posts_columns', 'kodetimenpameldte_table_head');

//add_filter('manage_event_posts_columns', 'kodetimen_table_head');
function kodetimenpameldte_table_head( $columns  ) {
	$query = new WP_Query( array(
		'post_type' => 'kodetimenpameldte' ,
		'orderby' => 'title',
		'order' => 'ASC',
		'posts_per_page' => -1
		) );

	$kodetimenpameldte_contacts = "";
	$mailto = "";

	while ( $query->have_posts() ) : $query->the_post();
		$kodetimenpameldte_contacts = get_post_meta( $query->post->ID, '_kodetimen_contact_people_key', true );

		foreach ($kodetimenpameldte_contacts as $kodetimenpameldte_contact) {

			if( !empty($kodetimenpameldte_contact['email'])){
				$mailto .= $kodetimenpameldte_contact['email'];
			}

			if (!empty($kodetimenpameldte_contact['email']) &&
				$kodetimenpameldte_contact !== end($kodetimenpameldte_contact) &&
				count($kodetimenpameldte_contact) > 1){
				$mailto .= ',';
			}
		}

			$mailto .= ',';
	endwhile;


	$columns = array(
			'cb' => '<input type="checkbox" />',
			'title' => __( 'Skole' ),
            'kodetimen_contact_person' => __( 'Kontaktperson(er) <a target="_blank" href="mailto:' . $mailto . '">Send mail til alle</a>'),
            'kodetimen_year' => __('Deltagerår'),
            'kodetimen_number_of_students' => __('Antall elever'),
            'kodetimen_school_level' => __('Klassetrinn'),
			'date' => __( 'Lagt til' )
		);

	return $columns;
}
add_action( 'manage_kodetimenpameldte_posts_custom_column', 'kodetimenpameldte_table_content', 10, 2 );

function kodetimenpameldte_table_content( $column_name, $post_id ) {
	if( $column_name == 'kodetimen_contact_person' ) {
		$contact_people = get_post_meta( $post_id, '_kodetimen_contact_people_key', true );

		foreach ($contact_people as $key => $contact_person) {
			echo '<a href="mailto:'. $contact_person['email'] . '">' . $contact_person['name']  . '</a></br>';
		}
	}

	if( $column_name == 'kodetimen_year' ) {
		$kodetimen_year = get_post_meta( $post_id, '_kodetimen_year_key', true );
		echo $kodetimen_year;
	}

	if( $column_name == 'kodetimen_number_of_students' ) {
		$kodetimen_number_of_students = get_post_meta( $post_id, '_kodetimen_number_of_students_key', true );
		echo $kodetimen_number_of_students;
	}

	if( $column_name == 'kodetimen_school_level' ) {
        $kodetimen_school_levels =  get_post_meta( $post_id, '_kodetimen_school_level_key', true );
		natsort($kodetimen_school_levels);
        foreach ($kodetimen_school_levels as $key => $kodetimen_school_level) {
            echo $kodetimen_school_level . ', ';
        }
	}

    /*
	if( $column_name == 'kodetimen_position_column' ) {
		$kodetimen_position = get_post_meta( $post_id, '_kodetimen_location_key', true );
		echo $kodetimen_position;
	}
	if( $column_name == 'kodetimen_lat_column' ) {
		$kodetimen_lat = get_post_meta( $post_id, '_kodetimen_position_lat_key', true );
		echo $kodetimen_lat;
	}
	if( $column_name == 'kodetimen_long_column' ) {
		$kodetimen_long = get_post_meta( $post_id, '_kodetimen_position_long_key', true );
		echo $kodetimen_long;
	}
    */
}

add_filter( 'manage_edit-kodetimenpameldte_sortable_columns', 'kodetimenpameldte_sortable_columns' );

function kodetimenpameldte_sortable_columns( $columns ) {

	$columns['kodetimen_position_column'] = 'kodetimen_position_column';

	return $columns;
}
?>
