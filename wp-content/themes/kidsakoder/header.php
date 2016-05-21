<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
<meta name="google-site-verification" content="0xGNpiJA0x7jKDaXyxQzldzGOGKiBHzZ1JkosZ3KvJ4" />
<meta charset="<?php bloginfo('charset'); ?>">

<?php if(of_get_option('enable_responsive') == '1') { ?>
<!-- Mobile View -->
<meta name="viewport" content="width=device-width">
<?php } ?>

<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' |'; } ?> <?php bloginfo('name'); ?></title>
<link rel="Shortcut Icon" href="http://www.kidsakoder.no/wp-content/uploads/2013/06/LKK-icon-L-DOS-Green-16px.png">

<?php get_template_part( 'style', 'options' ); ?>

<!-- IE Fix for HTML5 Tags -->
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<?php wp_head(); ?>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> Feed" href="<?php echo home_url(); ?>/feed/">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

<!-- Social Buttons -->
<script src="http://platform.twitter.com/widgets.js" type="text/javascript"></script>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>

</head>

<body <?php body_class(); ?>>

<!-- BEGIN #wrap -->
<div id="wrap">
	
	<!-- BEGIN #header -->
	<div id="header">
	
		<!-- BEGIN .row -->
		<div class="row">
			
			<div class="nine columns">
			<?php if (is_home() || is_front_page() ) { ?>
				<?php $header_image = get_header_image(); if ( ! empty( $header_image ) ) { ?>
					<h1 id="custom-header"><a href="<?php echo get_option('home'); ?>/" title="Home"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo('name'); ?>" /><?php bloginfo( 'name' ); ?></a></h1>
				<?php } else { ?>
					<div id="masthead">
						<h1 class="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>
						<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
					</div>
				<?php } ?>
			<?php } else { ?>
				<?php $header_image = get_header_image(); if ( ! empty( $header_image ) ) { ?>
					<p id="custom-header"><a href="<?php echo get_option('home'); ?>/" title="Home"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo('name'); ?>" /><?php bloginfo( 'name' ); ?></a></p>
				<?php } else { ?>
					<div id="masthead">
						<h4 class="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h4>
						<h5 class="site-description"><?php bloginfo( 'description' ); ?></h5>
					</div>
				<?php } ?>
			<?php } ?>
			</div>
			
			<div class="three columns">
			<?php if(of_get_option('display_search') == '1') { ?>
			    <div class="header-search">
			        <form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
				        <input type="text" class="inputbox" value="<?php _e('Search', 'organicthemes'); ?>" onfocus="if (this.value == '<?php _e("Søk", 'organicthemes'); ?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?php _e('Search', 'organicthemes'); ?>';}" name="s" id="s" />
				        <input type="submit" id="searchsubmit" value="<?php _e("Søk", 'organicthemes'); ?>" />
			        </form>
			    </div>
			<?php } ?>
			</div>
		
		<!-- END .row -->
		</div>
		
		<!-- BEGIN .row -->
		<div class="row">
		
			<nav id="navigation">
				<?php wp_nav_menu( array( 
					'theme_location' => 'header-menu', 
					'title_li' => '', 
					'depth' => 4, 
					'container_class' => 'menu' 
				)); ?>
			<span class="corner-left"></span>
			<span class="corner-right"></span>
			</nav>
			
			<nav id="navigation-mobile">
				<?php wp_nav_menu( array( 
					'theme_location' => 'header-menu',
					'walker'         => new Walker_Nav_Menu_Dropdown(),
					'items_wrap'     => '<select id="sec-selector" name="sec-selector">%3$s</select>' 
				)); ?>
			</nav>
			
		<!-- END .row -->
		</div>
	
	<!-- END #header -->
	</div>