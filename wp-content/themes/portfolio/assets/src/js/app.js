/**
 * App.js
 *
 * This file handles the basic JavaScript functionality for the portfolio_2026 theme.
 * It includes interaction handling, animations, and DOM manipulations.
 *
 * @package portfolio_2026
 * @since 1.0.0
 */

jQuery(document).ready(function ($) {

	// MOBILE MENU TOGGLE.
	const $mobileMenuToggle = $('#mobile-menu-toggle');
	const $mobileMenu = $('#mobile-menu');

	$mobileMenuToggle.on('click', function () {
		$mobileMenu.toggleClass('hidden');
	});

	// BLOCK: HERO
	//  - Going down to the next block after clicking SVG.
	const scrollArrow = document.getElementById('scroll-arrow');

	if (scrollArrow) {
		scrollArrow.addEventListener('click', function () {
			const heroSection = scrollArrow.closest('#hero');
			if (!heroSection) {
				return;
			}

			const nextSection = heroSection.nextElementSibling;
			if (nextSection) {
				nextSection.scrollIntoView({ behavior: 'smooth' });
			}
		});

		// - Scroll arrow animation.
		let translateValue = 0;
		const maxTranslation  = 15;   // px
		const animationDuration = 1500; // ms
		const idleDuration    = 5000;  // ms
		const step            = 1;

		function animateMove() {
			let startTime = null;
			let movingUp  = true;

			function moveStep(timestamp) {
				if (!startTime) startTime = timestamp;

				const elapsed = timestamp - startTime;

				if (elapsed < animationDuration) {
					if (movingUp) {
						translateValue += step;
						if (translateValue >= maxTranslation) movingUp = false;
					} else {
						translateValue -= step;
						if (translateValue <= 0) movingUp = true;
					}
					scrollArrow.style.transform = `translateY(${translateValue}px)`;
					requestAnimationFrame(moveStep);
				} else {
					setTimeout(startAnimationCycle, idleDuration);
				}
			}

			requestAnimationFrame(moveStep);
		}

		function startAnimationCycle() {
			animateMove();
		}

		setTimeout(startAnimationCycle, 4000);
	}

	// ── Portfolio front page ──────────────────────────────────────────────────

	// Smooth scroll for sidebar anchor links.
	document.querySelectorAll('.main-nav a[href^="#"]').forEach(function (anchor) {
		anchor.addEventListener('click', function (e) {
			e.preventDefault();
			const target = document.querySelector(this.getAttribute('href'));
			if (target) {
				target.scrollIntoView({ behavior: 'smooth', block: 'start' });
			}
		});
	});

	// Scrollspy — highlight the nav link matching the section in view.
	const sections = document.querySelectorAll('section[id]');
	const navLinks = document.querySelectorAll('.main-nav .nav-link');

	if (sections.length && navLinks.length) {

		function setActiveLink(index) {
			navLinks.forEach(function (link) {
				const indicator = link.querySelector('.nav-indicator');
				const text      = link.querySelector('.nav-text');
				link.classList.remove('active');
				indicator.classList.remove('w-16', 'bg-white');
				indicator.classList.add('w-8', 'bg-slate-400');
				text.classList.remove('text-white');
				text.classList.add('text-slate-400');
				link.classList.remove('text-white');
				link.classList.add('text-slate-400');
			});

			if (navLinks[index]) {
				const link      = navLinks[index];
				const indicator = link.querySelector('.nav-indicator');
				const text      = link.querySelector('.nav-text');
				link.classList.add('active');
				indicator.classList.remove('w-8', 'bg-slate-400');
				indicator.classList.add('w-16', 'bg-white');
				text.classList.remove('text-slate-400');
				text.classList.add('text-white');
				link.classList.remove('text-slate-400');
				link.classList.add('text-white');
			}
		}

		function getActiveIndex() {
			let index = sections.length;
			while (--index && window.scrollY + 200 < sections[index].offsetTop) {}
			return index;
		}

		setActiveLink(getActiveIndex());
		window.addEventListener('scroll', function () {
			setActiveLink(getActiveIndex());
		});
	}

});
