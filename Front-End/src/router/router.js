import Vue from 'vue';
import VueRouter from 'vue-router';
import HomePage from '../views/Home.vue'; // Assurez-vous que le chemin est correct

Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        name: 'Home',
        component: HomePage,
    },
    // ... (d'autres routes) ...
];

const router = new VueRouter({
    routes,
});

export default router;
