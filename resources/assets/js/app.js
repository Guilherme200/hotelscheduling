require("./bootstrap");
require("./commons");

window.Vue = require("vue");
require("./components");

const app = new Vue({
    el: "#app"
});
