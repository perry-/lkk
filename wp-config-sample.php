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
define('DB_NAME', 'wp_lkk');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', 'utf8_unicode_ci');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '@f1kG(aVS|+5pBl,E}+4{:Z*@&:;n`-+WSur`h(WSf$FH-YtE##2a>6( bUQtb8B');
define('SECURE_AUTH_KEY',  '2&mZyIHj6Y|gB.s*m1dV(j2=lcTbba?YT< tR:@x!VC+>k^rGVnAKm07MxFb}1at');
define('LOGGED_IN_KEY',    'QRz3S]-OY4!EI /d#Kh`|>H|CI[w._UU?mi?g|VvCpu,Y{)~9ZH}ex<?`cE9}I0l');
define('NONCE_KEY',        'xnbw1uP%X8op&EiI&HlM</[mi,AitI|HR-,=P7yy9.XM)l(~+;0%+ ;9vt1I);IO');
define('AUTH_SALT',        'hH=@kJ-ha1t+kB$xvwR@UDU=PO-ycDHT#n~3Yb@#02{i~ETV(]U7zPN0)<5VzlE1');
define('SECURE_AUTH_SALT', '?1c()Xiol$64B|hV|CmVp89Tjxm*Q.v:N^[.y=7L![bh%yJ>LFkb~AOcOuu24RD)');
define('LOGGED_IN_SALT',   'Vg4 P|vTl-?yH`@xZb.0jvM]W/,L+oD-|CKD~Vj+h!U}t6Sug>xis44!poUC|T(F');
define('NONCE_SALT',       'ol+_-a^R;/]1l3_VBEKhcY>GRB_)dNdHt#M-YSJ $leqm(K2$vnb,6NV*dF`N.N ');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'kkwp_';

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

/**
 * Local dev stuff
 */
$wpe_all_domains=array ( 0 => 'localhost', );
define( 'WP_SITEURL', 'http://localhost' );
define( 'WP_HOME',    'http://localhost' );
define( 'WPLANG',     '' );


/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

$_wpe_preamble_path = null; if(false){}
