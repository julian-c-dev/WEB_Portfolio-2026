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

<div class="mk-bg-white mk-rounded-lg mk-overflow-hidden mk-shadow-md hover:mk-shadow-lg mk-transition-shadow">

	<?php if ( $image_url ) : ?>
		<div class="mk-relative mk-w-full mk-h-48 mk-overflow-hidden">
			<?php if ( $link ) : ?>
				<a href="<?php echo esc_url( $link ); ?>" class="mk-block mk-w-full mk-h-full">
					<img src="<?php echo esc_url( $image_url ); ?>"
						 alt="<?php echo esc_attr( $title ); ?>"
						 class="mk-w-full mk-h-full mk-object-cover hover:mk-scale-105 mk-transition-transform mk-duration-300">
				</a>
			<?php else : ?>
				<img src="<?php echo esc_url( $image_url ); ?>"
					 alt="<?php echo esc_attr( $title ); ?>"
					 class="mk-w-full mk-h-full mk-object-cover">
			<?php endif; ?>

			<?php if ( $category ) : ?>
				<span class="mk-absolute mk-top-4 mk-left-4 mk-px-3 mk-py-1 mk-text-xs mk-font-semibold mk-bg-white mk-rounded-full">
					<?php echo esc_html( $category ); ?>
				</span>
			<?php endif; ?>
		</div>
	<?php endif; ?>

	<div class="mk-p-6">

		<?php if ( $date ) : ?>
			<time class="mk-block mk-text-sm mk-text-gray-500 mk-mb-2" datetime="<?php echo esc_attr( $date ); ?>">
				<?php echo esc_html( date_i18n( get_option( 'date_format' ), strtotime( $date ) ) ); ?>
			</time>
		<?php endif; ?>

		<?php if ( $title ) : ?>
			<h3 class="mk-text-xl mk-font-bold mk-mb-3">
				<?php if ( $link ) : ?>
					<a href="<?php echo esc_url( $link ); ?>" class="hover:mk-text-primary mk-transition-colors">
						<?php echo esc_html( $title ); ?>
					</a>
				<?php else : ?>
					<?php echo esc_html( $title ); ?>
				<?php endif; ?>
			</h3>
		<?php endif; ?>

		<?php if ( $excerpt ) : ?>
			<p class="mk-text-gray-600 mk-mb-4 mk-line-clamp-3">
				<?php echo esc_html( $excerpt ); ?>
			</p>
		<?php endif; ?>

		<?php if ( $link ) : ?>
			<a href="<?php echo esc_url( $link ); ?>"
			   class="mk-inline-flex mk-items-center mk-gap-2 mk-text-primary mk-font-semibold hover:mk-gap-3 mk-transition-all">
				<?php echo esc_html( $link_text ); ?>
				<?php echo wp_kses( empty_svgs( 'arrow-right' ), empty_allowed_svg_tags() ); ?>
			</a>
		<?php endif; ?>

	</div>

</div>