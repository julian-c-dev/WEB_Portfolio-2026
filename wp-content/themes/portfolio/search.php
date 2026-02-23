<?php
/**
 * The template for displaying search results.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package portfolio_2026
 */

get_header();
?>

<main id="main" class="site-main">
	<div class="mk-max-w-container mk-mx-auto mk-px-4 mk-py-12">

		<header class="page-header mk-mb-8">
			<h1 class="mk-text-3xl mk-font-bold mk-mb-2">
				<?php
				printf(
					/* translators: %s: search query */
					esc_html__( 'Search Results for: %s', 'portfolio_2026' ),
					'<span class="mk-text-gray-600">' . get_search_query() . '</span>'
				);
				?>
			</h1>
			<?php if ( have_posts() ) : ?>
				<p class="mk-text-gray-600">
					<?php
					printf(
						/* translators: %s: number of results */
						esc_html( _n( '%s result found', '%s results found', $wp_query->found_posts, 'portfolio_2026' ) ),
						'<strong>' . number_format_i18n( $wp_query->found_posts ) . '</strong>'
					);
					?>
				</p>
			<?php endif; ?>
		</header>

		<?php if ( have_posts() ) : ?>

			<div class="search-results">
				<?php
				while ( have_posts() ) :
					the_post();
					?>
					<article id="post-<?php the_ID(); ?>" <?php post_class( 'mk-mb-8 mk-pb-8 mk-border-b mk-border-gray-200 last:mk-border-0' ); ?>>

						<header class="entry-header mk-mb-4">
							<h2 class="mk-text-xl mk-font-bold mk-mb-2">
								<a href="<?php the_permalink(); ?>" class="mk-text-gray-900 hover:mk-text-blue-600 mk-no-underline">
									<?php the_title(); ?>
								</a>
							</h2>

							<div class="entry-meta mk-text-sm mk-text-gray-600 mk-flex mk-items-center mk-gap-4">
								<span class="post-type mk-flex mk-items-center mk-gap-1">
									<?php if ( 'page' === get_post_type() ) : ?>
										<?php echo wp_kses( portfolio_2026_svgs( 'search' ), portfolio_2026_allowed_svg_tags() ); ?>
										<?php esc_html_e( 'Page', 'portfolio_2026' ); ?>
									<?php else : ?>
										<?php echo wp_kses( portfolio_2026_svgs( 'search' ), portfolio_2026_allowed_svg_tags() ); ?>
										<?php esc_html_e( 'Post', 'portfolio_2026' ); ?>
									<?php endif; ?>
								</span>

								<?php if ( 'post' === get_post_type() ) : ?>
									<time datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>">
										<?php echo esc_html( get_the_date() ); ?>
									</time>
								<?php endif; ?>
							</div>
						</header>

						<?php if ( has_post_thumbnail() ) : ?>
							<div class="entry-thumbnail mk-mb-4">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail( 'medium', array( 'class' => 'mk-w-full mk-h-auto mk-rounded' ) ); ?>
								</a>
							</div>
						<?php endif; ?>

						<div class="entry-summary mk-text-gray-700">
							<?php the_excerpt(); ?>
						</div>

						<a href="<?php the_permalink(); ?>" class="mk-inline-flex mk-items-center mk-gap-2 mk-mt-4 mk-text-blue-600 hover:mk-text-blue-800">
							<?php esc_html_e( 'Read more', 'portfolio_2026' ); ?>
							<?php echo wp_kses( portfolio_2026_svgs( 'arrow-right' ), portfolio_2026_allowed_svg_tags() ); ?>
						</a>

					</article>
				<?php endwhile; ?>
			</div>

			<?php
			the_posts_navigation(
				array(
					'prev_text' => __( '&larr; Older posts', 'portfolio_2026' ),
					'next_text' => __( 'Newer posts &rarr;', 'portfolio_2026' ),
				)
			);
			?>

		<?php else : ?>

			<div class="no-results mk-text-center mk-py-12">
				<p class="mk-text-xl mk-text-gray-600 mk-mb-4">
					<?php esc_html_e( 'Sorry, no results found.', 'portfolio_2026' ); ?>
				</p>
				<p class="mk-text-gray-500 mk-mb-8">
					<?php esc_html_e( 'Please try a different search term.', 'portfolio_2026' ); ?>
				</p>

				<?php get_search_form(); ?>
			</div>

		<?php endif; ?>

	</div>
</main>

<?php
get_footer();
