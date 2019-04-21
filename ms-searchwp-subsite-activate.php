<?php
/**
 * Activate SearchWP on Subsite
 *
 * @author      Per Soderlind
 * @copyright   2019 Per Soderlind
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: Activate SearchWP on Subsite
 * Plugin URI: https://github.com/soderlind/ms-searchwp-subsite-activate
 * GitHub Plugin URI: https://github.com/soderlind/ms-searchwp-subsite-activate
 * Description: When you create a subsite, automatically activate the SearchWP plugin and enable its license fot the subsite.
 * Version:     0.0.1
 * Network:     true
 * Author:      Per Soderlind
 * Author URI:  https://soderlind.no
 * Text Domain: ms-searchwp-subsite-activate
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

namespace Soderlind\Multisite\SearchWP;

! defined( 'ABSPATH' ) and exit;
if ( ! defined( 'SEARCHWP_LICENSE_KEY' ) ) {  // in wp-config.php: define( 'SEARCHWP_LICENSE_KEY', 'my-license-key-goes-here' );
	return;
};

\add_action( 'admin_init', __NAMESPACE__ . '\searchwp_activate', 9 );

/**
 * Activate the SearchWP plugin on the new subsite.
 */
\add_action(
	'wpmu_new_blog',
	function( $blog_id, $user_id, $domain, $path, $network_id, $meta ) {
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
		$plugin = 'searchwp/searchwp.php';
		\switch_to_blog( $blog_id );
		if ( file_exists( ABSPATH . PLUGINDIR . '/' . $plugin ) ) {
			$result = \activate_plugin( $plugin );
		}
		\restore_current_blog();
	},
	90,
	6
);

/**
 * Activate SearchWP
 *  - Activate license.
 *  - Tell SearchWP to work with the default generated config on install.
 *  - Run the SearchWP indexer on the default index.
 */
function searchwp_activate() {
	if ( false === get_option( 'soderlind_searchwp_license_activated', false ) && defined( 'SEARCHWP_LICENSE_KEY' ) && class_exists( '\SearchWP_License' ) ) {
		\update_option( 'soderlind_searchwp_license_activated', true );

		$swp_license = new \SearchWP_License();
		$swp_license->activate( SEARCHWP_LICENSE_KEY );
		\searchwp_set_setting( 'initial_settings', true );
		\SWP()->trigger_index();
	}
}
