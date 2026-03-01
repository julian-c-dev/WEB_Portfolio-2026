<?php
/**
 * Block: Hero.
 *
 * @package portfolio_2026
 */

// Preview Image (Optional - add your own preview image).
// To add a preview: Create assets/dist/img/blocks/hero.jpg.
// Uncomment the code below to enable preview in WordPress editor.
/*
if ( isset( $block['data']['preview_image_help'] ) && $block['data']['preview_image_help'] ) {
	echo '<img src="' . esc_url( get_template_directory_uri() . '/assets/dist/img/blocks/hero.jpg' ) . '" style="width:100%; height:auto;" />';
	return;
}
*/

// ACF fields.
$heading       = get_field( 'title' );
$desc          = get_field( 'desc' );
$bg_type       = get_field( 'background' );
$video         = get_field( 'Video' );
$video_mobile  = get_field( 'video_mobile' );
$image_desktop = get_field( 'image_desktop' );
$image_mobile  = get_field( 'image_mobile' );

// Block ID.
$block_id = 'hero';
if ( ! empty( $block['anchor'] ) ) {
	$block_id = $block['anchor'];
}

// Additional classes.
$class_name = 'hero-block';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
?>

<div id="<?php echo esc_html( $block_id ); ?>" class="<?php echo esc_html( $class_name ); ?> relative overflow-hidden">
	<?php
		// Check the background type and display accordingly.
		// If bg_type is "video" and a video URL exists, display the video.
	if ( 'video' === $bg_type && $video ) :
		$video_css = $video_mobile ? 'hidden md:block' : '';
		?>
			<video id="video-hero" class="<?php echo $video_css; // phpcs:disable ?> w-full h-screen object-cover" preload="none" playsinline autoplay loop muted>
				<source src="<?php echo esc_url( $video['url'] ); ?>" type="video/mp4">
			</video>
			<?php if ( $video_mobile ) : ?>
				<video id="video-hero" class="md:hidden w-full h-screen object-cover" preload="none" playsinline autoplay loop muted>
					<source src="<?php echo esc_url( $video_mobile['url'] ); ?>" type="video/mp4">
				</video>
			<?php endif; ?>
		<?php
		// If bg_type is "image" and image URLs exist, display the images for desktop and mobile.
		elseif ( 'image' === $bg_type && $image_desktop ) :
			?>
			<picture>
				<source media="(max-width: 768px)" srcset="<?php echo esc_url( wp_get_attachment_image_url( $image_mobile, 'full' ) ); ?>">
				<img class="block w-full h-screen object-cover" src="<?php echo esc_url( wp_get_attachment_image_url( $image_desktop, 'full' ) ); ?>" alt="">
			</picture>
			<?php
			// Default background if no video or image is set.
		else :
			?>
			<div class="block w-full h-screen bg-primary"></div>
		<?php endif; ?>

		<div class="block absolute inset-0 w-full h-full">
			<div id="hero-glass" class="w-full h-full">
				<style>
					.grid-cols-22 {
						grid-template-columns: repeat(22, minmax(0, 1fr));
					}
					.grid-rows-12 {
						grid-template-rows: repeat(12, minmax(0, 1fr));
					}
					.glass-column {
						position: relative;
						width: calc(100% + 1px); /* Make columns slightly wider */
						margin-right: -1px; /* Create overlap effect */
						background: linear-gradient(270deg, rgba(255, 255, 255, 0.01) 0%, rgba(0, 0, 0, 0.12) 76.04%, rgba(255, 255, 255, 0.01) 100%);
						background-blend-mode: overlay;
					}
					.glass-row {
						position: relative;
						height: calc(100% + 1px);
						margin-bottom: -1px;
						background: linear-gradient(0deg, rgba(255, 255, 255, 0.01) 0%, rgba(0, 0, 0, 0.12) 76.04%, rgba(255, 255, 255, 0.01) 100%);
						background-blend-mode: overlay;
					}
				</style>
				<div class="hidden md:grid grid-cols-22 w-full h-full">
					<?php
					for ( $i = 0; $i < 11; $i++ ) {
						echo '<div class="col-span-1 h-full backdrop-blur-md glass-column" style="background: linear-gradient(270deg, rgba(255, 255, 255, 0.01) 0%, rgba(0, 0, 0, 0.12) 76.04%, rgba(255, 255, 255, 0.01) 100%); background-blend-mode: overlay;"></div>';
					}
					?>
					<div class="col-span-11"></div>
				</div>
				<div class="md:hidden grid grid-rows-12 w-full h-full">
					<?php
					for ( $i = 0; $i < 6; $i++ ) {
						echo '<div class="row-span-1"></div>';
					}
					for ( $i = 0; $i < 6; $i++ ) {
						echo '<div class="row-span-1 w-full backdrop-blur-md glass-row"></div>';
					}
					?>
				</div>
			</div>
		</div>

	<?php // Title and description & SVG to scroll down. ?>
	<div class="absolute top-[55%] xs:top-[65%] left-0 w-full h-full">
		<div class="max-w-container mx-auto px-4">
			<div class="flex flex-col md:flex-row justify-between md:items-end gap-6 xs:gap-8 sm:gap-16">
				<div class="flex flex-col w-full md:w-[40%]">
					<div class="font-satoshi text-4xl md:text-5xl font-bold mb-4">
						<p class="block text-white"><?php echo esc_html( $heading ); ?></p>
					</div>
					<p class="text-lg md:text-lg text-white"><?php echo wp_kses_post( $desc ); ?></p>
				</div>
				<div id="scroll-arrow" class="flex flex-col justify-center items-center bg-white w-[32px] h-[32px] rounded-full cursor-pointer">
					<?php echo wp_kses( empty_svgs( 'arrow-down-primary' ), empty_allowed_svg_tags() ); ?>
				</div>
			</div>
		</div>
	</div>
</div>
