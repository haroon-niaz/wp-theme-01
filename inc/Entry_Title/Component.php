<?php
/**
 * WP_Rig\WP_Rig\Entry_Title\Component class
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig\Entry_Title;

use WP_Rig\WP_Rig\Component_Interface;
use WP_Rig\WP_Rig\Templating_Component_Interface;
use function add_action;
use function apply_filters;
use function WP_Rig\WP_Rig\wp_rig;
use function get_template_part;

/**
 * Class for adding custom title area support.
 *
 * Exposes template tags:
 * * `wp_rig()->render_title()`
 */
class Component implements Component_Interface, Templating_Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'entry_title';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		//add_filter( 'wp_rig_title_elements_default', array( $this, 'maybe_add_defaults' ), 10, 2 );
	}
	/**
	 * Gets template tags to expose as methods on the Template_Tags class instance, accessible through `wp_rig()`.
	 *
	 * @return array Associative array of $method_name => $callback_info pairs. Each $callback_info must either be
	 *               a callable or an array with key 'callable'. This approach is used to reserve the possibility of
	 *               adding support for further arguments in the future.
	 */
	public function template_tags() : array {
		return array(
			'render_title' => array( $this, 'render_title' ),
		);
	}

	/**
	 * Adds support to render header columns.
	 *
	 * @param string $post_type the name of the row.
	 * @param string $area the name of the area.
	 */
	public function render_title( $post_type = 'post', $area = 'normal' ) {
		$elements = wp_rig()->option( $post_type . '_title_elements' );
		if ( isset( $elements ) && is_array( $elements ) && ! empty( $elements ) ) {
			foreach ( $elements as $item ) {
				if ( wp_rig()->sub_option( $post_type . '_title_element_' . $item, 'enabled' ) ) {
					$template = apply_filters( 'wp_rig_title_elements_template_path', 'template-parts/title/' . $item, $item, $area );
					get_template_part( $template );
				}
			}
		} else {
			get_template_part( 'template-parts/title/title' );
		}
	}
}
