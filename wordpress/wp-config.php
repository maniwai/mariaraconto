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
define( 'DB_NAME', '_mariaraconto01' );

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
define( 'AUTH_KEY',         '35#l}.6omx}kl)-[diTYh<SYK8v<Q#M2Se=|jp0ZC$dBhvYrMfYGXNcUWu!&tR;t' );
define( 'SECURE_AUTH_KEY',  '93Yhd6?lO_IT;[|>@x(f5??,V3?3Q]Gldbf{&T~EYw[zo+4V0Rj*(Nu^#D$;%l[n' );
define( 'LOGGED_IN_KEY',    '=,cpddl^Cyc3S/qy{%b*l(LP;]>`T5RGN3k(4^d!i@h#Og0%c}}&@D0pn#?0GXbO' );
define( 'NONCE_KEY',        'tLJ]~%pahuRsmL_|W-EJMB%A/xtykhc{=sU03]gZ_;Qf+pyg!`?<2|q<D2]8-,3J' );
define( 'AUTH_SALT',        'JqZU7/KGT,(%CeH39I].FOWO;0buS:DKU~($W?o5Zf*aQ*/6](WG&]r|.cy,4$&%' );
define( 'SECURE_AUTH_SALT', '!d@XKu>YhT9gDO]jdgN6n.9@hMCIMicqEFW|,5KPy>I07vZ R4,3%w14@J.2Jiyq' );
define( 'LOGGED_IN_SALT',   'pK,b0kXF[FYYiPcG[8lX!x.`}Uyr.n8-I+-p|3#J00tgU?ei];k+c*r<ua$b$M_J' );
define( 'NONCE_SALT',       '_t<(CC/$|pQg=[rgeo[}7GPEk0hUu4mQ03_q!@=dQLl`Tu@J@q}STAd^Zd~eR7/Y' );

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
