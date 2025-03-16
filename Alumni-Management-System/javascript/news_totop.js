// JavaScript Document

document.addEventListener("DOMContentLoaded", () => {
    const scrollToTopBtn = document.getElementById("news_totop");

    if (scrollToTopBtn) {
        // Show or Hide the Button on Scroll
        window.addEventListener("scroll", () => {
            scrollToTopBtn.style.display = window.scrollY > 500 ? "block" : "none";
        });

        // Smooth Scroll to Top on Click
        scrollToTopBtn.addEventListener("click", () => {
            window.scrollTo({ top: 0, behavior: "smooth" });
        });
    }
});
