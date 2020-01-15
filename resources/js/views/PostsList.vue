<template>
    <div class="posts">
        <div class="loading" v-if="loading">
            Loading...
        </div>

        <div v-if="error" class="error">
            {{ error }}
        </div>

        <ul v-if="posts">
            <li v-for="{ id, title, content } in posts" :key="id">
                <strong>Title:</strong> {{ title }},
                <strong>Content:</strong> {{ content }}
            </li>
        </ul>
    </div>
</template>
<script>
import axios from 'axios';
export default {
    data() {
        return {
            loading: false,
            posts: null,
            error: null,
        };
    },
    created() {
        this.fetchData();
    },
    methods: {
        fetchData() {
            this.error = this.posts = null;
            this.loading = true;
            axios
                .get('/api/posts')
                .then(response => {
                    console.log(response);
                    this.loading = false;
                    this.posts = response.data;
                });
        }
    }
}
</script>
