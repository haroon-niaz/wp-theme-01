<?php
/**
 * Template part for displaying a post's title
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

do_action( 'wp_rig_single_before_entry_title' );
the_title( '<h1 class="entry-title">', '</h1>' );
do_action( 'wp_rig_single_after_entry_title' );
