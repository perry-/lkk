jQuery(document).ready(function($) {
    
    /* Superfish the menu drops ---------------------*/
    $('.menu').superfish({
    	delay: 200,
    	animation: {opacity:'show', height:'show'},
    	speed: 'fast',
    	autoArrows: true,
    	dropShadows: false
    });
    
    /* Mobile Menu ---------------------*/
    $('#sec-selector').change(function(){
	    if ($(this).val()!='') {
	    	window.location.href=$(this).val();
	    }
    });
        
        
    $( document ).on( 'ready post-load', function() {
    
	    /* Flexslider ---------------------*/
	    $(window).load(function() { 
		    if( $().flexslider) {
		    	var slider = $('.flexslider');
		    	slider.fitVids().flexslider({
			    	slideshowSpeed		: slider.attr('data-speed'),
			    	animationDuration	: 600,
			    	animation			: 'slide',
			    	video				: false,
			    	useCSS				: false,
			    	prevText			: '<i class="icon-chevron-left"></i>',
			    	nextText			: '<i class="icon-chevron-right"></i>',
			    	touch				: false,
			    	animationLoop		: true,
			    	smoothHeight		: true,
			    	
			    	start: function(slider) {
			    	    slider.removeClass('loading');
			    	}
		    	});	
		    }
	    });
	    
	    /* Fit Vids ---------------------*/
	    $('.feature-vid').fitVids();
	    
	    /* jQuery UI Tabs ---------------------*/
	    $(function() {
	       $( ".organic-tabs" ).tabs();
	    });
	    
	    /* jQuery UI Accordion ---------------------*/
	    $(function() {
	        $( ".organic-accordion" ).accordion({
	        	collapsible: true, 
	            autoHeight: false
	        });
	    });
	    
	    /* Close Message Box ---------------------*/
	    $('.organic-box a.close').click(function() {
	    	$(this).parent().stop().fadeOut('slow', function() {
	    	});
	    });
	    
	    /* Toggle Box ---------------------*/
	    $('.toggle-trigger').click(function() {
	    	$(this).toggleClass("active").next().fadeToggle("slow");
	    });
	    
	    /* Pretty Photo Lightbox ---------------------*/
	    $("a[rel^='prettyPhoto']").prettyPhoto();
	    
	});
    
});