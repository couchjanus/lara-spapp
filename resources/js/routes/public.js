// public router
import Home from "../views/Home";
import NotFound from "../views/NotFound";
import Register from "../views/Auth/Register";
import Login from "../views/Auth/Login";

const routes = [
    {
        path: "/",
        component: Home,
        name: "home.index"
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