<?php
/**
 * Front Page Template - Minimalist Portfolio (Inspired by Brittany Chiang)
 *
 * @package portfolio_2026
 */

get_header();

// ACF Options — Theme Settings.
$settings     = get_field( 'settings', 'option' );
$hero_name    = $settings['hero_name'] ?? 'Julian Cantera';
$hero_role    = $settings['hero_role'] ?? 'WordPress & Front-End Developer';
$hero_summary = $settings['hero_summary'] ?? 'I build accessible, pixel-perfect digital experiences for the web.';
$resume_url   = $settings['resume']['url'] ?? '';
$footer       = $settings['footer'] ?? '';
$github_url   = $settings['social_media']['github'] ?? '';
$linkedin_url = $settings['social_media']['linkedin'] ?? '';
$codepen_url  = $settings['social_media']['codepen'] ?? '';
?>

<div class="portfolio-wrapper bg-slate-900 min-h-screen">

	<div class="lg:max-w-8xl lg:mx-auto lg:flex">

	<!-- Side Navigation (Desktop) -->
	<aside class="side-navigation hidden lg:flex lg:flex-col lg:sticky lg:top-0 lg:h-screen lg:shrink-0 lg:w-1/2 lg:px-14 lg:pb-24 lg:pt-24 lg:z-10">

		<!-- Name, Title & Tagline -->
		<div class="mb-16">
			<h1 class="text-6xl font-bold text-white mb-4 tracking-tight">
				<?php echo esc_html( $hero_name ); ?>
			</h1>
			<h2 class="text-3xl font-semibold text-slate-300 mb-3">
				<?php echo esc_html( $hero_role ); ?>
			</h2>
			<p class="text-lg text-slate-400 max-w-md mb-2">
				<?php echo esc_html( $hero_summary ); ?>
			</p>
		</div>

		<!-- Navigation Links -->
		<nav class="main-nav mb-16" aria-label="In-page jump links">
			<ul class="space-y-3">
				<li>
					<a href="#about"
						class="nav-link group flex items-center text-sm font-medium text-slate-400 hover:text-white transition-all focus:outline-none">
						<span class="nav-indicator w-8 h-px bg-slate-400 group-hover:w-16 group-hover:bg-white transition-all mr-4"></span>
						<span class="nav-text uppercase tracking-widest">About</span>
					</a>
				</li>
				<li>
					<a href="#skills"
						class="nav-link group flex items-center text-sm font-medium text-slate-400 hover:text-white transition-all focus:outline-none">
						<span class="nav-indicator w-8 h-px bg-slate-400 group-hover:w-16 group-hover:bg-white transition-all mr-4"></span>
						<span class="nav-text uppercase tracking-widest">Skills</span>
					</a>
				</li>
				<li>
					<a href="#experience"
						class="nav-link group flex items-center text-sm font-medium text-slate-400 hover:text-white transition-all focus:outline-none">
						<span class="nav-indicator w-8 h-px bg-slate-400 group-hover:w-16 group-hover:bg-white transition-all mr-4"></span>
						<span class="nav-text uppercase tracking-widest">Experience</span>
					</a>
				</li>
				<li>
					<a href="#projects"
						class="nav-link group flex items-center text-sm font-medium text-slate-400 hover:text-white transition-all focus:outline-none">
						<span class="nav-indicator w-8 h-px bg-slate-400 group-hover:w-16 group-hover:bg-white transition-all mr-4"></span>
						<span class="nav-text uppercase tracking-widest">Projects</span>
					</a>
				</li>
			</ul>
		</nav>

		<!-- Social Links (pinned to bottom) -->
		<div class="social-links flex gap-6">

			<?php if ( $github_url ) : ?>
			<a href="<?php echo esc_url( $github_url ); ?>"
				target="_blank"
				rel="noopener noreferrer"
				class="text-slate-400 hover:text-white transition-colors"
				aria-label="GitHub">
				<?php echo portfolio_2026_svgs( 'github', 'w-6 h-6' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</a>
			<?php endif; ?>

			<?php if ( $linkedin_url ) : ?>
			<a href="<?php echo esc_url( $linkedin_url ); ?>"
				target="_blank"
				rel="noopener noreferrer"
				class="text-slate-400 hover:text-white transition-colors"
				aria-label="LinkedIn">
				<?php echo portfolio_2026_svgs( 'linkedin-plain', 'w-6 h-6' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</a>
			<?php endif; ?>

			<?php if ( $codepen_url ) : ?>
			<a href="<?php echo esc_url( $codepen_url ); ?>"
				target="_blank"
				rel="noopener noreferrer"
				class="text-slate-400 hover:text-white transition-colors"
				aria-label="CodePen">
				<?php echo portfolio_2026_svgs( 'codepen', 'w-6 h-6' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</a>
			<?php endif; ?>


		</div>

	</aside>

	<!-- Main Content (Right Side on Desktop) -->
	<main class="main-content lg:flex-1 px-6 py-24">

		<!-- Mobile Header -->
		<div class="mobile-header lg:hidden mb-16">
			<h1 class="text-4xl font-bold text-white mb-3 tracking-tight">
				<?php echo esc_html( $hero_name ); ?>
			</h1>
			<h2 class="text-xl font-semibold text-slate-300 mb-2">
				<?php echo esc_html( $hero_role ); ?>
			</h2>
			<p class="text-base text-slate-400 mb-2">
				<?php echo esc_html( $hero_summary ); ?>
			</p>
		</div>

		<!-- About Section -->
		<section id="about" class="section about-section mb-32 scroll-mt-24">
			<div class="section-header mb-8 lg:hidden">
				<h2 class="text-sm font-bold text-white uppercase tracking-widest mb-8">About</h2>
			</div>
			<?php get_template_part( 'template-parts/portfolio-v2/about-me' ); ?>
		</section>

		<!-- Skills Section -->
		<section id="skills" class="section skills-section mb-32 scroll-mt-24">
			<div class="section-header mb-8 lg:hidden">
				<h2 class="text-sm font-bold text-white uppercase tracking-widest mb-8">Skills</h2>
			</div>
			<?php get_template_part( 'template-parts/portfolio-v2/skills' ); ?>
		</section>

		<!-- Experience Section -->
		<section id="experience" class="section experience-section mb-32 scroll-mt-24">
			<div class="section-header mb-8 lg:hidden">
				<h2 class="text-sm font-bold text-white uppercase tracking-widest mb-8">Experience</h2>
			</div>
			<?php get_template_part( 'template-parts/portfolio-v2/experience' ); ?>
		</section>

		<!-- Projects Section -->
		<section id="projects" class="section projects-section mb-32 scroll-mt-24">
			<div class="section-header mb-8 lg:hidden">
				<h2 class="text-sm font-bold text-white uppercase tracking-widest mb-8">Projects</h2>
			</div>
			<?php get_template_part( 'template-parts/portfolio-v2/projects' ); ?>
		</section>

		<!-- Footer Credits -->
		<footer class="portfolio-footer mt-32 pt-16 border-t border-slate-200">
			<div class="text-sm text-slate-400 text-center lg:text-left [&>p]:mb-0">
				<?php echo wp_kses_post( $footer ); ?>
			</div>
		</footer>

	</main>

	</div><!-- /.layout-wrapper -->

</div>

<style>
@media (min-width: 1024px) {
	/* Pin social links to bottom of the flex sidebar. */
	.side-navigation .social-links {
		margin-top: auto;
	}

	/* WP admin bar offset for sticky sidebar. */
	.admin-bar .side-navigation {
		top: 32px;
		height: calc(100vh - 32px);
	}
}
</style>

<?php
get_footer();
