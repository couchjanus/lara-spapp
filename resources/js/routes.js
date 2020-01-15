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

import App from './layouts/App'

import Contact from './views/Contact'
import Home from './views/Home'
import UsersList from './views/UsersList';
import PostsList from './views/PostsList';

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
				/*
					Catch Alls
				*/
				{ path: '_=_', redirect: '/' }
            ],
        }
    ]
});
