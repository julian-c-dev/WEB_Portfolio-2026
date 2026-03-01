<?php
/**
 * Enqueue scripts and styles.
 *
 * @package portfolio_2026
 * @since 1.0.0
 */

/**
 * Frontend scripts and styles.
 */
function portfolio_2026_enqueue_assets() {
	if ( file_exists( get_template_directory() . '/assets/dist/css/app.css' ) ) {
		$css_version = filemtime( get_template_directory() . '/assets/dist/css/app.css' );
		wp_enqueue_style( 'portfolio_2026-style', get_template_directory_uri() . '/assets/dist/css/app.css', array(), $css_version );
	}

	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'alpine-js', 'https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js', array(), '3.12.0', true );
	wp_enqueue_script( 'app-script', get_template_directory_uri() . '/assets/dist/js/app.js', array( 'jquery' ), '1.0', true );
}
add_action( 'wp_enqueue_scripts', 'portfolio_2026_enqueue_assets' );

/**
 * Admin scripts and styles.
 */
function portfolio_2026_enqueue_admin_assets() {
	if ( file_exists( get_template_directory() . '/assets/dist/css/admin.css' ) ) {
		wp_enqueue_style( 'portfolio_2026-admin-style', get_template_directory_uri() . '/assets/dist/css/admin.css', array(), wp_get_theme()->get( 'Version' ) );
	}
}
add_action( 'admin_enqueue_scripts', 'portfolio_2026_enqueue_admin_assets' );
