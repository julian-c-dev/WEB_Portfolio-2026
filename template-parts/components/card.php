<?php
/**
 * Generic Card Component.
 *
 * Usage:
 * get_template_part(
 *     'template-parts/components/card',
 *     null,
 *     array(
 *         'image_url'  => 'https://example.com/image.jpg',
 *         'title'      => 'Card Title',
 *         'excerpt'    => 'Card description text...',
 *         'link'       => 'https://example.com',
 *         'link_text'  => 'Read More',
 *         'date'       => '2024-01-15',
 *         'category'   => 'News',
 *     )
 * );
 *
 * @package portfolio_2026
 * @since 1.0.0
 */

// Get args passed from get_template_part().
$image_url = isset( $args['image_url'] ) ? $args['image_url'] : '';
$title     = isset( $args['title'] ) ? $args['title'] : '';
$excerpt   = isset( $args['excerpt'] ) ? $args['excerpt'] : '';
$link      = isset( $args['link'] ) ? $args['link'] : '';
$link_text = isset( $args['link_text'] ) ? $args['link_text'] : __( 'Read More', 'portfolio_2026' );
$date      = isset( $args['date'] ) ? $args['date'] : '';
$category  = isset( $args['category'] ) ? $args['category'] : '';

?>

<div class="bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg transition-shadow">

	<?php if ( $image_url ) : ?>
		<div class="relative w-full h-48 overflow-hidden">
			<?php if ( $link ) : ?>
				<a href="<?php echo esc_url( $link ); ?>" class="block w-full h-full">
					<img src="<?php echo esc_url( $image_url ); ?>"
						alt="<?php echo esc_attr( $title ); ?>"
						class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
				</a>
			<?php else : ?>
				<img src="<?php echo esc_url( $image_url ); ?>"
					alt="<?php echo esc_attr( $title ); ?>"
					class="w-full h-full object-cover">
			<?php endif; ?>

			<?php if ( $category ) : ?>
				<span class="absolute top-4 left-4 px-3 py-1 text-xs font-semibold bg-white rounded-full">
					<?php echo esc_html( $category ); ?>
				</span>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<div class="p-6">

		<?php if ( $date ) : ?>
			<time class="block text-sm text-gray-500 mb-2" datetime="<?php echo esc_attr( $date ); ?>">
				<?php echo esc_html( date_i18n( get_option( 'date_format' ), strtotime( $date ) ) ); ?>
			</time>
		<?php endif; ?>

		<?php if ( $title ) : ?>
			<h3 class="text-xl font-bold mb-3">
				<?php if ( $link ) : ?>
					<a href="<?php echo esc_url( $link ); ?>" class="hover:text-primary transition-colors">
						<?php echo esc_html( $title ); ?>
					</a>
				<?php else : ?>
					<?php echo esc_html( $title ); ?>
				<?php endif; ?>
			</h3>
		<?php endif; ?>

		<?php if ( $excerpt ) : ?>
			<p class="text-gray-600 mb-4 line-clamp-3">
				<?php echo esc_html( $excerpt ); ?>
			</p>
		<?php endif; ?>

		<?php if ( $link ) : ?>
			<a href="<?php echo esc_url( $link ); ?>"
				class="inline-flex items-center gap-2 text-primary font-semibold hover:gap-3 transition-all">
				<?php echo esc_html( $link_text ); ?>
				<?php echo wp_kses( empty_svgs( 'arrow-right' ), empty_allowed_svg_tags() ); ?>
			</a>
		<?php endif; ?>

	</div>

</div>
