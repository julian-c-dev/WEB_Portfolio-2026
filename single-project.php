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
		<section class="project-hero relative min-h-[60vh] flex items-center justify-center bg-gradient-to-br from-gray-900 to-gray-800 text-white overflow-hidden">

			<!-- Background Pattern -->
			<div class="absolute inset-0 opacity-10">
				<?php if ( has_post_thumbnail() ) : ?>
					<?php the_post_thumbnail( 'full', array( 'class' => 'w-full h-full object-cover' ) ); ?>
				<?php endif; ?>
			</div>

			<div class="container max-w-container mx-auto px-4 relative z-10">

				<!-- Back Button -->
				<a href="/#portfolio-content"
					class="inline-flex items-center gap-2 text-white mb-8 hover:text-blue-400 transition-colors">
					<?php echo wp_kses( portfolio_2026_svgs( 'arrow-left' ), portfolio_2026_allowed_svg_tags() ); ?>
					Back to Portfolio
				</a>

				<!-- Status Badge -->
				<?php if ( $project_status ) : ?>
					<div class="mb-4">
						<span class="inline-block text-sm font-bold px-4 py-2 rounded-full shadow-lg
							<?php
							echo 'Active' === $project_status ? 'bg-green-500 text-white' : '';
							echo 'Completed' === $project_status ? 'bg-blue-500 text-white' : '';
							echo 'In Progress' === $project_status ? 'bg-yellow-500 text-white' : '';
							?>
						">
							<?php echo esc_html( $project_status ); ?>
						</span>
					</div>
				<?php endif; ?>

				<!-- Project Title -->
				<h1 class="text-5xl md:text-6xl font-bold mb-6">
					<?php the_title(); ?>
				</h1>

				<!-- Project Excerpt -->
				<p class="text-xl text-gray-300 max-w-3xl mb-8">
					<?php echo esc_html( get_the_excerpt() ); ?>
				</p>

				<!-- Project Meta -->
				<div class="flex flex-wrap gap-4 mb-8">
					<?php if ( $start_date ) : ?>
						<div class="flex items-center gap-2 text-gray-300">
							<span>📅</span>
							<span><?php echo esc_html( gmdate( 'M Y', strtotime( $start_date ) ) ); ?>
								<?php echo $end_date ? ' - ' . gmdate( 'M Y', strtotime( $end_date ) ) : ' - Present'; ?>
							</span>
						</div>
					<?php endif; ?>
				</div>

				<!-- Action Buttons -->
				<div class="flex flex-wrap gap-4">
					<?php if ( $project_url ) : ?>
						<a href="<?php echo esc_url( $project_url ); ?>"
							target="_blank"
							rel="noopener noreferrer"
							class="inline-flex items-center gap-2 bg-white text-gray-900 px-8 py-4 rounded-lg font-semibold hover:shadow-xl transition-all">
							🌐 View Live Project
						</a>
					<?php endif; ?>

					<?php if ( $github_url ) : ?>
						<a href="<?php echo esc_url( $github_url ); ?>"
							target="_blank"
							rel="noopener noreferrer"
							class="inline-flex items-center gap-2 bg-gray-900 text-white border-2 border-white px-8 py-4 rounded-lg font-semibold hover:bg-gray-800 transition-all">
							<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
							View on GitHub
						</a>
					<?php endif; ?>
				</div>

			</div>
		</section>

		<!-- Project Content -->
		<section class="project-content bg-gray-50 py-16">
			<div class="container max-w-container mx-auto px-4">

				<div class="grid lg:grid-cols-3 gap-12">

					<!-- Main Content -->
					<div class="lg:col-span-2">

						<!-- Technologies Used -->
						<?php if ( $technologies_used ) : ?>
							<div class="technologies-section bg-white p-8 rounded-xl shadow-lg mb-8">
								<h2 class="text-2xl font-bold mb-4 text-gray-900">🛠️ Technologies Used</h2>
								<div class="flex flex-wrap gap-3">
									<?php foreach ( $technologies_used as $tech ) : ?>
										<span class="text-sm font-semibold px-4 py-2 bg-blue-100 text-blue-800 rounded-lg">
											<?php echo esc_html( $tech ); ?>
										</span>
									<?php endforeach; ?>
								</div>
							</div>
						<?php endif; ?>

						<!-- Project Description -->
						<div class="description-section bg-white p-8 rounded-xl shadow-lg mb-8">
							<h2 class="text-2xl font-bold mb-4 text-gray-900">📝 About This Project</h2>
							<div class="prose prose-lg max-w-none">
								<?php the_content(); ?>
							</div>
						</div>

						<!-- Project Features -->
						<?php if ( $project_features && have_rows( 'project_features' ) ) : ?>
							<div class="features-section bg-white p-8 rounded-xl shadow-lg mb-8">
								<h2 class="text-2xl font-bold mb-6 text-gray-900">✨ Key Features</h2>
								<div class="grid md:grid-cols-2 gap-4">
									<?php
									while ( have_rows( 'project_features' ) ) :
										the_row();
										$feature_title = get_sub_field( 'feature_title' );
										$feature_desc  = get_sub_field( 'feature_description' );
										?>
										<div class="feature-item p-4 bg-gray-50 rounded-lg border-l-4 border-blue-600">
											<h3 class="font-bold text-gray-900 mb-2"><?php echo esc_html( $feature_title ); ?></h3>
											<p class="text-gray-600 text-sm"><?php echo esc_html( $feature_desc ); ?></p>
										</div>
									<?php endwhile; ?>
								</div>
							</div>
						<?php endif; ?>

						<!-- Project Gallery -->
						<?php if ( $project_gallery ) : ?>
							<div class="gallery-section bg-white p-8 rounded-xl shadow-lg">
								<h2 class="text-2xl font-bold mb-6 text-gray-900">🖼️ Project Gallery</h2>
								<div class="grid md:grid-cols-2 gap-4">
									<?php foreach ( $project_gallery as $image ) : ?>
										<a href="<?php echo esc_url( $image['url'] ); ?>"
											data-lightbox="project-gallery"
											class="block rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow">
											<img src="<?php echo esc_url( $image['sizes']['large'] ); ?>"
												alt="<?php echo esc_attr( $image['alt'] ); ?>"
												class="w-full h-64 object-cover hover:scale-105 transition-transform duration-300">
										</a>
									<?php endforeach; ?>
								</div>
							</div>
						<?php endif; ?>

					</div>

					<!-- Sidebar -->
					<div class="lg:col-span-1">

						<!-- Featured Image -->
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="bg-white p-4 rounded-xl shadow-lg mb-8">
								<?php the_post_thumbnail( 'large', array( 'class' => 'w-full rounded-lg' ) ); ?>
							</div>
						<?php endif; ?>

						<!-- Back to Projects -->
						<div class="bg-gradient-to-br from-blue-600 to-purple-600 p-8 rounded-xl shadow-lg text-white text-center">
							<h3 class="text-xl font-bold mb-4">Explore More Projects</h3>
							<p class="mb-6 text-blue-100">Check out my other work and see what I've been building.</p>
							<a href="/#portfolio-content"
								class="inline-block bg-white text-blue-600 px-6 py-3 rounded-lg font-semibold hover:shadow-xl transition-all">
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
