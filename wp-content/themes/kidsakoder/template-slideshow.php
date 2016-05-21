<?php
/*
Template Name: Slideshow
*/
?>

<?php get_header(); ?>

<!-- BEGIN .container -->
<div class="container">
	
	<!-- BEGIN .row -->
	<div class="row">

		<!-- BEGIN .twelve columns -->
		<div class="twelve columns">
		
			<!-- BEGIN #slideshow -->
			<div id="slideshow" class="slideshow-page">
				
				<!-- BEGIN .flexslider -->
				<div class="flexslider loading" data-speed="<?php echo of_get_option('transition_interval'); ?>">
					<!-- BEGIN .slides -->
					<ul class="slides">
							
						<?php $data = array(
					    	'post_parent'		=> $post->ID,
					    	'post_type' 		=> 'attachment',
					    	'post_mime_type' 	=> 'image',
					    	'order'         	=> 'ASC',
					    	'orderby'	 		=> 'menu_order',
					        'numberposts' 		=> -1
						); ?>
						
						<?php 
						$images = get_posts($data); foreach( $images as $image ) { 
							$imageurl = wp_get_attachment_url($image->ID);
							echo '<li><img src="'.$imageurl.'" /></li>' . "\n";
						} ?>
						
					<!-- END .slides -->
					</ul>
				<!-- END .flexslider -->
				</div>
			
			<!-- END #slideshow -->
			</div>
		
			<?php if(of_get_option('display_slideshow_info') == '1') { ?>
			
			<!-- BEGIN .postarea slideshow -->
			<div class="postarea slideshow">
		
		        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		        
		        <h1 class="headline"><?php the_title(); ?></h1>
		        <?php the_content(__("Read More", 'organicthemes')); ?>
		        <div class="clear"></div>
		        <?php edit_post_link(__("(Edit)", 'organicthemes'), '', ''); ?>
		        
		        <?php endwhile; else: ?>
		        
		        <p><?php _e("Sorry, no posts matched your criteria.", 'organicthemes'); ?></p>
		        
		        <?php endif; ?>
		    
		    <!-- END .postarea slideshow -->
		    </div>
		    
		    <?php } ?>
		
		<!-- END .twelve columns -->
		</div>
		
	<!-- END .row -->
	</div>

<!-- END .container -->
</div>
		

<?php get_footer(); ?>