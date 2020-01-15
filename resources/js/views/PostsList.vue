<template>
    <div class="posts">
        <div class="loading" v-if="loading">
            Loading...
        </div>

        <div v-if="error" class="error">
            {{ error }}
        </div>

        <!-- Latest Posts -->
        <section class="latest-posts"> 
            <div class="container">
                <header> 
                    <h2>Latest from the blog</h2>
                    <p class="text-big">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                </header>
                <div v-if="posts" class="row">
                    <div v-for="{ id, title, content, created_at, category, imgname } in posts" :key="id" class="post col-md-4">
                        <div class="post-thumbnail">
                            <img :src="'/images/blog-' + imgname +'.jpg'" alt="..." class="img-fluid">
                        </div>
                        <div class="post-details">
                            <div class="post-meta d-flex justify-content-between">
                                <div class="date">{{ created_at }}</div>
                                <div class="category"><a href="#">{{ category }}</a></div>
                            </div>
                            <a href="#"><h3 class="h4">{{ title }}</h3></a>
                            <p class="text-muted">{{ content }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>        
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
