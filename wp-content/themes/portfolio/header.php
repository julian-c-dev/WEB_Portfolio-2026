<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package portfolio_2026
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class( 'bg-slate-900' ); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site bg-slate-900">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'portfolio_2026' ); ?></a>

		<?php if ( ! is_front_page() ) : ?>
			<header id="site-header" class="site-header bg-white shadow-sm">
				<div class="max-w-container mx-auto px-4">
					<div class="flex justify-between items-center h-20">

						<?php // Logo / Site Title. ?>
						<div class="site-branding">
							<?php if ( has_custom_logo() ) : ?>
								<?php the_custom_logo(); ?>
							<?php else : ?>
								<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-2xl font-bold text-gray-900">
									<?php bloginfo( 'name' ); ?>
								</a>
							<?php endif; ?>
						</div>

						<?php // Primary Navigation. ?>
						<nav id="site-navigation" class="main-navigation hidden md:block">
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'primary',
									'menu_class'     => 'flex gap-8 m-0 list-none',
									'container'      => false,
									'fallback_cb'    => false,
								)
							);
							?>
						</nav>

						<?php // Mobile Menu Toggle. ?>
						<button id="mobile-menu-toggle" class="md:hidden p-2" aria-label="<?php esc_attr_e( 'Toggle menu', 'portfolio_2026' ); ?>">
							<?php echo wp_kses( portfolio_2026_svgs( 'menu' ), portfolio_2026_allowed_svg_tags() ); ?>
						</button>
					</div>

					<?php // Mobile Menu. ?>
					<div id="mobile-menu" class="md:hidden hidden pb-4">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'primary',
								'menu_class'     => 'flex flex-col gap-4 m-0 list-none',
								'container'      => false,
								'fallback_cb'    => false,
							)
						);
						?>
					</div>
				</div>
			</header>
		<?php endif; ?>

		<div id="content" class="site-content bg-slate-900">
			<div id="primary" class="content-area bg-slate-900">