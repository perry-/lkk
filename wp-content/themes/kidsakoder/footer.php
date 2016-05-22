<div class="clear"></div>

<!-- END #wrap -->
</div>

<!-- BEGIN #footer-widgets -->
<div id="footer-widgets">

	<div class="row">
	
	    <div class="two columns"> 
	        <div class="footer-widget">
	        	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-one') ) : ?>
	            <?php endif; ?>
	        </div> 
	    </div>
	    
	    <div class="two columns">
	        <div class="footer-widget">
	        	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-two') ) : ?>
	            <?php endif; ?>
	        </div>
	    </div>
	    
	    <div class="two columns">
	        <div class="footer-widget">
	        	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-three') ) : ?>
	            <?php endif; ?>
	        </div>
	    </div>
	    
	    <div class="two columns">
	        <div class="footer-widget">
	        	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-four') ) : ?>
	            <?php endif; ?>
	        </div>
	    </div>
	    
	    <div class="four columns">
	        <div class="footer-widget">
	        	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-five') ) : ?>
	            <?php endif; ?>
	        </div>
	    </div>
	
	</div>

<!-- END #footer-widgets -->
</div>

<!-- BEGIN #footer -->
<div id="footer">

	<div class="row">
    
    	<div class="twelve columns">
	
            <div class="footer left">
                <p><?php _e("Copyright", 'organicthemes'); ?> &copy; <?php echo date(__("Y", 'organicthemes')); ?> &middot; <?php _e("All Rights Reserved", 'organicthemes'); ?> &middot; <?php bloginfo('name'); ?></p>
                <p><a href="/" target="_blank"><?php _e("Kidsakoder 1.0", 'organicthemes'); ?></a> <?php _e("by", 'organicthemes'); ?> <a href="/" target="_blank"><?php _e("LKK", 'organicthemes'); ?></a> &middot; <a href="http://kahunahost.com" target="_blank" title="WordPress Hosting"><?php _e("WordPress Hosting", 'organicthemes'); ?></a> &middot; <a href="<?php bloginfo('rss2_url'); ?>"><?php _e("RSS Feed", 'organicthemes'); ?></a> &middot; <?php wp_loginout(); ?></p>
            </div>
        
        </div>
	
	</div>

<!-- END #footer -->
</div>

<?php do_action('wp_footer'); ?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=246727095428680";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

</body>
</html>
