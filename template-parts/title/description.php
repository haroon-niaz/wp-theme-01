<?php
/**
 * Template part for displaying a search.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

if ( function_exists( 'is_bbpress' ) && is_bbpress() ) {
	echo '<div class="title-entry-description bbp-forum-content">';
	bbp_forum_content();
	echo '</div><!-- .title-entry-description -->';
} else {
	echo '<div class="title-entry-excerpt">';
	the_excerpt();
	echo '</div><!-- .title-entry-excerpt -->';
}
