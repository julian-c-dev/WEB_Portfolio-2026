<?php
/**
 * SEO — meta description, Open Graph, Twitter Card, JSON-LD Person schema.
 *
 * @package portfolio_2026
 */

/**
 * Output SEO meta tags in <head>.
 */
function portfolio_2026_seo_head() {

	$site_name = get_bloginfo( 'name' );
	$site_url  = home_url( '/' );
	$settings  = function_exists( 'get_field' ) ? get_field( 'settings', 'option' ) : array();

	if ( is_front_page() ) {
		$hero_name   = $settings['hero_name'] ?? $site_name;
		$hero_role   = $settings['hero_role'] ?? '';
		$description = $settings['hero_summary'] ?? get_bloginfo( 'description' );
		$full_title  = $hero_role ? $hero_name . ' — ' . $hero_role : $hero_name;
		$url         = $site_url;
		$og_type     = 'profile';

		// Social URLs for sameAs in JSON-LD.
		$same_as = array_values(
			array_filter(
				array(
					$settings['social_media']['github'] ?? '',
					$settings['social_media']['linkedin'] ?? '',
					$settings['social_media']['codepen'] ?? '',
				)
			)
		);

	} else {
		$description = has_excerpt() ? wp_strip_all_tags( get_the_excerpt() ) : get_bloginfo( 'description' );
		$full_title  = get_the_title() ? get_the_title() . ' | ' . $site_name : $site_name;
		$url         = get_permalink() ?: $site_url;
		$og_type     = 'website';
		$same_as     = array();
	}

	// OG image: use the WordPress site icon if set.
	$og_image  = '';
	$site_icon = get_option( 'site_icon' );
	if ( $site_icon ) {
		$og_image = wp_get_attachment_image_url( $site_icon, 'full' );
	}

	?>
	<!-- Meta: Description -->
	<meta name="description" content="<?php echo esc_attr( $description ); ?>">

	<!-- Meta: Canonical -->
	<link rel="canonical" href="<?php echo esc_url( $url ); ?>">

	<!-- Open Graph -->
	<meta property="og:type"        content="<?php echo esc_attr( $og_type ); ?>">
	<meta property="og:url"         content="<?php echo esc_url( $url ); ?>">
	<meta property="og:title"       content="<?php echo esc_attr( $full_title ); ?>">
	<meta property="og:description" content="<?php echo esc_attr( $description ); ?>">
	<meta property="og:site_name"   content="<?php echo esc_attr( $site_name ); ?>">
	<?php if ( $og_image ) : ?>
	<meta property="og:image"       content="<?php echo esc_url( $og_image ); ?>">
	<meta property="og:image:alt"   content="<?php echo esc_attr( $full_title ); ?>">
	<?php endif; ?>

	<!-- Twitter Card -->
	<meta name="twitter:card"        content="<?php echo $og_image ? 'summary_large_image' : 'summary'; ?>">
	<meta name="twitter:title"       content="<?php echo esc_attr( $full_title ); ?>">
	<meta name="twitter:description" content="<?php echo esc_attr( $description ); ?>">
	<?php if ( $og_image ) : ?>
	<meta name="twitter:image"       content="<?php echo esc_url( $og_image ); ?>">
	<?php endif; ?>

	<?php if ( is_front_page() && ! empty( $settings ) ) : ?>
	<!-- JSON-LD: Person -->
	<script type="application/ld+json">
		<?php
		$schema = array(
			'@context' => 'https://schema.org',
			'@type'    => 'Person',
			'name'     => $settings['hero_name'] ?? $site_name,
			'jobTitle' => $settings['hero_role'] ?? '',
			'url'      => $site_url,
		);
		if ( ! empty( $same_as ) ) {
			$schema['sameAs'] = $same_as;
		}
		echo wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		?>
	</script>
	<?php endif; ?>

	<?php
}
add_action( 'wp_head', 'portfolio_2026_seo_head', 1 );
