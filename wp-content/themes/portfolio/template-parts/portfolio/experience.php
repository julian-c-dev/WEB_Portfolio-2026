<?php
/**
 * Experience Tab Content - Vertical Timeline
 *
 * @package portfolio_2026
 */

$experience_query = new WP_Query(
	array(
		'post_type'      => 'experience',
		'posts_per_page' => -1,
		'orderby'        => 'meta_value',
		'meta_key'       => 'start_date',
		'order'          => 'DESC',
	)
);
?>

<div class="experience-content">
	<h2 class="text-4xl font-bold mb-12 text-gray-900 text-center">Professional Experience</h2>

	<?php if ( $experience_query->have_posts() ) : ?>

		<!-- Vertical Timeline -->
		<div class="timeline relative max-w-4xl mx-auto">

			<!-- Timeline Line -->
			<div class="timeline-line absolute left-1/2 transform -translate-x-1/2 w-1 h-full bg-gradient-to-b from-blue-500 via-blue-400 to-blue-300"></div>

			<?php
			$index = 0;
			while ( $experience_query->have_posts() ) :
				$experience_query->the_post();

				$company_name  = get_field( 'company_name' );
				$job_title     = get_field( 'job_title' ) ?: get_the_title();
				$start_date    = get_field( 'start_date' ); // Format: Y-m-d
				$end_date      = get_field( 'end_date' ); // Format: Y-m-d or "Present"
				$location      = get_field( 'location' );
				$company_logo  = get_field( 'company_logo' );
				$technologies  = get_field( 'technologies' ); // Array or comma-separated
				$is_left       = ( $index % 2 === 0 );
				$index++;

				// Format dates
				$start_formatted = $start_date ? gmdate( 'M Y', strtotime( $start_date ) ) : '';
				$end_formatted   = $end_date === 'Present' ? 'Present' : ( $end_date ? gmdate( 'M Y', strtotime( $end_date ) ) : 'Present' );
				?>

				<div class="timeline-item relative mb-16 <?php echo $is_left ? 'pr-1/2' : 'pl-1/2'; ?>">

					<!-- Timeline Dot -->
					<div class="timeline-dot absolute left-1/2 top-6 transform -translate-x-1/2 w-6 h-6 bg-blue-600 rounded-full border-4 border-white shadow-lg z-10"></div>

					<!-- Content Card -->
					<div class="experience-card bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 border-2 border-gray-100 <?php echo $is_left ? 'mr-8 text-right' : 'ml-8'; ?>">

						<div class="<?php echo $is_left ? 'flex flex-col items-end' : 'flex flex-col items-start'; ?>">

							<!-- Company Logo -->
							<?php if ( $company_logo ) : ?>
								<div class="company-logo mb-4">
									<img src="<?php echo esc_url( $company_logo['url'] ); ?>"
										 alt="<?php echo esc_attr( $company_name ); ?>"
										 class="h-12 object-contain">
								</div>
							<?php endif; ?>

							<!-- Job Title -->
							<h3 class="text-2xl font-bold text-gray-900 mb-2">
								<?php echo esc_html( $job_title ); ?>
							</h3>

							<!-- Company Name -->
							<?php if ( $company_name ) : ?>
								<p class="text-lg font-semibold text-blue-600 mb-2">
									<?php echo esc_html( $company_name ); ?>
								</p>
							<?php endif; ?>

							<!-- Date Range -->
							<p class="text-sm font-medium text-gray-500 mb-1">
								📅 <?php echo esc_html( $start_formatted ); ?> - <?php echo esc_html( $end_formatted ); ?>
							</p>

							<!-- Location -->
							<?php if ( $location ) : ?>
								<p class="text-sm text-gray-500 mb-4">
									📍 <?php echo esc_html( $location ); ?>
								</p>
							<?php endif; ?>

							<!-- Description -->
							<div class="experience-description text-gray-700 mb-4 <?php echo $is_left ? 'text-right' : 'text-left'; ?>">
								<?php the_content(); ?>
							</div>

							<!-- Technologies/Skills Used -->
							<?php if ( $technologies ) : ?>
								<div class="technologies flex flex-wrap gap-2 <?php echo $is_left ? 'justify-end' : 'justify-start'; ?>">
									<?php
									$tech_array = is_array( $technologies ) ? $technologies : explode( ',', $technologies );
									foreach ( $tech_array as $tech ) :
										$tech = trim( $tech );
										?>
										<span class="text-xs font-semibold px-3 py-1 bg-gray-100 text-gray-700 rounded-full">
											<?php echo esc_html( $tech ); ?>
										</span>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>

						</div>
					</div>

				</div>

			<?php endwhile; ?>
		</div>

		<?php wp_reset_postdata(); ?>

	<?php else : ?>
		<!-- No Experience Found -->
		<div class="bg-blue-50 border border-blue-200 rounded-lg p-8 text-center">
			<p class="text-gray-700 mb-4">No experience added yet.</p>
			<a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=experience' ) ); ?>"
			   class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
				Add Your First Experience
			</a>
		</div>
	<?php endif; ?>
</div>

<style>
/* Responsive Timeline */
@media (max-width: 768px) {
	.timeline-item {
		padding-left: 3rem !important;
		padding-right: 0 !important;
		text-align: left !important;
	}
	.timeline-line {
		left: 1.5rem !important;
	}
	.timeline-dot {
		left: 1.5rem !important;
	}
	.experience-card {
		margin-left: 0 !important;
		margin-right: 0 !important;
	}
	.experience-card .text-right,
	.experience-card .flex-col.items-end {
		text-align: left !important;
		align-items: flex-start !important;
	}
	.experience-card .justify-end {
		justify-content: flex-start !important;
	}
}
</style>
