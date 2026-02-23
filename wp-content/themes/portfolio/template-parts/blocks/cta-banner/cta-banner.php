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
$text_color_class = ( 'dark' === $theme ) ? 'mk-text-white' : 'mk-text-primary';
$bg_color_class   = ( 'dark' === $theme ) ? 'mk-bg-gradient-layered' : 'mk-bg-grey-light';
$cta_button_class = ( 'dark' === $theme ) ? 'cta-btn cta-btn--white' : 'cta-btn';

// Top margin class.
$margin_top_class = $remove_top_margin ? 'mk-pt-0' : 'mk-pt-16 md:mk-pt-24';
?>

<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( "$class_name mk-w-full mk-bg-white mk-pb-16 md:mk-pb-24 $margin_top_class " ); ?>">
	<div class="mk-flex mk-justify-center">
		<div class="mk-relative mk-w-full mk-max-w-container mk-mx-auto mk-px-4">

			<div class="mk-max-w-container 
			<?php
			echo esc_attr(
				'solid' === $background
					? "$bg_color_class mk-rounded-lg"
					: 'mk-relative mk-overflow-hidden mk-rounded-lg'
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
							'class' => 'mk-absolute mk-inset-0 mk-w-full mk-h-full mk-object-cover mk-z-0 mk-rounded-lg',
						)
					);
					?>
					<div class="mk-absolute mk-inset-0 mk-z-10 mk-max-w-container mk-px-4"></div>
				<?php endif; ?>

				<div class="mk-relative mk-z-20 mk-max-w-container mk-mx-auto mk-gap-12 md:mk-gap-[64px] mk-px-4 md:mk-px-[64px] mk-py-16 md:mk-py-[80px]">
					<div class="<?php echo esc_attr( $text_color_class ); ?> mk-flex mk-flex-col md:mk-flex-row mk-items-center mk-justify-between mk-gap-12">
						<?php if ( $text ) : ?>
							<?php if ( 'dark' === $theme ) : ?>
								<div class="default-insight-card_content mk-text-center md:mk-text-start mk-px-4 mk-py-8 md:mk-px-12 md:mk-py-16 mk-text-1xl md:mk-text-3xl mk-font-bold mk-w-full md:mk-w-3/4">
									<?php echo wp_kses_post( $text ); ?>
								</div>
							<?php else : ?>
								<div class=" mk-text-center md:mk-text-start mk-text-1xl md:mk-text-3xl mk-font-bold mk-w-full md:mk-w-3/4">
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
