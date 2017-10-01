<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package LMS_Showcase
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function lms_showcase_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'lms_showcase_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function lms_showcase_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'lms_showcase_pingback_header' );
