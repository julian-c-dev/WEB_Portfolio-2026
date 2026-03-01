<?php
/**
 * Projects Section - Card List Style.
 *
 * ACF Fields (group: Project Card):
 *   - title        (text)                          — project title
 *   - link         (link, return_format: array)    — { url, title, target }
 *   - description  (textarea)
 *   - skills       (relationship → skill CPT, return_format: id)
 *
 * Also uses: featured image (thumbnail) from the post.
 *
 * @package portfolio_2026
 */

$projects_query = new WP_Query(
	array(
		'post_type'      => 'project',
		'posts_per_page' => -1,
		'orderby'        => 'menu_order date',
		'order'          => 'ASC',
	)
);
?>

<ol class="projects-list group/list space-y-12">

	<?php if ( $projects_query->have_posts() ) : ?>

		<?php
		while ( $projects_query->have_posts() ) :
			$projects_query->the_post();

			$acf_title     = get_field( 'title' );
			$project_title = $acf_title ? $acf_title : get_the_title();
			$thumbnail_id  = get_post_thumbnail_id();
			$project_link  = get_field( 'link' );
			$description   = get_field( 'description' );
			$skill_ids     = get_field( 'skills' );

			?>

			<li class="mb-12">
				<div class="group relative grid items-start pb-1 transition-all sm:grid-cols-8 sm:gap-8 md:gap-4 lg:hover:!opacity-100 lg:group-hover/list:opacity-50">

					<!-- Hover overlay -->
					<div class="absolute -inset-x-4 -inset-y-4 z-0 hidden rounded-md transition motion-reduce:transition-none lg:-inset-x-6 lg:block lg:group-hover:bg-slate-800/50 lg:group-hover:shadow-[inset_0_1px_0_0_rgba(148,163,184,0.1)] lg:group-hover:drop-shadow-lg" aria-hidden="true"></div>

					<!-- Featured image (left column) -->
					<div class="z-10 sm:col-span-2 self-start mt-4">
						<?php if ( $thumbnail_id ) : ?>
						<div class="rounded border-2 border-slate-200/10 transition group-hover:border-slate-200/30 overflow-hidden aspect-video">
							<?php
							echo wp_get_attachment_image(
								$thumbnail_id,
								'medium',
								false,
								array(
									'class'   => 'w-full h-full object-cover rounded',
									'loading' => 'lazy',
									'alt'     => esc_attr( $project_title ),
								)
							); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
							?>
						</div>
						<?php endif; ?>
					</div>

					<!-- Content -->
					<div class="z-10 sm:col-span-6 mb-4">

						<!-- Title -->
						<h3 class="leading-snug text-slate-400 transition-colors group-hover:text-white">
							<?php if ( $project_link ) : ?>
							<a class="inline-flex items-baseline font-medium leading-tight text-slate-400 group-hover:text-white transition-colors group/link text-base"
								href="<?php echo esc_url( $project_link ); ?>"
								target="_blank"
								rel="noreferrer noopener">
								<span class="absolute -inset-x-4 -inset-y-2.5 hidden rounded md:-inset-x-6 md:-inset-y-4 lg:block"></span>
								<span>
									<?php echo esc_html( $project_title ); ?>
									<?php echo portfolio_2026_svgs( 'arrow-external', 'inline-block h-4 w-4 shrink-0 transition-transform group-hover/link:-translate-y-1 group-hover/link:translate-x-1 motion-reduce:transition-none ml-1 translate-y-px' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
								</span>
							</a>
							<?php else : ?>
							<span class="font-medium text-base"><?php echo esc_html( $project_title ); ?></span>
							<?php endif; ?>
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
			<p><?php esc_html_e( 'No projects added yet.', 'portfolio_2026' ); ?>
				<a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=project' ) ); ?>"
					class="text-white font-semibold">
					<?php esc_html_e( 'Add your first project →', 'portfolio_2026' ); ?>
				</a>
			</p>
		</li>
	<?php endif; ?>

</ol>
