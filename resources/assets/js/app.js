
import  './bootstrap';

import router from './routes';

import Alert from './components/Alert.vue';

Vue.component('alert',Alert);

const app = new Vue({
    el: '#app',
    router
});
