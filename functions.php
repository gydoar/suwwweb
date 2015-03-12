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
// Habilitar soporte para menu
***/
register_nav_menus(
		array(
			'header-menu' => 'Menu superior',   // main nav in header
			'footer-menu' => 'Menu pie' // secondary nav in footer
		)
	);