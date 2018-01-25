
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// Vue.component('example-component', require('./components/ExampleComponent.vue'));

// const app = new Vue({
//     el: '#app'
// });

import VueRouter from 'vue-router';

window.Vue.use(VueRouter);

import ProjectsIndex from './components/projects/ProjectsIndex.vue';
import ProjectsCreate from './components/projects/ProjectsCreate.vue';
import ProjectsEdit from './components/projects/ProjectsEdit.vue';
import MeetinglogsIndex from './components/meetinglogs/MeetinglogsIndex.vue';
import MeetinglogsCreate from './components/meetinglogs/MeetinglogsCreate.vue';
import MeetinglogsEdit from './components/meetinglogs/MeetinglogsEdit.vue';

const routes = [
    {
        path: '/',
        components: {
            projectsIndex: ProjectsIndex
        }
    },
    {path: '/projects/create', component: ProjectsCreate, name: 'createProject'},
    {path: '/projects/edit/:id', component: ProjectsEdit, name: 'editProject'},
// ]
// const routes = [
    {
        path: '/meetinglogs',
        components: {
            meetinglogsIndex: MeetinglogsIndex
        }
    },
    {path: '/meetinglogs/create', component: MeetinglogsCreate, name: 'createMeetinglog'},
    {path: '/meetinglogs/edit/:id', component: MeetinglogsEdit, name: 'editMeetinglog'},

]

const router = new VueRouter({ routes }) 

const app = new Vue({ router }) .$mount('#app')