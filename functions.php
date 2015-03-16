<?php 
// Cargar archivos externos
require_once( 'library/admin.php' );

/***
// Habilitar soporte para menu
***/
register_nav_menus(
		array(
			'header-menu' => 'Menu superior',   // main nav in header
			'footer-menu' => 'Menu pie' // secondary nav in footer
		)
	);