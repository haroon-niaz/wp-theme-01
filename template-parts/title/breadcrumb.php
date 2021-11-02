<?php
/**
 * Template part for displaying a post's breadcrumb.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

$item_type = get_post_type();
$elements  = wp_rig()->option( $item_type . '_title_element_breadcrumb' );
$args      = array( 'show_title' => true );
if ( isset( $elements ) && is_array( $elements ) ) {
	if ( isset( $elements['show_title'] ) && ! $elements['show_title'] ) {
		$args['show_title'] = false;
	}
}
wp_rig()->print_breadcrumb( $args );
