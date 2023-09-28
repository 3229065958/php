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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress1' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1:3308' );

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
define( 'AUTH_KEY',         '0RU;_;Bl=Zh6q*>N(>$i-v/Bs}}},2LjJS2Vyv+eq}rf^8pF~t3t| Gsv84~Bx4?' );
define( 'SECURE_AUTH_KEY',  '3KkK09(`:_3tY#;^M$CGr,(?,uIB1&Ihv.KKvDCiDP4cS}A?}K j`e93Z%8A1Y}3' );
define( 'LOGGED_IN_KEY',    'Lh|^{_.BXE?}cGU}WEv}S8_).r_p[6+i? Ib_J87Pa~=s9]mfeF[Pd:C[ktu&=>3' );
define( 'NONCE_KEY',        'mGnSq-Hl5XA_p-Ag1dTJYgm8o3p>}P]fPM]&]hCgj}#;dV?gYxX^>b~o<>6gyu m' );
define( 'AUTH_SALT',        '.sYkg*n&9y5{rgydS)71(s-|B_ZC+~0xXyw{VJf!Wh]N{y,f6Bv5fs,Mmy8Wrd:Y' );
define( 'SECURE_AUTH_SALT', '^z>&<#:O=(ta}+9qbx+#.1ju;0[e@f K@RXT!g()]C=bdfPM(xK/r?S5#P#XD}:b' );
define( 'LOGGED_IN_SALT',   'sg}plm&`@rp2XG!]f}6[6G0OHM.aZxu{3Lu6hGi6U*z+pp@u&da4%G[thH[dE+e_' );
define( 'NONCE_SALT',       'GfEDg)c`D)H<ZBXsT!U~hh@[}n4tuof/}0Ur+2z(gD]=9H7Xb=fzBKH kY%>b`Yj' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
