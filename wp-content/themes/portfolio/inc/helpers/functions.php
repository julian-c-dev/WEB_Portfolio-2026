<?php
/**
 * Theme functions.
 *
 * @package portfolio_2026
 * @since 1.0.0
 */

/**
 * Theme setup.
 */
if ( ! function_exists( 'portfolio_2026_setup' ) ) :
	/**
	 * Theme setup.
	 */
	function portfolio_2026_setup() {

		add_theme_support( 'custom-logo' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary Menu', 'portfolio_2026' ),
				'footer'  => esc_html__( 'Footer Menu', 'portfolio_2026' ),
			)
		);

		add_theme_support(
			'html5',
			array(
				'search-form-feature',
				'gallery',
				'caption',
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'portfolio_2026_setup' );

/**
 * Register widget areas.
 */
function portfolio_2026_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'portfolio_2026' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here to appear in your footer.', 'portfolio_2026' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title text-lg font-bold mb-4">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'portfolio_2026_widgets_init' );

/**
 * Remove comments from admin.
 */
function portfolio_2026_remove_admin_menus() {
	remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'portfolio_2026_remove_admin_menus' );

/**
 * Remove comment support.
 */
function portfolio_2026_remove_comment_support() {
	remove_post_type_support( 'post', 'comments' );
	remove_post_type_support( 'page', 'comments' );
}
add_action( 'init', 'portfolio_2026_remove_comment_support', 100 );

/**
 * Maps a skill name to a color family based on its technology relationship.
 *
 * @param string $skill_name The skill name.
 * @return string Color family key.
 */
function portfolio_2026_skill_color_family( $skill_name ) {
	$name = strtolower( $skill_name );

	$js_keywords = array( 'javascript', 'jquery', 'react', 'next', 'eslint', 'webpack', 'gulp', 'expo', 'astro', 'node', 'typescript' );
	foreach ( $js_keywords as $kw ) {
		if ( strpos( $name, $kw ) !== false ) return 'amber';
	}

	if ( strpos( $name, 'html' ) !== false ) return 'orange';

	$css_keywords = array( 'css', 'sass', 'scss', 'tailwind', 'bootstrap' );
	foreach ( $css_keywords as $kw ) {
		if ( strpos( $name, $kw ) !== false ) return 'sky';
	}

	$php_keywords = array( 'php', 'wordpress', 'gutenberg', 'woocommerce', 'acf', 'ajax', 'composer', 'wpcs', 'custom theme', 'custom post', 'taxonom', 'coding standard', 'sql', 'elementor', 'custom plugin' );
	foreach ( $php_keywords as $kw ) {
		if ( strpos( $name, $kw ) !== false ) return 'violet';
	}

	$git_keywords = array( 'git', 'husky', 'hook' );
	foreach ( $git_keywords as $kw ) {
		if ( strpos( $name, $kw ) !== false ) return 'teal';
	}

	return 'slate';
}

/**
 * Returns Tailwind classes for a given color family.
 *
 * @param string $family Color family key.
 * @return string CSS classes.
 */
function portfolio_2026_skill_classes( $family, $hover_reveal = false ) {
	if ( $hover_reveal ) {
		$base = 'bg-slate-400/10 text-slate-400 ring-slate-400/20 transition-colors duration-200 ';
		$map  = array(
			'amber'  => $base . 'group-hover:bg-amber-400/10 group-hover:text-amber-300 group-hover:ring-amber-400/20',
			'orange' => $base . 'group-hover:bg-orange-400/10 group-hover:text-orange-300 group-hover:ring-orange-400/20',
			'sky'    => $base . 'group-hover:bg-sky-400/10 group-hover:text-sky-300 group-hover:ring-sky-400/20',
			'violet' => $base . 'group-hover:bg-violet-400/10 group-hover:text-violet-300 group-hover:ring-violet-400/20',
			'teal'   => $base . 'group-hover:bg-teal-400/10 group-hover:text-teal-300 group-hover:ring-teal-400/20',
			'slate'  => $base . 'group-hover:bg-slate-400/10 group-hover:text-slate-300 group-hover:ring-slate-400/20',
		);
	} else {
		$map = array(
			'amber'  => 'bg-amber-400/10 text-amber-300 ring-amber-400/20',
			'orange' => 'bg-orange-400/10 text-orange-300 ring-orange-400/20',
			'sky'    => 'bg-sky-400/10 text-sky-300 ring-sky-400/20',
			'violet' => 'bg-violet-400/10 text-violet-300 ring-violet-400/20',
			'teal'   => 'bg-teal-400/10 text-teal-300 ring-teal-400/20',
			'slate'  => 'bg-slate-400/10 text-slate-300 ring-slate-400/20',
		);
	}
	return $map[ $family ] ?? $map['slate'];
}

/**
 * Add class option to menu items.
 *
 * @param array $classes menu classes.
 * @param array $item menu items.
 * @param array $args menu arguments.
 */
function portfolio_2026_add_additional_class_on_li( $classes, $item, $args ) {
	if ( isset( $args->add_li_class ) ) {
		$classes[] = $args->add_li_class;
	}
	return $classes;
}
add_filter( 'nav_menu_css_class', 'portfolio_2026_add_additional_class_on_li', 1, 3 );
