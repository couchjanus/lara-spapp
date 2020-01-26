//Routes
import adminRoutes from "./admin"
import publicRoutes from "./public"

const routes = [...adminRoutes, ...publicRoutes];
// const routes = [...adminRoutes,];
export default routes;
