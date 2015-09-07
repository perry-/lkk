<?php 

/**
* Everything that has to do with infomeldingpost
*/

add_action( 'init', 'create_infomelding' );

function create_infomelding() {

	$labels = array(
		'name'               => _x( 'Infomeldinger', 'post type general name' ),
		'singular_name'      => _x( 'Infomelding', 'post type singular name' ),
		'add_new'            => _x( 'Legg til ny', 'book' ),
		'add_new_item'       => __( 'Legg til ny infomelding' ),
		'edit_item'          => __( 'Endre infomelding' ),
		'new_item'           => __( 'Ny infomelding' ),
		'all_items'          => __( 'Alle infomeldinger' ),
		'view_item'          => __( 'Vis infomelding' ),
		'search_items'       => __( 'Søk i infomeldinger' ),
		'not_found'          => __( 'Ingen infomelding funnet' ),
		'not_found_in_trash' => __( 'Ingen infomelding funnet i papirkurv' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Infomeldinger'
		);

	$args = array(
			'labels'        => $labels,
			'description'   => 'Her lagres infomeldinger for kodeklubber',
			'public'        => true,
			'menu_position' => 4,
			'supports'      => array( 'title', 'editor'),
			'has_archive'   => false
	);

	register_post_type( 'infomelding', $args );
}

// Contact metabox

add_action( 'add_meta_boxes', 'infomelding_kodeklubb_box' );

function infomelding_kodeklubb_box() {
	add_meta_box( 
		'infomelding_kodeklubb_box',
		__( 'Infomeldingens kodeklubb', 'infomelding_kodeklubb' ),
		'infomelding_kodeklubb_box_content',
		'infomelding',
		'side',
		'default'
	);
}


function infomelding_kodeklubb_box_content( $post ) {

	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'infomelding_kodeklubb_box', 'infomelding_kodeklubb_box_nonce' );

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$value = get_post_meta( $post->ID, '_infomelding_kodeklubb_value_key', true );

	?>
		<label for="wdm_new_field">Velg kodeklubb</label>
		<br />  
				<?php

			$query = new WP_Query( array( 
				'post_type' => 'kodeklubb' ,
				'orderby' => 'name',
				'order' => 'ASC',
				'posts_per_page' => -1
				) );
			?>
			<select name="infomelding_kodeklubb">
				<?php
				while ( $query->have_posts() ) : $query->the_post();
					?>
					<option value="<?php the_id();?>" <?php if ( $value == get_the_id() ) echo 'selected="selected"'; ?>><?php the_title();?><br></option>
					<?php
				endwhile;
				?>
			</select>
			<?php

}

add_action( 'save_post', 'infomelding_kodeklubb_save_meta_box_data' );

function infomelding_kodeklubb_save_meta_box_data( $post_id ) {

	if ( ! isset( $_POST['infomelding_kodeklubb_box_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['infomelding_kodeklubb_box_nonce'], 'infomelding_kodeklubb_box' ) ) {
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



	// Sanitize user input.
	$my_data = $_POST['infomelding_kodeklubb'];

	// Update the meta field in the database.
	update_post_meta( $post_id, '_infomelding_kodeklubb_value_key', $my_data );
}
add_filter('manage_infomelding_posts_columns', 'infomelding_table_head');

//add_filter('manage_event_posts_columns', 'infomelding_table_head');
function infomelding_table_head( $columns ) {

	$columns = array(
			'cb' => '<input type="checkbox" />',
			'title' => __( 'Infomelding' ),
			'infomelding_kodeklubb_column' => __( 'Kodeklubb' ),
			'date' => __( 'Lagt til' )
		);

	return $columns;
}
add_action( 'manage_infomelding_posts_custom_column', 'infomelding_table_content', 10, 2 );

function infomelding_table_content( $column_name, $post_id ) {
	if( $column_name == 'infomelding_kodeklubb_column' ) {
		$infomelding_kodeklubb = get_post_meta( $post_id, '_infomelding_kodeklubb_value_key', true );
		echo get_post($infomelding_kodeklubb)->post_title;
		
	}
}

add_filter( 'manage_edit-infomelding_sortable_columns', 'infomelding_sortable_columns' );

function infomelding_sortable_columns( $columns ) {

	$columns['infomelding_kodeklubb_column'] = 'infomelding_kodeklubb_column';

	return $columns;
}

?>