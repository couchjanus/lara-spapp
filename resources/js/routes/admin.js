import Dashboard from "../views/Admin/Dashboard";
import CategoriesIndex from "../views/Admin/Categories/CategoriesIndex";
// import CategoriesCreate from "../views/Admin/Categories/CategoriesCreate";
// import PostsIndex from "../views/Admin/Posts/PostsIndex";
// import PostsCreate from "../views/Admin/Posts/PostsCreate";

const routes = [
    {
        path: "/admin",
        component: Dashboard,
        name: "admin.dashboard",
        meta: {
            layout: "admin-layout"
        }
    },
    {
        path: "/admin/categories",
        component: CategoriesIndex,
        name: "admin.categories.index",
        meta: {
            layout: "admin-layout"
        }
    },
    // {
    //     path: "/admin/posts",
    //     component: PostsIndex,
    //     name: "admin.posts.index",
    //     meta: {
    //         layout: "admin-layout"
    //     }
    // },
    // {
    //     path: "/admin/posts/create",
    //     component: PostsCreate,
    //     name: "admin.posts.create",
    //     meta: {
    //         layout: "admin-layout"
    //     }
    // },
    // {
    //     path: "/admin/categories/create",
    //     component: CategoriesCreate,
    //     name: "admin.categories.create",
    //     meta: {
    //         layout: "admin-layout"
    //     }
    // },
];

export default routes;