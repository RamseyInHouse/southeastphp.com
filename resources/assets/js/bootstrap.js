
window._ = require('lodash');

try {
    window.$ = window.jQuery = require('jquery');

    require('bootstrap-sass');
} catch (e) {}

import Vue from 'vue';
import VueRouter from 'vue-router';
import Axios from 'axios';

window.Vue = Vue;
Vue.use(VueRouter);


window.axios = Axios;

window.axios.defaults.headers.common['X-CSRF-TOKEN'] = window.Laravel.csrfToken;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
window.axios.defaults.headers.common['Authorization'] = 'Bearer' + localStorage.getItem('id_token');

