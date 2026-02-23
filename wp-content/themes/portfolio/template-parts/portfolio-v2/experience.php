<?php
/**
 * Experience Section - Minimalist List Style
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

<div class="experience-list mk-space-y-12">

	<?php if ( $experience_query->have_posts() ) : ?>

		<?php
		while ( $experience_query->have_posts() ) :
			$experience_query->the_post();

			$company_name = get_field( 'company_name' );
			$job_title    = get_field( 'job_title' ) ?: get_the_title();
			$start_date   = get_field( 'start_date' );
			$end_date     = get_field( 'end_date' );
			$location     = get_field( 'location' );
			$technologies = get_field( 'technologies' );

			// Format dates
			$start_formatted = $start_date ? gmdate( 'M Y', strtotime( $start_date ) ) : '';
			$end_formatted   = $end_date === 'Present' ? 'Present' : ( $end_date ? gmdate( 'M Y', strtotime( $end_date ) ) : 'Present' );
			$date_range      = $start_formatted . ' — ' . $end_formatted;
			?>

			<div class="experience-item mk-group mk-relative mk-grid mk-gap-4 mk-pb-1 mk-transition-all sm:mk-grid-cols-8 sm:mk-gap-8 md:mk-gap-4 lg:hover:!mk-opacity-100 lg:group-hover/list:mk-opacity-50">

				<!-- Date Range (Left on Desktop) -->
				<div class="sm:mk-col-span-2">
					<p class="mk-text-xs mk-font-semibold mk-uppercase mk-tracking-wide mk-text-slate-400">
						<?php echo esc_html( $date_range ); ?>
					</p>
				</div>

				<!-- Content (Right on Desktop) -->
				<div class="sm:mk-col-span-6">

					<!-- Job Title & Company -->
					<h3 class="mk-font-medium mk-leading-snug mk-text-white mk-mb-2">
						<div>
							<a href="<?php the_permalink(); ?>"
							   class="mk-inline-flex mk-items-baseline mk-text-base mk-font-semibold mk-leading-tight mk-text-white group/link">
								<span class="mk-absolute -mk-inset-x-4 -mk-inset-y-2.5 mk-hidden mk-rounded md:-mk-inset-x-6 md:-mk-inset-y-4 lg:mk-block"></span>
								<span>
									<?php echo esc_html( $job_title ); ?>
									<?php if ( $company_name ) : ?>
										<span class="mk-inline-block">
											· <?php echo esc_html( $company_name ); ?>
											<svg class="mk-inline-block mk-h-4 mk-w-4 mk-shrink-0 mk-transition-transform group-hover/link:-mk-translate-y-1 group-hover/link:mk-translate-x-1 group-focus-visible/link:-mk-translate-y-1 group-focus-visible/link:mk-translate-x-1 mk-motion-reduce:mk-transition-none ml-1 mk-translate-y-px" viewBox="0 0 20 20" fill="currentColor">
												<path fill-rule="evenodd" d="M5.22 14.78a.75.75 0 001.06 0l7.22-7.22v5.69a.75.75 0 001.5 0v-7.5a.75.75 0 00-.75-.75h-7.5a.75.75 0 000 1.5h5.69l-7.22 7.22a.75.75 0 000 1.06z" clip-rule="evenodd"></path>
											</svg>
										</span>
									<?php endif; ?>
								</span>
							</a>
						</div>
					</h3>

					<!-- Description -->
					<div class="mk-mt-2 mk-text-sm mk-leading-normal mk-text-slate-400">
						<?php the_excerpt(); ?>
					</div>

					<!-- Technologies -->
					<?php if ( $technologies ) : ?>
						<ul class="mk-mt-3 mk-flex mk-flex-wrap mk-gap-2">
							<?php
							$tech_array = is_array( $technologies ) ? $technologies : explode( ',', $technologies );
							foreach ( $tech_array as $tech ) :
								$tech = trim( $tech );
								?>
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
			<p>No experience added yet. <a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=experience' ) ); ?>" class="mk-text-white mk-font-semibold">Add your first experience →</a></p>
		</div>
	<?php endif; ?>

</div>
