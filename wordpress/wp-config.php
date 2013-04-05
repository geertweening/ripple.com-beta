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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'island');

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
define('AUTH_KEY',         ']b+T[~UT_Z,:3:GU:GW5^7(~viLq{NXV,I{(0~J#RQ~[r+<DQpTN%>JRH_)%DXQK');
define('SECURE_AUTH_KEY',  'E36qlqSksUHS+zb#(v]kOm[2`/_>I;|f$1c1P$aMwd]>3qOZ.GZIG`Yuj;R@q0Jq');
define('LOGGED_IN_KEY',    '3=1t7@eMXMQBmn*<T6xC.+[%_,y|sZm#zzQs%P_$v!i(_HzLQfeF+mA2TNxo{U$5');
define('NONCE_KEY',        'kX!>|JyG@TC}a~0@HX2zUiyFz$?cY3f+F1IZ8aEvkVHo=DiLoD-VaS{#Zu1KKRM4');
define('AUTH_SALT',        'b^.CQcpxH8bQ|km@{W&_[|3M:W{G=Kz~FIG+$=Ccxm[a]+d5%bw@4}af,2@qLy}F');
define('SECURE_AUTH_SALT', 'J*?SHb6wRRu^ROzT5ls,zhlBnzFzODnjEn)u33+=fmn/e/xoxbb$5yaeu>yUQjMb');
define('LOGGED_IN_SALT',   'Ik)jZm0KK#&/P@oHIfyydP=PVxJY?(!S5WsyuwyC?ND#P;VXZt5?+=gK9uw.I% f');
define('NONCE_SALT',       'tXi0Xj>BFef%:_:$( QvH0$CA@<F3AgrVcdrK=:E,PaaM$y1k2>hl63 o~:rvzbI');

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

/**
 * No editing from Wordpress 
 */
define ('DISALLOW_FILE_EDIT', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
