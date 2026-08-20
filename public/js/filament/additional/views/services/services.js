(function () {
    const container = document.getElementById("routeSlideshow");
    if (!container) return;

    const slides = container.querySelectorAll(".route-slide");
    const caption = document.getElementById("routeCaption");
    const dots = document.querySelectorAll("#routeNav .route-dot");
    let active = 0;
    let timer = null;

    function render(index) {
        slides.forEach((slide, i) => {
            slide.classList.toggle("opacity-100", i === index);
            slide.classList.toggle("opacity-0", i !== index);
        });

        caption.textContent = slides[index].dataset.caption;

        dots.forEach((dot, i) => {
            const isActive = i === index;
            dot.classList.toggle("bg-[#F79633]", isActive);
            dot.classList.toggle("bg-[#8fc74a]/30", !isActive);
            const ring = dot.querySelector(".route-ring");
            ring.classList.toggle("border-[#F79633]/50", isActive);
            ring.classList.toggle("border-transparent", !isActive);
        });

        active = index;
    }

    function next() {
        render((active + 1) % slides.length);
    }

    function start() {
        stop();
        timer = setInterval(next, 5000);
    }

    function stop() {
        if (timer) clearInterval(timer);
    }

    dots.forEach((dot) => {
        dot.addEventListener("click", () => {
            render(parseInt(dot.dataset.index, 10));
            start();
        });
    });

    start();
})();

function showType(type) {
    document.querySelectorAll(".type-content").forEach((el) => {
        el.classList.add("hidden");
    });

    document.querySelector(`#type-${type}`)?.classList.remove("hidden");

    document.querySelectorAll(".type-nav").forEach((el) => {
        el.classList.remove("bg-[#8fc74a]", "text-white");
        el.classList.add("text-gray-700");
    });

    event.currentTarget.classList.add("bg-[#8fc74a]", "text-white");
    event.currentTarget.classList.remove("text-gray-700");
}

document.addEventListener("DOMContentLoaded", () => {
    document.querySelector(".type-nav")?.click();
});


