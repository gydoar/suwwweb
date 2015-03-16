<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>
		<?php
 			global $page, $paged; 
 			wp_title( '|', true, 'right' ); 
 			bloginfo( 'name' ); 
 			$site_description = get_bloginfo( 'description', 'display' ); 
 				if ( $site_description && ( is_home() || is_front_page() ) ) echo " | $site_description"; 
 				if ( $paged >= 2 || $page >= 2 ) echo ' | ' . sprintf( __( 'Page %s', 'nakeme' ), max( $paged, $page ) ); 
 		?>
 	</title>
 	<meta name="description" content="<?php bloginfo('description' ); ?>">
 	<link rel="apple-touch-icon" href="<?php bloginfo('template_url' ); ?>/library/img/apple-touch-icon.png">
 	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name') ?> - RSS" href="<?php bloginfo('rss2_url') ?>" />
    <link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name') ?> - Atom" href="<?php bloginfo('atom_url') ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<!-- css  indispensables -->
	
	<link rel="stylesheet" href="<?php bloginfo('template_url' ); ?>/library/css/normalize.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url' ); ?>/library/css/skeleton.css">
	<!--/ css indispensables -->

	<!-- css adicionales -->

	<link rel="stylesheet" href="<?php bloginfo('template_url' ); ?>/library/css/owl-carousel.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url' ); ?>/library/css/owl-theme.css">
	
	<!--/ css adicionales -->

	<link rel="stylesheet" href="<?php bloginfo('template_url' ); ?>/style.css">

	<?php wp_head(); ?>

</head>
<body class="container">
	
	<header>

		<div id="logo">
			
		</div>
		
		<div class="menu">
			
			<?php wp_nav_menu(array('theme_location' => 'header-menu')); ?>
		
		</div>

		<div id="owl-demo" class="owl-carousel owl-theme">
 
		  <div class="item"><img src="assets/fullimage1.jpg" alt="The Last of us"></div>
		  <div class="item"><img src="assets/fullimage2.jpg" alt="GTA V"></div>
		  <div class="item"><img src="assets/fullimage3.jpg" alt="Mirror Edge"></div>
		 
		</div>
				

	</header>

