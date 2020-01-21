<template>
    <nav class="navbar navbar-dark fixed-top flex-md-nowrap p-0 bg-info">
        <router-link to="/admin" class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">SPA Blog Administration</router-link>
        <ul class="navbar-nav px-3 d-flex flex-row">
            <li class="nav-item mr-2">
                <router-link to="/" class="nav-link text-white" >Home</router-link>
            </li>
            <li class="nav-item text-nowrap">
                <a class="nav-link text-white" href="#">Sign out</a>
            </li>
        </ul>
    </nav>
</template>

<script>

    export default {
        name: "Navbar.vue",
    }
</script>

<style scoped>

</style>