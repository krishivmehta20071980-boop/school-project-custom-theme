document.addEventListener("DOMContentLoaded", function () {
  const elements = document.querySelectorAll(".fade-in");

  function handleScroll() {
    elements.forEach(function(el) {
      const position = el.getBoundingClientRect().top;
      const screenPosition = window.innerHeight * 0.85;

      if (position < screenPosition && position > 0) {
        el.classList.add("show");
      } else {
        el.classList.remove("show");
      }
    });
  }

  window.addEventListener("scroll", handleScroll);

  // Run on page load in case elements are already in view
  handleScroll();
});