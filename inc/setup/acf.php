<?php
/**
 * ACF functions and blocks.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package portfolio_2026
 * @since 1.0.0
 */

/**
 * Save ACF json.
 *
 * @param array $path Path to save ACF json.
 */
function portfolio_2026_acf_json_save_point( $path ) {
	$path = get_stylesheet_directory() . '/acf-json';
	return $path;
}
add_filter( 'acf/settings/save_json', 'portfolio_2026_acf_json_save_point' );

/**
 * Load ACF json.
 *
 * @param array $paths Path to load ACF json.
 */
function portfolio_2026_acf_json_load_point( $paths ) {
	unset( $paths[0] );
	$paths[] = get_stylesheet_directory() . '/acf-json';
	return $paths;
}
add_filter( 'acf/settings/load_json', 'portfolio_2026_acf_json_load_point' );


/**
 * Register gutenberg blocks (examples).
 *
 * IMPORTANT: These blocks are commented out because they don't have ACF field groups yet.
 * To use them:
 * 1. Create ACF field groups for each block in WordPress admin (Custom Fields → Field Groups)
 * 2. Set the location rule to show for each specific block
 * 3. The field groups will auto-save to acf-json/ folder
 * 4. Uncomment the register_block_type() lines below
 */
function portfolio_2026_acf_block_types() {
	// Example blocks - uncomment when you create the ACF field groups.
	// register_block_type( get_template_directory() . '/template-parts/blocks/hero' );
	// register_block_type( get_template_directory() . '/template-parts/blocks/carousel-manual-data' );
	// register_block_type( get_template_directory() . '/template-parts/blocks/content-form' );
	// register_block_type( get_template_directory() . '/template-parts/blocks/cta-banner' );
}

if ( function_exists( 'acf_register_block_type' ) ) {
	add_action( 'acf/init', 'portfolio_2026_acf_block_types' );
}


/**
 * Set allowed block types (limits which blocks appear in the editor).
 *
 * IMPORTANT: This function is commented out because the ACF blocks aren't registered yet.
 * Uncomment this when you've created your ACF field groups and registered the blocks above.
 *
 * This function restricts the editor to ONLY show the blocks listed here.
 * If you want to allow WordPress core blocks (paragraph, heading, etc.), add them too:
 * Example: 'core/paragraph', 'core/heading', 'core/image', etc.
 *
 * @param array $allowed_blocks array to allow blocks.
 */
/*
function portfolio_2026_allowed_block_types( $allowed_blocks ) {

	$allowed_blocks = array(
		'acf/hero',
		'acf/carousel-manual-data',
		'acf/content-form',
		'acf/cta-banner',
	);

	// Uncomment to also allow some WordPress core blocks:
	// 'core/paragraph',
	// 'core/heading',
	// 'core/image',
	// 'core/list',

	return $allowed_blocks;
}
add_filter( 'allowed_block_types_all', 'portfolio_2026_allowed_block_types', 25, 2 );
*/
