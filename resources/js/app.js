require('./bootstrap');
import * as Vue from 'vue';
import ExampleVue from './components/ExampleVue.vue';

Vue.component('container',ExampleVue);
const app = new Vue({
    el: '#app',
  });
