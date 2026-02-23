<?php
/**
 * Skills Tab Content
 *
 * @package portfolio_2026
 */

$skills_query = new WP_Query(
	array(
		'post_type'      => 'skill',
		'posts_per_page' => -1,
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
	)
);
?>

<div class="skills-content">
	<h2 class="mk-text-4xl mk-font-bold mk-mb-8 mk-text-gray-900">My Skills</h2>

	<?php if ( $skills_query->have_posts() ) : ?>
		<div class="skills-grid mk-grid md:mk-grid-cols-2 lg:mk-grid-cols-3 mk-gap-6">
			<?php
			while ( $skills_query->have_posts() ) :
				$skills_query->the_post();

				$skill_level    = get_field( 'skill_level' ); // Number 1-100
				$skill_category = get_field( 'skill_category' ); // e.g., Frontend, Backend, Tools
				$skill_icon     = get_field( 'skill_icon' ); // Image or icon
				?>

				<div class="skill-card mk-bg-gradient-to-br mk-from-white mk-to-gray-50 mk-p-6 mk-rounded-xl mk-shadow-md hover:mk-shadow-xl mk-transition-all mk-duration-300 hover:-mk-translate-y-1 mk-border mk-border-gray-200">

					<!-- Skill Icon/Image -->
					<?php if ( $skill_icon ) : ?>
						<div class="skill-icon mk-mb-4">
							<img src="<?php echo esc_url( $skill_icon['url'] ); ?>"
								 alt="<?php the_title(); ?>"
								 class="mk-w-16 mk-h-16 mk-object-contain">
						</div>
					<?php endif; ?>

					<!-- Skill Title -->
					<h3 class="mk-text-xl mk-font-bold mk-mb-2 mk-text-gray-900">
						<?php the_title(); ?>
					</h3>

					<!-- Skill Category -->
					<?php if ( $skill_category ) : ?>
						<span class="mk-inline-block mk-text-xs mk-font-semibold mk-px-3 mk-py-1 mk-bg-blue-100 mk-text-blue-800 mk-rounded-full mk-mb-3">
							<?php echo esc_html( $skill_category ); ?>
						</span>
					<?php endif; ?>

					<!-- Skill Description -->
					<?php if ( get_the_excerpt() ) : ?>
						<p class="mk-text-gray-600 mk-text-sm mk-mb-4">
							<?php the_excerpt(); ?>
						</p>
					<?php endif; ?>

					<!-- Skill Level Bar -->
					<?php if ( $skill_level ) : ?>
						<div class="skill-level mk-mt-4">
							<div class="mk-flex mk-justify-between mk-mb-2">
								<span class="mk-text-sm mk-font-medium mk-text-gray-700">Proficiency</span>
								<span class="mk-text-sm mk-font-bold mk-text-blue-600"><?php echo esc_html( $skill_level ); ?>%</span>
							</div>
							<div class="mk-w-full mk-bg-gray-200 mk-rounded-full mk-h-2">
								<div class="mk-bg-gradient-to-r mk-from-blue-500 mk-to-blue-600 mk-h-2 mk-rounded-full mk-transition-all mk-duration-1000"
									 style="width: <?php echo esc_attr( $skill_level ); ?>%"></div>
							</div>
						</div>
					<?php endif; ?>

				</div>

			<?php endwhile; ?>
		</div>
		<?php wp_reset_postdata(); ?>
	<?php else : ?>
		<!-- No Skills Found -->
		<div class="mk-bg-blue-50 mk-border mk-border-blue-200 mk-rounded-lg mk-p-8 mk-text-center">
			<p class="mk-text-gray-700 mk-mb-4">No skills added yet.</p>
			<a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=skill' ) ); ?>"
			   class="mk-inline-block mk-bg-blue-600 mk-text-white mk-px-6 mk-py-2 mk-rounded-lg hover:mk-bg-blue-700">
				Add Your First Skill
			</a>
		</div>
	<?php endif; ?>
</div>
