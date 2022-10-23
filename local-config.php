<?php
/*
This is a sample local-config.php file
*/

// use function Env\env;
define('DB_NAME', $_ENV['DB_NAME']);
define('DB_USER', $_ENV['DB_USER']);
define( 'DB_PASSWORD', $_ENV['DB_PASSWORD'] );
define( 'DB_HOST', $_ENV['DB_HOST'] ); 

define('AUTH_KEY',         $_ENV['AUTH_KEY']);
define('SECURE_AUTH_KEY',  $_ENV['SECURE_AUTH_KEY']);
define('LOGGED_IN_KEY',    $_ENV['LOGGED_IN_KEY']);
define('NONCE_KEY',        $_ENV['NONCE_KEY']);
define('AUTH_SALT',        $_ENV['AUTH_SALT']);
define('SECURE_AUTH_SALT', $_ENV['SECURE_AUTH_SALT']);
define('LOGGED_IN_SALT',   $_ENV['LOGGED_IN_SALT']);
define('NONCE_SALT',       $_ENV['NONCE_SALT']);

define('WP_HOME', $_ENV['WP_HOME']);
define('WP_SITEURL', $_ENV['WP_SITEURL']);

ini_set('display_errors', '1');

// Enable plugin and theme updates and installation from the admin
define('DISALLOW_FILE_MODS', false);