<?php
/**
 * Projects Tab Content - Grid Layout
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

<div class="projects-content">
	<h2 class="mk-text-4xl mk-font-bold mk-mb-8 mk-text-gray-900">Personal Projects</h2>

	<?php if ( $projects_query->have_posts() ) : ?>

		<!-- Projects Grid -->
		<div class="projects-grid mk-grid md:mk-grid-cols-2 lg:mk-grid-cols-3 mk-gap-8">

			<?php
			while ( $projects_query->have_posts() ) :
				$projects_query->the_post();

				$project_url        = get_field( 'project_url' );
				$github_url         = get_field( 'github_url' );
				$project_status     = get_field( 'project_status' ); // Active, Completed, In Progress
				$technologies_used  = get_field( 'technologies_used' ); // Array
				$featured_image_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
				?>

				<article class="project-card mk-bg-white mk-rounded-xl mk-shadow-lg hover:mk-shadow-2xl mk-transition-all mk-duration-300 mk-overflow-hidden mk-group hover:-mk-translate-y-2">

					<!-- Project Thumbnail -->
					<div class="project-thumbnail mk-relative mk-overflow-hidden mk-h-48 mk-bg-gray-200">
						<?php if ( $featured_image_url ) : ?>
							<img src="<?php echo esc_url( $featured_image_url ); ?>"
								 alt="<?php the_title(); ?>"
								 class="mk-w-full mk-h-full mk-object-cover group-hover:mk-scale-110 mk-transition-transform mk-duration-500">
						<?php else : ?>
							<div class="mk-w-full mk-h-full mk-flex mk-items-center mk-justify-center mk-bg-gradient-to-br mk-from-blue-500 mk-to-purple-600">
								<span class="mk-text-white mk-text-4xl mk-font-bold">
									<?php echo esc_html( substr( get_the_title(), 0, 1 ) ); ?>
								</span>
							</div>
						<?php endif; ?>

						<!-- Status Badge -->
						<?php if ( $project_status ) : ?>
							<div class="mk-absolute mk-top-4 mk-right-4">
								<span class="mk-text-xs mk-font-bold mk-px-3 mk-py-1 mk-rounded-full mk-shadow-lg
									<?php
									echo $project_status === 'Active' ? 'mk-bg-green-500 mk-text-white' : '';
									echo $project_status === 'Completed' ? 'mk-bg-blue-500 mk-text-white' : '';
									echo $project_status === 'In Progress' ? 'mk-bg-yellow-500 mk-text-white' : '';
									?>
								">
									<?php echo esc_html( $project_status ); ?>
								</span>
							</div>
						<?php endif; ?>
					</div>

					<!-- Project Content -->
					<div class="project-content mk-p-6">

						<!-- Project Title -->
						<h3 class="mk-text-xl mk-font-bold mk-mb-3 mk-text-gray-900 group-hover:mk-text-blue-600 mk-transition-colors">
							<?php the_title(); ?>
						</h3>

						<!-- Project Excerpt -->
						<p class="mk-text-gray-600 mk-text-sm mk-mb-4 mk-line-clamp-3">
							<?php echo esc_html( get_the_excerpt() ); ?>
						</p>

						<!-- Technologies -->
						<?php if ( $technologies_used ) : ?>
							<div class="technologies mk-flex mk-flex-wrap mk-gap-2 mk-mb-4">
								<?php foreach ( $technologies_used as $tech ) : ?>
									<span class="mk-text-xs mk-font-semibold mk-px-2 mk-py-1 mk-bg-gray-100 mk-text-gray-700 mk-rounded">
										<?php echo esc_html( $tech ); ?>
									</span>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>

						<!-- Project Links -->
						<div class="project-links mk-flex mk-gap-3 mk-pt-4 mk-border-t mk-border-gray-100">
							<a href="<?php the_permalink(); ?>"
							   class="mk-flex-1 mk-text-center mk-bg-blue-600 mk-text-white mk-px-4 mk-py-2 mk-rounded-lg mk-text-sm mk-font-semibold hover:mk-bg-blue-700 mk-transition-colors">
								View Details
							</a>

							<?php if ( $project_url ) : ?>
								<a href="<?php echo esc_url( $project_url ); ?>"
								   target="_blank"
								   rel="noopener noreferrer"
								   class="mk-flex mk-items-center mk-justify-center mk-bg-gray-100 mk-text-gray-700 mk-px-4 mk-py-2 mk-rounded-lg mk-text-sm mk-font-semibold hover:mk-bg-gray-200 mk-transition-colors"
								   title="Live Demo">
									🌐
								</a>
							<?php endif; ?>

							<?php if ( $github_url ) : ?>
								<a href="<?php echo esc_url( $github_url ); ?>"
								   target="_blank"
								   rel="noopener noreferrer"
								   class="mk-flex mk-items-center mk-justify-center mk-bg-gray-900 mk-text-white mk-px-4 mk-py-2 mk-rounded-lg mk-text-sm mk-font-semibold hover:mk-bg-gray-800 mk-transition-colors"
								   title="GitHub">
									<svg class="mk-w-4 mk-h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
								</a>
							<?php endif; ?>
						</div>

					</div>

				</article>

			<?php endwhile; ?>
		</div>

		<?php wp_reset_postdata(); ?>

	<?php else : ?>
		<!-- No Projects Found -->
		<div class="mk-bg-blue-50 mk-border mk-border-blue-200 mk-rounded-lg mk-p-8 mk-text-center">
			<p class="mk-text-gray-700 mk-mb-4">No projects added yet.</p>
			<a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=project' ) ); ?>"
			   class="mk-inline-block mk-bg-blue-600 mk-text-white mk-px-6 mk-py-2 mk-rounded-lg hover:mk-bg-blue-700">
				Add Your First Project
			</a>
		</div>
	<?php endif; ?>
</div>
