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
define('DB_NAME', 'ID220762_lcie');

/** MySQL database username */
define('DB_USER', 'ID220762_lcie');

/** MySQL database password */
define('DB_PASSWORD', 'kuleuven007');

/** MySQL hostname */
define('DB_HOST', 'mysql131.hosting.combell.com:3306');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');


define('WP_HOME','http://lcie.dev');
define('WP_SITEURL','http://lcie.dev');


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ' (J=a,3`82`]aHn4#v^s?3hY?en~7~,]iG.3<p7=r(*I?jOP,J09wo-xto,/X^^2');
define('SECURE_AUTH_KEY',  '<{7+vc%Xs3Gr~}QP`I|fqMh;^P!Z4+yt?r4TH]^;s2V#JP!oSfB649nJZw]nYcbK');
define('LOGGED_IN_KEY',    'uNt0!bwUiO:BoJ|4X<kWS$$|^kT)oq+JSU Z&lY[r7 `]x=b{%qAJAcS;7I1e`/0');
define('NONCE_KEY',        'QUK+cLD7%g8^$2/Oc+gUgj9,16vz{L1A-(piJ=U_1u]I>0Xn1Jv4EU+q}AMeFqrv');
define('AUTH_SALT',        'Yxh?AG+L((376}:}5lkTPPnC;Z9~7ku_.B&gjzz$Sm!+H?VVSok&9l%=EaStQI3T');
define('SECURE_AUTH_SALT', ',>Wi%H&0YMl5F,49>mVTD$0>)O<7)4ev`m<MQmMz%VZdV38{wAPep4v|.D^kcw_-');
define('LOGGED_IN_SALT',   'NeK~4yP_qk#Q3y;#O(aI~kt(ZJHqzWN,aO_9wM}aM1w~}QJpl)^~xn()A%R1bmBm');
define('NONCE_SALT',       'D@ILvl3^rj+6^*gRyJcQ=qRjd;Dl&SCaS;.)){U*1(`g{[*PhZ}r$[=T)*>m-)rD');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'test_';

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
define('WP_DEBUG', true);

define('WP_ALLOW_MULTISITE', true);
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', true);
define('DOMAIN_CURRENT_SITE', 'lcie.dev');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

define( 'WP_DEFAULT_THEME', 'lcie_subsite' );



/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
