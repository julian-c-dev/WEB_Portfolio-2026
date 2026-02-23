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
			'before_title'  => '<h3 class="widget-title mk-text-lg mk-font-bold mk-mb-4">',
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
