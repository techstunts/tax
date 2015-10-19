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
define('DB_NAME', 'returnkaro');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'Y9qc.F>NbNkfo`VK3#u6uW66-)j+cW``sqZ{3-uIp6)]ZKkMbX{&GhnaBd2_#JfY');
define('SECURE_AUTH_KEY',  '3Ze%I]XRA]>~/]p!0H(B-T+EX~7f[uk(l3RDGf?zQ~s*:G|f|JTgv!SO?-iC;}he');
define('LOGGED_IN_KEY',    '53c$T#ZO.}`Fy&|x68=~I.-g<EcebTRJ,{r~9K3XW&}H((2wp9djuY(ewuHqq|Yr');
define('NONCE_KEY',        'NY#WXIzT3B=A^QE@avy%62NR6R$%L;pF)q8*z)&j^?Wqw6Q_zacNl[!b~Z,+YPi.');
define('AUTH_SALT',        'wkA_[lF[]#UcN$,I7cgitlhI; u+lm<X5GZQtNM~,d-,10Y)3X--YWLYeR2kbL#L');
define('SECURE_AUTH_SALT', 'xU2![B}x@Be6YUB: GQ|j/uDt=KjtctmI).z|T.w&l-S|25R3pybc9AWX/5g8Hgh');
define('LOGGED_IN_SALT',   '$yBk9Ug-4Fh;RFRz+~%bLLS#As4Gh#RlHx+{T$P]INkD{D}qnG8q+O*6isE#N9]n');
define('NONCE_SALT',       '6ZTmYDmE!rR!g%M.c-,v1HI;`i/bzX=WWL3i<xR&]eYce1[LN7/V6WL:Dy&]ky0$');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
