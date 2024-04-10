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

// Load Composer’s autoloader
require_once (__DIR__.'/content/vendor/autoload.php');

// Move the location of the content dir
define('WP_CONTENT_DIR', dirname(__FILE__).'/content');

$s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
$sp = strtolower($_SERVER["SERVER_PROTOCOL"]);
$protocol = substr($sp, 0, strpos($sp, "/")) . $s;
$port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);
define('WP_CONTENT_URL', $protocol."://".$_SERVER["SERVER_NAME"].$port."/content");

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_pkg' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'e6~ cj@5#Hn[J$@G;USo+2Y(UY{5@H(}ad0:jyIA!KgPSC<~m# 0LFg9}fWdIH*`' );
define( 'SECURE_AUTH_KEY',  '1 b,GB1<2BwLDO{aftK4b.?DD7@81?UFXk6bNnjX-ZfN&ak%<VOzoKM]FV;i.-iP' );
define( 'LOGGED_IN_KEY',    'XM6#%Xm`s}kEnl5L1d^24m,u]yIXbA4pC8QNtrTBtYxxD=:8q^MXX?0$K_ptXt],' );
define( 'NONCE_KEY',        'g+YYumv12D>w|OxxrN.#,-vseHq`F!#>`6VU}-@$/Y$40o xRI;d-@7cUW,~K1W7' );
define( 'AUTH_SALT',        'MIYLkY^Rv>L9!SWN<v:QvWyl[} (..Bg(AxE~L8h2A5agZjmr1].KBd4,FauPC4*' );
define( 'SECURE_AUTH_SALT', '!HOPI;2Z>v }WXS5N@!c;lYTEcS<`JwoW:pOFDleJ;DD>SR2[$dW..kv-`U$_E==' );
define( 'LOGGED_IN_SALT',   '>$:ZOvqN.9)<P;` k`&eZHd_KMZSYG[g$Ff[+Wx*<4yHR}$=jAT^|44./U]t$].V' );
define( 'NONCE_SALT',       'D][Z)_mlw#w}X<xpUQ.syKO#DW]F;W-POS3zsmyhfLi F)S_<~/y[,Hl_f|Sh~t ' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', 0 );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
