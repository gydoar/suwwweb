<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'nombredetubasededatos');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'nombredeusuario');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'contraseña');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'um-bQTv$Z}-A+auV=zFr^rBIT#YaEJUVtXCO7;]& Z((Vju4+-JG:a87+<fBf.N0');
define('SECURE_AUTH_KEY',  'UcY+QqS%ur3+59:m+uim_CUtP_H@-Fl0%axr;daw%=Dv<?*+T72(r.kS>(yoGNet');
define('LOGGED_IN_KEY',    '6fF5>|J7{ag|S!NHcs0+Un0#?9[sI{hkk-+ZBx=$-92>I+l+Zi>tJ|PV^bYEuv{/');
define('NONCE_KEY',        'u+xC|@bW!JQZUr54Th,V^+%B!{lo.K?hik0Hw4XK=5`e$*^tWC:r-/aDgSK~-8o^');
define('AUTH_SALT',        '|+0|72o:+AxuN]}apj)F9+LGpM(i2<uUg?Pz$:JbUhs1}UBD|J~B[,.o-VMXh=kx');
define('SECURE_AUTH_SALT', '{iJ>({@=K7WA]@M`?ys?6zZwlR2Vyw@s%BS-/zzpA7^4J`Bb(n(NcgT|!}=tUY?g');
define('LOGGED_IN_SALT',   'r#N,izidM5pu0-U;/b9-B}U=u+ YM4!%k;<-#!vRgat1#NccR$p b-T>[9O?78[p');
define('NONCE_SALT',       '0J`|j2O=e]S79+]]<a=-td4t(=2?yF:nf3K=ZuCPDHH?ZQJygv{G8-we%#?2P8u^');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'sww_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);

/** Desactivar las reviones en cada post **/
define( 'WP_POST_REVISIONS', false ); 

/** Remplaza los permisos de archivos predeterminados en Wordpress **/
define ('FS_CHMOD_DIR', (0755 & ~ umask ()));
define ('FS_CHMOD_FILE', (0644 & ~ umask ()));

/** Vaciar la papelera esto incluye paginas, mensajes, comentarios, archivos adjuntos. **/
define( 'EMPTY_TRASH_DAYS', 0 ); 

/** Optimizacion automatica de la base de datos **/
define( 'WP_ALLOW_REPAIR', true );

/** Habilitar todas las actualizaciones básicas, incluyendo menores y mayores **/
define( 'WP_AUTO_UPDATE_CORE', true );

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');