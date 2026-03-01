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
    const $mobileMenuToggle = $("#mobile-menu-toggle");
    const $mobileMenu = $("#mobile-menu");

    $mobileMenuToggle.on(
        "click",
        function () {
            $mobileMenu.toggleClass("hidden");
        }
    );

    // BLOCK: HERO
    //  - Going down to the next block after clicking SVG.
    const scrollArrow = document.getElementById("scroll-arrow");

    if (scrollArrow) {
        scrollArrow.addEventListener(
            "click",
            function () {
                const heroSection = scrollArrow.closest("#hero");
                if (!heroSection) {
                    return;
                }

                let nextSection = heroSection.nextElementSibling;
                if (nextSection) {
                    nextSection.scrollIntoView({ behavior: "smooth" });
                }
            }
        );
    }

    // - Scroll arrow animation.
    if (scrollArrow) {
        let translateValue = 0;
        const maxTranslation = 15; // Maximum translation value (15px up/down).
        const animationDuration = 1500; // Duration of the animation in milliseconds (1.5 seconds).
        const idleDuration = 5000; // Idle time in milliseconds (5 seconds).
        const step = 1; // Translation increment for each step.

        // Function that handles the vertical movement animation.
        function animateMove() {
            let startTime = null;
            let movingUp = true;

            // Animation function that runs during the animation.
            function moveStep(timestamp) {
                if (!startTime) startTime = timestamp;

                const elapsed = timestamp - startTime;

                if (elapsed < animationDuration) {
                    // Animate translation during the animation time.
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
                    // Wait for 5 seconds before restarting the animation.
                    setTimeout(() => {
                        startAnimationCycle();
                    }, idleDuration);
                }
            }

            requestAnimationFrame(moveStep);
        }

        // Function to start the animation cycle.
        function startAnimationCycle() {
            animateMove();
        }

        // Delay the start of the animation by 4 seconds (first time only).
        setTimeout(() => {
            startAnimationCycle();
        }, 4000);
    }

});