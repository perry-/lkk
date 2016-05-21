<?php
/*
Template Name: Blog5
*/
?>

<?php get_header(); ?>

<!-- BEGIN .container -->
<div class="container">
	
	<?php if ( has_post_thumbnail()) { ?>
		<div class="feature-img page"><?php the_post_thumbnail( 'featured-large' ); ?></div>
	<?php } else { ?>
		<div class="feature-img page"><img src="<?php bloginfo('template_directory'); ?>/images/default-page.png" alt="<?php the_title(); ?>" /></div>
	<?php } ?>
	
	<!-- BEGIN .row -->
	<div class="row">
	
		<!-- BEGIN .eight columns -->
		<div class="eight columns">
		
			<!-- BEGIN .postarea -->
			<div <?php post_class('postarea blog-page'); ?> id="page-<?php the_ID(); ?>">
		        
		        <?php $wp_query = new WP_Query(array('cat'=>of_get_option('category_blog5'), 'posts_per_page'=>of_get_option('postnumber_blog'), 'paged'=>$paged)); ?>
		        <?php if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post(); ?>
		        <?php $meta_box = get_post_custom($post->ID); $video = $meta_box['custom_meta_video'][0]; ?>
		        <?php global $more; $more = 0; ?>
		        
		        <!-- BEGIN .blog-holder -->
		        <div class="blog-holder">
		        	
		            <h2 class="headline"><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php esc_attr(the_title_attribute()); ?>"><?php the_title(); ?></a></h2>
		            
		            <div class="post-author">
		            	<p class="align-left"><i class="icon-time"></i> &nbsp;<?php _e("Posted on", 'organicthemes'); ?> <?php the_time(__("F j, Y", 'organicthemes')); ?> <?php _e("by", 'organicthemes'); ?> <?php the_author_posts_link(); ?></p>
		            	<p class="align-right"><i class="icon-comment"></i> &nbsp;<a href="<?php the_permalink(); ?>#comments"><?php comments_number(__("Leave a Comment", 'organicthemes'), __("1 Comment", 'organicthemes'), '% Comments'); ?></a></p>
		            </div>
		            
		            <?php if(of_get_option('display_feature_blog') == '1') { ?>
		                <?php if ( $video ) : ?>
		                	<div class="feature-vid"><?php echo $video; ?></div>
		                <?php else: ?>
		                    <?php if ( has_post_thumbnail()) { ?>
		                    	<div class="feature-img"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_post_thumbnail( 'featured-large' ); ?></a></div>
		                    <?php } ?>
		                <?php endif; ?>
		            <?php } ?>
		            
		            <!-- BEGIN .article -->
		            <div class="article">
		            	<?php the_content(__("Read More", 'organicthemes')); ?>
		            <!-- END .article -->
		            </div>
		            
		            <?php if(of_get_option('display_social_blog') == '1') { ?>
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
		        
		        <!-- END .blog-holder -->
		        </div>
		        
		        <?php endwhile; ?>
		        
		        <div class="pagination">
		        	<?php echo get_pagination_links(); ?>
		        </div>
		        
		        <?php else : // do not delete ?>
		                
		        <div class="error-404">
		            <h1 class="headline"><?php _e("No Posts Found", 'organicthemes'); ?></h1>
		            <p><?php _e("We're sorry, but no posts have been found. Create a post to be added to this section, and configure your theme options.", 'organicthemes'); ?></p>
		        </div>
		        
		        <?php endif; // do not delete ?>
		    
		    <!-- END .postarea -->   
	        </div>
		
		<!-- END .eight columns -->
		</div>
		
		<div class="four columns">
			<div class="sidebar">
				<?php get_sidebar( 'right-sidebar' ); ?>
			</div>
		</div>
	
	<!-- END .row -->
	</div>
	
<!-- END .container -->	
</div>

<?php get_footer(); ?>