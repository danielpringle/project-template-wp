<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */
require_once __DIR__ . '/vendor/autoload.php';


/**
 * Use Dotenv to set required environment variables and load .env file in root
 */
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

/**
 * Set up our global environment constant and load its config first
 * Default: production
 */
define('WP_ENV', $_ENV['WP_ENV'] ?: 'production');

/**
 * Load database settings and environment specific parameters
 */
define( 'WP_LOCAL_SERVER', file_exists( dirname( __FILE__ ) . '/local-config.php' ) );
define( 'WP_DOCKSAL_SERVER', file_exists( dirname( __FILE__ ) . '/local-docksal-config.php' ) );
define( 'WP_PRODUCTION_SERVER', file_exists( dirname( __FILE__ ) . '/production-config.php' ) );

if ( WP_LOCAL_SERVER && $_ENV['WP_ENV']==='development'){
	include( dirname( __FILE__ ) . '/local-config.php' );
} elseif ( WP_DOCKSAL_SERVER && $_ENV['WP_ENV']==='docksal'){
	include( dirname( __FILE__ ) . '/local-docksal-config.php' );
} elseif ( WP_PRODUCTION_SERVER && $_ENV['WP_ENV']==='production'){
	include( dirname( __FILE__ ) . '/production-config.php' );
} else {
	define( 'DB_NAME', 'database_name_here' );
	define( 'DB_USER', 'username_here' );
	define( 'DB_PASSWORD', 'password_here' );
	define( 'DB_HOST', 'localhost' );

	define( 'AUTH_KEY',         'put your unique phrase here' );
	define( 'SECURE_AUTH_KEY',  'put your unique phrase here' );
	define( 'LOGGED_IN_KEY',    'put your unique phrase here' );
	define( 'NONCE_KEY',        'put your unique phrase here' );
	define( 'AUTH_SALT',        'put your unique phrase here' );
	define( 'SECURE_AUTH_SALT', 'put your unique phrase here' );
	define( 'LOGGED_IN_SALT',   'put your unique phrase here' );
	define( 'NONCE_SALT',       'put your unique phrase here' );
}

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Custom Content Directory
 */
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/app' );
// define( 'WP_CONTENT_URL', 'https://' . $_SERVER['HTTP_HOST'] . '/wp-content' );
//  define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/wp-content' );
define( 'WP_CONTENT_URL', $_ENV['WP_HOME'] . 'app' );

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = $_ENV['DB_PREFIX'] ?: 'wp_';

/**
 * Debugging Settings
 */
if ( $_ENV['WP_ENV']==='development' || $_ENV['WP_ENV']==='development' ) {

    define( 'WP_DEBUG', true );
    define( 'WP_DEBUG_LOG', true ); // Stored in wp-content/debug.log
    define( 'WP_DEBUG_DISPLAY', true );
    define( 'SCRIPT_DEBUG', true );
    define( 'SAVEQUERIES', true );
}  else {
    define( 'WP_DEBUG', false );
	define( 'WP_DEBUG_LOG', false ); // Stored in wp-content/debug.log
    define( 'WP_DEBUG_DISPLAY', false );
    define( 'SCRIPT_DEBUG', false );
	ini_set('display_errors', '0');
}

/**
 * Bootstrap WordPress
 */
if ( !defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/wp/' );
require_once( ABSPATH . 'wp-settings.php' );

