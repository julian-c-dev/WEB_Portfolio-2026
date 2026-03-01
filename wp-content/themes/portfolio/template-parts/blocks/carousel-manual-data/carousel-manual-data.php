<?php
/**
 * Carousel: Manual Data.
 *
 * @package portfolio_2026
 */

// Preview Image (Optional - add your own preview image).
// To add a preview: Create assets/dist/img/blocks/carousel-manual-data.jpg.
// Uncomment the code below to enable preview in WordPress editor.
/*
if ( isset( $block['data']['preview_image_help'] ) && $block['data']['preview_image_help'] ) {
	echo '<img src="' . esc_url( get_template_directory_uri() . '/assets/dist/img/blocks/carousel-manual-data.jpg' ) . '" style="width:100%; height:auto;" />';
	return;
}
*/

// ACF fields.
$heading     = get_field( 'title' );
$cards       = get_field( 'cards' );
$format      = get_field( 'format' );
$is_timeline = ( 'timeline' === $format );

// Get the first year's value for the `current-year` span.
$first_year = ( $is_timeline && ! empty( $cards ) && isset( $cards[0]['year'] ) ) ? $cards[0]['year'] : '';

// Block ID.
$block_id = ! empty( $block['anchor'] ) ? $block['anchor'] : 'carousel-manual-data';

// Additional classes.
$class_name = 'carousel-manual-data' . ( ! empty( $block['className'] ) ? ' ' . $block['className'] : '' );
?>

<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $class_name ); ?> w-full bg-white py-12 md:py-24 px-4">
	<div class="relative max-w-container mx-auto px-0 md:px-4">
		<div class="font-satoshi text-primary-darker">
			<?php if ( $heading ) : ?>
				<h2 class="text-3xl font-semibold text-primary-darker-title text-center mb-16 <?php echo $is_timeline ? 'pb-12 md:pb-8 mx-auto' : ''; ?>">
					<?php echo esc_html( $heading ); ?>
				</h2>
			<?php endif; ?>

			<!-- Carousel. -->
			<div class="manual-data-carousel glide">
				<div class="glide__track" data-glide-el="track">
					<ul class="glide__slides">
						<?php if ( $cards ) : ?>
							<?php foreach ( $cards as $card ) : ?>
								<li class="glide__slide" data-year="<?php echo esc_attr( $card['year'] ); ?>">
									<div class="slide-content<?php echo ! empty( $card['link'] ) ? ' cursor-pointer' : ''; ?>">
										<?php if ( ! empty( $card['link'] ) ) : ?>
											<a href="<?php echo esc_url( $card['link']['url'] ); ?>" class="w-full h-full block">
										<?php endif; ?>

										<?php if ( ! empty( $card['image'] ) ) : ?>
											<img src="<?php echo esc_url( wp_get_attachment_url( $card['image'] ) ); ?>" alt="<?php echo esc_attr( $card['title'] ); ?>" class="w-full rounded-t-lg">
										<?php endif; ?>

										<div class="py-4">
											<?php if ( ! empty( $card['upper_text'] ) && ! $is_timeline ) : ?>
												<p class="text-sm text-primary-light font-satoshi mb-4">
													<?php echo esc_html( $card['upper_text'] ); ?>
												</p>
											<?php endif; ?>

											<?php if ( ! empty( $card['title'] ) ) : ?>
												<h3 class="text-2xxl font-semibold font-satoshi text-primary-darker-title mb-4">
													<?php echo esc_html( $is_timeline ? $card['year'] . ': ' . $card['title'] : $card['title'] ); ?>
												</h3>
											<?php endif; ?>

											<?php if ( ! empty( $card['description'] ) ) : ?>
												<p class="text-base text-primary-darker font-sans">
													<?php echo esc_html( $card['description'] ); ?>
												</p>
											<?php endif; ?>
										</div>

										<?php if ( ! empty( $card['link'] ) ) : ?>
											</a>
										<?php endif; ?>
									</div>
									</li>		
							<?php endforeach; ?>
						<?php endif; ?>

						<!-- Empty card for spacing. -->
						<li class="glide__slide">
							<div class="slide-content opacity-0">
								<div class="w-full h-48"></div>
							</div>
						</li>
					</ul>

					<?php
					// Common classes for arrows.
					$common_classes = 'carousel_glide__arrows' . ( $is_timeline ? ' flex items-center justify-center mb-6' : '' );
					$arrow_classes  = 'slider-arrow cursor-pointer ' . ( $is_timeline ? 'mx-2' : '' );
					?>

					<div class="<?php echo esc_attr( $common_classes ); ?>" data-glide-el="controls" 
						<?php echo $is_timeline ? 'style="max-width: 300px; top: -50px; left: 50%; transform: translateX(-50%);"' : ''; ?>>
						
						<div class="<?php echo esc_attr( $arrow_classes . ' slider-prev' ); ?>" data-glide-dir="&lt;" >
							<?php echo wp_kses( empty_svgs( 'carousel_left_arrow_blue' ), empty_allowed_svg_tags() ); ?>
						</div>

						<?php if ( $is_timeline ) : ?>
							<div class="flex items-center mx-2">
								<span id="current-year" class="text-xl font-semibold text-primary-darker-title">
								<?php echo esc_html( $first_year ); ?>
								</span>
							</div>
						<?php endif; ?>

						<div class="<?php echo esc_attr( $arrow_classes . ' slider-next' ); ?>" data-glide-dir="&gt;" >
							<?php echo wp_kses( empty_svgs( 'carousel_right_arrow_blue' ), empty_allowed_svg_tags() ); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
