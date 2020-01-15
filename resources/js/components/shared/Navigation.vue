<style>

</style>

<template>
    <p>
        <router-link :to="{ name: 'home' }">Home</router-link> |
        <router-link :to="{ name: 'posts.index' }">Posts</router-link>
        <router-link :to="{ name: 'users.index' }">Users</router-link>
        <router-link :to="{ name: 'contact' }">Contact</router-link>
    </p>
</template>
<script>
    export default {}
</script>