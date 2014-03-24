<?php
/**
 * flannel_s Theme Customizer
 *
 * @package flannel_s
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function flannel_s_customize_register( $wp_customize ) {
	$wp_customize->getflannel_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->getflannel_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->getflannel_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'flannel_s_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function flannel_s_customize_preview_js() {
	wp_enqueueflannel_script( 'flannel_s_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'flannel_s_customize_preview_js' );
