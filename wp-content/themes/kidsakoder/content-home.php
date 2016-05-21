<div class="information">

	<a class="feature-img" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php esc_attr(the_title_attribute()); ?>"><?php the_post_thumbnail( 'featured-medium' ); ?></a>

 	<div class="text-holder">
	    <h2 class="title text-center"><?php the_title(); ?></h2>
	    <?php the_excerpt(); ?>
	    <div class="align-center text-center">
	    	<a class="organic-btn white-btn" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php esc_attr(the_title_attribute()); ?>"><span class="btn-holder"><?php _e("Les Mer", 'organicthemes'); ?></span></a>
	    </div>
    </div>
    
</div>