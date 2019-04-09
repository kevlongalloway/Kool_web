
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue')
import VueRouter from 'vue-router'
import VueProgressBar from 'vue-progressbar'
const options = {
  color: '#00E676',
  failedColor: '#874b4b',
  thickness: '2px',
  transition: {
    speed: '1.5s',
    opacity: '0.6s',
    termination: 400
  },
  autoRevert: true,
  location: 'left',
  inverse: false
}

Vue.use(VueProgressBar, options)

Vue.use(VueRouter)
	

const routes = [
	{path:'/home',component: require('./components/ExampleComponent.vue').default},
  {path:'/admin/home',component: require('./components/ExampleComponent.vue').default},
  {path:'/admin/users',component: require('./components/Admin/Organizations.vue').default,name: 'admin.users'},
  {path:'/admin/user/:id',component: require('./components/Admin/ReadOrg.vue').default},
  {path:'/admin/organization/store',component: require('./components/Admin/CreateOrg.vue').default},
	{path:'/users',component: require('./components/UserList.vue').default,meta: {
      progress: {
        func: [
          {call: 'color', modifier: 'temp', argument: '#00E676'},
          {call: 'fail', modifier: 'temp', argument: '#6e0000'},
          {call: 'location', modifier: 'temp', argument: 'top'},
          {call: 'transition', modifier: 'temp', argument: {speed: '1.5s', opacity: '0.6s', termination: 600}}
        ]
      }
    }},
	{path:'/subscriptions',component:require('./components/Subscriptions.vue').default},
	{path:'/subscriptions/package-1',component:require('./components/Subscriptions/package-1').default},
	{path:'/subscriptions/package-2',component:require('./components/Subscriptions/package-2').default},
  {path:'/registration/:guard/organization/:access_code', component: require('./components/Registration/Register.vue').default},



	
]

const router = new VueRouter({
	mode:'history',
	routes
})

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('user-list', require('./components/UserList.vue').default);
Vue.component('subscriptions', require('./components/Subscriptions.vue').default);
Vue.component('access-input', require('./components/AccessInput.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
}).$mount('#app')
