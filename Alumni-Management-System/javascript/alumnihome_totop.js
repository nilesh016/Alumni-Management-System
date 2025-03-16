// Select the scroll-to-top button
const scrollToTopBtn = document.getElementById("alumnihome_totop");

// Check if the button exists to avoid errors
if (scrollToTopBtn) {
    // Attach scroll event listener
    window.addEventListener("scroll", toggleScrollButton);

    // Show or hide the button based on scroll position
    function toggleScrollButton() {
        const scrollThreshold = 500; // Show button after 500px scroll
        scrollToTopBtn.style.display = (window.scrollY > scrollThreshold) ? "block" : "none";
    }

    // Smoothly scroll to the top when the button is clicked
    scrollToTopBtn.addEventListener("click", () => {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });
}
