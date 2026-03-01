<?php
/**
 * Front Page Template - Minimalist Portfolio (Inspired by Brittany Chiang)
 *
 * @package portfolio_2026
 */

get_header();

// ACF Options
$hero_name    = get_field( 'hero_name', 'option' ) ?: 'Julian Cantera';
$hero_title   = get_field( 'hero_title', 'option' ) ?: 'WordPress & Front-End Developer';
$hero_summary = get_field( 'hero_summary', 'option' ) ?: 'I build accessible, pixel-perfect digital experiences for the web.';
$social_links = get_field( 'social_links', 'option' ); // Repeater
$resume_url   = get_field( 'resume_url', 'option' );
$hero_photo   = get_field( 'hero_photo', 'option' );
$hero_photo_local = get_template_directory_uri() . '/assets/src/img/hero-photo.jpg';
?>

<div class="portfolio-wrapper bg-slate-900 min-h-screen">

	<div class="lg:max-w-8xl lg:mx-auto lg:flex">

	<!-- Side Navigation (Desktop) -->
	<aside class="side-navigation hidden lg:flex lg:flex-col lg:sticky lg:top-0 lg:h-screen lg:shrink-0 lg:w-1/2 lg:px-14 lg:pb-24 lg:z-10">

		<!-- Name, Title & Tagline -->
		<div class="hero-intro mb-16">
			<h1 class="text-6xl font-bold text-white mb-4 tracking-tight">
				<?php echo esc_html( $hero_name ); ?>
			</h1>
			<h2 class="text-3xl font-semibold text-slate-300 mb-3">
				<?php echo esc_html( $hero_title ); ?>
			</h2>
			<p class="text-lg text-slate-400 max-w-md mb-2">
				<?php echo esc_html( $hero_summary ); ?>
			</p>
		</div>

		<!-- Navigation Links (hidden until after hero) -->
		<nav class="main-nav sidebar-reveal mb-16" aria-label="In-page jump links">
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

		<!-- Social Links (hidden until after hero, pinned to bottom) -->
		<div class="social-links sidebar-reveal flex gap-6">
			<?php
			// Default social links if ACF not set
			$default_socials = array(
				array(
					'platform' => 'GitHub',
					'url'      => 'https://github.com/julian-c-dev',
					'icon'     => 'github',
				),
				array(
					'platform' => 'LinkedIn',
					'url'      => 'https://www.linkedin.com/in/julian-cantera-397197230/',
					'icon'     => 'linkedin',
				),
				array(
					'platform' => 'CodePen',
					'url'      => '#',
					'icon'     => 'codepen',
				),
			);

			$socials = $social_links ?: $default_socials;

			foreach ( $socials as $social ) :
				$platform = is_array( $social ) ? ( $social['platform'] ?? '' ) : '';
				$url      = is_array( $social ) ? ( $social['url'] ?? '#' ) : '#';
				?>
				<a href="<?php echo esc_url( $url ); ?>"
				   target="_blank"
				   rel="noopener noreferrer"
				   class="text-slate-400 hover:text-white transition-colors"
				   aria-label="<?php echo esc_attr( $platform ); ?>">
						<?php if ( stripos( $platform, 'github' ) !== false ) : ?>
						<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
							<path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/>
						</svg>
						<?php elseif ( stripos( $platform, 'linkedin' ) !== false ) : ?>
						<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
							<path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
						</svg>
						<?php elseif ( stripos( $platform, 'codepen' ) !== false ) : ?>
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6" aria-hidden="true">
							<path d="M3.06 41.732L32 60.932l28.94-19.2V22.268L32 3.068l-28.94 19.2zm57.878 0L32 22.268 3.06 41.732m0-19.463L32 41.47l28.94-19.2M32 3.068v19.2m0 19.463v19.2" stroke-width="5"/>
						</svg>
						<?php else : ?>
						<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
							<path d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10 10-4.477 10-10S17.523 2 12 2zm0 18c-4.411 0-8-3.589-8-8s3.589-8 8-8 8 3.589 8 8-3.589 8-8 8z"/>
						</svg>
						<?php endif; ?>
				</a>
			<?php endforeach; ?>
			<?php if ( $resume_url ) : ?>
			<a href="<?php echo esc_url( $resume_url ); ?>"
			   target="_blank"
			   rel="noopener noreferrer"
			   class="text-slate-400 hover:text-white transition-colors"
			   aria-label="Resume / CV">
				<svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
					<path d="M14 2H6c-1.1 0-2 .9-2 2v16c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V8l-6-6zm-1 1.5L18.5 9H13V3.5zM6 20V4h5v7h7v9H6z"/>
				</svg>
			</a>
			<?php endif; ?>
		</div>

	</aside>

	<!-- Hero Photo Overlay (Desktop only, disappears after first scroll) -->
	<div class="hero-photo-overlay" aria-hidden="true">
		<?php if ( $hero_photo ) : ?>
			<img src="<?php echo esc_url( is_array( $hero_photo ) ? $hero_photo['url'] : $hero_photo ); ?>"
			     alt="<?php echo esc_attr( $hero_name ); ?>"
			     class="hero-photo-img">
		<?php elseif ( file_exists( get_template_directory() . '/assets/src/img/hero-photo.jpg' ) ) : ?>
			<img src="<?php echo esc_url( $hero_photo_local ); ?>"
			     alt="<?php echo esc_attr( $hero_name ); ?>"
			     class="hero-photo-img">
		<?php else : ?>
			<!-- Placeholder avatar -->
			<div class="hero-photo-placeholder">
				<svg viewBox="0 0 24 24" fill="currentColor" style="width:96px;height:96px;color:#475569;">
					<path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/>
				</svg>
			</div>
		<?php endif; ?>
	</div>

	<!-- Main Content (Right Side on Desktop) -->
	<main class="main-content lg:flex-1 px-6 py-24">

		<!-- Mobile Header -->
		<div class="mobile-header lg:hidden mb-16">
			<h1 class="text-4xl font-bold text-white mb-3 tracking-tight">
				<?php echo esc_html( $hero_name ); ?>
			</h1>
			<h2 class="text-xl font-semibold text-slate-300 mb-2">
				<?php echo esc_html( $hero_title ); ?>
			</h2>
			<p class="text-base text-slate-400 mb-2">
				<?php echo esc_html( $hero_summary ); ?>
			</p>
		</div>

		<!-- Sections wrapper: hidden until after hero transition (desktop only) -->
		<div class="main-sections-wrapper">

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

				<!-- View Full Resume -->
				<?php if ( $resume_url ) : ?>
					<div class="mt-12">
						<a href="<?php echo esc_url( $resume_url ); ?>"
						   target="_blank"
						   class="inline-flex items-center gap-2 text-white font-semibold group">
							<span class="border-b-2 border-slate-900">View Full Résumé</span>
							<svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
							</svg>
						</a>
					</div>
				<?php endif; ?>
			</section>

			<!-- Projects Section -->
			<section id="projects" class="section projects-section mb-32 scroll-mt-24">
				<div class="section-header mb-8 lg:hidden">
					<h2 class="text-sm font-bold text-white uppercase tracking-widest mb-8">Projects</h2>
				</div>
				<?php get_template_part( 'template-parts/portfolio-v2/projects' ); ?>
			</section>

		</div><!-- /.main-sections-wrapper -->

		<!-- Footer Credits -->
		<footer class="portfolio-footer mt-32 pt-16 border-t border-slate-200">
			<p class="text-sm text-slate-400 text-center lg:text-left">
				Built with <a href="https://wordpress.org" class="text-slate-300 hover:text-white" target="_blank">WordPress</a> &
				<a href="https://tailwindcss.com" class="text-slate-300 hover:text-white" target="_blank">Tailwind CSS</a>.
				Deployed with <a href="https://www.siteground.com" class="text-slate-300 hover:text-white" target="_blank">SiteGround</a>.
			</p>
		</footer>

	</main>

	</div><!-- /.layout-wrapper -->

</div>

<style>
/* ============================================================
   Hero Intro Feature — Desktop only (lg: 1024px+)
   All states driven by body.is-scrolled
   ============================================================ */
@media (min-width: 1024px) {

	/* Animated padding-top centres intro text vertically on load,
	   then snaps to 6rem (96px) to align with main's py-24 */
	.side-navigation {
		padding-top: calc(50vh - 90px);
		transition: padding-top 0.7s cubic-bezier(0.4, 0, 0.2, 1);
	}
	body.is-scrolled .side-navigation {
		padding-top: 6rem; /* 96px — identical to py-24 on <main> */
	}

	/* WP admin bar pushes document flow down 32px but fixed elements
	   stay at top:0. Compensate so both sides align. */
	.admin-bar .side-navigation {
		top: 32px;
	}
	.admin-bar .hero-photo-overlay {
		top: 32px;
		height: calc(100vh - 32px);
	}

	/* Nav + social links: hidden on load, fade in after scroll */
	.sidebar-reveal {
		opacity: 0;
		transform: translateY(12px);
		pointer-events: none;
		transition: opacity 0.4s ease, transform 0.4s ease;
	}
	body.is-scrolled .sidebar-reveal {
		opacity: 1;
		transform: translateY(0);
		pointer-events: auto;
		transition: opacity 0.5s ease 0.45s, transform 0.5s ease 0.45s;
	}

	/* Social links pinned to bottom of flex column */
	.side-navigation .social-links {
		margin-top: auto;
	}

	/* Photo overlay: right half, full-height, fades out after scroll */
	.hero-photo-overlay {
		display: flex;
		position: fixed;
		top: 0;
		right: 0;
		width: 50%;
		height: 100vh;
		align-items: center;
		justify-content: center;
		background-color: #0f172a; /* slate-900 */
		z-index: 5;
		transition: opacity 0.6s ease;
	}
	body.is-scrolled .hero-photo-overlay {
		opacity: 0;
		pointer-events: none;
	}

	/* Sections wrapper: invisible on load, fades in after scroll */
	.main-sections-wrapper {
		opacity: 0;
		transition: opacity 0.5s ease;
	}
	body.is-scrolled .main-sections-wrapper {
		opacity: 1;
		transition: opacity 0.5s ease 0.25s;
	}
}

/* Photo overlay hidden on mobile (aside is already hidden) */
@media (max-width: 1023px) {
	.hero-photo-overlay {
		display: none;
	}
}

/* Photo fills the overlay */
.hero-photo-img {
	width: 460px;
	height: 460px;
	object-fit: cover;
	border-radius: 50%;
	display: block;
	box-shadow: 0 0 0 4px rgba(255,255,255,0.15), 0 0 40px 8px rgba(255,255,255,0.08);
}

/* Placeholder circle */
.hero-photo-placeholder {
	width: 460px;
	height: 460px;
	border-radius: 50%;
	background-color: #1e293b; /* slate-800 */
	display: flex;
	align-items: center;
	justify-content: center;
}
</style>

<!-- Smooth Scroll Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {

	// ── Hero intro: one-time transition on first scroll ──────────────────
	const HERO_THRESHOLD = 80;
	let heroExited = false;

	function updateHeroState() {
		if (!heroExited && window.scrollY > HERO_THRESHOLD) {
			heroExited = true;
			document.body.classList.add('is-scrolled');

			// Snap back to top so About is the first thing seen
			window.scrollTo(0, 0);

			// Lock scroll for 2 s while transitions play
			document.documentElement.style.overflow = 'hidden';
			document.body.style.overflow = 'hidden';
			setTimeout(function() {
				document.documentElement.style.overflow = '';
				document.body.style.overflow = '';
			}, 2000);
		}
	}

	updateHeroState();
	window.addEventListener('scroll', updateHeroState, { passive: true });

	// ── Smooth scroll for anchor links ───────────────────────────────────
	document.querySelectorAll('a[href^="#"]').forEach(anchor => {
		anchor.addEventListener('click', function (e) {
			e.preventDefault();
			const target = document.querySelector(this.getAttribute('href'));
			if (target) {
				target.scrollIntoView({
					behavior: 'smooth',
					block: 'start'
				});
			}
		});
	});

	// ── Active nav indicator on scroll ───────────────────────────────────
	const sections = document.querySelectorAll('section[id]');
	const navLinks = document.querySelectorAll('.nav-link');

	function changeLinkState() {
		let index = sections.length;

		while(--index && window.scrollY + 200 < sections[index].offsetTop) {}

		navLinks.forEach((link) => {
			link.classList.remove('active');
			const indicator = link.querySelector('.nav-indicator');
			const text = link.querySelector('.nav-text');
			indicator.classList.remove('w-16', 'bg-slate-600');
			indicator.classList.add('w-8', 'bg-slate-600');
			text.classList.remove('text-white');
			text.classList.add('text-slate-400');
		});

		if (navLinks[index]) {
			navLinks[index].classList.add('active');
			const activeIndicator = navLinks[index].querySelector('.nav-indicator');
			const activeText = navLinks[index].querySelector('.nav-text');
			activeIndicator.classList.remove('w-8', 'bg-slate-600');
			activeIndicator.classList.add('w-16', 'bg-slate-600');
			activeText.classList.remove('text-slate-400');
			activeText.classList.add('text-white');
		}
	}

	changeLinkState();
	window.addEventListener('scroll', changeLinkState);
});
</script>

<?php
get_footer();
