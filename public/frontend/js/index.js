const toggle = document.getElementById("toggle");
const links = document.querySelector(".links");

toggle.addEventListener("click", () => {
  links.classList.toggle("active");
});

document.addEventListener("DOMContentLoaded", () => {
  const slider = document.querySelectorAll(".slider-content");
  const maincontent = document.querySelector(".main-content");
  let currentIndex = 0;
  const totalslide = slider.length;

  function switchSlider() {
    currentIndex = (currentIndex + 1) % totalslide;
    maincontent.style.transform = `translateX(-${currentIndex * 100}%)`;
    maincontent.style.transition = `transform 0.5s ease-in-out`;
  }
  setInterval(switchSlider, 5000);
  

});
