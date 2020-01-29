<template>
    <div>
        <layout-navbar></layout-navbar>
        <!-- Blog conotent -->
            <div class="container-fluid my-4">
                <div class="row">
                    <router-view></router-view>
                </div>
            </div>
        <!-- End blog content -->
        <layout-footer></layout-footer>
    </div>
</template>

<script>
    // import LayoutAside from "./Partials/Blog/Aside"
    import LayoutFooter from "./Partials/Blog/Footer"
    import LayoutNavbar from "./Partials/Blog/Navbar"

    export default {
        name: "BlogLayout",
        components: { LayoutFooter, LayoutNavbar}
    }
</script>

<style scoped>

</style>