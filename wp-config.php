<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'bowman_riley');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '+x+j^^IwXW/h-||(|co+;GTNThYO2=jp&KpW|qXwNpgV|$_cqv3;:yye6#cq|lVg');
define('SECURE_AUTH_KEY',  'lq0iR.e+zaTw- s*Z+@D)%+y|+NCP<|~rwec$V4|W(jDU7sud/oU$S:*+ -}X zs');
define('LOGGED_IN_KEY',    'bsaMHq0Cm0eznzzB!wzzWMiLR!Rkt|5[SI:rc[Q/!No5D#<?lEK%@|XikS!)TA8y');
define('NONCE_KEY',        'kQ^-|-y>K$#b-mb.6V:R2Ph)9#{Uy&dJlEFCy2Z$}D5o+N082r2^s?v-!2(1gAC/');
define('AUTH_SALT',        'ha)[Mj$-:ZPWDCFm9ikHW8>RJr[EU-n|O3uK%_n]>s_FHW8NaH/l?:}KPfqegP_7');
define('SECURE_AUTH_SALT', '3Uzm;9Oi,gL](}[|bf2E2&dC8,Ob-=Z9j|UbUH+d2kui!R[gi:J31` :L)MQd{zU');
define('LOGGED_IN_SALT',   '1?=j8SV~3kZfzr9S4xQ66y>63z%fHRKZEGn%Do/@Toe4LRfN~:[J_|Wn *E(&f(I');
define('NONCE_SALT',       ';3Q+/2A]#DzWA+0c,`tWnX#>~NIR_l |sw*sfz6/uJ3lLjDby37ld lxY$M,s=wt');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
