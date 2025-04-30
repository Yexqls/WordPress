<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress_db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '`ezSH[|X_:! &fVar6-^%{u,u3A0bC`RQVXuyF#F:?X|k~XWcbVO*i`NoIkZdB<-' );
define( 'SECURE_AUTH_KEY',  'vxD?F@btGf)DW5D`)aFh&ul9mq730hKHI/Y#0)Wb9KQ;Oes8udaln2_]vS4$vv{s' );
define( 'LOGGED_IN_KEY',    '**V{03j+FMqL4=2[q2;p3atcwxEv2Egb|q|ql]avchW$@ FxHF*UVokPhx&k5g*k' );
define( 'NONCE_KEY',        '_gtcE[hL4-=Hw=-6$E?1iK23s<Iq8]|F?R%kYnp(7q]0b#CT07.l~/c~Pkrf^GcD' );
define( 'AUTH_SALT',        '|WPR-8;MY!KY/]i  -@//Y6nN2Y9oh*Eg=U>gQoJSLzq{R2{|2D`l7L,M3p_eLtV' );
define( 'SECURE_AUTH_SALT', 'w?nua^,~e2@v@nXbbC/<A+}Ux+biA42U}VF4p;a|xtT75^[+L8]y#PtQ:TCjnI.=' );
define( 'LOGGED_IN_SALT',   '0l;Cs]2RX=)<CrmPk.e|4^62U}s,g1Lwz2PDCO,m>(`=,<jjv]`ugSuwYgI]?0!,' );
define( 'NONCE_SALT',       'O0V|@(|(OtsOn;r3!~dl(7F2DdM/wW)YnHw[Wvh#~,8:XXCEkCYs83^0:$$k?o2!' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'pp_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', true );
define( 'WP_DEBUG_LOG', true );
define( 'WP_DEBUG_DISPLAY', true );


/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
