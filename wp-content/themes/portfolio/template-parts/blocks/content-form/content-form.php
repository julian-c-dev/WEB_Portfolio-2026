<?php
/**
 * Block: Content / Form.
 *
 * @package portfolio_2026
 */

// Preview Image (Optional - add your own preview image).
// To add a preview: Create assets/dist/img/blocks/content-form.jpg.
// Uncomment the code below to enable preview in WordPress editor.
/*
if ( isset( $block['data']['preview_image_help'] ) && $block['data']['preview_image_help'] ) {
	echo '<img src="' . esc_url( get_template_directory_uri() . '/assets/dist/img/blocks/content-form.jpg' ) . '" style="width:100%; height:auto;" />';
	return;
}
*/

// ACF fields.
$heading        = get_field( 'heading' );
$desc           = get_field( 'desc' );
$cta            = get_field( 'cta' );
$layout         = get_field( 'layout' );
$form_shortcode = get_field( 'form_shortcode' );

// Block ID.
$block_id = 'content-form';
if ( ! empty( $block['anchor'] ) ) {
	$block_id = $block['anchor'];
}

// Additional classes.
$class_name = 'content-form';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

// Determine layout classes.
$layout_class = ( 'second' === $layout ) ? 'flex-col-reverse md:flex-row-reverse' : 'flex-col md:flex-row';
?>

<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $class_name ); ?> bg-white py-12 md:py-36">
	<div class="max-w-container mx-auto px-4">
		<div class="flex <?php echo esc_attr( $layout_class ); ?> md:items-start md:justify-between gap-6 md:gap-24">
			
			<div class="w-full md:w-[35%]">
				<?php if ( $heading ) : ?>
					<h2 class="text-primary-darker-title font-satoshi text-3xl font-medium mb-4">
						<?php echo esc_html( $heading ); ?>
					</h2>
				<?php endif; ?>

				<?php if ( $desc ) : ?>
					<p class="text-lg text-primary-darker mb-12 md:mb-14">
						<?php echo wp_kses_post( $desc ); ?>
					</p>
				<?php endif; ?>

				<?php if ( $cta ) : ?>
					<div class="text-left">
						<a href="<?php echo esc_url( $cta['url'] ); ?>" class="cta-btn" target="<?php echo esc_attr( $cta['target'] ); ?>">
							
							<?php echo esc_html( $cta['title'] ); ?>
							
							<!-- Default SVG -->
							<span class="cta-svg original">
								<?php echo wp_kses( empty_svgs( 'arrow-up-right-white' ), empty_allowed_svg_tags() ); ?>
							</span>

							<!-- Hidden SVG for animation -->
							<span class="cta-svg clone">
								<?php echo wp_kses( empty_svgs( 'arrow-up-right-white' ), empty_allowed_svg_tags() ); ?>
							</span>
						</a>
					</div>
				<?php endif; ?>
			</div>
			
			<div class="relative w-full md:w-1/2 pl-0">
				<?php if ( ! empty( $form_shortcode ) ) : ?>
					<?php echo do_shortcode( $form_shortcode ); ?>
				<?php endif; ?>
			</div>

		</div>
	</div>
</div>
