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
define('DB_NAME', 'boukler_wp');

/** MySQL database username */
define('DB_USER', 'boukler_wp');

/** MySQL database password */
define('DB_PASSWORD', 'me0*6$c)RtC4');

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
define('AUTH_KEY',         'z]}T.x6#sZ%.N{OUWJv6_sTA~(^8/<TV0$loVUtXI4eMp+LK.Qe&Wz^W<ecdZn*_');
define('SECURE_AUTH_KEY',  '~4^^_y+(r(C=Z&fll5$RSU_t&RLl/[Q>$`&EaE/ okJ.f}i(5ZeUlh afi!R$G4{');
define('LOGGED_IN_KEY',    'l>V.aWR5]WaKu9A*&;@XA%upTrX3<y[7qj8r}[f Oz!9?,r6yr}W(0,89UD(9k*B');
define('NONCE_KEY',        '?;8FbW!mfv^`@#@&~<0/T(*30{En)N, R2w.EVS/a3e`gY#;Gl-qpL0)I#n19LhT');
define('AUTH_SALT',        '3.W{N/V52[$G~4/nC<sAz]/YY>z>_XDA~Vf{T.ED2q/1TJHT}l,J;9_#tkz$ec^g');
define('SECURE_AUTH_SALT', 'k=#pZs@)7z1~O#.S|j(Du:Kg2QFUVG4SW^MV%`*.]P(~Bo#Boe!+p;VdA(xe8uu2');
define('LOGGED_IN_SALT',   'q@tmRD_bIoH F &T/`a!<cSUd&,rzD%-`E_8Ne_5/|>XX8f}BoP3V?6ZSIa5Mmtt');
define('NONCE_SALT',       '/ZVA^IP`e xW@eL`nn;gz.`Y:ecV*_%)bD^#,K>$S9}e_v-JG!.*ByyW5:Z,$Trw');

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
