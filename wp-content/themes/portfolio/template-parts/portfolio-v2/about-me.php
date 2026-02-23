<?php
/**
 * About Me Section - Minimalist Style
 *
 * @package portfolio_2026
 */

$about_text = get_field( 'about_me_text', 'option' );
?>

<div class="about-content">
	<?php if ( $about_text ) : ?>
		<div class="mk-prose mk-prose-invert mk-max-w-none">
			<?php echo wp_kses_post( $about_text ); ?>
		</div>
	<?php else : ?>
		<div class="mk-space-y-4 mk-text-slate-400 mk-leading-relaxed">
			<p>
				Back in 2012, I decided to try my hand at creating custom Tumblr themes and tumbled head first into the rabbit hole of coding and web development. Fast-forward to today, and I've had the privilege of building software for an advertising agency, a start-up, a student-led design studio, and a huge corporation.
			</p>
			<p>
				My main focus these days is building accessible user interfaces for our customers at Klaviyo. I most enjoy building software in the sweet spot where design and engineering meet — things that look good but are also built well under the hood.
			</p>
			<p>
				When I'm not at the computer, I'm usually rock climbing, hanging out with my wife and two cats, or running around Hyrule searching for Korok seeds.
			</p>
		</div>
	<?php endif; ?>
</div>
