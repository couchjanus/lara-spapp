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

import App from './layouts/App';
import Admin from './layouts/Admin';

import Contact from './views/Contact';
import Home from './views/Home';
import PostsList from './views/PostsList';

import Users from './views/admin/Users';
import Dashboard from './views/admin/Dashboard';

export default new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            redirect: { name: 'home' },
            name: 'app',
            component: App,
            
            children: [
                {
                    path: 'home',
                    name: 'home',
                    component: Home
                },
                {
                    path: 'contact',
                    name: 'contact',
                    component: Contact,
                },
                {
                    path: 'posts',
                    name: 'posts.index',
                    component: PostsList,
                },
				{ path: '_=_', redirect: '/' }
            ]
        },
        {
            path: '/admin',
            redirect: { name: 'dashboard' },
            name: 'admin',
            component: Admin,

            children: [
                {
                    path: 'dashboard',
                    name: 'dashboard',
                    component: Dashboard,
                },
                {
                    path: 'users',
                    name: 'users',
                    component: Users,
                },
				{ path: '_=_', redirect: '/' }
			]
		},
    ]
});
