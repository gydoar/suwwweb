<?php 
// Cargar archivos externos
require_once( 'library/admin.php' );

/***
// Llamar stylos y archivos Js
***/
add_action( 'wp_enqueue_scripts', 'wp_enqueue_scripts_example' );
 
function wp_enqueue_scripts_example() {
    // Llamar archivos Js...
	wp_enqueue_script( 'jquery', get_stylesheet_directory_uri() . '/library/js/jquery-1.11.2.min.js' );
    wp_enqueue_script( 'modernizr', get_stylesheet_directory_uri() . '/library/js/modernizr.custom.min.js' );
    wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/library/js/script.js' );
    // Llamar nuestros Css
    wp_enqueue_style( 'normalize', get_stylesheet_directory_uri() . '/library/css/normalize.css' );
    wp_enqueue_style( 'skeleton', get_stylesheet_directory_uri() . '/library/css/skeleton.css' );
    wp_enqueue_style( 'my-style', get_stylesheet_directory_uri() . '/style.css' );
}


/***
// Habilitar soporte para widget
***/
register_sidebar(array(
	'id' => 'sidebar1',
	'name' => __( 'Sidebar 1', 'bonestheme' ),
	'description' => __( 'The first (primary) sidebar.', 'bonestheme' ),
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget' => '</div>',
	'before_title' => '<h4 class="widgettitle">',
	'after_title' => '</h4>',
));


/***
// Habilitar soporte para menu
***/
register_nav_menus(
		array(
			'main-nav' => __( 'The Main Menu', 'bonestheme' ),   // main nav in header
			'footer-links' => __( 'Footer Links', 'bonestheme' ) // secondary nav in footer
		)
	);