// public router
import Home from "../views/Home";
import NotFound from "../views/NotFound";
import Register from "../views/Auth/Register";
import Login from "../views/Auth/Login";
import PostsIndex from "../views/Blog/PostsIndex";
import PostShow from "../views/Blog/PostShow";

const routes = [
    {
        path: "/",
        component: PostsIndex,
        name: "posts.index"
    },
    {
        path: "/:category/:slug",
        component: PostShow,
        name: "posts.show"
    },
    {
        path: '/login',
        name: 'login',
        component: Login,
        meta: {
            layout: "auth-layout"
        }
    },
    {
        path: '/register',
        name: 'register',
        component: Register,
        meta: {
            layout: "auth-layout"
        }
    },
    {
        path: "*",
        component: NotFound,
        name: "not found"
    }
];

export default routes;