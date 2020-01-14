<style>

</style>

<template>
    <p>
        <router-link :to="{ name: 'home' }">Home</router-link> |
        <router-link :to="{ name: 'hello' }">Hello World</router-link>
        <router-link :to="{ name: 'posts.index' }">Posts</router-link>
        <router-link :to="{ name: 'users.index' }">Users</router-link>
    </p>
</template>
<script>
    export default {}
</script>