import Vue from 'vue'
import Router from 'vue-router'
import Home from './views/Home.vue'
import Event from './views/Event.vue'
import Location from './views/Location.vue'
import Signup from './views/Signup.vue'

Vue.use(Router)

export default new Router({
  base: process.env.BASE_URL,
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/event',
      name: 'event',
      component: Event
    },
    {
      path: '/location',
      name: 'location',
      component: Location
    },
    {
      path: '/signup',
      name: 'signup',
      component: Signup
    }
  ]
})
