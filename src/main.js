import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import bootstrapCSS from '../node_modules/bootstrap/dist/css/bootstrap.min.css'
import Jquery from 'jquery'
window.$ = window.jQuery =Jquery
import popper from 'popper.js'
import bootstrapJs from '../node_modules/bootstrap/dist/js/bootstrap.min.js'
import axios from 'axios';
window.axios = axios,
window.token = localStorage.getItem('AToken');
axios.defaults.baseURL = 'http://localhost:8000/api/'
axios.defaults.headers.common['Authorization'] = 'Bearer '+token;
axios.defaults.headers.post['Content-Type'] = 'application/json';



createApp(App).use(router).mount('#app')
