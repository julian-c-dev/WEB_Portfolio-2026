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

<div class="max-w-container mx-auto ">
	<div class="container text-center pt-8 lg:pt-4 lg:pk-px-20 pb-20 lg:pb-44">
		
			<h1 class="font-satoshi text-[164px] md:text-[248px] font-bold text-white">404</h1>
			<p class="w-full lg:w-[35%] text-base text-white px-8 lg:px-0 mb-6 mx-auto"><?php echo esc_html( $text_404 ); ?></p>   
		
	</div>
</div>

<?php
get_footer();
?>
