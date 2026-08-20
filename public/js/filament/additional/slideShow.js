document.addEventListener("DOMContentLoaded", () => {
    // Support multiple sliders on the same page (e.g. hero slider + peek carousel)
    document.querySelectorAll(".slider").forEach(initSlider);

    function initSlider(slider) {
        const slides = slider.querySelectorAll(".slide");
        const prevBtn = slider.querySelector(".prevSlide");
        const nextBtn = slider.querySelector(".nextSlide");
        const dotsContainer = slider.querySelector(".dots");

        if (!slides.length) return;

        let currentIndex = 0;
        let autoSlideInterval;

        // Build Dots (guard: dotsContainer may not exist on every instance)
        let dots = [];
        if (dotsContainer) {
            dotsContainer.innerHTML = ""; // avoid duplicate dots on re-init
            slides.forEach((_, idx) => {
                const dot = document.createElement("button");
                dot.type = "button";
                dot.setAttribute("aria-label", `Go to slide ${idx + 1}`);
                dot.className = `w-3 h-3 rounded-full transition-all duration-300 ${
                    idx === 0 ? "bg-white w-8" : "bg-white/50 hover:bg-white/80"
                }`;
                dot.addEventListener("click", () => goToSlide(idx));
                dotsContainer.appendChild(dot);
            });
            dots = dotsContainer.querySelectorAll("button");
        }

        function updateZoomEffect(slideElement, index) {
            const img = slideElement.querySelector(".slide-img");
            if (!img) return;

            img.classList.remove("scale-100", "scale-125", "scale-110");

            if (index % 2 === 0) {
                img.style.transform = "scale(1)";
                setTimeout(() => {
                    img.style.transform = "scale(1.18)";
                }, 50);
            } else {
                img.style.transform = "scale(1.2)";
                setTimeout(() => {
                    img.style.transform = "scale(1)";
                }, 50);
            }
        }

        function showSlide(index) {
            slides.forEach((slide, i) => {
                if (i === index) {
                    slide.classList.remove("opacity-0", "pointer-events-none");
                    slide.classList.add("opacity-100", "active");
                    updateZoomEffect(slide, i);
                } else {
                    slide.classList.remove("opacity-100", "active");
                    slide.classList.add("opacity-0", "pointer-events-none");
                }
            });

            dots.forEach((dot, i) => {
                if (i === index) {
                    dot.classList.add("bg-white", "w-8");
                    dot.classList.remove("bg-white/50");
                } else {
                    dot.classList.remove("bg-white", "w-8");
                    dot.classList.add("bg-white/50");
                }
            });

            currentIndex = index;
        }

        function goToSlide(index) {
            showSlide(index);
            resetAutoplay();
        }

        function nextSlide() {
            const next = (currentIndex + 1) % slides.length;
            showSlide(next);
        }

        function prevSlide() {
            const prev = (currentIndex - 1 + slides.length) % slides.length;
            showSlide(prev);
        }

        function startAutoplay() {
            if (slides.length < 2) return; // no point autoplaying a single slide
            clearInterval(autoSlideInterval);
            autoSlideInterval = setInterval(nextSlide, 6000);
        }

        function resetAutoplay() {
            clearInterval(autoSlideInterval);
            startAutoplay();
        }

        nextBtn?.addEventListener("click", () => {
            nextSlide();
            resetAutoplay();
        });

        prevBtn?.addEventListener("click", () => {
            prevSlide();
            resetAutoplay();
        });

        // Pause autoplay when tab isn't visible (saves cycles, avoids
        // a burst of "missed" transitions when the user tabs back)
        document.addEventListener("visibilitychange", () => {
            if (document.hidden) {
                clearInterval(autoSlideInterval);
            } else {
                startAutoplay();
            }
        });

        showSlide(0);
        startAutoplay();
    }
});
