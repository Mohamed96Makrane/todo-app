import { createRouter, createWebHistory } from 'vue-router'
import Home from '../views/Home.vue'
import Login from '../views/Login.vue'
import Register from '../views/Register.vue'
import Tasks from '../views/Tasks.vue'
import Notifications from '../views/Notifications.vue'


const routes = [
  { path: '/', name: 'Home', component: Home },
  { path: '/login', name: 'Login', component: Login },
  { path: '/register', name: 'Register', component: Register },
  { path: '/tasks', name: 'Tasks', component: Tasks },
  { path: '/notifications', name: 'Notifications', component: Notifications }

]

const router = createRouter({
  history: createWebHistory(),
  routes,
})

export default router
