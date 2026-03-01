<?php
/**
 * Post content template.
 *
 * @package portfolio_2026
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'bg-white' ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="relative w-full h-64 md:h-96 overflow-hidden">
			<?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-full object-cover' ) ); ?>
		</div>
	<?php endif; ?>

	<div class="max-w-container mx-auto px-4 py-8 md:py-16">

		<header class="mb-8">
			<h1 class="text-3xl md:text-4xl font-bold mb-4">
				<?php the_title(); ?>
			</h1>

			<div class="flex items-center gap-4 text-sm text-gray-600">
				<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
					<?php echo esc_html( get_the_date() ); ?>
				</time>

				<span>•</span>

				<span class="author">
					<?php esc_html_e( 'By', 'portfolio_2026' ); ?> <?php the_author(); ?>
				</span>

				<?php if ( has_category() ) : ?>
					<span>•</span>
					<div class="categories">
						<?php the_category( ', ' ); ?>
					</div>
				<?php endif; ?>
			</div>
		</header>

		<div class="prose max-w-none">
			<?php
			if ( has_blocks( get_the_content() ) ) {
				// If using block editor.
				the_content();
			} else {
				// If using classic editor.
				the_content();
			}
			?>
		</div>

		<?php if ( get_the_tags() ) : ?>
			<footer class="mt-8 pt-8 border-t">
				<div class="flex flex-wrap gap-2">
					<?php
					$tags = get_the_tags();
					foreach ( $tags as $tag ) :
						?>
						<a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"
						   class="px-3 py-1 text-sm bg-gray-100 rounded-full hover:bg-gray-200">
							<?php echo esc_html( $tag->name ); ?>
						</a>
					<?php endforeach; ?>
				</div>
			</footer>
		<?php endif; ?>

	</div>

</article>