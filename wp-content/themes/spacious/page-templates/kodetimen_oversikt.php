<?php
/**
 * Template Name: Kodetimen oversikt
 *
 * For presenting kodetimen attendees in a map and a list under that map
 *
 * @package LKK
 * @subpackage Spacious
 * @since LKK 1.0
 */
?>

<?php get_header(); ?>
<?php
class KodetimenPos {
	public $lat;
	public $long;
	public $name;
}
?>

	<?php do_action( 'spacious_before_body_content' ); ?>
	<!--[if lt IE 10]>
	<style>
	li.kodetimen-item {
		width: 25%;
		float: left;
	}

	@media screen and (max-width: 950px) {
		li.kodetimen-item {
			width: 33%;
		}
	}

	@media screen and (max-width: 750px) {
		li.kodetimen-item {
			width: 50%;
		}
	}

	@media screen and (max-width: 450px) {
		li.kodetimen-item {
			width: 100%;
		}
	}
	</style>
	<![endif]-->
	<div>
		<div id="content" class="clearfix">
			<?php while ( have_posts() ) : the_post(); ?>

				<div class="the-content">
					<strong><?php echo get_the_content(); ?></strong><br><br>
				</div>
				<?php

				$query = new WP_Query( array(
					'post_type' => 'kodetimen' ,
					'orderby' => 'title',
					'order' => 'ASC',
					'posts_per_page' => -1
					) );

				$myVariable = 70.0000;
				$kodetimen_attendees = array();
				while ( $query->have_posts() ) : $query->the_post();
					$obj = new KodetimenPos();
					$obj->lat = get_post_custom_values('_kodetimen_position_lat_key');
					$obj->long = get_post_custom_values('_kodetimen_position_long_key');
					$obj->name = get_the_title();
					$obj->number_of_students = get_post_custom_values('_kodetimen_number_of_students_key');
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

				require_once( SPACIOUS_INCLUDES_DIR . '/GMapsOverview_kodetimen.php');

				echo "<ul class=\"kodetimen-list clearfix\">";
				while ( $query->have_posts() ) : $query->the_post();
				?>
					<li class="kodetimen-item">
						<?php
							echo the_title();
							$postid = get_the_id();
					        $kodetimen_school_levels =  get_post_meta($postid, '_kodetimen_school_level_key', true );
							natsort($kodetimen_school_levels);

							echo ' (';
					        foreach ($kodetimen_school_levels as $key => $kodetimen_school_level) {
					            echo $kodetimen_school_level . ', ';
					        }
							echo ') ';
						?>
					</li>
				<?php

				endwhile;
				echo "</ul>";
				?>

				<?php get_template_part( 'navigation', 'archive' ); ?>

				<?php
					do_action( 'spacious_before_comments_template' );
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() )
						comments_template();
	      		do_action ( 'spacious_after_comments_template' );
				?>

			<?php endwhile; ?>

		</div><!-- #content -->
	</div><!-- #primary -->

	<?php //spacious_sidebar_select(); ?>

	<?php do_action( 'spacious_after_body_content' ); ?>

<?php get_footer(); ?>
