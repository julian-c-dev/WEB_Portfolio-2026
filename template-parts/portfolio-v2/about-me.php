<?php
/**
 * About Me Section - Minimalist Style.
 *
 * @package portfolio_2026
 */

$settings   = get_field( 'settings', 'option' );
$about_text = $settings['about'] ?? '';
?>

<div class="about-content">
	<?php if ( $about_text ) : ?>
		<div class="space-y-4 text-slate-400 leading-relaxed">
			<?php echo wp_kses_post( $about_text ); ?>
		</div>
	<?php endif; ?>
</div>
