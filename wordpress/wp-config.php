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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'nomura' );

/** MySQL database password */
define( 'DB_PASSWORD', '8tWJM8mz' );

/** MySQL hostname */
define( 'DB_HOST', 'db' );

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
define( 'AUTH_KEY',         '|ok}P:hu#NVbX3L2J^PY5bqmp.4kf]n,hjlt19xZ.ZW(v4u<k.x =o((l)34=,#/' );
define( 'SECURE_AUTH_KEY',  'j>4a4ER.fFoKHl#fnQ^viN=s}U;b`7cOK;V-(TRX,s8j.P;}PNgv#A2M{#;9iW:e' );
define( 'LOGGED_IN_KEY',    ',z?)^9+R5_V78DGI-;C#{g=^2GVg?S03k~z<j+txRZ9basJLb#ck5pquZBLbaCG3' );
define( 'NONCE_KEY',        '2ek.}wtPzyBqqI,R{)vG;Wcv0?>aQW8qHDwy@GL+O_Xv7}]U+8&l<NuR%%keN`eR' );
define( 'AUTH_SALT',        'MjD`CX&sr;-Ag(H|b/EJ%tL8^c}4Sx5.+N%;&e/zy$;=Q t[4n#7P!/G~#6fAgd$' );
define( 'SECURE_AUTH_SALT', '51-i{9.@Vm?E_jW=F}3;$Peiu+VuzH0A8kZ6nuYCYr,jzYQG]YK!(~R1lWpmX0)+' );
define( 'LOGGED_IN_SALT',   'rU!+]%-KvYqH.P2/tg9B%N)$Dd,Mp^X,Sp/~tPU[asPl:~ w1gImsDJ+c,G]+Baj' );
define( 'NONCE_SALT',       '*eNIyiYD^A4|f)1mHOl~@z^0M/BrSQu?j%E7GV;|pzv1Za <:g(x9~!X2lq^ x4y' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

# --- SSL 強制設定 ---
if (
    (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') ||
    (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ||
    (isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == 443)
) {
    $_SERVER['HTTPS'] = 'on';
}

define('FORCE_SSL_ADMIN', true);
define('WP_HOME', 'https://nomurakamotsu.jp');
define('WP_SITEURL', 'https://nomurakamotsu.jp');



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

