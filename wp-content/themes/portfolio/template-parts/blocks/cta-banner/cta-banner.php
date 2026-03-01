<?php
/**
 * Block: CTA Banner.
 *
 * @package portfolio_2026
 */

// Preview Image (Optional - add your own preview image).
// To add a preview: Create assets/dist/img/blocks/cta-banner.jpg.
// Uncomment the code below to enable preview in WordPress editor.
/*
if ( isset( $block['data']['preview_image_help'] ) && $block['data']['preview_image_help'] ) {
	echo '<img src="' . esc_url( get_template_directory_uri() . '/assets/dist/img/blocks/cta-banner.jpg' ) . '" style="width:100%; height:auto;" />';
	return;
}
*/

// ACF fields.
$text              = get_field( 'text' );
$cta               = get_field( 'cta' );
$theme             = get_field( 'theme_colour' );
$background        = get_field( 'background' );
$image_id          = get_field( 'image' );
$remove_top_margin = get_field( 'remove_top_margin' );

// Block ID.
$block_id = 'cta-banner';
if ( ! empty( $block['anchor'] ) ) {
	$block_id = $block['anchor'];
}

// Additional classes.
$class_name = 'cta-banner';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}

// Theme classes.
$text_color_class = ( 'dark' === $theme ) ? 'text-white' : 'text-primary';
$bg_color_class   = ( 'dark' === $theme ) ? 'bg-gradient-layered' : 'bg-grey-light';
$cta_button_class = ( 'dark' === $theme ) ? 'cta-btn cta-btn--white' : 'cta-btn';

// Top margin class.
$margin_top_class = $remove_top_margin ? 'pt-0' : 'pt-16 md:pt-24';
?>

<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( "$class_name w-full bg-white pb-16 md:pb-24 $margin_top_class " ); ?>">
	<div class="flex justify-center">
		<div class="relative w-full max-w-container mx-auto px-4">

			<div class="max-w-container 
			<?php
			echo esc_attr(
				'solid' === $background
					? "$bg_color_class rounded-lg"
					: 'relative overflow-hidden rounded-lg'
			);
			?>
			">

				<?php if ( 'image' === $background && $image_id ) : ?>
					<?php
					echo wp_get_attachment_image(
						$image_id,
						'large',
						false,
						array(
							'class' => 'absolute inset-0 w-full h-full object-cover z-0 rounded-lg',
						)
					);
					?>
					<div class="absolute inset-0 z-10 max-w-container px-4"></div>
				<?php endif; ?>

				<div class="relative z-20 max-w-container mx-auto gap-12 md:gap-[64px] px-4 md:px-[64px] py-16 md:py-[80px]">
					<div class="<?php echo esc_attr( $text_color_class ); ?> flex flex-col md:flex-row items-center justify-between gap-12">
						<?php if ( $text ) : ?>
							<?php if ( 'dark' === $theme ) : ?>
								<div class="default-insight-card_content text-center md:text-start px-4 py-8 md:px-12 md:py-16 text-1xl md:text-3xl font-bold w-full md:w-3/4">
									<?php echo wp_kses_post( $text ); ?>
								</div>
							<?php else : ?>
								<div class=" text-center md:text-start text-1xl md:text-3xl font-bold w-full md:w-3/4">
									<?php echo wp_kses_post( $text ); ?>
								</div>
							<?php endif; ?>
						<?php endif; ?>

						<?php if ( $cta ) : ?>
							<a href="<?php echo esc_url( $cta['url'] ); ?>" class="<?php echo esc_attr( $cta_button_class ); ?>" target="<?php echo esc_attr( $cta['target'] ); ?>">
								<?php echo esc_html( $cta['title'] ); ?>
								<?php if ( 'dark' === $theme ) : ?>
									<span class="cta-svg original">
										<?php echo wp_kses( empty_svgs( 'arrow-up-right-primary-darker' ), empty_allowed_svg_tags() ); ?>
									</span>
									<span class="cta-svg clone">
										<?php echo wp_kses( empty_svgs( 'arrow-up-right-primary-light' ), empty_allowed_svg_tags() ); ?>
									</span>
								<?php else : ?>
									<span class="cta-svg original">
										<?php echo wp_kses( empty_svgs( 'arrow-up-right-white' ), empty_allowed_svg_tags() ); ?>
									</span>
									<span class="cta-svg clone">
										<?php echo wp_kses( empty_svgs( 'arrow-up-right-white' ), empty_allowed_svg_tags() ); ?>
									</span>
								<?php endif; ?>
							</a>
						<?php endif; ?>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
