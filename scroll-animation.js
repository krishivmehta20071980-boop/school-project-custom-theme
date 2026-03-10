document.addEventListener("scroll", function () {

  const elements = document.querySelectorAll(".fade-in");

  elements.forEach(function(el) {

    const position = el.getBoundingClientRect().top;
    const screenPosition = window.innerHeight * 0.85;

    if (position < screenPosition) {
      el.classList.add("show");
    }

  });

});