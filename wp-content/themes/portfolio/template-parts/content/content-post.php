<?php
/**
 * Post content template.
 *
 * @package portfolio_2026
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'mk-bg-white' ); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="mk-relative mk-w-full mk-h-64 md:mk-h-96 mk-overflow-hidden">
			<?php the_post_thumbnail( 'large', array( 'class' => 'mk-w-full mk-h-full mk-object-cover' ) ); ?>
		</div>
	<?php endif; ?>

	<div class="mk-max-w-container mk-mx-auto mk-px-4 mk-py-8 md:mk-py-16">

		<header class="mk-mb-8">
			<h1 class="mk-text-3xl md:mk-text-4xl mk-font-bold mk-mb-4">
				<?php the_title(); ?>
			</h1>

			<div class="mk-flex mk-items-center mk-gap-4 mk-text-sm mk-text-gray-600">
				<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
					<?php echo esc_html( get_the_date() ); ?>
				</time>

				<span>•</span>

				<span class="mk-author">
					<?php esc_html_e( 'By', 'portfolio_2026' ); ?> <?php the_author(); ?>
				</span>

				<?php if ( has_category() ) : ?>
					<span>•</span>
					<div class="mk-categories">
						<?php the_category( ', ' ); ?>
					</div>
				<?php endif; ?>
			</div>
		</header>

		<div class="mk-prose mk-max-w-none">
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
			<footer class="mk-mt-8 mk-pt-8 mk-border-t">
				<div class="mk-flex mk-flex-wrap mk-gap-2">
					<?php
					$tags = get_the_tags();
					foreach ( $tags as $tag ) :
						?>
						<a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>"
						   class="mk-px-3 mk-py-1 mk-text-sm mk-bg-gray-100 mk-rounded-full hover:mk-bg-gray-200">
							<?php echo esc_html( $tag->name ); ?>
						</a>
					<?php endforeach; ?>
				</div>
			</footer>
		<?php endif; ?>

	</div>

</article>