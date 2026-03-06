<?php
/**
 * Skills Section - Color-coded by technology family, grouped by taxonomy.
 *
 * @package portfolio_2026
 */

// Color family display order within each category group.
$family_order = array( 'amber', 'orange', 'sky', 'violet', 'teal', 'slate' );

// Predefined category order (matches taxonomy term slugs).
$category_order = array(
	'programming-languages',
	'frameworks-libraries',
	'wordpress-development',
	'code-quality',
	'developer-tools-ecosystem',
	'tooling', // Legacy slug fallback.
);

// Get all skill_category terms ordered by our predefined order.
$all_terms = get_terms(
	array(
		'taxonomy'   => 'skill_category',
		'hide_empty' => false,
	)
);

// Sort terms by our predefined order.
$terms_ordered = array();
if ( ! is_wp_error( $all_terms ) && ! empty( $all_terms ) ) {
	$terms_by_slug = array();
	foreach ( $all_terms as $skill_term ) {
		$terms_by_slug[ $skill_term->slug ] = $skill_term;
	}
	foreach ( $category_order as $slug ) {
		if ( isset( $terms_by_slug[ $slug ] ) ) {
			$terms_ordered[] = $terms_by_slug[ $slug ];
			unset( $terms_by_slug[ $slug ] );
		}
	}
	foreach ( $terms_by_slug as $skill_term ) {
		$terms_ordered[] = $skill_term;
	}
}

$has_skills = ! empty( $terms_ordered );
?>

<div class="skills-content">

	<?php if ( $has_skills ) : ?>

		<?php
		foreach ( $terms_ordered as $skill_term ) :

			// Get skills in menu_order — WP controls the display order.
			$skills_query = new WP_Query(
				array(
					'post_type'      => 'skill',
					'posts_per_page' => -1,
					'orderby'        => 'menu_order',
					'order'          => 'ASC',
					'tax_query'      => array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_tax_query
						array(
							'taxonomy' => 'skill_category',
							'field'    => 'term_id',
							'terms'    => $skill_term->term_id,
						),
					),
				)
			);

			if ( ! $skills_query->have_posts() ) {
				continue;
			}
			?>

			<div class="skill-category mb-10">

				<h3 class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-3">
					<?php echo esc_html( $skill_term->name ); ?>
				</h3>

				<div class="flex flex-wrap gap-2">
					<?php
					// Collect skills grouped by color family.
					$skill_groups = array();
					while ( $skills_query->have_posts() ) {
						$skills_query->the_post();
						$family                    = portfolio_2026_skill_color_family( get_the_title() );
						$skill_groups[ $family ][] = get_the_title();
					}
					wp_reset_postdata();

					// Sort each group alphabetically, then render in color order.
					foreach ( $family_order as $family ) {
						if ( empty( $skill_groups[ $family ] ) ) {
							continue;
						}
						sort( $skill_groups[ $family ] );
						$classes = portfolio_2026_skill_classes( $family );
						foreach ( $skill_groups[ $family ] as $skill_name ) :
							?>
							<span class="skill-tag inline-flex items-center gap-1.5 rounded-full px-3 py-1 text-xs font-medium ring-1 ring-inset <?php echo esc_attr( $classes ); ?>">
								<?php echo esc_html( $skill_name ); ?>
							</span>
							<?php
						endforeach;
					}
					?>
				</div>

			</div>

		<?php endforeach; ?>

	<?php else : ?>

		<!-- Fallback: static skills shown while CPT has no entries -->
		<?php
		$static_skills = array(
			array(
				'label' => 'Programming Languages',
				'items' => array( 'PHP', 'JavaScript', 'HTML', 'CSS3', 'Sass', 'SQL' ),
			),
			array(
				'label' => 'Frameworks & Libraries',
				'items' => array( 'React', 'Tailwind CSS', 'Bootstrap' ),
			),
			array(
				'label' => 'WordPress Development',
				'items' => array( 'Custom Themes', 'Custom Plugins', 'Custom Post Types', 'Taxonomies', 'Gutenberg', 'ACF', 'AJAX', 'WooCommerce', 'Elementor' ),
			),
			array(
				'label' => 'Code Quality',
				'items' => array( 'WordPress Coding Standards (WPCS)', 'ESLint', 'Git Hooks (Husky)' ),
			),
			array(
				'label' => 'Developer Tools & Ecosystem',
				'items' => array( 'Astro', 'Expo', 'Webpack', 'Gulp', 'Composer', 'Git', 'GitHub', 'Postman', 'phpMyAdmin', 'FileZilla', 'Figma', 'Jira', 'Asana' ),
			),
		);
		foreach ( $static_skills as $group ) :
			?>
			<div class="skill-category mb-10">

				<h3 class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-3">
					<?php echo esc_html( $group['label'] ); ?>
				</h3>

				<div class="flex flex-wrap gap-2">
					<?php
					// Collect skills grouped by color family.
					$skill_groups = array();
					foreach ( $group['items'] as $skill_name ) {
						$family                    = portfolio_2026_skill_color_family( $skill_name );
						$skill_groups[ $family ][] = $skill_name;
					}

					// Sort each group alphabetically, then render in color order.
					foreach ( $family_order as $family ) {
						if ( empty( $skill_groups[ $family ] ) ) {
							continue;
						}
						sort( $skill_groups[ $family ] );
						$classes = portfolio_2026_skill_classes( $family );
						foreach ( $skill_groups[ $family ] as $skill_name ) :
							?>
							<span class="skill-tag inline-flex items-center gap-1.5 rounded-full px-3 py-1 text-xs font-medium ring-1 ring-inset <?php echo esc_attr( $classes ); ?>">
								<?php echo esc_html( $skill_name ); ?>
							</span>
							<?php
						endforeach;
					}
					?>
				</div>

			</div>
		<?php endforeach; ?>

	<?php endif; ?>

</div>
