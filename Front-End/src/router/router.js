import Vue from 'vue';
import VueRouter from 'vue-router';
import GestionIncidents from '../views/GestionIncidents.vue'
import GestionUsers from '../views/GestionUsers.vue'
import LoginHome from '../views/LoginHome.vue'





Vue.use(VueRouter);

const routes = [

    {
        path: '/',
        name: 'LoginHome',
        component: LoginHome,
    },
    
   
    
     {
        path: '/incidents',
        name: 'incidents',
        component: GestionIncidents,
    },
      {
        path: '/users',
        name: 'GestionUsers',
        component: GestionUsers,
    },
     
    // ... (d'autres routes) ...
];

const router = new VueRouter({
    routes,
});

export default router;
