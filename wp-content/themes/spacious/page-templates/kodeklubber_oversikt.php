<?php
/**
 * Template Name: Kodeklubboversikt
 *
 * For presenting kodeklubber in a map and a list udner that map
 *
 * @package LKK
 * @subpackage Spacious
 * @since LKK 1.0
 */
?>

<?php get_header(); ?>
<?php
class KlubbPos {
	public $lat;
	public $long;
	public $name;
}
?>

	<?php do_action( 'spacious_before_body_content' ); ?>
	<!--[if lt IE 10]>
	<style>
	li.kodeklubb-item {
		width: 25%;
		float: left;
	}

	@media screen and (max-width: 950px) {
		li.kodeklubb-item {
			width: 33%;
		}
	}

	@media screen and (max-width: 750px) {
		li.kodeklubb-item {
			width: 50%;
		}
	}

	@media screen and (max-width: 450px) {
		li.kodeklubb-item {
			width: 100%;
		}
	}
	</style>
	<![endif]-->
	<div id="primary">
		<div id="content" class="clearfix">
			<?php while ( have_posts() ) : the_post(); ?>

				<div class="the-content">
					<strong><?php echo get_the_content(); ?></strong><br><br>
				</div>
				<?php

				$query = new WP_Query( array(
					'post_type' => 'kodeklubb' ,
					'orderby' => 'title',
					'order' => 'ASC',
					'posts_per_page' => -1
					) );

				$myVariable = 70.0000;
				$kodePlaces = array();
				while ( $query->have_posts() ) : $query->the_post();
					$obj = new KlubbPos();
					$obj->lat = get_post_custom_values('_kodeklubb_position_lat_key');
					$obj->long = get_post_custom_values('_kodeklubb_position_long_key');
					$obj->name = get_the_title();
					$kodePlaces[] = $obj;
				endwhile;

				require_once( SPACIOUS_INCLUDES_DIR . '/GMapsOverview.php');

				echo "<ul class=\"kodeklubb-list clearfix\">";
				while ( $query->have_posts() ) : $query->the_post();
					echo '<li class="kodeklubb-item"><a href="';
					the_permalink();
					echo '">';
					the_title();
					echo '</a></li>';


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
