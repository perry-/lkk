<?php get_header(); ?>

<!-- BEGIN .container -->
<div class="container">

	<!-- BEGIN .row -->
	<div class="row">
	
		<!-- BEGIN .eight columns -->
		<div class="eight columns">
		    	
	    	<!-- BEGIN .post class -->
	    	<div <?php post_class('postarea padded'); ?> id="post-<?php the_ID(); ?>">	
		    
			 	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			    <?php $meta_box = get_post_custom($post->ID); $video = $meta_box['custom_meta_video'][0]; ?>
			    
			    <h1 class="headline"><?php the_title(); ?></h1>
			    
			    <div class="post-author">
			    	<p class="align-left"><i class="icon-time"></i> &nbsp;<?php _e("Posted on", 'organicthemes'); ?> <?php the_time(__("F j, Y", 'organicthemes')); ?> <?php _e("by", 'organicthemes'); ?> <?php the_author_posts_link(); ?></p>
			    	<p class="align-right"><i class="icon-comment"></i> &nbsp;<a href="<?php the_permalink(); ?>#comments"><?php comments_number(__("Leave a Comment", 'organicthemes'), __("1 Comment", 'organicthemes'), '% Comments'); ?></a></p>
			    </div>
			    
			    <?php if(of_get_option('display_feature_post') == '1') { ?>
				    <?php if ( $video ) : ?>
				    	<div class="feature-vid"><?php echo $video; ?></div>
				    <?php else: ?>
				        <?php if ( has_post_thumbnail()) { ?>
				        	<div class="feature-img"><?php the_post_thumbnail( 'featured-large' ); ?></div>
				        <?php } ?>
				    <?php endif; ?>
			    <?php } ?>
			    
			    <?php the_content(); ?>
			    
			    <?php wp_link_pages(array(
			        'before' => '<p class="page-links"><span class="link-label">' . __('Pages:') . '</span>',
			        'after' => '</p>',
			        'link_before' => '<span>',
			        'link_after' => '</span>',
			        'next_or_number' => 'next_and_number',
			        'nextpagelink' => __('Next'),
			        'previouspagelink' => __('Previous'),
			        'pagelink' => '%',
			        'echo' => 1 )
			    ); ?>
			    
			    <?php if(of_get_option('display_social_post') == '1') { ?>
			    <div class="social">
			    	<div class="like-btn">
			    	  	<div class="fb-like" href="<?php the_permalink(); ?>" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false"></div>
			    	</div>
			    	<div class="tweet-btn">
			    		<a href="http://twitter.com/share" class="twitter-share-button"
			    		data-url="<?php the_permalink(); ?>"
			    		data-via="<?php echo of_get_option('twitter_user'); ?>"
			    		data-text="<?php the_title(); ?>"
			    		data-related=""
			    		data-count="horizontal"><?php _e("Tweet", 'organicthemes'); ?></a>
			    	</div>
			    	<div class="plus-btn">
			    		<g:plusone size="medium" annotation="bubble" href="<?php the_permalink(); ?>"></g:plusone>
			    	</div>
			    </div>
			    <?php } ?>
			    
			    <!-- BEGIN .post-meta -->
			    <div class="post-meta">
			    
			    	<p><i class="icon-reorder"></i> &nbsp;<?php _e("Category:", 'organicthemes'); ?> <?php the_category(', '); ?> &nbsp; &nbsp; <i class="icon-tags"></i> &nbsp;<?php _e("Tags:", 'organicthemes'); ?> <?php the_tags(''); ?></p>
				
				<!-- END .post-meta -->
				</div>
				
				<div class="post-navigation">
					<div class="previous-post"><?php previous_post_link('&larr; %link'); ?></div>
					<div class="next-post"><?php next_post_link('%link &rarr;'); ?></div>
				</div><!-- .post-navigation -->
		      
		      	<?php comments_template('',true); ?>
		      
		      	<div class="clear"></div>        
		    
			    <?php endwhile; else: ?>
			    <p><?php _e("Sorry, no posts matched your criteria.", 'organicthemes'); ?></p>
			    <?php endif; ?>
		    
		    <!-- END .post class -->
		    </div>
	    
	    <!-- END .eight columns -->
	    </div>
	    
	    <div class="four columns">
	    	<div class="sidebar padded">
	    		<?php get_sidebar( 'right-sidebar' ); ?>
	    	</div>
	    </div>
    
    <!-- END .row -->
    </div>
 
<!-- END .container -->
</div>

<?php get_footer(); ?>