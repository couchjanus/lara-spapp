import Dashboard from "../views/Admin/Dashboard";
import CategoriesIndex from "../views/Admin/Categories/CategoriesIndex";
import CategoriesCreate from "../views/Admin/Categories/CategoriesCreate";
import CategoriesEdit from "../views/Admin/Categories/CategoriesEdit";

import UsersIndex from "../views/Admin/Users/UsersIndex";

import PostsIndex from "../views/Admin/Posts/PostsIndex";
import PostsCreate from "../views/Admin/Posts/PostsCreate";
// import PostsEdit from "../views/Admin/Posts/PostsEdit";

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
    {
        path: "/admin/categories/create",
        component: CategoriesCreate,
        name: "admin.categories.create",
        meta: {
            layout: "admin-layout"
        }
    },
    {
        path: "/admin/categories/:category/edit",
        component: CategoriesEdit,
        name: "admin.categories.edit",
        meta: {
            layout: "admin-layout"
        }
    },
    {
        path: "/admin/users",
        component: UsersIndex,
        name: "admin.users.index",
        meta: {
            layout: "admin-layout"
        }
    },
    {
        path: "/admin/posts",
        component: PostsIndex,
        name: "admin.posts.index",
        meta: {
            layout: "admin-layout"
        }
    },
    {
        path: "/admin/posts/create",
        component: PostsCreate,
        name: "admin.posts.create",
        meta: {
            layout: "admin-layout"
        }
    },
    // {
    //     path: "/admin/posts/:post/edit",
    //     component: PostsEdit,
    //     name: "admin.posts.edit",
    //     meta: {
    //         layout: "admin-layout"
    //     }
    // },
    
];

export default routes;