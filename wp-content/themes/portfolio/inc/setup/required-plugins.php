<?php
/**
 * Required Plugins Configuration using TGM Plugin Activation.
 *
 * @package portfolio_2026
 * @since 1.0.0
 */

require_once get_template_directory() . '/inc/lib/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'portfolio_2026_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 */
function portfolio_2026_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// ACF Pro desde archivo ZIP local.
		array(
			'name'     => 'Advanced Custom Fields PRO',
			'slug'     => 'advanced-custom-fields-pro',
			'source'   => get_template_directory() . '/plugins/advanced-custom-fields-pro.zip',
			'required' => true,
			'version'  => '',
		),

		// Ejemplos de plugins desde el repositorio de WordPress.org (descomenta para usar):
		/*
		array(
			'name'     => 'Contact Form 7',
			'slug'     => 'contact-form-7',
			'required' => false,
		),
		*/

	);

	/*
	 * Array of configuration settings.
	 */
	$config = array(
		'id'           => 'portfolio_2026',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
		'strings'      => array(
			'page_title'                      => __( 'Install Required Plugins', 'portfolio_2026' ),
			'menu_title'                      => __( 'Install Plugins', 'portfolio_2026' ),
			'installing'                      => __( 'Installing Plugin: %s', 'portfolio_2026' ),
			'updating'                        => __( 'Updating Plugin: %s', 'portfolio_2026' ),
			'oops'                            => __( 'Something went wrong with the plugin API.', 'portfolio_2026' ),
			'notice_can_install_required'     => _n_noop(
				'This theme requires the following plugin: %1$s.',
				'This theme requires the following plugins: %1$s.',
				'portfolio_2026'
			),
			'notice_can_install_recommended'  => _n_noop(
				'This theme recommends the following plugin: %1$s.',
				'This theme recommends the following plugins: %1$s.',
				'portfolio_2026'
			),
			'notice_ask_to_update'            => _n_noop(
				'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
				'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
				'portfolio_2026'
			),
			'notice_ask_to_update_maybe'      => _n_noop(
				'There is an update available for: %1$s.',
				'There are updates available for the following plugins: %1$s.',
				'portfolio_2026'
			),
			'notice_can_activate_required'    => _n_noop(
				'The following required plugin is currently inactive: %1$s.',
				'The following required plugins are currently inactive: %1$s.',
				'portfolio_2026'
			),
			'notice_can_activate_recommended' => _n_noop(
				'The following recommended plugin is currently inactive: %1$s.',
				'The following recommended plugins are currently inactive: %1$s.',
				'portfolio_2026'
			),
			'install_link'                    => _n_noop(
				'Begin installing plugin',
				'Begin installing plugins',
				'portfolio_2026'
			),
			'update_link'                     => _n_noop(
				'Begin updating plugin',
				'Begin updating plugins',
				'portfolio_2026'
			),
			'activate_link'                   => _n_noop(
				'Begin activating plugin',
				'Begin activating plugins',
				'portfolio_2026'
			),
			'return'                          => __( 'Return to Required Plugins Installer', 'portfolio_2026' ),
			'plugin_activated'                => __( 'Plugin activated successfully.', 'portfolio_2026' ),
			'activated_successfully'          => __( 'The following plugin was activated successfully:', 'portfolio_2026' ),
			'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'portfolio_2026' ),
			'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'portfolio_2026' ),
			'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'portfolio_2026' ),
			'dismiss'                         => __( 'Dismiss this notice', 'portfolio_2026' ),
			'notice_cannot_install_activate'  => __( 'There are one or more required or recommended plugins to install, update or activate.', 'portfolio_2026' ),
			'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'portfolio_2026' ),
			'nag_type'                        => 'updated',
		),
	);

	tgmpa( $plugins, $config );
}
