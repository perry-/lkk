<?php
/*
Template Name: Archives
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
		
		<!-- BEGIN .twelve columns -->
		<div class="twelve columns">
			
			<!-- BEGIN .postarea full -->
		    <div class="postarea full">
		
		        <h1 class="headline"><?php the_title(); ?></h1>		
		
		        <div class="archive-column">
		            <h6><?php _e("By Page:", 'organicthemes'); ?></h6>
		            <ul><?php wp_list_pages('title_li='); ?></ul>      
		        </div>		
		
		        <div class="archive-column">
		            <h6><?php _e("By Post:", 'organicthemes'); ?></h6>
		            <ul><?php wp_get_archives('type=postbypost&limit=100'); ?></ul>
		        </div>
		        
		        <div class="archive-column last">	
		        	<h6><?php _e("By Month:", 'organicthemes'); ?></h6>
    	            <ul><?php wp_get_archives('type=monthly'); ?></ul>	
    	
    	            <h6><?php _e("By Category:", 'organicthemes'); ?></h6>
    	            <ul><?php wp_list_categories('sort_column=name&title_li='); ?></ul>	
    	        </div>            
			
			<!-- END .postarea full -->
		    </div>
		
		<!-- END .twelve columns --> 
		</div>
	
	<!-- END .row -->
	</div>

<!-- END .container -->
</div>

<?php get_footer(); ?>