<template>
    <div class="h-100">
        <!-- Layout section -->
        <component :is="layout"></component>
        <!-- End layout section -->
         <Flash></Flash>
    </div>
</template>

<script>
    import BlogLayout from "./views/Layouts/BlogLayout"
    import AdminLayout from "./views/Layouts/AdminLayout"
    import AuthLayout from "./views/Layouts/AuthLayout"
    import LoginLayout from "./views/Layouts/LoginLayout"
    import Flash from "./components/shared/Flash";

    export default {
        name: "App",
        components: { AdminLayout, AuthLayout, BlogLayout, LoginLayout, Flash },
        data() {
            return {
                defaultLayout: "blog-layout"
            }
        },mounted() {
            this.$store.dispatch("fetchCategories");
            this.setDocumentTitle("SPA Blog");
        },
        computed: {
            layout() {
                return this.$route.meta.layout ? this.$route.meta.layout : this.defaultLayout;
            }
        },
    }
</script>

<style scoped>

</style>