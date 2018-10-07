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
define('DB_NAME', 'webone');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ').E:,f{Ke&_H73+-p4L{.3G.I]3^e5`L}O4=?o|O.,RX:KlYW->w73pG#KEc41Tl');
define('SECURE_AUTH_KEY',  '+#d?eSM]^Kz7}?8%3h_S+@,|%S.k5Y.qd),rg.EpyXNrN_^*EZ2BL]k@jAqU;<eK');
define('LOGGED_IN_KEY',    'VG XXJK|>~?l ?S+UjJ..;gjX|jbh%G;Sh.`xYAMS>LxX,5<30H:,QtdSnNiQ.7f');
define('NONCE_KEY',        'aN#!M#$8V+c?<#u9XstxPQ1I3#RwO}(v0k1?QoZM!iSsX#Z>*37:RBeQ=$2`n{fd');
define('AUTH_SALT',        'au6P^Jh4[apgLxWL{f=:jsLm%57ekSbgp[S*}x%vK1PH|}A,O/_V#_DW^8[~UB>J');
define('SECURE_AUTH_SALT', '9Y[t#lZvCuJ7MTq]tZIBviEW0C0e BH5HY=YXHLa}>H#^A=]CO68_ 4M|3r@;?Hx');
define('LOGGED_IN_SALT',   'P_ZSOlb:Y$#(MRFaImiAjD!$SNGIUH8tlEs_jXw^/{{c9>$.ku}.(g+2<I9(;7bc');
define('NONCE_SALT',       'b]aMgZ`S!QvU,r;zI.CSU?@6mM&pe*3!lB}UV-/sB/Si$ANi^icJw[JA_&6a%:fy');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
