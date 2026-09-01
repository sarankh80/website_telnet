
document.addEventListener("DOMContentLoaded", () => {
    const loader = document.getElementById("page-loader");
    const progress = document.getElementById("page-progress");

    if (!loader || !progress) return;

    let progressValue = 0;
    let progressTimer = null;
    let isLoading = false;

    // Initial state
    progress.style.width = "0%";
    progress.style.opacity = "0";
    progress.style.transition = "none";

    /**
     * Start page loading
     */
    function startLoading() {
        // Prevent the loader from restarting
        if (isLoading) return;

        isLoading = true;

        clearInterval(progressTimer);

        // Reset instantly
        progressValue = 0;

        progress.style.transition = "none";
        progress.style.width = "0%";
        progress.style.opacity = "1";

        // Force repaint
        progress.offsetWidth;

        // Enable smooth animation
        progress.style.transition =
            "width 0.35s cubic-bezier(0.4, 0, 0.2, 1), " +
            "opacity 0.25s ease";

        // Gradually move toward 90%
        progressTimer = setInterval(() => {
            if (!isLoading) {
                clearInterval(progressTimer);
                return;
            }

            if (progressValue >= 90) {
                clearInterval(progressTimer);
                return;
            }

            const remaining = 90 - progressValue;

            // Fast at beginning, slower near 90%
            const increment = Math.max(
                0.3,
                remaining * 0.12 + Math.random() * 1.5
            );

            progressValue += increment;

            if (progressValue > 90) {
                progressValue = 90;
            }

            progress.style.width = `${progressValue}%`;
        }, 180);
    }

    /**
     * Finish page loading
     */
    function finishLoading() {
        // Nothing to finish
        if (!isLoading) return;

        clearInterval(progressTimer);

        isLoading = false;

        // Complete smoothly
        progress.style.transition =
            "width 0.3s cubic-bezier(0.4, 0, 0.2, 1)";

        progress.style.width = "100%";

        // Give the user time to see completion
        setTimeout(() => {
            progress.style.transition =
                "opacity 0.35s ease";

            progress.style.opacity = "0";

            // Reset after fade
            setTimeout(() => {
                progress.style.transition = "none";
                progress.style.width = "0%";
            }, 350);

        }, 250);
    }

    /**
     * Handle internal navigation
     */
    document.addEventListener("click", (event) => {
        const link = event.target.closest("a");

        if (!link) return;

        // Only normal left-click navigation
        if (event.button !== 0) return;

        // External link
        if (link.origin !== window.location.origin) return;

        // New tab/window
        if (link.target === "_blank") return;

        // Download
        if (link.hasAttribute("download")) return;

        // Modifier keys
        if (
            event.ctrlKey ||
            event.metaKey ||
            event.shiftKey ||
            event.altKey
        ) {
            return;
        }

        // JavaScript links
        if (
            link.href.startsWith("javascript:") ||
            link.getAttribute("href") === "#"
        ) {
            return;
        }

        // Same-page anchor
        const currentUrl = new URL(window.location.href);
        const targetUrl = new URL(link.href);

        if (
            targetUrl.pathname === currentUrl.pathname &&
            targetUrl.search === currentUrl.search &&
            targetUrl.hash
        ) {
            return;
        }

        // Already loading
        if (isLoading) return;

        startLoading();
    });

    /**
     * Browser back / forward
     */
    window.addEventListener("popstate", () => {
        startLoading();
    });

    /**
     * Page fully loaded
     *
     * This will only finish an active navigation loader.
     * It will NOT create an animation on the first page load.
     */
    window.addEventListener("load", () => {
        finishLoading();
    });
});

