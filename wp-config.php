<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link https://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'cn_database');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'eHkpjRr>qL2WeG6z*^XD{~8]|!!ZEgL;9!9dPy?;JZyFOUda7<8GU$?qj%$Iz=o>');
define('SECURE_AUTH_KEY',  '/v^+nZ3v>1D7}P]O% 3qtMs<Pk]gUQ4^ITy,-k16`|bs3I2B?bZiWDhb~j)^z(dL');
define('LOGGED_IN_KEY',    '7H>sG(z-!)(hVt[dK;>E.ck1{J eG`U?+$|fE?m#HB?r^j4FzXmKC++5zBut+M8/');
define('NONCE_KEY',        '$n16!2_8%4QiHF+H;}U8-&/6-dC2}}4UK2au}:/G>AA^Xc2Zpbf=I{2|4&Vv5M5<');
define('AUTH_SALT',        'Hc:+67<IB+Ack>5E2lD^?HJ{5GCmRA`+;X}#kUG`AL%=m]9evd;.,2c$KX/oAn|/');
define('SECURE_AUTH_SALT', '[1Yj)bDP{tG~GSR i{OUR/T-d)a$J!R./a0K}3#b9r}bC%q2dCf*U9[tJCLM7zS`');
define('LOGGED_IN_SALT',   '<&IQ+hdG J_tn7&L1pPbe.x&z(oHXD2I_WDOXewGnDYI/8j=/w1zrFa9/4rX1l7|');
define('NONCE_SALT',       'EiBP2SN8-?Cd@JTPY#m3P+{` {^#TXq#n.Z)[>RK|x%aW];B2UgBqmqNm<3j5iY5');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'cn_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', TRUE);
define('WP_DEBUG_DISPLAY', TRUE); // mostra o erro na tela
define('WP_DEBUG_LOG', FALSE); // grava no log wp-content/debug

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

