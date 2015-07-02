<?php
/**
 * The template used for displaying blog post full content.
 *
 * @package ThemeGrill
 * @subpackage Spacious
 * @since Spacious 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php do_action( 'spacious_before_post_content' ); ?>
	<header class="entry-header">
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute();?>"><?php the_title(); ?></a>
		</h1><!-- .entry-title -->
	</header>

	<div class="entry-content clearfix">
		<?php
			the_content(); 
			wp_link_pages( array( 
			'before'            => '<div style="clear: both;"></div><div class="pagination clearfix">'.__( 'Pages:', 'spacious' ),
			'after'             => '</div>',
			'link_before'       => '<span>',
			'link_after'        => '</span>'
      ) );
		?>
	</div>

	<footer class="entry-meta-bar clearfix">	        			
		<div class="entry-meta clearfix">
			<span class="date updated"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( get_the_time() ); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a></span>
			<?php if( has_category() ) { ?>
       		<span class="category"><?php the_category(', '); ?></span>
       	<?php } ?>
				<?php if ( comments_open() ) { ?>
       		<span class="comments"><?php comments_popup_link( __( 'Ingen kommentarer', 'spacious' ), __( '1 kommentar', 'spacious' ), __( '% kommentarer', 'spacious' ), '', __( 'Kommentarer deaktivert', 'spacious' ) ); ?></span>
       	<?php } ?>
       	<?php edit_post_link( __( 'Rediger', 'spacious' ), '<span class="edit-link">', '</span>' ); ?>
		</div>
	</footer>
	<?php
	do_action( 'spacious_after_post_content' );
   ?>
</article>