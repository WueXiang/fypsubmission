
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
 
require('./bootstrap');
 
window.Vue = require('vue');
import VueRouter from 'vue-router';
 
window.Vue.use(VueRouter);
 
import CompaniesIndex from './components/ProjectsIndex.vue';
import CompaniesCreate from './components/ProjectsCreate.vue';
import CompaniesEdit from './components/ProjectsEdit.vue';
 
const routes = [
    {
        path: '/',
        components: {
            projectsIndex: ProjectsIndex
        }
    },
    {path: 'projects/create', component: ProjectsCreate, name: 'createProject'},
    {path: 'projects/edit/:id', component: ProjectsEdit, name: 'editProject'},
]
 
const router = new VueRouter({ routes });
 
const app = new Vue({ router }).$mount('#app');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     el: '#app'
// });

// // Vue.component('task-list', require('./components/TaskList.vue'));