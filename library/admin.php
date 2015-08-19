<?php 
/*------------------------------------*\
    CONFIGURACIÓN DE NUESTRO BACKEND
\*------------------------------------*/

/*------------------------------------*\
    $CONTENIDO
\*------------------------------------*/
/**
 * AGREGANDO OPTIONS THEME FRAMEWORK
 * AGREGANDO FAVICON AL ADMINISTRADOR
 * INFORMACIÓN DE CONTACTO FOOTER
 * ACTIVAR BOTONES EN EDITOR DE TEXTO
 * AUTENTICACIÓN CON EMAIL
 * LOGO FORMULARIO AUTENTICACIÓN
 * LIMITAR MENU SI NO ES ADMIN
 * ELIMINAMOS ELEMENTOS DEL TOOLBAR DESDE WP 3.3
 * FORZAR ESCRITORIO A UNA COLUMNA
 * ELIMINAMOS METABOX DEL ESCRITORIO
 * WIDGET PARA EL ESCRITORIO
 * REMPLAZAR NOMBRES DEL MENU
 * ORDENAR EL MENU DE ADMINISTRACIÓN
 * MOVIENDO EL MENU
 * 
 */

/*------------------------------------*\
    AGREGANDO OPTIONS THEME FRAMEWORK
\*------------------------------------*/
define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/library/inc/' );
require_once dirname( __FILE__ ) . '/inc/options-framework.php';
$optionsfile = locate_template( 'options.php' );
load_template( $optionsfile );


/*------------------------------------*\
    AGREGANDO FAVICON AL ADMINISTRADOR
\*------------------------------------*/
 function admin_head_example() {
    echo '<link rel="icon" type="image/png" href="' . get_bloginfo('template_directory') . '/library/img/admin-favicon.png" />';
}

add_action( 'admin_head', 'admin_head_example' );


/*------------------------------------*\
    INFORMACIÓN DE CONTACTO FOOTER
\*------------------------------------*/
function bones_custom_admin_footer() {
	_e( '<span id="footer-thankyou">Desarrollado por <a href="http://suwwweb.com" target="_blank">suWWWeb |</a></span> Contacto: <a href="mailto:soporte@suwwweb.com">soporte@suwwweb.com</a> | Tel: (+57) 1 3000 754 / 755 | Bogotá - Colombia', 'bonestheme' );
}

add_filter( 'admin_footer_text', 'bones_custom_admin_footer' );


/*------------------------------------*\
    ACTIVAR BOTONES EN EDITOR DE TEXTO
\*------------------------------------*/
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


/*------------------------------------*\
    AUTENTICACIÓN CON EMAIL
\*------------------------------------*/
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


/*------------------------------------*\
    LOGO FORMULARIO AUTENTICACIÓN
\*------------------------------------*/
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


/*------------------------------------*\
    LIMITAR MENU SI NO ES ADMIN
\*------------------------------------*/
if (!current_user_can('manage_options')) {
    
	add_action( 'admin_init', 'more_remove_menu_page' );
 
	function more_remove_menu_page() {
            //remove_menu_page( 'index.php' );                  //Escritorio
			//remove_menu_page( 'edit.php' );                   //Articulos
			//remove_menu_page( 'upload.php' );                 //Audio visual
			//remove_menu_page( 'edit.php?post_type=page' );    //Paginas
			remove_menu_page( 'edit-comments.php' );            //Comentarios
			remove_menu_page( 'themes.php' );                   //Apariencia
			remove_menu_page( 'plugins.php' );                  //Plugins
			//remove_menu_page( 'users.php' );                  //Usuarios
			remove_menu_page( 'tools.php' );                    //Herramientas
			remove_menu_page( 'options-general.php' );          //Ajustes
	}    
}


/*------------------------------------*\
    ELIMINAMOS ELEMENTOS DEL TOOLBAR DESDE WP 3.3
\*------------------------------------*/
function eliminar_nodos_admin_bar() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo'); // Elimina el logo de WordPress (desaparece también todo el submenú)
    $wp_admin_bar->remove_menu('about'); // Elimina el enlace "Sobre WordPress"
    $wp_admin_bar->remove_menu('wporg'); // Elimina el enlace a wordpress.org
    $wp_admin_bar->remove_menu('documentation'); // Elimina el enlace a la documentación oficial (Codex)
    $wp_admin_bar->remove_menu('support-forums'); // Elimina el enlace a los foros de ayuda
    $wp_admin_bar->remove_menu('feedback'); // Elimina el enlace "Sugerencias"
    $wp_admin_bar->remove_menu('view-site'); // Elimina el submenú que aparece al pasar el cursor sobre el nombre de la web
    $wp_admin_bar->remove_menu('comments'); // Elimina el acceso directo a los comentarios
    $wp_admin_bar->remove_menu('updates'); // Elimina el icono de notificación de actualizaciones
    $wp_admin_bar->remove_menu('new-content'); // Elimina el menú para generar nuevo contenido
    //$wp_admin_bar->remove_menu('my-account'); // Elimina el acceso a la cuenta de usuario y al enlace para desconectarse
    }
add_action('wp_before_admin_bar_render', 'eliminar_nodos_admin_bar');


/*------------------------------------*\
    FORZAR ESCRITORIO A UNA COLUMNA
\*------------------------------------*/
function so_screen_layout_columns( $columns ) {
    $columns['dashboard'] = 1;
    return $columns;
}

add_filter( 'screen_layout_columns', 'so_screen_layout_columns' );

function so_screen_layout_dashboard() {
    return 1;
}

add_filter( 'get_user_option_screen_layout_dashboard', 'so_screen_layout_dashboard' ); 


/*------------------------------------*\
    ELIMINAMOS METABOX DEL ESCRITORIO
\*------------------------------------*/
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
            remove_action('welcome_panel', 'wp_welcome_panel');                   
}
add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets' ); 

  
/*------------------------------------*\
    WIDGET PARA EL ESCRITORIO
\*------------------------------------*/
function custom_dashboard_widget() { ?>  
            <h1>¡Hola! Este es tu área personal</h1>
            <p>Aquí va todo el texto que quieras, con todo el HTML que precises</p>
    <?php } 
    
add_action( 'wp_dashboard_setup', 'my_dashboard_setup_function' );

function my_dashboard_setup_function() {
    add_meta_box( 'my_dashboard_widget', 'Bienvenido al escritorio de suWWWeb', 'custom_dashboard_widget', 'dashboard', 'normal', 'high' );
}


/*------------------------------------*\
    REMPLAZAR NOMBRES DEL MENU
\*------------------------------------*/
add_filter( 'gettext', 'change_post_news' );
add_filter( 'ngettext', 'change_post_news' );
 
function change_post_news( $translated )
{
    $translated = str_replace( 'Entradas', 'Artículos', $translated );
    $translated = str_replace( 'entradas', 'artículos', $translated );

    $translated = str_replace( 'Medios', 'Multimedia', $translated );
    $translated = str_replace( 'medios', 'multimedia', $translated );

    $translated = str_replace( 'Widgets', 'Modulos', $translated );
    $translated = str_replace( 'widgets', 'modulos', $translated );


    return $translated;
}


/*------------------------------------*\
    ORDENAR EL MENU DE ADMINISTRACIÓN
\*------------------------------------*/
function custom_menu_order($menu_ord) {  
if (!$menu_ord) return true;  

return array(  
    'index.php', // Escritorio
    'separator1', // Primer separador
    'edit.php?post_type=page', // Paginas
    'edit.php', // Articulos
    'upload.php', // Media
    'separator2', // Segundo separador 
    'nav-menus.php', // Menu  
    'widgets.php', //Widgets
    'themes.php?page=options-framework', // Theme Options
    'users.php', // Usuarios  
    'separator-last', // Ultimo separador 
    'edit-comments.php', // Comentarios
    'link-manager.php', // Links 
    'themes.php', // Apariencia 
    'plugins.php', // Plugins  
    'tools.php', // Herramientas  
    'options-general.php', // Ajustes      
);
}  
add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order  
add_filter('menu_order', 'custom_menu_order');


/*------------------------------------*\
    MOVIENDO EL MENU
\*------------------------------------*/
function re_sort_menu() {
  global $menu;
  global $submenu;
  // Note: find the position of every submenu in Appearance by uncommenting the following: 
  //print_r($submenu['themes.php']);
  unset($submenu['themes.php'][0]); // Unsets Appearance -> Theme Options
  unset($submenu['themes.php'][10]); // Unsets Appearance -> Menu (position 10)
  unset($submenu['themes.php'][7]); // Unsets Appearance -> Widgets
  

  // Add Menu and Widgets back at top level with some dashicons
  // Be careful not to give menu positions (array keys) that conflict with other menu items
  // TIP: print_r($menu); to see existing menu positions and also to check out the proper order of these array values. WP docu seems to list them in the incorrect order.
  $menu[31] = array( __( 'Menus', 'theme-slug' ), 'edit_themes', 'nav-menus.php', __( 'Menus', 'theme-slug' ), 'menu-top menu-nav', 'menu-nav', 'dashicons-menu');  

  $menu[32] = array( __( 'Widgets', 'theme-slug' ), 'edit_themes', 'widgets.php', __( 'Widgets', 'theme-slug' ), 'menu-top menu-nav', 'menu-nav', 'dashicons-admin-generic');

  $menu[33] = array( __( 'Editar Inicio', 'theme-slug' ), 'edit_themes', 'themes.php?page=options-framework', __( 'Theme Options', 'theme-slug' ), 'menu-top menu-nav', 'menu-nav', 'dashicons-admin-appearance');  
}
add_action( 'admin_menu', 're_sort_menu' );


/*------------------------------------*\
    ACTUALIZACIONES AUTO DE PLUGINS
\*------------------------------------*/
add_filter( 'auto_update_plugin', '__return_true' );


/*------------------------------------*\
    REMOVER LA VERSION DE WORDPRESS
\*------------------------------------*/
remove_action('wp_head', 'wp_generator');


/*------------------------------------*\
    DESACTIVAR MENSAJE DE ACTUALIZACION WP
\*------------------------------------*/
add_filter( 'auto_core_update_send_email', '__return_false' );