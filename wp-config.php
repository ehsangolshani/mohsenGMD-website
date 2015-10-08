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
define('DB_NAME', 'GMD_wp_db');

/** MySQL database username */
define('DB_USER', 'wp_user');

/** MySQL database password */
define('DB_PASSWORD', '1234');

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
define('AUTH_KEY',         'B]z-qMn5<22_l*@b-O@>hyEH6hVqt6!=+.k$s7JH$) 4#,lQdNNxA10jOK.T1VE2');
define('SECURE_AUTH_KEY',  '|*$<kgP~}>NU%T?H/&~4(,^;FqUK>I:6xr%2@M9ZPfKAm:D?,<f``$7I5>]TH&1>');
define('LOGGED_IN_KEY',    ')!jd}vh:sIqUaAt8!FKjZaA1xlx^U82Qy((n&JzW%<YW;zhmpe0}+Q)(K*`bAPjI');
define('NONCE_KEY',        'D|d9@8&Vow#9PsW:qmAc#X~K?=n9^X;$QB5&#>`OFg8U)8c_ n63^{?I}bK8SqFQ');
define('AUTH_SALT',        'Em+M:K2d)S0Pr1&ZX{~a#bF-*V`rMzw>lAHzl)[2nYiuxvZ_E30P:c<^%iOBzE B');
define('SECURE_AUTH_SALT', '0QlU}9^5YTUDFRlI3dCI@I4qBJ5Wu8W&h(FlEuG&PRGp,0,=kQ +JTOx]ck:6P:Z');
define('LOGGED_IN_SALT',   't/(]+T*l/3ox<xl0<IkZ>o@n.Su[)5{JgdE9Vl sE~% =$Hg5wy.9DYMlC?xUBcL');
define('NONCE_SALT',       'OJp*kp&ouFMKWH,LK;HMR{*Nvt*:K}9fKRj?5v[y;](dP0&1r;Ic?,`-2 mv4++j');

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


define('FS_METHOD','direct');
define('WP_MEMORY_LIMIT', '100M');

