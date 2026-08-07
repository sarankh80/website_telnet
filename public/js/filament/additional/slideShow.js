document.addEventListener("DOMContentLoaded", () => {
    const slides = document.querySelectorAll(".slide");
    const dotsContainer = document.getElementById("dots");

    let current = 0;

    slides.forEach((_, i) => {
        const dot = document.createElement("button");

        dot.className = "w-3 h-3 rounded-full bg-white/50";

        dot.addEventListener("click", () => {
            showSlide(i);
        });

        dotsContainer.appendChild(dot);
    });

    const dots = dotsContainer.querySelectorAll("button");

    function showSlide(index) {
        slides.forEach((slide) => {
            slide.classList.remove("opacity-100");
            slide.classList.add("opacity-0");
        });

        dots.forEach((dot) => {
            dot.classList.remove("bg-[#F79633]");
            dot.classList.add("bg-white/50");
        });

        slides[index].classList.remove("opacity-0");
        slides[index].classList.add("opacity-100");

        dots[index].classList.remove("bg-white/50");
        dots[index].classList.add("bg-[#F79633]");

        current = index;
    }

    document.getElementById("nextSlide").addEventListener("click", () => {
        current++;

        if (current >= slides.length) current = 0;

        showSlide(current);
    });

    document.getElementById("prevSlide").addEventListener("click", () => {
        current--;

        if (current < 0) current = slides.length - 1;

        showSlide(current);
    });

    showSlide(0);

    setInterval(() => {
        current++;

        if (current >= slides.length) current = 0;

        showSlide(current);
    }, 5000);
});
