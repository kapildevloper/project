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
define( 'DB_NAME', 'somali' );

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
define( 'AUTH_KEY',         '>i~11,joH$WW~M$hL lW+0]oXH5v;vE5-Ahk==JA0SZT3U/iP{1^Uvq-6J);pp-]' );
define( 'SECURE_AUTH_KEY',  'Rmph]6[_9F3-[p!5BUnG%3ZRQz8DoFOz^w8)y+KleC{R8/T(UDr86*HT&KF:yk6:' );
define( 'LOGGED_IN_KEY',    '5h) :2pJM6[;bO9h7RtQ[#B0/E5$wjd7LOq2x:}23ZEr+:c=>3La^RV9H~K.iV2E' );
define( 'NONCE_KEY',        't|z]+ P<u:ZviE6W@M.CeQW|LH90CbPJ9QWV?w PiXNH((ZNfuy:5P]5BW >s-;T' );
define( 'AUTH_SALT',        'CTqDnL*?uG<EAINh$]*tbl eIf%DlZgBl1#_pqnf}H-LY^Qm m*T``x&t^yc}H:n' );
define( 'SECURE_AUTH_SALT', 'M1*~c:nr*|0AA$rjH`3-bbU !LhW/:x#Zqypt674LceuVZ4c5rES:lcA7jqmB-8T' );
define( 'LOGGED_IN_SALT',   '*$FSTDwc;MKeI&~*THS_ro1M9Jj[u[$LL99Jo+^?B<a)?<u/@thp)L)#Tk|V|Sn}' );
define( 'NONCE_SALT',       '_=OM2T-h2d#vn%7yBo79Xn%-<wm|@OS pEE)q?cbYxua)XI0Lp)KlC^krS v&[ =' );

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
