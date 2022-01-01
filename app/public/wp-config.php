<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '8eit74lnCga8dQSr+X43Mn9Axi/H3HcRNTSEmKti2UpE61tYhgcy4c59cML7ePs8M9NYcKx724kxICK5PJ/fPQ==');
define('SECURE_AUTH_KEY',  'DJgaYxW77sTaswxB11ee3+bE6f4kESCdI+l6RSh1W9l7pAxZ98d8YM9W3cQ37YPgOoBkrFtFlkPDWlrWJNICwg==');
define('LOGGED_IN_KEY',    'kZffNxEVpR5dW1TSrtW7S9PqEtPeNhC5TS7vCfblH54HRBeplqBF87D5MVs7qkF++iKxMhvzwOe0Ev6ExQtITA==');
define('NONCE_KEY',        '0dO7flC5XYP0Mpt++VqTQVI+r/U04gjLvq6dAYaAF7SEiLVku0fvTFJ1cFV35o5MNS9MIIxSyUH3l6EW4HRM4g==');
define('AUTH_SALT',        'j6P2oRDFJ60dFiiA5qritAvgmq1SrRLXj4FCnrm3XiIEPHlbWU/YnWK7G1iWyQsSao2/7pq1EriULPrPxM6s8w==');
define('SECURE_AUTH_SALT', 'l45YUqSvkc+po+cK2dKic/WQ7gKzvz3zvXCUScKg8O1h+3zpI2Ods6AdEbkAPJqQm8HxhEOZLTRiahaNH5NTzQ==');
define('LOGGED_IN_SALT',   'YUeBaG410ZqveOu/DNlxLPl24yk34P5XDm+MaM7Y9ooo70kH5sspwvow2T5zjRHyGDdjFbWRMaiCK25y6bCW4A==');
define('NONCE_SALT',       'ivXeLRwuMxfoRFvmh007+ds7NDBJQC0Ot1Xp1kAXbM3pJHmGdVVB5jDaV8D0/F9gyAAEDab8Y+8yj45gA/pLTw==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
