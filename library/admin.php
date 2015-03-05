<?php 
////////
//// Agregando configuración a nuestro Backend
////////

////////
// Agregando Favicon al administrador
////////
 function admin_head_example() {
    echo '<link rel="icon" type="image/png" href="' . get_bloginfo('template_directory') . 'library/img/admin-favicon.png" />';
}

add_action( 'admin_head', 'admin_head_example' );


////////
// Información de contacto en nuestr footer
////////
function bones_custom_admin_footer() {
	_e( '<span id="footer-thankyou">Desarrollado por <a href="http://suwwweb.com" target="_blank">suWWWeb |</a></span> Contacto: <a href="mailto:soporte@suwwweb.com">soporte@suwwweb.com</a> | Tel: (+57) 1 3000 754 / 755 | Bogotá - Colombia', 'bonestheme' );
}

add_filter( 'admin_footer_text', 'bones_custom_admin_footer' );


////////
// Activar todos los botones del editor de texto
////////
function todos_los_botones($buttons) {

$buttons[] = 'fontselect'; //Selector de tipo de fuente
$buttons[] = 'fontsizeselect'; //Selector de tamaño de fuente
$buttons[] = 'styleselect'; //Selector de estilos de párrafo mucho más amplio
$buttons[] = 'backcolor'; //Color de fondo de párrafo
$buttons[] = 'newdocument'; //Nuevo documento inline
$buttons[] = 'cut'; //Cortar texto
$buttons[] = 'copy'; //Copiar texto
$buttons[] = 'charmap'; //Mapa de caracteres
$buttons[] = 'hr'; //Línea horizontal
$buttons[] = 'visualaid'; //Ayudas visuales del editor

return $buttons;
}
add_filter("mce_buttons_3", "todos_los_botones");


////////
// Autenticacion con Email o Nombre de Usuario
////////
function bainternet_allow_email_login( $user, $username, $password ) {
    if ( is_email( $username ) ) {
        $user = get_user_by_email( $username );
        if ( $user ) $username = $user->user_login;
    }
    return wp_authenticate_username_password(null, $username, $password );
}

add_filter('authenticate', 'bainternet_allow_email_login', 20, 3);
 

function addEmailToLogin( $translated_text, $text, $domain ) {
    if ( "Nombre de usuario" == $translated_text )
        $translated_text .= __( ' Or Email');
    return $translated_text;
}

add_filter( 'gettext', 'addEmailToLogin', 20, 3 );