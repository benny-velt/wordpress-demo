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

/**
 * Heroku ClearDB (MySQL) config
 */

if ( getenv('CLEARDB_DATABASE_URL') ) {
	$db_url = parse_url(getenv('CLEARDB_DATABASE_URL'));
} else {
	$db_url = parse_url(getenv('DATABASE_URL'));
}

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', trim($db_url['path'], '/'));

/** MySQL database username */
define('DB_USER', $db_url['user']);

/** MySQL database password */
define('DB_PASSWORD', $db_url['pass']);

/** MySQL hostname */
define('DB_HOST', $db_url['host']);

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', 'utf8mb4_general_ci');

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
define( 'AUTH_KEY',         'Jnz/Vn~zd8wEe>LfB$whP&Bdf|N[@)2@Li7+ eIc+&=KY,0e?.zahEpt:2,u:p1c' );
define( 'SECURE_AUTH_KEY',  '>tGWCw~lPhtn4.P79 g7VNI9m}# hglbz:m!.^h<fGW-T}/O^7p%%g.;p{JwDzLx' );
define( 'LOGGED_IN_KEY',    'wZisH4=2:pzGO:a#]0HOH)-9KaR`-S){v]tt4amoeHuT.,JQjcIV,jRiTuse/iLB' );
define( 'NONCE_KEY',        'u2vU6@Dvx:Gm/}W@us`M(l*hL>`E,eHa,KK-M?AT+~G;)P&_!9~L5g+f[P;Sl/-B' );
define( 'AUTH_SALT',        ';5/]0tIH<b% Y2;(pDMF#-tz3c.RIg#c9Ei/sg8YO*P;Ux+;p6^<H3[l-@}:]m`c' );
define( 'SECURE_AUTH_SALT', 't)O3U|[wF.rH1K7N9^;JP3LdAJ Wvd5=$?:l?g>eLlAp{mC9]fLxDz1_b2,&wS[D' );
define( 'LOGGED_IN_SALT',   's0fT`*6Ve^:AfM-Hf79Et;sJX7C,>#Adxv&:7ze.pvz5sYq-]$kK@)VqHZYa_n5t' );
define( 'NONCE_SALT',       'fS;0-EX}6y]UR4Ks$MXbCTpt|/i;pgna){(>mcwF^LH y(!/Jx/l%xJl(k#^=V[Z' );

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

/* Upgrade HTTP to HTTPS */

if (isset($_SERVER["HTTP_X_FORWARDED_PROTO"] ) && "https" == $_SERVER["HTTP_X_FORWARDED_PROTO"] ) {
	$_SERVER["HTTPS"] = "on";
}

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
