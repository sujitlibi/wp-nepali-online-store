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
define( 'DB_NAME', 'db_onlinestore' );

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
define( 'AUTH_KEY',         '}vvrTFvmXqy60~Be<In$](^T~iA_`kV@4/^tOiDZ20=jCjU#Fws^E6e3ktYe818z' );
define( 'SECURE_AUTH_KEY',  '<U]bUT4hF=CqwM42;A[[0(6R|@@@yqg.C&q>mo>K<]maF%SLjV&X8Be%Rb?uZw@.' );
define( 'LOGGED_IN_KEY',    'CN,bhBd:(-$Tmv>Nt%a02L&&;T5|IsfSbBb_*9R)KcD85]g:i:;}8.`]wmS_I#@V' );
define( 'NONCE_KEY',        'X%(tY9jH[h)Nh*rd>{Ly:FR%dWVF]1p*%SJvRPo*q%O+unK2G4}P%@zaGLB8L|3Z' );
define( 'AUTH_SALT',        ';^N72ET$%=Z[4L@p^:0~J5Qwm9l=D?Jp0O?{fB}QCqPW |o6`pgdCgxo1$bh*+pY' );
define( 'SECURE_AUTH_SALT', '3Vk9AZi0co=C^,G~SNX>B;)pTvm;AE6e03?}LS9ys(0Bze_Z&=(2|aE*Svg91p6O' );
define( 'LOGGED_IN_SALT',   'OTUe2Q2}|!Ql icaJ-KtCl_2#zk{*C^*[HN9]%%U~B:JBsl8mfP;*yn8&_41I8>/' );
define( 'NONCE_SALT',       ':PbnvxL2C4nw|hX^& bWQbw|kpxRt8=v6[4AO[2+:l$=&LAneri{EVurN4U+!v3,' );

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
define('FS_METHOD', 'direct');


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
