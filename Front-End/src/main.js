import Vue from 'vue';
import App from './App.vue';
import vuetify from './plugins/vuetify';
import router from './router/router'; // Assurez-vous que le chemin est correct



Vue.config.productionTip = false;

new Vue({
    vuetify,
    router, // Utilisez le routeur ici
    render: h => h(App),
}).$mount('#app');
