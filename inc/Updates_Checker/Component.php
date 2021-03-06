<?php
/**
 * WP_Rig\WP_Rig\Updates_Checker\Component class
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig\Updates_Checker;

use WP_Rig\WP_Rig\Component_Interface;
use function add_action;

/**
 * Class for Checking Updates.
 */
class Component implements Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'updates_checker';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		require_once __DIR__ . '/update-checker.php';
		add_action( 'admin_init', array( $this, 'update_checker' ) );
	}

	/**
	 * Check for Updates.
	 */
	public function update_checker() {
		$update_checker = \Puc_v4_Factory::buildUpdateChecker(
			'https://rtshub.com/rtshub-updates/update-server/?action=get_metadata&slug=wp_rig',
			get_template_directory(),
			'wp_rig'
		);
	}


}
