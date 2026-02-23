<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package portfolio_2026
 */

$text_404 = get_field( 'text_404', 'option' ) ? get_field( 'text_404', 'option' ) : __( 'Sorry, the page you are looking for does not exist or has been moved.', 'portfolio_2026' );

get_header();
?>

<div class="mk-max-w-container mk-mx-auto ">
	<div class="mk-container mk-text-center mk-pt-8 lg:mk-pt-4 lg:pk-px-20 mk-pb-20 lg:mk-pb-44">
		
			<h1 class="mk-font-satoshi mk-text-[164px] md:mk-text-[248px] mk-font-bold mk-text-white">404</h1>
			<p class="mk-w-full lg:mk-w-[35%] mk-text-base mk-text-white mk-px-8 lg:mk-px-0 mk-mb-6 mk-mx-auto"><?php echo esc_html( $text_404 ); ?></p>   
		
	</div>
</div>

<?php
get_footer();
?>
