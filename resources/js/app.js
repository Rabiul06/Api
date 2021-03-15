require('./bootstrap');
window.Vue('vue');
Vue.component('testcomponent',('./component/DemoComponent.vue'));
const app = new Vue({
    el: '#app',
    data: {
      
    }
  })