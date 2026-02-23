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
	<h2 class="mk-text-4xl mk-font-bold mk-mb-12 mk-text-gray-900 mk-text-center">Professional Experience</h2>

	<?php if ( $experience_query->have_posts() ) : ?>

		<!-- Vertical Timeline -->
		<div class="timeline mk-relative mk-max-w-4xl mk-mx-auto">

			<!-- Timeline Line -->
			<div class="timeline-line mk-absolute mk-left-1/2 mk-transform -mk-translate-x-1/2 mk-w-1 mk-h-full mk-bg-gradient-to-b mk-from-blue-500 mk-via-blue-400 mk-to-blue-300"></div>

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

				<div class="timeline-item mk-relative mk-mb-16 <?php echo $is_left ? 'mk-pr-1/2' : 'mk-pl-1/2'; ?>">

					<!-- Timeline Dot -->
					<div class="timeline-dot mk-absolute mk-left-1/2 mk-top-6 mk-transform -mk-translate-x-1/2 mk-w-6 mk-h-6 mk-bg-blue-600 mk-rounded-full mk-border-4 mk-border-white mk-shadow-lg mk-z-10"></div>

					<!-- Content Card -->
					<div class="experience-card mk-bg-white mk-p-6 mk-rounded-xl mk-shadow-lg hover:mk-shadow-xl mk-transition-all mk-duration-300 mk-border-2 mk-border-gray-100 <?php echo $is_left ? 'mk-mr-8 mk-text-right' : 'mk-ml-8'; ?>">

						<div class="<?php echo $is_left ? 'mk-flex mk-flex-col mk-items-end' : 'mk-flex mk-flex-col mk-items-start'; ?>">

							<!-- Company Logo -->
							<?php if ( $company_logo ) : ?>
								<div class="company-logo mk-mb-4">
									<img src="<?php echo esc_url( $company_logo['url'] ); ?>"
										 alt="<?php echo esc_attr( $company_name ); ?>"
										 class="mk-h-12 mk-object-contain">
								</div>
							<?php endif; ?>

							<!-- Job Title -->
							<h3 class="mk-text-2xl mk-font-bold mk-text-gray-900 mk-mb-2">
								<?php echo esc_html( $job_title ); ?>
							</h3>

							<!-- Company Name -->
							<?php if ( $company_name ) : ?>
								<p class="mk-text-lg mk-font-semibold mk-text-blue-600 mk-mb-2">
									<?php echo esc_html( $company_name ); ?>
								</p>
							<?php endif; ?>

							<!-- Date Range -->
							<p class="mk-text-sm mk-font-medium mk-text-gray-500 mk-mb-1">
								📅 <?php echo esc_html( $start_formatted ); ?> - <?php echo esc_html( $end_formatted ); ?>
							</p>

							<!-- Location -->
							<?php if ( $location ) : ?>
								<p class="mk-text-sm mk-text-gray-500 mk-mb-4">
									📍 <?php echo esc_html( $location ); ?>
								</p>
							<?php endif; ?>

							<!-- Description -->
							<div class="experience-description mk-text-gray-700 mk-mb-4 <?php echo $is_left ? 'mk-text-right' : 'mk-text-left'; ?>">
								<?php the_content(); ?>
							</div>

							<!-- Technologies/Skills Used -->
							<?php if ( $technologies ) : ?>
								<div class="technologies mk-flex mk-flex-wrap mk-gap-2 <?php echo $is_left ? 'mk-justify-end' : 'mk-justify-start'; ?>">
									<?php
									$tech_array = is_array( $technologies ) ? $technologies : explode( ',', $technologies );
									foreach ( $tech_array as $tech ) :
										$tech = trim( $tech );
										?>
										<span class="mk-text-xs mk-font-semibold mk-px-3 mk-py-1 mk-bg-gray-100 mk-text-gray-700 mk-rounded-full">
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
		<div class="mk-bg-blue-50 mk-border mk-border-blue-200 mk-rounded-lg mk-p-8 mk-text-center">
			<p class="mk-text-gray-700 mk-mb-4">No experience added yet.</p>
			<a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=experience' ) ); ?>"
			   class="mk-inline-block mk-bg-blue-600 mk-text-white mk-px-6 mk-py-2 mk-rounded-lg hover:mk-bg-blue-700">
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
	.experience-card .mk-text-right,
	.experience-card .mk-flex-col.mk-items-end {
		text-align: left !important;
		align-items: flex-start !important;
	}
	.experience-card .mk-justify-end {
		justify-content: flex-start !important;
	}
}
</style>
