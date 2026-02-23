<?php
/**
 * Single Project Template
 *
 * @package portfolio_2026
 */

get_header();

while ( have_posts() ) :
	the_post();

	$project_url       = get_field( 'project_url' );
	$github_url        = get_field( 'github_url' );
	$project_status    = get_field( 'project_status' );
	$technologies_used = get_field( 'technologies_used' );
	$project_gallery   = get_field( 'project_gallery' );
	$project_features  = get_field( 'project_features' ); // Repeater
	$start_date        = get_field( 'project_start_date' );
	$end_date          = get_field( 'project_end_date' );
	?>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'single-project' ); ?>>

		<!-- Project Hero -->
		<section class="project-hero mk-relative mk-min-h-[60vh] mk-flex mk-items-center mk-justify-center mk-bg-gradient-to-br mk-from-gray-900 mk-to-gray-800 mk-text-white mk-overflow-hidden">

			<!-- Background Pattern -->
			<div class="mk-absolute mk-inset-0 mk-opacity-10">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'full', array( 'class' => 'mk-w-full mk-h-full mk-object-cover' ) ); ?>
				<?php endif; ?>
			</div>

			<div class="mk-container mk-max-w-container mk-mx-auto mk-px-4 mk-relative mk-z-10">

				<!-- Back Button -->
				<a href="/#portfolio-content"
				   class="mk-inline-flex mk-items-center mk-gap-2 mk-text-white mk-mb-8 hover:mk-text-blue-400 mk-transition-colors">
					<?php echo wp_kses( portfolio_2026_svgs( 'arrow-left' ), portfolio_2026_allowed_svg_tags() ); ?>
					Back to Portfolio
				</a>

				<!-- Status Badge -->
				<?php if ( $project_status ) : ?>
					<div class="mk-mb-4">
						<span class="mk-inline-block mk-text-sm mk-font-bold mk-px-4 mk-py-2 mk-rounded-full mk-shadow-lg
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

				<!-- Project Title -->
				<h1 class="mk-text-5xl md:mk-text-6xl mk-font-bold mk-mb-6">
					<?php the_title(); ?>
				</h1>

				<!-- Project Excerpt -->
				<p class="mk-text-xl mk-text-gray-300 mk-max-w-3xl mk-mb-8">
					<?php echo esc_html( get_the_excerpt() ); ?>
				</p>

				<!-- Project Meta -->
				<div class="mk-flex mk-flex-wrap mk-gap-4 mk-mb-8">
					<?php if ( $start_date ) : ?>
						<div class="mk-flex mk-items-center mk-gap-2 mk-text-gray-300">
							<span>📅</span>
							<span><?php echo esc_html( gmdate( 'M Y', strtotime( $start_date ) ) ); ?>
								<?php echo $end_date ? ' - ' . gmdate( 'M Y', strtotime( $end_date ) ) : ' - Present'; ?>
							</span>
						</div>
					<?php endif; ?>
				</div>

				<!-- Action Buttons -->
				<div class="mk-flex mk-flex-wrap mk-gap-4">
					<?php if ( $project_url ) : ?>
						<a href="<?php echo esc_url( $project_url ); ?>"
						   target="_blank"
						   rel="noopener noreferrer"
						   class="mk-inline-flex mk-items-center mk-gap-2 mk-bg-white mk-text-gray-900 mk-px-8 mk-py-4 mk-rounded-lg mk-font-semibold hover:mk-shadow-xl mk-transition-all">
							🌐 View Live Project
						</a>
					<?php endif; ?>

					<?php if ( $github_url ) : ?>
						<a href="<?php echo esc_url( $github_url ); ?>"
						   target="_blank"
						   rel="noopener noreferrer"
						   class="mk-inline-flex mk-items-center mk-gap-2 mk-bg-gray-900 mk-text-white mk-border-2 mk-border-white mk-px-8 mk-py-4 mk-rounded-lg mk-font-semibold hover:mk-bg-gray-800 mk-transition-all">
							<svg class="mk-w-5 mk-h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
							View on GitHub
						</a>
					<?php endif; ?>
				</div>

			</div>
		</section>

		<!-- Project Content -->
		<section class="project-content mk-bg-gray-50 mk-py-16">
			<div class="mk-container mk-max-w-container mk-mx-auto mk-px-4">

				<div class="mk-grid lg:mk-grid-cols-3 mk-gap-12">

					<!-- Main Content -->
					<div class="lg:mk-col-span-2">

						<!-- Technologies Used -->
						<?php if ( $technologies_used ) : ?>
							<div class="technologies-section mk-bg-white mk-p-8 mk-rounded-xl mk-shadow-lg mk-mb-8">
								<h2 class="mk-text-2xl mk-font-bold mk-mb-4 mk-text-gray-900">🛠️ Technologies Used</h2>
								<div class="mk-flex mk-flex-wrap mk-gap-3">
									<?php foreach ( $technologies_used as $tech ) : ?>
										<span class="mk-text-sm mk-font-semibold mk-px-4 mk-py-2 mk-bg-blue-100 mk-text-blue-800 mk-rounded-lg">
											<?php echo esc_html( $tech ); ?>
										</span>
									<?php endforeach; ?>
								</div>
							</div>
						<?php endif; ?>

						<!-- Project Description -->
						<div class="description-section mk-bg-white mk-p-8 mk-rounded-xl mk-shadow-lg mk-mb-8">
							<h2 class="mk-text-2xl mk-font-bold mk-mb-4 mk-text-gray-900">📝 About This Project</h2>
							<div class="mk-prose mk-prose-lg mk-max-w-none">
								<?php the_content(); ?>
							</div>
						</div>

						<!-- Project Features -->
						<?php if ( $project_features && have_rows( 'project_features' ) ) : ?>
							<div class="features-section mk-bg-white mk-p-8 mk-rounded-xl mk-shadow-lg mk-mb-8">
								<h2 class="mk-text-2xl mk-font-bold mk-mb-6 mk-text-gray-900">✨ Key Features</h2>
								<div class="mk-grid md:mk-grid-cols-2 mk-gap-4">
									<?php
									while ( have_rows( 'project_features' ) ) :
										the_row();
										$feature_title = get_sub_field( 'feature_title' );
										$feature_desc  = get_sub_field( 'feature_description' );
										?>
										<div class="feature-item mk-p-4 mk-bg-gray-50 mk-rounded-lg mk-border-l-4 mk-border-blue-600">
											<h3 class="mk-font-bold mk-text-gray-900 mk-mb-2"><?php echo esc_html( $feature_title ); ?></h3>
											<p class="mk-text-gray-600 mk-text-sm"><?php echo esc_html( $feature_desc ); ?></p>
										</div>
									<?php endwhile; ?>
								</div>
							</div>
						<?php endif; ?>

						<!-- Project Gallery -->
						<?php if ( $project_gallery ) : ?>
							<div class="gallery-section mk-bg-white mk-p-8 mk-rounded-xl mk-shadow-lg">
								<h2 class="mk-text-2xl mk-font-bold mk-mb-6 mk-text-gray-900">🖼️ Project Gallery</h2>
								<div class="mk-grid md:mk-grid-cols-2 mk-gap-4">
									<?php foreach ( $project_gallery as $image ) : ?>
										<a href="<?php echo esc_url( $image['url'] ); ?>"
										   data-lightbox="project-gallery"
										   class="mk-block mk-rounded-lg mk-overflow-hidden mk-shadow-md hover:mk-shadow-xl mk-transition-shadow">
											<img src="<?php echo esc_url( $image['sizes']['large'] ); ?>"
												 alt="<?php echo esc_attr( $image['alt'] ); ?>"
												 class="mk-w-full mk-h-64 mk-object-cover hover:mk-scale-105 mk-transition-transform mk-duration-300">
										</a>
									<?php endforeach; ?>
								</div>
							</div>
						<?php endif; ?>

					</div>

					<!-- Sidebar -->
					<div class="lg:mk-col-span-1">

						<!-- Featured Image -->
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="mk-bg-white mk-p-4 mk-rounded-xl mk-shadow-lg mk-mb-8">
								<?php the_post_thumbnail( 'large', array( 'class' => 'mk-w-full mk-rounded-lg' ) ); ?>
							</div>
						<?php endif; ?>

						<!-- Back to Projects -->
						<div class="mk-bg-gradient-to-br mk-from-blue-600 mk-to-purple-600 mk-p-8 mk-rounded-xl mk-shadow-lg mk-text-white mk-text-center">
							<h3 class="mk-text-xl mk-font-bold mk-mb-4">Explore More Projects</h3>
							<p class="mk-mb-6 mk-text-blue-100">Check out my other work and see what I've been building.</p>
							<a href="/#portfolio-content"
							   class="mk-inline-block mk-bg-white mk-text-blue-600 mk-px-6 mk-py-3 mk-rounded-lg mk-font-semibold hover:mk-shadow-xl mk-transition-all">
								View All Projects
							</a>
						</div>

					</div>

				</div>

			</div>
		</section>

	</article>

<?php endwhile; ?>

<?php
get_footer();
