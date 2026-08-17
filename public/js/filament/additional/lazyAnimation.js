document.addEventListener("DOMContentLoaded", function () {
    const animatedEls = document.querySelectorAll("[data-animate]");

    if (!("IntersectionObserver" in window)) {
        // Fallback: just show everything immediately
        animatedEls.forEach((el) => {
            el.classList.remove(
                "opacity-0",
                "translate-y-8",
                "-translate-x-8",
                "translate-x-8",
            );
        });
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry, index) => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    // Stagger slightly based on position within its row pair
                    const delay =
                        el.dataset.animate === "fade-left" ||
                        el.dataset.animate === "fade-right"
                            ? 150
                            : 0;

                    setTimeout(() => {
                        el.classList.remove(
                            "opacity-0",
                            "translate-y-8",
                            "-translate-x-8",
                            "translate-x-8",
                        );
                        el.classList.add(
                            "opacity-100",
                            "translate-y-0",
                            "translate-x-0",
                        );
                    }, delay);

                    observer.unobserve(el);
                }
            });
        },
        {
            threshold: 0.15,
            rootMargin: "0px 0px -50px 0px",
        },
    );

    animatedEls.forEach((el) => observer.observe(el));
});
