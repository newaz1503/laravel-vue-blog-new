/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue';
// vue router
import VueRouter from 'vue-router';
import {routes} from './router';
const router = new VueRouter({
    routes,
    mode: 'history'
  })
Vue.use(VueRouter);
// v-form
import { Form, HasError, AlertError } from 'vform';
window.Form = Form;

// sweetalert
import Swal from 'sweetalert2'
window.Swal = Swal
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })
  window.Toast = Toast
  //vuex
  import Vuex from 'vuex'
  import storeData from './store/store'
  Vue.use(Vuex)
  const store = new Vuex.Store(
    storeData
  );

  //moment
  import moment from 'moment';
  Vue.filter('timeFormat', function (value) {
    return moment(value).format("MMM Do YY"); 
  })
const app = new Vue({
    el: '#app',
    router,
    store

});
