<?php
/**
 * Card Component Usage Examples.
 *
 * This file shows different ways to use the card component.
 * DELETE THIS FILE after reviewing the examples.
 *
 * @package portfolio_2026
 * @since 1.0.0
 */

?>

<!-- EXAMPLE 1: Card with Post Data -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
	<?php
	$posts = get_posts(
		array(
			'posts_per_page' => 3,
			'post_type'      => 'post',
		)
	);

	foreach ( $posts as $post ) :
		get_template_part(
			'template-parts/components/card',
			null,
			array(
				'image_url' => get_the_post_thumbnail_url( $post->ID, 'medium' ),
				'title'     => get_the_title( $post->ID ),
				'excerpt'   => wp_trim_words( get_the_excerpt( $post->ID ), 20 ),
				'link'      => get_permalink( $post->ID ),
				'link_text' => __( 'Read More', 'portfolio_2026' ),
				'date'      => get_the_date( 'Y-m-d', $post->ID ),
				'category'  => get_the_category( $post->ID )[0]->name ?? '',
			)
		);
	endforeach;
	?>
</div>


<!-- EXAMPLE 2: Card with Custom Data -->
<?php
get_template_part(
	'template-parts/components/card',
	null,
	array(
		'image_url' => 'https://via.placeholder.com/600x400',
		'title'     => 'Welcome to Our Site',
		'excerpt'   => 'This is a manually created card with custom content. Perfect for landing pages or featured content.',
		'link'      => '/about',
		'link_text' => 'Learn More',
		'category'  => 'Featured',
	)
);
?>