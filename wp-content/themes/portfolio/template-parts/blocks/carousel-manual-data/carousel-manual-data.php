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

<div id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $class_name ); ?> mk-w-full mk-bg-white mk-py-12 md:mk-py-24 mk-px-4">
	<div class="mk-relative mk-max-w-container mk-mx-auto mk-px-0 md:mk-px-4">
		<div class="mk-font-satoshi mk-text-primary-darker">
			<?php if ( $heading ) : ?>
				<h2 class="mk-text-3xl mk-font-semibold mk-text-primary-darker-title mk-text-center mk-mb-16 <?php echo $is_timeline ? 'mk-pb-12 md:mk-pb-8 mk-mx-auto' : ''; ?>">
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
									<div class="slide-content<?php echo ! empty( $card['link'] ) ? ' mk-cursor-pointer' : ''; ?>">
										<?php if ( ! empty( $card['link'] ) ) : ?>
											<a href="<?php echo esc_url( $card['link']['url'] ); ?>" class="w-full h-full block">
										<?php endif; ?>

										<?php if ( ! empty( $card['image'] ) ) : ?>
											<img src="<?php echo esc_url( wp_get_attachment_url( $card['image'] ) ); ?>" alt="<?php echo esc_attr( $card['title'] ); ?>" class="mk-w-full mk-rounded-t-lg">
										<?php endif; ?>

										<div class="mk-py-4">
											<?php if ( ! empty( $card['upper_text'] ) && ! $is_timeline ) : ?>
												<p class="mk-text-sm mk-text-primary-light mk-font-satoshi mk-mb-4">
													<?php echo esc_html( $card['upper_text'] ); ?>
												</p>
											<?php endif; ?>

											<?php if ( ! empty( $card['title'] ) ) : ?>
												<h3 class="mk-text-2xxl mk-font-semibold mk-font-satoshi mk-text-primary-darker-title mk-mb-4">
													<?php echo esc_html( $is_timeline ? $card['year'] . ': ' . $card['title'] : $card['title'] ); ?>
												</h3>
											<?php endif; ?>

											<?php if ( ! empty( $card['description'] ) ) : ?>
												<p class="mk-text-base mk-text-primary-darker mk-font-sans">
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
							<div class="slide-content mk-opacity-0">
								<div class="mk-w-full mk-h-48"></div>
							</div>
						</li>
					</ul>

					<?php
					// Common classes for arrows.
					$common_classes = 'carousel_glide__arrows' . ( $is_timeline ? ' mk-flex mk-items-center mk-justify-center mk-mb-6' : '' );
					$arrow_classes  = 'slider-arrow mk-cursor-pointer ' . ( $is_timeline ? 'mk-mx-2' : '' );
					?>

					<div class="<?php echo esc_attr( $common_classes ); ?>" data-glide-el="controls" 
						<?php echo $is_timeline ? 'style="max-width: 300px; top: -50px; left: 50%; transform: translateX(-50%);"' : ''; ?>>
						
						<div class="<?php echo esc_attr( $arrow_classes . ' slider-prev' ); ?>" data-glide-dir="&lt;" >
							<?php echo wp_kses( empty_svgs( 'carousel_left_arrow_blue' ), empty_allowed_svg_tags() ); ?>
						</div>

						<?php if ( $is_timeline ) : ?>
							<div class="mk-flex mk-items-center mk-mx-2">
								<span id="current-year" class="mk-text-xl mk-font-semibold mk-text-primary-darker-title">
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
