// JavaScript Document

document.addEventListener("DOMContentLoaded", () => {
    const scrollToTopBtn = document.getElementById("forumlist_totop");

    if (scrollToTopBtn) {
        // Show/hide button based on scroll position
        window.addEventListener("scroll", () => {
            scrollToTopBtn.style.display = window.scrollY > 500 ? "block" : "none";
        });

        // Scroll smoothly to the top when button is clicked
        scrollToTopBtn.addEventListener("click", () => {
            window.scrollTo({ top: 0, behavior: "smooth" });
        });
    }
});
