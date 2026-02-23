<?php
/**
 * About Me Tab Content
 *
 * @package portfolio_2026
 */

$about_text   = get_field( 'about_me_text', 'option' );
$about_photos = get_field( 'about_me_photos', 'option' ); // Gallery field
?>

<div class="about-me-content">
	<h2 class="mk-text-4xl mk-font-bold mk-mb-8 mk-text-gray-900">About Me</h2>

	<div class="mk-grid md:mk-grid-cols-2 mk-gap-12 mk-items-start">

		<!-- Text Content -->
		<div class="about-text mk-prose mk-prose-lg mk-max-w-none">
			<?php if ( $about_text ) : ?>
				<?php echo wp_kses_post( $about_text ); ?>
			<?php else : ?>
				<p>Hi! I'm a passionate developer who loves creating beautiful and functional web applications. With expertise in modern web technologies, I strive to build solutions that make a difference.</p>
				<p>When I'm not coding, you can find me exploring new technologies, contributing to open source, or sharing knowledge with the developer community.</p>
			<?php endif; ?>
		</div>

		<!-- Photo Gallery -->
		<div class="about-photos">
			<?php if ( $about_photos ) : ?>
				<div class="mk-grid mk-grid-cols-2 mk-gap-4">
					<?php foreach ( $about_photos as $photo ) : ?>
						<div class="photo-item mk-rounded-lg mk-overflow-hidden mk-shadow-lg hover:mk-shadow-xl mk-transition-shadow">
							<img src="<?php echo esc_url( $photo['sizes']['medium'] ); ?>"
								 alt="<?php echo esc_attr( $photo['alt'] ); ?>"
								 class="mk-w-full mk-h-48 mk-object-cover hover:mk-scale-105 mk-transition-transform mk-duration-300">
						</div>
					<?php endforeach; ?>
				</div>
			<?php else : ?>
				<!-- Placeholder -->
				<div class="mk-bg-gray-200 mk-rounded-lg mk-h-96 mk-flex mk-items-center mk-justify-center">
					<p class="mk-text-gray-500">Add photos in Theme Settings → About Me Photos</p>
				</div>
			<?php endif; ?>
		</div>

	</div>
</div>
