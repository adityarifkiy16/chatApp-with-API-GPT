import Glide from "@glidejs/glide";
import { $, jQuery } from "jquery";

let slide = document.addEventListener("DOMContentLoaded", function () {
  const glide = new Glide(".glide", {
    type: "carousel",
    perView: 1,
    gap: 10,
    autoplay: 3000,
    hoverpause: true,
    animation: "bounce",
    breakpoints: {
      768: {
        perView: 1,
        gap: 10,
      },
      1000: {
        perView: 2,
        gap: 30,
      },
    },
  }).mount();

  glide.on("run.after", function () {
    const activeSlide = document.querySelector(".glide__track");
    const animationSlide = glide.settings.animation;
    activeSlide.classList.add(animationSlide);
    setTimeout(function () {
      activeSlide.classList.remove(animationSlide);
    }, 1000);
  });
});

export default slide;
