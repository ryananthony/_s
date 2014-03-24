<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package flannel_s
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function flannel_s_jetpackflannel_setup() {
	add_themeflannel_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'afterflannel_setup_theme', 'flannel_s_jetpackflannel_setup' );
