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
	<h2 class="text-4xl font-bold mb-8 text-gray-900">About Me</h2>

	<div class="grid md:grid-cols-2 gap-12 items-start">

		<!-- Text Content -->
		<div class="about-text prose prose-lg max-w-none">
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
				<div class="grid grid-cols-2 gap-4">
					<?php foreach ( $about_photos as $photo ) : ?>
						<div class="photo-item rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition-shadow">
							<img src="<?php echo esc_url( $photo['sizes']['medium'] ); ?>"
								 alt="<?php echo esc_attr( $photo['alt'] ); ?>"
								 class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
						</div>
					<?php endforeach; ?>
				</div>
			<?php else : ?>
				<!-- Placeholder -->
				<div class="bg-gray-200 rounded-lg h-96 flex items-center justify-center">
					<p class="text-gray-500">Add photos in Theme Settings → About Me Photos</p>
				</div>
			<?php endif; ?>
		</div>

	</div>
</div>
