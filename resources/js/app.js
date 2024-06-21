import "./bootstrap";

/*
import Alpine from "alpinejs";
import intersect from "@alpinejs/intersect";
window.Alpine = Alpine;

Alpine.plugin(intersect);
Alpine.start();*/

// Initialization for ES Users
lightbox.option({
  resizeDuration: 200,
  wrapAround: true,
  alwaysShowNavOnTouchDevices: true,
  maxWidth: 200,
});

// core version + navigation, pagination modules:
import Swiper from "swiper";
import {
  Navigation,
  Pagination,
  EffectCube,
  Autoplay,
  EffectFade,
} from "swiper/modules";
// import Swiper and modules styles
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
import "swiper/css/effect-cube";
import "swiper/css/autoplay";
import "swiper/css/effect-fade";

window.Swiper = Swiper;
window.Navigation = Navigation;
window.Pagination = Pagination;
window.EffectCube = EffectCube;
window.Autoplay = Autoplay;
window.EffectFade = EffectFade;
