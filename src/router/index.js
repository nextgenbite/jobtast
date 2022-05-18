import { createRouter, createWebHistory } from 'vue-router'


const routes = [
  {
    path: '/',
    name: 'frontend-master',
    component: () => import('../views/frontend/master.vue'),
    children:[
      {
        path: '/home',
        name: 'home',
        component: () => import('../views/frontend/home/home.vue'), 
      },
      // {
      //   path: '/login',
      //   name: 'login',
      //   component: () => import('../views/frontend/Auth/login.vue'), 
      // }
    ]
    
  },
  {
    path: '/login',
    name: 'login',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import('../views/frontend/Auth/login.vue')
  },
  {
    path: '/register',
    name: 'register',
    component: () => import('../views/frontend/Auth/register.vue')
  },
  {
    path: '/logout',
    name: 'logout',
    component: () => import('../views/frontend/Auth/logout.vue')
  },
  {
    path: '/dashboard',
    name: 'dashboard',
    component: () => import('../views/Admin/master.vue'),
    children:[
      {
        path: '/add-customer',
        name: 'add-customer',
        component: () => import('../views/Admin/customer/create.vue'), 
      },
      {
        path: '/customer',
        name: 'customer',
        component: () => import('../views/Admin/customer/index.vue'), 
      },
      {
        path: '/edit-customer/:id',
        name: 'edit-customer',
        component: () => import('../views/Admin/customer/edit.vue'), 
      },
      {
        path: '/add-booking',
        name: 'add-booking',
        component: () => import('../views/Admin/booking/create.vue'), 
      },
      {
        path: '/booking',
        name: 'booking',
        component: () => import('../views/Admin/booking/index.vue'), 
      },
      {
        path: '/edit-booking/:id',
        name: 'edit-booking',
        component: () => import('../views/Admin/booking/edit.vue'), 
      },
      {
        path: '/resort',
        name: 'resort',
        component: () => import('../views/Admin/resort/index.vue'), 
      },
      // {
      //   path: '/login',
      //   name: 'login',
      //   component: () => import('../views/frontend/Auth/login.vue'), 
      // }
    ]
  },
]

const router = createRouter({
  
  history: createWebHistory(),
  routes,
  // linkActiveClass: 'active'
})


export default router
