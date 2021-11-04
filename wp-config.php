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
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'ss-oct-challenge' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         'f]54hQ^ZciqnMM/hMY:H{6hhFHLJks}xCGsrs%1!}5[@0NemiQE^?t#:ep2y[ZG-' );
define( 'SECURE_AUTH_KEY',  'zn2f^=;[yibcP`LvjIdG&(7vJlco-eh:-8Hf8@Mib~ofZIy`D$rj0Un!MUcwE;[Z' );
define( 'LOGGED_IN_KEY',    '9!<M3LY8Jf)S4[?h{[9F@XIT#-IJZeRLWOhpdr1wpaA1f 2II(&l$vcJf(oa#chU' );
define( 'NONCE_KEY',        'NB`4$;uMtYYf3N/Es#rySc@#7~Ds:>bFK#`y?j&/$kKD>-?P&b3gADCL|cv%p&ED' );
define( 'AUTH_SALT',        '#GsLtR}nbpPbWjAUkwykQMx4Jz,l}%qXYJiTLrcF*[RM:kXD3RNz37&l?MzVC[;~' );
define( 'SECURE_AUTH_SALT', '2n[JbWH}#+lf)@.(5p]d&}+vaR.UvU+s:6uu;>-o+OJ>hFWZ7~Q6$$;zjDD{r]sF' );
define( 'LOGGED_IN_SALT',   '6r13Lk/):bY=xs9,3xK7HFX!E.k)uPz~Y9 k#UojUz*XgvfL5T<lR? |Sjw}.<Q5' );
define( 'NONCE_SALT',       'XU$d~<=LA%QEAOy=:+~u]J1*s,u-dr&L-Ia4nRfe*lv1Cu{VD`%S0fvsc!8w5p.<' );

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
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
