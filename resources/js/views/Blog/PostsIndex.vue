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
            <div class="container-fluid">
                <header> 
                    <h2>Latest from the blog</h2>
                </header>
                <div v-if="posts" class="row">
                    <div  v-for="post in posts" :key="post.id" :post="post" class="post col-md-4">
                        <div class="post-thumbnail">
                            <img :src="post.cover_path" :alt="post.title" class="img-fluid">
                        </div>
                        <div class="post-details">
                            <div class="post-meta d-flex justify-content-between">
                                <div class="date">{{ post.created_at }}</div>
                                <div class="category"><a href="#">{{ post.category.name }}</a></div>
                            </div>
                            <a href="#"><h3 class="h4">{{ post.title }}</h3></a>
                            <p class="text-muted">{{ post.description}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>        
    </div>

</template>

<script>
    export default {
        name: "PostsIndex",
        data() {
            return {
                posts: null,
                endpoint: "/api/posts",
            }
        },
        created() {
            this.loadPosts(this.endpoint);
            document.title = "SPA Blog"
        },
        methods: {
            loadPosts(endpoint) {
                axios.get(endpoint)
                    .then((response) => {
                        this.posts = response.data;
                        console.log(this.posts);
                    })
                    .catch(error => console.log(error));

            },
        },
    }
</script>

<style scoped>

</style>