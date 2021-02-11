import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'

Vue.use(VueRouter)

  const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/dm',
    name: 'dm',
    component: () => import(/* webpackChunkName: "dm" */ '../views/dm.vue')
  }
]

const router = new VueRouter({
  routes
})

export default router
