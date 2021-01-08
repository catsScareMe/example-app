require('./bootstrap');

window.Vue = require('vue');

Vue.component(
    'spirals',
    require('./components/Spirals.vue')
);

const app = new Vue({
    el: '#app'
});