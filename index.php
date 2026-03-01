<?php
/**
 * Main template file for the empty theme.
 *
 * This file is used to display a page when no specific template
 * matches a query. It is the fallback template in WordPress.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package portfolio_2026
 */

get_header();
?>

<main id="main" class="site-main">
	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			get_template_part( 'template-parts/content', get_post_type() );
		endwhile;

		the_posts_navigation();
	else :
		get_template_part( 'template-parts/content', 'none' );
	endif;
	?>
</main>

<?php
get_footer();
