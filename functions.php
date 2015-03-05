<?php 
// Cargar archivos externos
require_once( 'library/admin.php' );

/***
// Llamar stylos y archivos Js
***/

add_action( 'wp_enqueue_scripts', 'wp_enqueue_scripts_example' );
 
function wp_enqueue_scripts_example() {
    // Llamar archivos Js...
    wp_enqueue_script( 'my-script', get_stylesheet_directory_uri() . '/scripts/my-script.js' );
    // Llamar nuestros Css
    wp_enqueue_style( 'my-style', get_stylesheet_directory_uri() . '/styles/my-style.css' );
}

