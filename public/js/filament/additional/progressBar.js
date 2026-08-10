document.addEventListener("DOMContentLoaded", () => {
    const loader = document.getElementById("page-loader");
    const progress = document.getElementById("page-progress");

    let progressValue = 0;
    let timer = null;

    function startLoading() {
        progressValue = 0;

        progress.style.width = "0%";
        progress.style.opacity = "1";

        clearInterval(timer);

        timer = setInterval(() => {
            if (progressValue < 90) {
                progressValue += Math.random() * 8;

                if (progressValue > 90) {
                    progressValue = 90;
                }

                progress.style.width = `${progressValue}%`;
            }
        }, 150);
    }

    function finishLoading() {
        clearInterval(timer);

        progress.style.width = "100%";

        setTimeout(() => {
            progress.style.opacity = "0";

            setTimeout(() => {
                progress.style.width = "0%";
            }, 300);
        }, 200);
    }

    // Detect normal internal page navigation
    document.addEventListener("click", (event) => {
        const link = event.target.closest("a");

        if (!link) return;

        // Ignore external links
        if (link.origin !== window.location.origin) return;

        // Ignore new tab/window
        if (link.target === "_blank") return;

        // Ignore downloads
        if (link.hasAttribute("download")) return;

        // Ignore modifier clicks
        if (event.ctrlKey || event.metaKey || event.shiftKey || event.altKey) {
            return;
        }

        // Ignore same-page anchors
        if (link.pathname === window.location.pathname && link.hash) {
            return;
        }

        startLoading();
    });

    // New page completely loaded
    window.addEventListener("load", () => {
        finishLoading();
    });
});
