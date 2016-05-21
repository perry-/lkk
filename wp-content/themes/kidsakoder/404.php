<?php get_header(); ?>

<!-- BEGIN .container -->
<div class="container">
	
	<!-- BEGIN .row -->
	<div class="row">
		
		<!-- BEGIN .eight columns -->
		<div class="eight columns">
    
		    <div class="postarea padded">    
		        <h1 class="headline"><?php _e("Not Found, Error 404", 'organicthemes'); ?></h1>
		        <p><?php _e("The page you are looking for no longer exists.", 'organicthemes'); ?></p>
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