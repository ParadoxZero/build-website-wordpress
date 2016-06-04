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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'Build');

/** MySQL database password */
define('DB_PASSWORD', 'dragonslayer');

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
define('AUTH_KEY',         'UObj8{W.2isbHK@f|%VI4B.syXT%Vor7f,e0q/sH&JF1+=-l?&<fz5Wtj*JKi>sn');
define('SECURE_AUTH_KEY',  'hWQ7ZH4$3y[`rU,{&t~@ T5u,@_ok}Rv/}j}II.k*N]$vcD(aW&LOi|pf?@:VrL,');
define('LOGGED_IN_KEY',    'sEV(}l@p+~avPB+A,Yqu7$*)e!DH^!Jd:{2:E2.~&M(4~SiP,Laf9W[)|.53;aP6');
define('NONCE_KEY',        ' k4IqfoYzJ^j6YzB`V$jn_|+pCwtnda hh(H8Ub7gh*{~MI)W6xM7T5=7?s F_T<');
define('AUTH_SALT',        '#TFsFG/m>/` Er>Jz4zd-0u[,:$5o%tk^x!lgEUI~2VI.O0U@<8Sg)d3k:N-ff2E');
define('SECURE_AUTH_SALT', '&GR7=tt9e}{*l~^A(nBc[pJRlOB )o|N>KLfN]WpSH6gt$Jo-S-$P8ZA]p3ope=k');
define('LOGGED_IN_SALT',   'C6(r)7utG5%(J3Z-#.x.j0OpV|~qv7IE`(_<M(kG:dQ,qiSOKbIf9M<vi&wv3mcz');
define('NONCE_SALT',       'Mt!1_flj#*Yy}iQ++K;6br#5n+~h`];m??UgGJx{fc(Ea?!0@oeow]Ci]7TsI,#X');

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
