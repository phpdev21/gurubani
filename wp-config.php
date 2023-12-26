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

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'gurbani' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
define( 'FS_METHOD', 'direct' );


/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '9|DTN<Wu%Th#/oLl/T9sk:%62+ds*f2} /_YfuZfpsf)0N1PYRD-Fd^/{_jwp^@r' );
define( 'SECURE_AUTH_KEY',  'Nm:p*3oV36%K-]%D1JmyW/05hfKYNKKewj%y.$2YOp1y3)TgAEh$r@$zcPI(.+]s' );
define( 'LOGGED_IN_KEY',    'ujH>8].@}YHmkUAW(*^m2npn&c=6V{6p1ocr%N0v|>-,zr[gQ/vg D>_]?y97c^V' );
define( 'NONCE_KEY',        'cA*htk<[w<twfF(e4R$=lZ,5I L-;FHXL,I8!liZ%TS%w1L)&XN~ua]SmEO &>sa' );
define( 'AUTH_SALT',        'y|XDKl{8-+}ixtS|e^o)2>T(c/@CT%U0M/Hwtk~f,*(/~pX-QX#pIkrby.SPY2_j' );
define( 'SECURE_AUTH_SALT', '(6zrE1RurX cXVG0~NosJ]rO_8S`q1+a7Zx)o1q+UexKl5`|sBb:gQ:5m8w]H[<Q' );
define( 'LOGGED_IN_SALT',   'HsZ8OW>4a1n5?Q-3TnN!CIYQEGBu!=2Zp>h))`1Tn;)6ROx&Dw^_xFLc<`pAi7Lr' );
define( 'NONCE_SALT',       't>7[ATiN!!(N)&q}D!||g;Z jRFZJe9RN%d#{kj<3gz]V9c3[o9S6yILP//N{OK%' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
