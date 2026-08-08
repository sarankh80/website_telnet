
document.addEventListener("DOMContentLoaded", () => {
    const slides = document.querySelectorAll("#slider .slide");
    const prevBtn = document.getElementById("prevSlide");
    const nextBtn = document.getElementById("nextSlide");
    const dotsContainer = document.getElementById("dots");

    if (!slides.length) return;

    let currentIndex = 0;
    let autoSlideInterval;

    // Build Dots
    slides.forEach((_, idx) => {
        const dot = document.createElement("button");
        dot.className = `w-3 h-3 rounded-full transition-all duration-300 ${
            idx === 0 ? "bg-white w-8" : "bg-white/50 hover:bg-white/80"
        }`;
        dot.addEventListener("click", () => goToSlide(idx));
        dotsContainer.appendChild(dot);
    });

    const dots = dotsContainer.querySelectorAll("button");

    function updateZoomEffect(slideElement, index) {
        const img = slideElement.querySelector(".slide-img");
        if (!img) return;

        // Reset scaling classes
        img.classList.remove("scale-100", "scale-125", "scale-110");

        // Alternate zoom-in and zoom-out dynamically on odd vs even slides
        if (index % 2 === 0) {
            // Zoom-In setup: Start standard, scale up smoothly
            img.style.transform = "scale(1)";
            setTimeout(() => {
                img.style.transform = "scale(1.18)";
            }, 50);
        } else {
            // Zoom-Out setup: Start enlarged, scale down smoothly
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
        autoSlideInterval = setInterval(nextSlide, 6000);
    }

    function resetAutoplay() {
        clearInterval(autoSlideInterval);
        startAutoplay();
    }

    // Event Listeners
    nextBtn?.addEventListener("click", () => {
        nextSlide();
        resetAutoplay();
    });

    prevBtn?.addEventListener("click", () => {
        prevSlide();
        resetAutoplay();
    });

    // Initialize initial slide & timer
    showSlide(0);
    startAutoplay();
});
