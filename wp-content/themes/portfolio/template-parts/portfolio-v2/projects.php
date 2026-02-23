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

<div class="projects-list mk-space-y-16">

	<?php if ( $projects_query->have_posts() ) : ?>

		<?php
		while ( $projects_query->have_posts() ) :
			$projects_query->the_post();

			$project_url       = get_field( 'project_url' );
			$github_url        = get_field( 'github_url' );
			$technologies_used = get_field( 'technologies_used' );
			$featured_image    = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
			?>

			<div class="project-item mk-group mk-relative mk-grid mk-gap-4 mk-transition-all sm:mk-grid-cols-8 sm:mk-gap-8 md:mk-gap-4 lg:hover:!mk-opacity-100 lg:group-hover/list:mk-opacity-50">

				<!-- Image (Left on Desktop) -->
				<div class="sm:mk-col-span-3 mk-order-2 sm:mk-order-1">
					<?php if ( $featured_image ) : ?>
						<div class="mk-rounded mk-border-2 mk-border-slate-200/60 mk-bg-slate-50 mk-transition group-hover:mk-border-slate-300/60 sm:mk-order-1 sm:mk-col-span-3 sm:mk-translate-y-1">
							<img src="<?php echo esc_url( $featured_image ); ?>"
								 alt="<?php the_title(); ?>"
								 class="mk-rounded mk-object-cover mk-w-full mk-h-auto"
								 loading="lazy">
						</div>
					<?php endif; ?>
				</div>

				<!-- Content (Right on Desktop) -->
				<div class="sm:mk-col-span-5 mk-order-1 sm:mk-order-2">

					<!-- Project Title -->
					<h3 class="mk-font-medium mk-leading-snug mk-text-white">
						<div>
							<a href="<?php the_permalink(); ?>"
							   class="mk-inline-flex mk-items-baseline mk-text-base mk-font-semibold mk-leading-tight mk-text-white group/link">
								<span class="mk-absolute -mk-inset-x-4 -mk-inset-y-2.5 mk-hidden mk-rounded md:-mk-inset-x-6 md:-mk-inset-y-4 lg:mk-block"></span>
								<span>
									<?php the_title(); ?>
									<svg class="mk-inline-block mk-h-4 mk-w-4 mk-shrink-0 mk-transition-transform group-hover/link:-mk-translate-y-1 group-hover/link:mk-translate-x-1 group-focus-visible/link:-mk-translate-y-1 group-focus-visible/link:mk-translate-x-1 mk-motion-reduce:mk-transition-none ml-1 mk-translate-y-px" viewBox="0 0 20 20" fill="currentColor">
										<path fill-rule="evenodd" d="M5.22 14.78a.75.75 0 001.06 0l7.22-7.22v5.69a.75.75 0 001.5 0v-7.5a.75.75 0 00-.75-.75h-7.5a.75.75 0 000 1.5h5.69l-7.22 7.22a.75.75 0 000 1.06z" clip-rule="evenodd"></path>
									</svg>
								</span>
							</a>
						</div>
					</h3>

					<!-- Project Description -->
					<p class="mk-mt-2 mk-text-sm mk-leading-normal mk-text-slate-400">
						<?php echo esc_html( get_the_excerpt() ); ?>
					</p>

					<!-- External Links -->
					<?php if ( $project_url || $github_url ) : ?>
						<div class="mk-mt-3 mk-flex mk-gap-4 mk-text-xs mk-text-slate-400">
							<?php if ( $project_url ) : ?>
								<a href="<?php echo esc_url( $project_url ); ?>"
								   target="_blank"
								   rel="noopener noreferrer"
								   class="mk-inline-flex mk-items-center mk-gap-1 hover:mk-text-white mk-transition-colors">
									<svg class="mk-w-3 mk-h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
									</svg>
									View Project
								</a>
							<?php endif; ?>
							<?php if ( $github_url ) : ?>
								<a href="<?php echo esc_url( $github_url ); ?>"
								   target="_blank"
								   rel="noopener noreferrer"
								   class="mk-inline-flex mk-items-center mk-gap-1 hover:mk-text-white mk-transition-colors">
									<svg class="mk-w-3 mk-h-3" fill="currentColor" viewBox="0 0 24 24">
										<path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/>
									</svg>
									GitHub
								</a>
							<?php endif; ?>
						</div>
					<?php endif; ?>

					<!-- Technologies -->
					<?php if ( $technologies_used ) : ?>
						<ul class="mk-mt-3 mk-flex mk-flex-wrap mk-gap-2">
							<?php foreach ( $technologies_used as $tech ) : ?>
								<li class="mk-flex mk-items-center mk-rounded-full mk-bg-teal-400/10 mk-px-3 mk-py-1 mk-text-xs mk-font-medium mk-leading-5 mk-text-teal-900">
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
		<div class="mk-text-slate-400">
			<p>No projects added yet. <a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=project' ) ); ?>" class="mk-text-white mk-font-semibold">Add your first project →</a></p>
		</div>
	<?php endif; ?>

</div>
