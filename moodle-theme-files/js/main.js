'use strict';
/* Scroll to top */
document.addEventListener("DOMContentLoaded", () => {
  const scrollToTopBtn = document.querySelector(".scrollToTop");
  const rootElement = document.documentElement;
  const bodyElement = document.body;
  const progressBar = document.getElementById("progress-bar");
  const pathLength = document
    .querySelector("#progress-bar > svg > path")
    .getTotalLength();

  scrollToTopBtn.addEventListener("click", () => {
    rootElement.scrollTo({ top: 0, behavior: "smooth" });
  });

  document.addEventListener("scroll", () => {
    const scrollAmount = pathLength / 100;
    const scrollPosition = Math.round(
      ((rootElement.scrollTop || bodyElement.scrollTop) /
        ((rootElement.scrollHeight || bodyElement.scrollHeight) -
          innerHeight)) *
        100 *
        scrollAmount
    );

    if (scrollPosition > 5) {
      scrollToTopBtn.classList.add("showBtn");
      progressBar.style.setProperty("--scrollAmount", scrollPosition + "px");
    } else {
      scrollToTopBtn.classList.remove("showBtn");
    }
  });
});
// Animate counter.
const counters = document.querySelectorAll('.counter-zuum');
const speed = 600;
    counters.forEach( counter => {
        const animate = () => {
        const value = +counter.getAttribute('data-value');
        const data = +counter.innerText;
        const time = value / speed;
        if(data < value) {
            counter.innerText = Math.ceil(data + time);
            setTimeout(animate, 1);
        }else{
            counter.innerText = value;
        }
        
    }
animate();
});
// Theme info.
const idvar = document.getElementById("theme-info");
if (idvar) {
    document.getElementById("theme-info").innerHTML = "Moodle Theme Zuum - Writer Themes Almond";
}

