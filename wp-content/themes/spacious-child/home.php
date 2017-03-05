<?php 
/**
 * Theme Index Section for our theme.
 *
 * @package ThemeGrill
 * @subpackage Spacious
 * @since Spacious 1.0
 */
?>

<?php get_header(); ?>

	<?php do_action( 'spacious_before_body_content' ); ?>

	<div id="post-list">
		<div id="content" class="clearfix">

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<div class="post-item">

						<?php	$format = spacious_posts_listing_display_type_select(); ?>

						<?php get_template_part( 'content', $format ); ?>

					</div>

				<?php endwhile; ?>

				<?php get_template_part( 'navigation', 'none' ); ?>

			<?php else : ?>

				<?php get_template_part( 'no-results', 'none' ); ?>
				
			<?php endif; ?>

		</div><!-- #content -->
	</div><!-- #primary -->
	
	
	<?php do_action( 'spacious_after_body_content' ); ?>

<?php get_footer(); ?>