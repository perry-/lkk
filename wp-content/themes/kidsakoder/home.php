<?php get_header(); ?>

<!-- BEGIN .container -->
<div class="container home">

	<!-- BEGIN .row -->
	<div class="row">
	
		<!-- BEGIN .twelve columns -->
		<div class="twelve columns">
	
			<!-- BEGIN #slideshow -->
			<div id="slideshow">
			
				<!-- BEGIN .flexslider -->
				<div class="flexslider loading" data-speed="<?php echo of_get_option('transition_interval'); ?>">
					<!-- BEGIN .slides -->
					<ul class="slides">
						<?php $wp_query = new WP_Query(array('cat'=>of_get_option('category_slideshow_home'),'posts_per_page'=>of_get_option('postnumber_slideshow_home'))); ?>
						<?php if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post(); ?>
						<?php $meta_box = get_post_custom($post->ID); $video = $meta_box['custom_meta_video'][0]; ?>
						<?php global $more; $more = 0; ?>
						
						<li>
							<?php if ( $video ) : ?>
							    <div class="feature-vid"><?php echo $video; ?></div>
							<?php else: ?>
							    <?php if ( has_post_thumbnail()) { ?>
								    <a class="feature-img" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php esc_attr(the_title_attribute()); ?>"><?php the_post_thumbnail( 'featured-large' ); ?></a>
							    <?php } else { ?>
							    	<a class="feature-img" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php esc_attr(the_title_attribute()); ?>"><img src="<?php bloginfo('template_directory'); ?>/images/default-slide.png" alt="<?php the_title(); ?>" /></a>
							    <?php } ?>
							<?php endif; ?>
							<div class="holder">
								<div class="information">
									<h2 class="headline"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						            <?php the_excerpt(); ?>
					            </div>
					            <span class="background"></span>
							</div>
						</li>
						
						<?php endwhile; ?>
						<?php endif; ?>
					<!-- END .slides -->
					</ul>
				<!-- END .flexslider -->
				</div>
			
			<!-- END #slideshow -->
			</div>
	    
	    <!-- END .twelve columns -->
	    </div>
	
	<!-- END .row -->
	</div>   
	
	<!-- BEGIN .row -->
	<div class="row">
	
		<?php if(of_get_option('display_home_mid') == '1') { ?>
		
		<!-- BEGIN .homepage top -->
	    <div class="homepage top"> 
	    
	    	<div class="holder first one-third">
				<?php $recent = new WP_Query('page_id='.of_get_option('mid_page_left')); while($recent->have_posts()) : $recent->the_post();?>
		            <?php get_template_part( 'content', 'home' ); ?>
	            <?php endwhile; ?>
			</div>
	
	        <div class="holder one-third">
				<?php $recent = new WP_Query('page_id='.of_get_option('mid_page_mid')); while($recent->have_posts()) : $recent->the_post();?>
	            	<?php get_template_part( 'content', 'home' ); ?>
	            <?php endwhile; ?>
			</div>
	
	        <div class="holder last one-third">
				<?php $recent = new WP_Query('page_id='.of_get_option('mid_page_right')); while($recent->have_posts()) : $recent->the_post();?>
		            <?php get_template_part( 'content', 'home' ); ?>
	            <?php endwhile; ?>
			</div>
	    
	    <!-- END .homepage top -->
	    </div>
	    
	    <?php } ?>
	
	<!-- END .row -->    
	</div>
	
	<!-- BEGIN .row -->
	<div class="row">
	
		<?php if (of_get_option('display_home_bot') == '1') { ?>
		
		<!-- BEGIN .homepage bottom -->
	    <div class="homepage bottom"> 
	    
	    	<!-- BEGIN .six columns -->
	    	<div class="six columns">
	    
		        <div class="holder">
					<?php $recent = new WP_Query('page_id='.of_get_option('bottom_page')); while($recent->have_posts()) : $recent->the_post(); ?>
					
		                <h3 class="headline"><?php the_title(); ?></h3>		
		                <?php the_content(__("Les Mer", 'organicthemes')); ?>
		                
		            <?php endwhile; ?>
		        </div>
	        
	        <!-- END .six columns -->
	        </div>
	        
	        <!-- BEGIN .six columns -->
	        <div class="six columns">
	    		
	    		<!-- BEGIN .organic-tabs -->
		        <div class="organic-tabs">
		            
		            <ul id="tabs">
						<?php $wp_query = new WP_Query(array('cat'=>of_get_option('category_tabber'), 'posts_per_page'=>of_get_option('postnumber_tabber'))); ?>
						<?php if($wp_query->have_posts()) : $count = 1; while($wp_query->have_posts()) : $wp_query->the_post(); ?>
			                <li><a href="#tabs-<?php echo $count; ?>"><?php the_title(); ?></a></li>
			            <?php $count++; ?>
			            <?php endwhile; ?>
			            <?php endif; ?>
			            <?php wp_reset_postdata(); ?>
		            </ul>
		            
		            <?php $wp_query = new WP_Query(array('cat'=>of_get_option('category_tabber'), 'posts_per_page'=>of_get_option('postnumber_tabber'))); ?>
		            <?php if($wp_query->have_posts()) : $count = 1; while($wp_query->have_posts()) : $wp_query->the_post(); ?>
		            <?php $meta_box = get_post_custom($post->ID); $video = $meta_box['custom_meta_video'][0]; ?>
		            
		            <div id="tabs-<?php echo $count; ?>">
	                    <?php if ( $video ) : ?>
	                        <div class="feature-vid"><?php echo $video; ?></div>
	                    <?php else: ?>
	                    	<?php if ( has_post_thumbnail()) { ?>
	                        	<a class="feature-img" href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail( 'featured-medium' ); ?></a>
	                        <?php } ?>
	                    <?php endif; ?>
	                    <div class="information">
	                        <h3 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
	                        <?php the_excerpt(); ?>
	                    </div>
	                    <a class="organic-btn white-btn" href="<?php the_permalink(); ?>" rel="bookmark"><span class="btn-holder"><?php _e("Les Mer", 'organicthemes'); ?></span></a>
		             </div>
		            
		            <?php $count++; ?>
		            <?php endwhile; ?>
		            <?php endif; ?>
		        
		        <!-- END .organic-tabs -->
		        </div>     
	        
	        <!-- END .six columns -->
	        </div>
		
		<!-- END .homepage bottom -->
	    </div>
	    
	    <?php } ?>
	
	<!-- END .row -->
	</div> 

<!-- END .container -->
</div>

<?php get_footer(); ?>