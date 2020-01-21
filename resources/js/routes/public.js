//components
import PostsIndex from "../views/Blog/PostsIndex";
import NotFound from "../views/NotFound";
import CategoryIndex from "../views/Blog/CategoryIndex";

const routes = [
    {
        path: "/",
        component: PostsIndex,
        name: "posts.index"
    },
    {
        path: "/categories/:category",
        component: CategoryIndex,
        name: "categories.index"
    },
    {
        path: "*",
        component: NotFound,
        name: "not found"
    }
];

export default routes;