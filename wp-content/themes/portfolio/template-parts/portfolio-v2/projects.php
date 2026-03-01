<?php
/**
 * Projects Section - Minimalist Card Style
 *
 * @package portfolio_2026
 */

$projects_query = new WP_Query(
	array(
		'post_type'      => 'project',
		'posts_per_page' => -1,
		'orderby'        => 'date',
		'order'          => 'DESC',
	)
);
?>

<div class="projects-list group/list space-y-16">

	<?php if ( $projects_query->have_posts() ) : ?>

		<?php
		while ( $projects_query->have_posts() ) :
			$projects_query->the_post();

			$project_url       = get_field( 'project_url' );
			$github_url        = get_field( 'github_url' );
			$technologies_used = get_field( 'technologies_used' );
			$featured_image    = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
			?>

			<div class="project-item group relative grid items-start gap-4 transition-all sm:grid-cols-8 sm:gap-8 md:gap-4 lg:hover:!opacity-100 lg:group-hover/list:opacity-50">

				<!-- Image (Left on Desktop) -->
				<div class="sm:col-span-3 order-2 sm:order-1">
					<?php if ( $featured_image ) : ?>
						<div class="rounded border-2 border-slate-200/60 bg-slate-50 transition group-hover:border-slate-300/60 sm:order-1 sm:col-span-3 sm:translate-y-1">
							<img src="<?php echo esc_url( $featured_image ); ?>"
								 alt="<?php the_title(); ?>"
								 class="rounded object-cover w-full h-auto"
								 loading="lazy">
						</div>
					<?php endif; ?>
				</div>

				<!-- Content (Right on Desktop) -->
				<div class="sm:col-span-5 order-1 sm:order-2">

					<!-- Project Title -->
					<h3 class="font-medium leading-snug text-white">
						<div>
							<a href="<?php the_permalink(); ?>"
							   class="inline-flex items-baseline text-base font-semibold leading-tight text-white group/link">
								<span class="absolute -inset-x-4 -inset-y-2.5 hidden rounded md:-inset-x-6 md:-inset-y-4 lg:block"></span>
								<span>
									<?php the_title(); ?>
									<?php echo portfolio_2026_svgs( "arrow-external", "inline-block h-4 w-4 shrink-0 transition-transform group-hover/link:-translate-y-1 group-hover/link:translate-x-1 group-focus-visible/link:-translate-y-1 group-focus-visible/link:translate-x-1 motion-reduce:transition-none ml-1 translate-y-px" ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
								</span>
							</a>
						</div>
					</h3>

					<!-- Project Description -->
					<p class="mt-2 text-sm leading-normal text-slate-400">
						<?php echo esc_html( get_the_excerpt() ); ?>
					</p>

					<!-- External Links -->
					<?php if ( $project_url || $github_url ) : ?>
						<div class="mt-3 flex gap-4 text-xs text-slate-400">
							<?php if ( $project_url ) : ?>
								<a href="<?php echo esc_url( $project_url ); ?>"
								   target="_blank"
								   rel="noopener noreferrer"
								   class="inline-flex items-center gap-1 hover:text-white transition-colors">
									<?php echo portfolio_2026_svgs( 'external-link', 'w-3 h-3' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
									View Project
								</a>
							<?php endif; ?>
							<?php if ( $github_url ) : ?>
								<a href="<?php echo esc_url( $github_url ); ?>"
								   target="_blank"
								   rel="noopener noreferrer"
								   class="inline-flex items-center gap-1 hover:text-white transition-colors">
									<?php echo portfolio_2026_svgs( 'github', 'w-3 h-3' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
									GitHub
								</a>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<!-- Technologies -->
					<?php if ( $technologies_used ) : ?>
						<ul class="mt-3 flex flex-wrap gap-2">
							<?php foreach ( $technologies_used as $tech ) : ?>
								<li class="flex items-center rounded-full bg-teal-400/10 px-3 py-1 text-xs font-medium leading-5 text-teal-900">
									<?php echo esc_html( $tech ); ?>
								</li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>

				</div>

			</div>

		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>

	<?php else : ?>
		<div class="text-slate-400">
			<p>No projects added yet. <a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=project' ) ); ?>" class="text-white font-semibold">Add your first project →</a></p>
		</div>
	<?php endif; ?>

</div>
