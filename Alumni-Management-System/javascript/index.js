// JavaScript Document

document.addEventListener("DOMContentLoaded", () => {
  let slideIndex = 1;
  showSlides(slideIndex);

  // Slideshow Navigation
  document.querySelectorAll(".prev, .next").forEach(button => {
      button.addEventListener("click", event => {
          let n = event.target.classList.contains("prev") ? -1 : 1;
          showSlides(slideIndex += n);
      });
  });

  document.querySelectorAll(".dot").forEach((dot, index) => {
      dot.addEventListener("click", () => showSlides(slideIndex = index + 1));
  });

  function showSlides(n) {
      let slides = document.querySelectorAll(".mySlides");
      let dots = document.querySelectorAll(".dot");

      if (n > slides.length) slideIndex = 1;
      if (n < 1) slideIndex = slides.length;

      slides.forEach(slide => slide.style.display = "none");
      dots.forEach(dot => dot.classList.remove("active"));

      slides[slideIndex - 1].style.display = "block";
      dots[slideIndex - 1].classList.add("active");
  }

  // Scroll-to-Top Button
  const scrollToTopBtn = document.getElementById("index_totop");

  if (scrollToTopBtn) {
      window.addEventListener("scroll", () => {
          scrollToTopBtn.style.display = window.scrollY > 500 ? "block" : "none";
      });

      scrollToTopBtn.addEventListener("click", () => {
          window.scrollTo({ top: 0, behavior: "smooth" });
      });
  }
});
