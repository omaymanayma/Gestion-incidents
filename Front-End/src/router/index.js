import { createRouter, createWebHistory } from 'vue-router';
import Home from './views/Home.vue'; // Replace with your Home component
import About from './views/About.vue'; // Replace with your About component

const routes = [
  {
    path: '/',
    name: 'TestLogin',
    component: 'TestLogin',
  },
  {
    path: '/about',
    name: 'About',
    component: About,
  },
  // Add more routes as needed
];

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
