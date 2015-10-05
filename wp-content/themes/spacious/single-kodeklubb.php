<?php
/**
 * The template used for displaying kodeklubb content in page.php
 *
 * @package LKK
 * @subpackage Spacious
 * @since LKK 1.0
 */
?>

<?php get_header(); ?>

	<?php do_action( 'spacious_before_body_content' ); ?>
		
	<div id="primary">
		<div id="content" class="clearfix">
			<?php while ( have_posts() ) : the_post(); ?>
			
				<div class="clearfix">
					<?php if (has_post_thumbnail() ): ?>
						<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' ); ?>
						<img src="<?php echo $image[0]; ?>" class="kodeklubb-image"/>
					<?php endif; ?>

					<div class="kodeklubb-content">
						<?php echo get_the_content_with_formatting(get_the_content()); ?>
					</div>
				</div>
				<?php $has_link = get_post_custom_values('_kodeklubb_has_link_key'); ?>
				<?php $link = get_post_custom_values('_kodeklubb_link_value_key'); ?>
				<?php if($has_link[0]): ?>
					<div class="button-container">
						<a href="<?php echo $link[0]; ?>" target="_blank"><button class="homepage-link" type="button">Gå til egen nettside</button></a>
					</div>
				<?php else : ?>
					<h2> Siste nytt fra kodeklubben: </h2>
					<?php $post_id_key = get_the_ID(); ?>
					<?php $query = new WP_Query( array( 
						'post_type' => 'infomelding' ,
						'orderby' => 'name',
						'order' => 'DESC',
						'posts_per_page' => 6,
						'meta_key' => '_infomelding_kodeklubb_value_key',
						'meta_value' => $post_id_key
						) );
					?>
					<ul>
						<?php
						while ( $query->have_posts() ) : $query->the_post();
							?>
							<li class="update">
							<h4><?php the_title(); ?></h4>
							<?php the_content(); ?>
							</li>
							<?php
						endwhile;
						if(!$query->have_posts()){
							echo "Det er ingen nyheter her enda...";
						}
						wp_reset_query();
						?>
					</ul>
				<?php endif ?>

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
	
	<div id="secondary">
		<?php $contacts = get_post_meta( $post->ID, '_kodeklubb_contact_value_key', true); ?>
		<?php $facebook_link = get_post_meta( $post->ID, '_kodeklubb_facebook_link_value_key', true) ?>
		<?php $meetup_link = get_post_meta( $post->ID, '_kodeklubb_meetup_link_value_key', true) ?>

		<?php if(is_array($contacts) && count($contacts) > 0): ?>
			<h2>Kontaktpersoner</h2>
			<?php array_map("print_contact", $contacts); ?>
		<?php endif ?>
		
		<?php if ($facebook_link || $meetup_link):?>
			<p>Finn oss her</p>
			<div class="crafty-social-buttons">
				<ul class="crafty-social-buttons-list">
					<?php if($facebook_link):?>
						<li>
							<a href="<?php echo $facebook_link; ?>" class="crafty-social-button csb-facebook" title="Facebook" target="_blank">
								<img class="crafty-social-button-image" alt="Facebook" width="45" height="45" src="<?php get_site_url(); ?>/wp-content/plugins/crafty-social-buttons/buttons/simple/facebook.png" scale="0">
							</a>
						</li>
					<?php endif ?>
					<?php if($meetup_link):?>
						<li>
							<a href="<?php echo $meetup_link; ?>" class="crafty-social-button" title="Meetup.com" target="_blank">
								<img class="crafty-social-button-image" alt="Meetup.com" width="45" height="45" src="<?php get_site_url(); ?>/wp-content/themes/spacious/inc/img/meetup_logo.png" scale="0">
							</a>
						</li>
					<?php endif ?>
				</ul>
			</div>
		<?php endif ?>
	</div>
	
	<?php do_action( 'spacious_after_body_content' ); ?>

<?php get_footer(); ?>