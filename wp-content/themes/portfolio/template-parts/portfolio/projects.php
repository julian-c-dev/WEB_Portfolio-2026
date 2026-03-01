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
	<h2 class="text-4xl font-bold mb-8 text-gray-900">Personal Projects</h2>

	<?php if ( $projects_query->have_posts() ) : ?>

		<!-- Projects Grid -->
		<div class="projects-grid grid md:grid-cols-2 lg:grid-cols-3 gap-8">

			<?php
			while ( $projects_query->have_posts() ) :
				$projects_query->the_post();

				$project_url        = get_field( 'project_url' );
				$github_url         = get_field( 'github_url' );
				$project_status     = get_field( 'project_status' ); // Active, Completed, In Progress
				$technologies_used  = get_field( 'technologies_used' ); // Array
				$featured_image_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
				?>

				<article class="project-card bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 overflow-hidden group hover:-translate-y-2">

					<!-- Project Thumbnail -->
					<div class="project-thumbnail relative overflow-hidden h-48 bg-gray-200">
						<?php if ( $featured_image_url ) : ?>
							<img src="<?php echo esc_url( $featured_image_url ); ?>"
								 alt="<?php the_title(); ?>"
								 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
						<?php else : ?>
							<div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-500 to-purple-600">
								<span class="text-white text-4xl font-bold">
									<?php echo esc_html( substr( get_the_title(), 0, 1 ) ); ?>
								</span>
							</div>
						<?php endif; ?>

						<!-- Status Badge -->
						<?php if ( $project_status ) : ?>
							<div class="absolute top-4 right-4">
								<span class="text-xs font-bold px-3 py-1 rounded-full shadow-lg
									<?php
									echo $project_status === 'Active' ? 'bg-green-500 text-white' : '';
									echo $project_status === 'Completed' ? 'bg-blue-500 text-white' : '';
									echo $project_status === 'In Progress' ? 'bg-yellow-500 text-white' : '';
									?>
								">
									<?php echo esc_html( $project_status ); ?>
								</span>
							</div>
						<?php endif; ?>
					</div>

					<!-- Project Content -->
					<div class="project-content p-6">

						<!-- Project Title -->
						<h3 class="text-xl font-bold mb-3 text-gray-900 group-hover:text-blue-600 transition-colors">
							<?php the_title(); ?>
						</h3>

						<!-- Project Excerpt -->
						<p class="text-gray-600 text-sm mb-4 line-clamp-3">
							<?php echo esc_html( get_the_excerpt() ); ?>
						</p>

						<!-- Technologies -->
						<?php if ( $technologies_used ) : ?>
							<div class="technologies flex flex-wrap gap-2 mb-4">
								<?php foreach ( $technologies_used as $tech ) : ?>
									<span class="text-xs font-semibold px-2 py-1 bg-gray-100 text-gray-700 rounded">
										<?php echo esc_html( $tech ); ?>
									</span>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>

						<!-- Project Links -->
						<div class="project-links flex gap-3 pt-4 border-t border-gray-100">
							<a href="<?php the_permalink(); ?>"
							   class="flex-1 text-center bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-blue-700 transition-colors">
								View Details
							</a>

							<?php if ( $project_url ) : ?>
								<a href="<?php echo esc_url( $project_url ); ?>"
								   target="_blank"
								   rel="noopener noreferrer"
								   class="flex items-center justify-center bg-gray-100 text-gray-700 px-4 py-2 rounded-lg text-sm font-semibold hover:bg-gray-200 transition-colors"
								   title="Live Demo">
									🌐
								</a>
							<?php endif; ?>

							<?php if ( $github_url ) : ?>
								<a href="<?php echo esc_url( $github_url ); ?>"
								   target="_blank"
								   rel="noopener noreferrer"
								   class="flex items-center justify-center bg-gray-900 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-gray-800 transition-colors"
								   title="GitHub">
									<svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
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
		<div class="bg-blue-50 border border-blue-200 rounded-lg p-8 text-center">
			<p class="text-gray-700 mb-4">No projects added yet.</p>
			<a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=project' ) ); ?>"
			   class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
				Add Your First Project
			</a>
		</div>
	<?php endif; ?>
</div>
