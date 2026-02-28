<?php
/**
 * Skills Section - Color-coded by technology family, grouped by taxonomy
 *
 * @package portfolio_2026
 */

/**
 * Maps a skill name to a color family based on its technology relationship.
 */
function portfolio_2026_skill_color_family( $skill_name ) {
	$name = strtolower( $skill_name );

	// JS family — amber
	$js_keywords = array( 'javascript', 'react', 'next', 'eslint', 'webpack', 'gulp', 'expo', 'astro', 'node', 'typescript' );
	foreach ( $js_keywords as $kw ) {
		if ( strpos( $name, $kw ) !== false ) return 'amber';
	}

	// HTML — orange
	if ( strpos( $name, 'html' ) !== false ) return 'orange';

	// CSS family — sky (includes Sass, Tailwind, Bootstrap)
	$css_keywords = array( 'css', 'sass', 'scss', 'tailwind', 'bootstrap' );
	foreach ( $css_keywords as $kw ) {
		if ( strpos( $name, $kw ) !== false ) return 'sky';
	}

	// PHP / WordPress / Database family — violet
	$php_keywords = array( 'php', 'wordpress', 'gutenberg', 'woocommerce', 'acf', 'ajax', 'composer', 'wpcs', 'custom theme', 'custom post', 'taxonom', 'coding standard', 'sql', 'elementor', 'custom plugin' );
	foreach ( $php_keywords as $kw ) {
		if ( strpos( $name, $kw ) !== false ) return 'violet';
	}

	// Git family — teal (includes Husky since it's a Git hooks tool)
	$git_keywords = array( 'git', 'husky', 'hook' );
	foreach ( $git_keywords as $kw ) {
		if ( strpos( $name, $kw ) !== false ) return 'teal';
	}

	return 'slate';
}

/**
 * Returns Tailwind classes for a given color family.
 */
function portfolio_2026_skill_classes( $family ) {
	$map = array(
		'amber'  => 'mk-bg-amber-400/10 mk-text-amber-300 mk-ring-amber-400/20',
		'orange' => 'mk-bg-orange-400/10 mk-text-orange-300 mk-ring-orange-400/20',
		'sky'    => 'mk-bg-sky-400/10 mk-text-sky-300 mk-ring-sky-400/20',
		'violet' => 'mk-bg-violet-400/10 mk-text-violet-300 mk-ring-violet-400/20',
		'teal'   => 'mk-bg-teal-400/10 mk-text-teal-300 mk-ring-teal-400/20',
		'slate'  => 'mk-bg-slate-400/10 mk-text-slate-300 mk-ring-slate-400/20',
	);
	return $map[ $family ] ?? $map['slate'];
}

// Color family display order within each category group
$family_order = array( 'amber', 'orange', 'sky', 'violet', 'teal', 'slate' );

// Predefined category order (matches taxonomy term slugs)
$category_order = array(
	'programming-languages',
	'frameworks-libraries',
	'wordpress-development',
	'code-quality',
	'developer-tools-ecosystem',
	'tooling', // legacy slug fallback
);

// Get all skill_category terms ordered by our predefined order
$all_terms = get_terms(
	array(
		'taxonomy'   => 'skill_category',
		'hide_empty' => false,
	)
);

// Sort terms by our predefined order
$terms_ordered = array();
if ( ! is_wp_error( $all_terms ) && ! empty( $all_terms ) ) {
	$terms_by_slug = array();
	foreach ( $all_terms as $term ) {
		$terms_by_slug[ $term->slug ] = $term;
	}
	foreach ( $category_order as $slug ) {
		if ( isset( $terms_by_slug[ $slug ] ) ) {
			$terms_ordered[] = $terms_by_slug[ $slug ];
			unset( $terms_by_slug[ $slug ] );
		}
	}
	foreach ( $terms_by_slug as $term ) {
		$terms_ordered[] = $term;
	}
}

$has_skills = ! empty( $terms_ordered );
?>

<div class="skills-content">

	<?php if ( $has_skills ) : ?>

		<?php foreach ( $terms_ordered as $term ) :

			// Get skills in menu_order — WP controls the display order
			$skills_query = new WP_Query(
				array(
					'post_type'      => 'skill',
					'posts_per_page' => -1,
					'orderby'        => 'menu_order',
					'order'          => 'ASC',
					'tax_query'      => array(
						array(
							'taxonomy' => 'skill_category',
							'field'    => 'term_id',
							'terms'    => $term->term_id,
						),
					),
				)
			);

			if ( ! $skills_query->have_posts() ) continue;
			?>

			<div class="skill-category mk-mb-10">

				<h3 class="mk-text-xs mk-font-bold mk-text-slate-500 mk-uppercase mk-tracking-widest mk-mb-3">
					<?php echo esc_html( $term->name ); ?>
				</h3>

				<div class="mk-flex mk-flex-wrap mk-gap-2">
					<?php
					// Collect skills grouped by color family
					$skill_groups = array();
					while ( $skills_query->have_posts() ) {
						$skills_query->the_post();
						$family                   = portfolio_2026_skill_color_family( get_the_title() );
						$skill_groups[ $family ][] = get_the_title();
					}
					wp_reset_postdata();

					// Sort each group alphabetically, then render in color order
					foreach ( $family_order as $family ) {
						if ( empty( $skill_groups[ $family ] ) ) continue;
						sort( $skill_groups[ $family ] );
						$classes = portfolio_2026_skill_classes( $family );
						foreach ( $skill_groups[ $family ] as $skill_name ) :
							?>
							<span class="skill-tag mk-inline-flex mk-items-center mk-gap-1.5 mk-rounded-full mk-px-3 mk-py-1 mk-text-xs mk-font-medium mk-ring-1 mk-ring-inset <?php echo esc_attr( $classes ); ?>">
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
		foreach ( $static_skills as $group ) : ?>
			<div class="skill-category mk-mb-10">

				<h3 class="mk-text-xs mk-font-bold mk-text-slate-500 mk-uppercase mk-tracking-widest mk-mb-3">
					<?php echo esc_html( $group['label'] ); ?>
				</h3>

				<div class="mk-flex mk-flex-wrap mk-gap-2">
					<?php
					// Collect skills grouped by color family
					$skill_groups = array();
					foreach ( $group['items'] as $skill_name ) {
						$family                   = portfolio_2026_skill_color_family( $skill_name );
						$skill_groups[ $family ][] = $skill_name;
					}

					// Sort each group alphabetically, then render in color order
					foreach ( $family_order as $family ) {
						if ( empty( $skill_groups[ $family ] ) ) continue;
						sort( $skill_groups[ $family ] );
						$classes = portfolio_2026_skill_classes( $family );
						foreach ( $skill_groups[ $family ] as $skill_name ) :
							?>
							<span class="skill-tag mk-inline-flex mk-items-center mk-gap-1.5 mk-rounded-full mk-px-3 mk-py-1 mk-text-xs mk-font-medium mk-ring-1 mk-ring-inset <?php echo esc_attr( $classes ); ?>">
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
