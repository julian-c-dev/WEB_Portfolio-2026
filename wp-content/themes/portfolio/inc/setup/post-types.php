<?php
/**
 * Custom post type functions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package portfolio_2026
 * @since 1.0.0
 */

/**
 * Register Custom Post Types for Portfolio
 */
function portfolio_2026_register_post_types() {

	/**
	 * Skills CPT
	 */
	register_post_type(
		'skill',
		array(
			'labels'       => array(
				'name'          => __( 'Skills', 'portfolio_2026' ),
				'singular_name' => __( 'Skill', 'portfolio_2026' ),
				'add_new'       => __( 'Add New Skill', 'portfolio_2026' ),
				'add_new_item'  => __( 'Add New Skill', 'portfolio_2026' ),
				'edit_item'     => __( 'Edit Skill', 'portfolio_2026' ),
				'all_items'     => __( 'All Skills', 'portfolio_2026' ),
			),
			'public'       => true,
			'has_archive'  => false,
			'show_in_rest' => false,
			'menu_icon'    => 'dashicons-star-filled',
			'supports'     => array( 'title', 'editor', 'thumbnail' ),
			'rewrite'      => array( 'slug' => 'skills' ),
		)
	);

	/**
	 * Experience CPT
	 */
	register_post_type(
		'experience',
		array(
			'labels'       => array(
				'name'          => __( 'Experience', 'portfolio_2026' ),
				'singular_name' => __( 'Experience', 'portfolio_2026' ),
				'add_new'       => __( 'Add New Experience', 'portfolio_2026' ),
				'add_new_item'  => __( 'Add New Experience', 'portfolio_2026' ),
				'edit_item'     => __( 'Edit Experience', 'portfolio_2026' ),
				'all_items'     => __( 'All Experience', 'portfolio_2026' ),
			),
			'public'       => true,
			'has_archive'  => false,
			'show_in_rest' => false,
			'menu_icon'    => 'dashicons-businessperson',
			'supports'     => array( 'title', 'thumbnail' ),
			'rewrite'      => array( 'slug' => 'experience' ),
		)
	);

	/**
	 * Projects CPT
	 */
	register_post_type(
		'project',
		array(
			'labels'       => array(
				'name'          => __( 'Projects', 'portfolio_2026' ),
				'singular_name' => __( 'Project', 'portfolio_2026' ),
				'add_new'       => __( 'Add New Project', 'portfolio_2026' ),
				'add_new_item'  => __( 'Add New Project', 'portfolio_2026' ),
				'edit_item'     => __( 'Edit Project', 'portfolio_2026' ),
				'all_items'     => __( 'All Projects', 'portfolio_2026' ),
			),
			'public'       => true,
			'has_archive'  => false,
			'show_in_rest' => false,
			'menu_icon'    => 'dashicons-portfolio',
			'supports'     => array( 'title', 'thumbnail' ),
			'rewrite'      => array( 'slug' => 'projects' ),
		)
	);
}
add_action( 'init', 'portfolio_2026_register_post_types' );

/**
 * Register Skill Category taxonomy
 */
function portfolio_2026_register_taxonomies() {

	register_taxonomy(
		'skill_category',
		'skill',
		array(
			'labels'            => array(
				'name'          => __( 'Skill Categories', 'portfolio_2026' ),
				'singular_name' => __( 'Skill Category', 'portfolio_2026' ),
				'add_new_item'  => __( 'Add New Category', 'portfolio_2026' ),
				'edit_item'     => __( 'Edit Category', 'portfolio_2026' ),
				'all_items'     => __( 'All Categories', 'portfolio_2026' ),
			),
			'hierarchical'      => false,
			'public'            => false,
			'show_ui'           => true,
			'show_in_rest'      => true,
			'show_admin_column' => true,
			'rewrite'           => false,
		)
	);
}
add_action( 'init', 'portfolio_2026_register_taxonomies' );

/**
 * Create default skill category terms if they don't exist.
 * Runs once on theme activation.
 */
function portfolio_2026_create_default_skill_categories() {

	$categories = array(
		array(
			'name' => 'Programming Languages',
			'slug' => 'programming-languages',
		),
		array(
			'name' => 'Frameworks & Libraries',
			'slug' => 'frameworks-libraries',
		),
		array(
			'name' => 'WordPress Development',
			'slug' => 'wordpress-development',
		),
		array(
			'name' => 'Code Quality',
			'slug' => 'code-quality',
		),
		array(
			'name' => 'Tooling',
			'slug' => 'tooling',
		),
	);

	foreach ( $categories as $cat ) {
		if ( ! term_exists( $cat['slug'], 'skill_category' ) ) {
			wp_insert_term( $cat['name'], 'skill_category', array( 'slug' => $cat['slug'] ) );
		}
	}
}
add_action( 'after_switch_theme', 'portfolio_2026_create_default_skill_categories' );
