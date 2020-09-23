require("./bootstrap");
//import "leaflet/dist/leaflet.css";

window.Vue = require("vue");

Vue.component("seller-route", require("./components/SellerRoute.vue").default);
Vue.component("seller-map", require("./components/Map.vue").default);
Vue.component(
    "dropdown-select",
    require("./components/DropdownSelect.vue").default
);
Vue.component("l-map", require("vue2-leaflet"));
Vue.component("l-icon-default", require("vue2-leaflet"));
Vue.component("l-tile-layer", require("vue2-leaflet"));
Vue.component("l-popup", require("vue2-leaflet"));
Vue.component("l-moving-marker", require("vue2-leaflet-movingmarker").default);

const app = new Vue({
    el: "#app"
});
