import Vue from 'vue'
import Router from 'vue-router'
import TopRatedMovies from '@/components/TopRatedMovies'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'TopRatedMovies',
      component: TopRatedMovies
    }
  ]
})
