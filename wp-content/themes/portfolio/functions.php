<?php
/**
 * Theme functions and definitions for portfolio_2026.
 *
 * This file contains the primary functions for enqueuing
 * styles and scripts, and other essential theme setup.
 *
 * @package portfolio_2026
 */

/**
 * Enqueue theme styles and scripts.
 *
 * This function adds the main stylesheet and any additional
 * scripts required for the theme.
 */

/**
 * Include essential theme files.
 * This function loads the necessary files for the theme setup (from the 'inc' directory).
 */
function portfolio_2026_include_files() {
	$files = array(
		'setup/required-plugins.php', // Required plugins configuration.
		'setup/enqueue.php',          // Scripts and styles.
		'setup/acf.php',              // ACF related functions and blocks.
		'setup/post-types.php',       // Custom Post Type related functions.
		'helpers/functions.php',      // Extra utility functions.
		'helpers/svgs.php',           // SVG Icons class.
		'admin/admin.php',            // Admin related functions.
	);

	foreach ( $files as $file ) {
		require get_template_directory() . "/inc/{$file}";
	}
}
portfolio_2026_include_files();


/**
 * Add custom styles to ACF admin.
 */

add_action(
	'acf/input/admin_head',
	function () {
		?>
	<style>
		.acf-field-accordion > .acf-label {
			background-color: #3202DE !important;
			color: white !important;
			font-weight: bold;
		}
	</style>
		<?php
	}
);


/**
 * Allow JSON uploads.
 *
 * @param array $mimes Existing list of allowed mime types.
 * @return array Updated list of allowed mime types.
 */
function portfolio_2026_allow_json_uploads( $mimes ) {
	$mimes['json'] = 'application/json';
	return $mimes;
}
add_filter( 'upload_mimes', 'portfolio_2026_allow_json_uploads' );
