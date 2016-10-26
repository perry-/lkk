<?php
/*
Plugin Name: Kodetimen-teller
Plugin URI: http://kidsakoder.no
Description: Teller antall påmeldte til kodetimen
Version: 1.0
Author: LKK
*/

function wp_kodetimen_counter_enqueue_scripts()
{
    wp_register_style( 'kodetimen-counter-style', plugins_url( '/css/kodetimen-counter.css', __FILE__ ));
	wp_enqueue_style( 'kodetimen-counter-style');
}
add_action( 'wp_enqueue_scripts', 'wp_kodetimen_counter_enqueue_scripts' );


function kodetimen_counter_shortcode() {
	ob_start();

    $query = new WP_Query( array(
        'post_type' => 'kodetimenpameldte' ,
        'orderby' => 'title',
        'order' => 'ASC',
        'posts_per_page' => -1
        ) );

    $kodetimen_attendees = array();
    while ( $query->have_posts() ) : $query->the_post();
        $kodetimen_attendees[] = $obj;
        $total_number_of_attendees += get_post_custom_values('_kodetimen_number_of_students_key')[0];
    endwhile;

    if(count($kodetimen_attendees) > 0 and $total_number_of_attendees > 0){
        ?>
        <p class="kodetimen-info__text">
            Nå har
            <span class="kodetimen-info__number">
                <?php echo $total_number_of_attendees; ?>
            </span>
             elever fra
            <span class="kodetimen-info__number">
                <?php echo count($kodetimen_attendees); ?>
            </span> skoler meldt seg på!
        </p>
        <?php
    }

	return ob_get_clean();
}

add_shortcode( 'kodetimen_counter', 'kodetimen_counter_shortcode' );

?>
