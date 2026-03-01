<?php
/**
 * Experience Section - Card List Style
 *
 * ACF Fields (group: Experience Card):
 *   - start_date   (date_picker, return_format: d/m/Y)
 *   - end_date     (date_picker, return_format: d/m/Y)
 *   - title        (text)  — job title
 *   - link         (link, return_format: array) — { url, title (company), target }
 *   - description  (textarea)
 *   - skills       (relationship → skill CPT, return_format: id)
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

<ol class="experience-list group/list space-y-12">

	<?php if ( $experience_query->have_posts() ) : ?>

		<?php
		while ( $experience_query->have_posts() ) :
			$experience_query->the_post();

			$job_title   = get_field( 'title' );
			$link        = get_field( 'link' );
			$start_date  = get_field( 'start_date' );
			$end_date    = get_field( 'end_date' );
			$description = get_field( 'description' );
			$skill_ids   = get_field( 'skills' );

			// Format dates: d/m/Y → "M Y" (e.g. "Jan 2018")
			$start_formatted = $start_date ? DateTime::createFromFormat( 'd/m/Y', $start_date )->format( 'M Y' ) : '';
			$end_formatted   = $end_date ? DateTime::createFromFormat( 'd/m/Y', $end_date )->format( 'M Y' ) : __( 'Present', 'portfolio_2026' );
			$date_range      = $start_formatted . ' — ' . $end_formatted;

			// Link field (ACF link object)
			$company_name   = $link ? $link['title'] : '';
			$company_url    = $link ? $link['url'] : '';
			$company_target = ( $link && $link['target'] ) ? $link['target'] : '_self';
			$is_external    = $company_target === '_blank';

			$aria_label = $job_title;
			if ( $company_name ) {
				$aria_label .= ' ' . __( 'at', 'portfolio_2026' ) . ' ' . $company_name;
				if ( $is_external ) {
					$aria_label .= ' ' . __( '(opens in a new tab)', 'portfolio_2026' );
				}
			}
			?>

			<li class="mb-12">
				<div class="group relative grid items-start pb-1 transition-all sm:grid-cols-8 sm:gap-8 md:gap-4 lg:hover:!opacity-100 lg:group-hover/list:opacity-50">

					<!-- Hover overlay -->
					<div class="absolute -inset-x-4 -inset-y-4 z-0 hidden rounded-md transition motion-reduce:transition-none lg:-inset-x-6 lg:block lg:group-hover:bg-slate-800/50 lg:group-hover:shadow-[inset_0_1px_0_0_rgba(148,163,184,0.1)] lg:group-hover:drop-shadow-lg" aria-hidden="true"></div>

					<!-- Date range -->
					<header class="z-10 mt-5 text-xs font-semibold uppercase tracking-wide text-slate-500 sm:col-span-2"
					        aria-label="<?php echo esc_attr( $date_range ); ?>">
						<?php echo esc_html( $date_range ); ?>
					</header>

					<!-- Content -->
					<div class="z-10 sm:col-span-6 mb-4">

						<!-- Job Title & Company -->
						<h3 class="leading-snug text-slate-400 transition-colors group-hover:text-white">
							<a class="inline-flex items-baseline font-medium leading-tight text-slate-400 group-hover:text-white transition-colors group/link text-base"
							   href="<?php echo esc_url( $company_url ?: get_permalink() ); ?>"
							   target="<?php echo esc_attr( $company_target ); ?>"
							   <?php if ( $is_external ) : ?>rel="noreferrer noopener"<?php endif; ?>
							   aria-label="<?php echo esc_attr( $aria_label ); ?>">
								<span class="absolute -inset-x-4 -inset-y-2.5 hidden rounded md:-inset-x-6 md:-inset-y-4 lg:block"></span>
								<span>
									<?php echo esc_html( $job_title ); ?>
									<?php if ( $company_name ) : ?>
										·&nbsp;<span class="inline-block">
											<?php echo esc_html( $company_name ); ?>
											<?php if ( $is_external ) : ?>
												<?php echo portfolio_2026_svgs( 'arrow-external', 'inline-block h-4 w-4 shrink-0 transition-transform group-hover/link:-translate-y-1 group-hover/link:translate-x-1 group-focus-visible/link:-translate-y-1 group-focus-visible/link:translate-x-1 motion-reduce:transition-none ml-1 translate-y-px' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
											<?php endif; ?>
										</span>
									<?php endif; ?>
								</span>
							</a>
						</h3>

						<!-- Description -->
						<?php if ( $description ) : ?>
							<p class="mt-2 text-sm leading-normal text-slate-400">
								<?php echo esc_html( $description ); ?>
							</p>
						<?php endif; ?>

						<!-- Skills -->
						<?php if ( $skill_ids ) : ?>
							<ul class="mt-2 flex flex-wrap" aria-label="<?php esc_attr_e( 'Technologies used', 'portfolio_2026' ); ?>">
								<?php
									$skill_abbreviations = array(
										'WordPress Coding Standards (WPCS)' => 'WPCS',
									);
									foreach ( $skill_ids as $skill_id ) :
									$skill_name    = get_the_title( $skill_id );
									$skill_label   = $skill_abbreviations[ $skill_name ] ?? $skill_name;
									$color_family  = portfolio_2026_skill_color_family( $skill_name );
									$color_classes = portfolio_2026_skill_classes( $color_family, true );
									?>
									<li class="mr-1.5 mt-2">
										<div class="flex items-center rounded-full px-3 py-1 text-xs font-medium leading-5 ring-1 ring-inset <?php echo esc_attr( $color_classes ); ?>">
											<?php echo esc_html( $skill_label ); ?>
										</div>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>

					</div>

				</div>
			</li>

		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>

	<?php else : ?>
		<li class="text-slate-400">
			<p><?php esc_html_e( 'No experience added yet.', 'portfolio_2026' ); ?>
				<a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=experience' ) ); ?>"
				   class="text-white font-semibold">
					<?php esc_html_e( 'Add your first experience →', 'portfolio_2026' ); ?>
				</a>
			</p>
		</li>
	<?php endif; ?>

</ol>

<?php
$cv_url = get_field( 'resume_url', 'option' ) ?: get_template_directory_uri() . '/assets/dist/file/resume.pdf';
?>
<div class="mt-12">
	<a href="<?php echo esc_url( $cv_url ); ?>"
	   download
	   target="_blank"
	   rel="noopener noreferrer"
	   class="group inline-flex items-center gap-2 text-sm font-semibold text-slate-400 hover:text-white transition-colors">
		<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
		<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
	</svg>
	<span><?php esc_html_e( 'Download my full résumé', 'portfolio_2026' ); ?></span>
	</a>
</div>


