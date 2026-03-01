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
	<h2 class="text-4xl font-bold mb-8 text-gray-900">My Skills</h2>

	<?php if ( $skills_query->have_posts() ) : ?>
		<div class="skills-grid grid md:grid-cols-2 lg:grid-cols-3 gap-6">
			<?php
			while ( $skills_query->have_posts() ) :
				$skills_query->the_post();

				$skill_level    = get_field( 'skill_level' ); // Number 1-100
				$skill_category = get_field( 'skill_category' ); // e.g., Frontend, Backend, Tools
				$skill_icon     = get_field( 'skill_icon' ); // Image or icon
				?>

				<div class="skill-card bg-gradient-to-br from-white to-gray-50 p-6 rounded-xl shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-1 border border-gray-200">

					<!-- Skill Icon/Image -->
					<?php if ( $skill_icon ) : ?>
						<div class="skill-icon mb-4">
							<img src="<?php echo esc_url( $skill_icon['url'] ); ?>"
								 alt="<?php the_title(); ?>"
								 class="w-16 h-16 object-contain">
						</div>
					<?php endif; ?>

					<!-- Skill Title -->
					<h3 class="text-xl font-bold mb-2 text-gray-900">
						<?php the_title(); ?>
					</h3>

					<!-- Skill Category -->
					<?php if ( $skill_category ) : ?>
						<span class="inline-block text-xs font-semibold px-3 py-1 bg-blue-100 text-blue-800 rounded-full mb-3">
							<?php echo esc_html( $skill_category ); ?>
						</span>
					<?php endif; ?>

					<!-- Skill Description -->
					<?php if ( get_the_excerpt() ) : ?>
						<p class="text-gray-600 text-sm mb-4">
							<?php the_excerpt(); ?>
						</p>
					<?php endif; ?>

					<!-- Skill Level Bar -->
					<?php if ( $skill_level ) : ?>
						<div class="skill-level mt-4">
							<div class="flex justify-between mb-2">
								<span class="text-sm font-medium text-gray-700">Proficiency</span>
								<span class="text-sm font-bold text-blue-600"><?php echo esc_html( $skill_level ); ?>%</span>
							</div>
							<div class="w-full bg-gray-200 rounded-full h-2">
								<div class="bg-gradient-to-r from-blue-500 to-blue-600 h-2 rounded-full transition-all duration-1000"
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
		<div class="bg-blue-50 border border-blue-200 rounded-lg p-8 text-center">
			<p class="text-gray-700 mb-4">No skills added yet.</p>
			<a href="<?php echo esc_url( admin_url( 'post-new.php?post_type=skill' ) ); ?>"
			   class="inline-block bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
				Add Your First Skill
			</a>
		</div>
	<?php endif; ?>
</div>
