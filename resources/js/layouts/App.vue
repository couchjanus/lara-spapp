<style>

</style>

<template>
    <div id="app-layout">
        <navigation></navigation>
        <router-view></router-view>

        <slacker></slacker>
    </div>
</template>


<script>

    import Navigation from '../components/shared/Navigation.vue';
    import Slacker from '../components/shared/Slacker.vue';
    export default {
        components: {
            Navigation,
            Slacker,
        }
    }

</script>