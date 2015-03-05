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
// Información de contacto en nuestro footer
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
        $translated_text .= __( ' O Email');
    return $translated_text;
}

add_filter( 'gettext', 'addEmailToLogin', 20, 3 );


////////
// Opciones del logo en el formulario de autenticacion
////////
// Gargar css del formulario de autenticacion
function bones_login_css() {
	wp_enqueue_style( 'bones_login_css', get_template_directory_uri() . '/library/css/login.css', false);
}

// Cargar url link del logo
function bones_login_url() {  return home_url('/'); }

// Cargar el texto Alt del logo
function bones_login_title() { return get_option( 'blogname' ); }

add_action( 'login_enqueue_scripts', 'bones_login_css', 10 );
add_filter( 'login_headerurl', 'bones_login_url' );
add_filter( 'login_headertitle', 'bones_login_title' );


////////
// Eliminamos Elementos del menu si no es administrador
////////
if (!current_user_can('manage_options')) {
    
	add_action( 'admin_init', 'more_remove_menu_page' );
 
	function more_remove_menu_page() {
            //remove_menu_page( 'index.php' );                  //Escritorio
			//remove_menu_page( 'edit.php' );                   //Articulos
			remove_menu_page( 'upload.php' );                 //Audio visual
			//remove_menu_page( 'edit.php?post_type=page' );    //Paginas
			remove_menu_page( 'edit-comments.php' );          //Comentarios
			remove_menu_page( 'themes.php' );                 //Apariencia
			remove_menu_page( 'plugins.php' );                //Plugins
			remove_menu_page( 'users.php' );                  //Usuarios
			remove_menu_page( 'tools.php' );                  //Herramientas
			remove_menu_page( 'options-general.php' );        //Ajustes
	}    
}


////////
// Forzar el escritorio a una sola columna
////////
function so_screen_layout_columns( $columns ) {
    $columns['dashboard'] = 1;
    return $columns;
}

add_filter( 'screen_layout_columns', 'so_screen_layout_columns' );

function so_screen_layout_dashboard() {
    return 1;
}

add_filter( 'get_user_option_screen_layout_dashboard', 'so_screen_layout_dashboard' ); 


////////
// Eliminamos los Metabox del escritorio
////////
function example_remove_dashboard_widgets() {
            remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
            remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );       
            remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );     
            remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );               
            remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
            remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
            remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );   
            remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' ); 
            remove_meta_box( 'dashboard_browser_nag', 'dashboard', 'normal' );     
            remove_meta_box( 'dashboard_activity', 'dashboard', 'normal' );                  
}
add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets' ); 

  
////////
// Widget para el Escritorio
////////

function custom_dashboard_widget() { ?>
            <img src="<?php bloginfo('template_directory'); ?>/images/logo.png" />     
            <h1>¡Hola! Este es tu área personal en la web XXXX</h1>
            <p>Aquí va todo el texto que quieras, con todo el HTML que precises</p>
    <?php } 
    
add_action( 'wp_dashboard_setup', 'my_dashboard_setup_function' );

function my_dashboard_setup_function() {
    add_meta_box( 'my_dashboard_widget', 'Biembenido al escritorio de suWWWeb', 'custom_dashboard_widget', 'dashboard', 'normal', 'high' );
}