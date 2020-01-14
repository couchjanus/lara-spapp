/*
|-------------------------------------------------------------------------------
| routes.js
|-------------------------------------------------------------------------------
| Contains all of the routes for the application
*/

/*
    Imports Vue and VueRouter to extend with the routes.
*/
import Vue from 'vue'
import VueRouter from 'vue-router'

/*
    Extends Vue to use Vue Router
*/
Vue.use( VueRouter )

/*
    Makes a new VueRouter that we will use to run all of the routes
    for the app.
*/

import Layout from './views/Layout'
import Hello from './views/Hello'
import Home from './views/Home'

import UsersList from './views/components/UsersList';
import PostsList from './views/components/PostsList';

export default new VueRouter({
    mode: 'history',
    components: { Layout },
    routes: [
        {
            path: '/',
            redirect: { name: 'home' },
            name: 'layout',
            component: Layout,
            
            children: [
                {
                    path: 'home',
                    name: 'home',
                    component: Home
                },
                {
                    path: 'hello',
                    name: 'hello',
                    component: Hello,
                },
                ,
                {
                    path: 'posts',
                    name: 'posts.index',
                    component: PostsList,
                },
                ,
                {
                    path: 'users',
                    name: 'users.index',
                    component: UsersList,
                },
            ],
        }
    ]
});
