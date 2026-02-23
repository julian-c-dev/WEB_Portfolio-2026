(() => {
  // assets/src/js/app.js
  jQuery(document).ready(function($) {
    const $mobileMenuToggle = $("#mobile-menu-toggle");
    const $mobileMenu = $("#mobile-menu");
    $mobileMenuToggle.on(
      "click",
      function() {
        $mobileMenu.toggleClass("mk-hidden");
      }
    );
    const scrollArrow = document.getElementById("scroll-arrow");
    if (scrollArrow) {
      scrollArrow.addEventListener(
        "click",
        function() {
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
    if (scrollArrow) {
      let animateMove2 = function() {
        let startTime = null;
        let movingUp = true;
        function moveStep(timestamp) {
          if (!startTime)
            startTime = timestamp;
          const elapsed = timestamp - startTime;
          if (elapsed < animationDuration) {
            if (movingUp) {
              translateValue += step;
              if (translateValue >= maxTranslation)
                movingUp = false;
            } else {
              translateValue -= step;
              if (translateValue <= 0)
                movingUp = true;
            }
            scrollArrow.style.transform = `translateY(${translateValue}px)`;
            requestAnimationFrame(moveStep);
          } else {
            setTimeout(() => {
              startAnimationCycle2();
            }, idleDuration);
          }
        }
        requestAnimationFrame(moveStep);
      }, startAnimationCycle2 = function() {
        animateMove2();
      };
      var animateMove = animateMove2, startAnimationCycle = startAnimationCycle2;
      let translateValue = 0;
      const maxTranslation = 15;
      const animationDuration = 1500;
      const idleDuration = 5e3;
      const step = 1;
      setTimeout(() => {
        startAnimationCycle2();
      }, 4e3);
    }
  });
})();
