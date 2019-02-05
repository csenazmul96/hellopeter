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
define('DB_NAME', 'betheme');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');
define('FS_METHOD','direct');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'T$rsMAt)pv^Ag%xV`[7&k,GUE#I-h]5p64Hz{U7]Ac_?-7hhs`#&;o)sUG/DGd4G');
define('SECURE_AUTH_KEY',  '9b!g*<huLym0SlIU7(IMglQ2*(O^y#@c_$)BGh_w~$^2cmy4LH6F1OOt#3u@;=Y$');
define('LOGGED_IN_KEY',    't)4Vng?F:3x0AMI9jCC3&O>cx1>Z `T0ulZJ`zT#XWN?5`Y2T,eiK2^1rNo:HouJ');
define('NONCE_KEY',        'RX9?R5Lys<Vu-[T*Hz7u,N^4~X6iHp59)/:FO-nz`fH((K`b9OsEp01vJVh]QZ7f');
define('AUTH_SALT',        '*w[Z17o{g^kh[|]X)[n~`odgpnszJhYP/8f@AUNgDI9,#1G J8`d^`{kK,YAd#~Y');
define('SECURE_AUTH_SALT', '#hx]~%TCVT!Dul:F+HOSFN}V^GnG=ab9Hn:y&Gz1wMAZaPLH~QDxy5I!I<c>w>65');
define('LOGGED_IN_SALT',   'Del8U;t:B$W4tG^PcW`&$9;wyGz%Gv[OB*HKV.q2;a5cQd@rs_P#W9N%?8/]cR-H');
define('NONCE_SALT',       'zh/Q#9bbh?(u>Ymgph14SF/W~091N#2Gy4#Gbp/R+t_v:qp<dpdeF%!4z%;M%lbO');

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
