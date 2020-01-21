<template>
    <div class="h-100">
        <!-- Layout section -->
        <component :is="layout"></component>
        <!-- End layout section -->
    </div>
</template>

<script>
//    import BlogLayout from "./views/Layouts/BlogLayout"
   import AdminLayout from "./views/Layouts/AdminLayout"

    export default {
        name: "App",
        components: { AdminLayout },
        data() {
            return {
                defaultLayout: "admin-layout"
            }
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