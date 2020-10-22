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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'madrecbd' );

/** MySQL database username */
define( 'DB_USER', 'madrerdsadmin' );

/** MySQL database password */
define( 'DB_PASSWORD', 'rdsadmin$#1234' );

/** MySQL hostname */
define( 'DB_HOST', 'database-1.casbuckcqo4b.us-east-2.rds.amazonaws.com' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'dS)24[lgD)d UTX%b6x`<8&fpivbAI:u:tk`MgwbZB2jSb1j,RZ8}5VMk D_xN1L' );
define( 'SECURE_AUTH_KEY',  'Hpp<8tT`-2{X#H}WkUni2XVJ^~KBAL:t3eZBGZ?BX~)+<w? %lZlr{dQd95<p:zQ' );
define( 'LOGGED_IN_KEY',    '3ASGhV5vc~|t$]cp{ysh,<h/C(e8ezQI]%XXp@AQf2+l^uPjx47Q1!a1WWb+I)[1' );
define( 'NONCE_KEY',        '/MPoC%<j9w5yh_fm1t6/k$GRE>nu>54]PhGNb}}ZBy}.5IKvEL{fm}Vu5*v&xn%v' );
define( 'AUTH_SALT',        'Y*`P>DR^OgFrTMLF8<tQJT~n{>6$_y^I;vQF,PWl-4O%`mC8WVp+Y!**-Q1XiRJm' );
define( 'SECURE_AUTH_SALT', 'YGA>[O-=`G#];d?A &e{R}L;NoZkxdA>|CWU5FIJ6z088OL:4<F~M0ylF(B#Za;[' );
define( 'LOGGED_IN_SALT',   '1%U;N4E|Ve?]^1WL+9MWXixKBl,U#~9*#4;m!,Zz3LP(yqBcBT*MvY_KC7{x6G%A' );
define( 'NONCE_SALT',       'S7-{YLkUa=>==2uPeK>N=h(_X1>Q>w<+ar&LE2XoQzjL}_(.=[5KYO?;D%<]:pxy' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
define('FS_METHOD','direct');

