// JavaScript Document

// Select the scroll-to-top button
const scrollToTopBtn = document.getElementById("addforum_totop");

// Attach scroll event listener
window.addEventListener("scroll", handleScroll);

// Function to show or hide the scroll-to-top button
function handleScroll() {
    const scrollThreshold = 500; // Set scroll distance threshold
    scrollToTopBtn.style.display = (window.scrollY > scrollThreshold) ? "block" : "none";
}

// Function to smoothly scroll to the top
function scrollToTop() {
    window.scrollTo({ top: 0, behavior: "smooth" });
}

// Attach click event listener to the button
scrollToTopBtn.addEventListener("click", scrollToTop);
