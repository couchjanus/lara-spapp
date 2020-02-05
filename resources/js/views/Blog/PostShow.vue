<template>
  <div class="col-sm-12 col-md-12 ">
    <div class="container-fluid row">
      <div class="post blog-post col-md-8 mt-2 mx-auto">
    
        <div class="post-single">
            <div class="post-thumbnail mb-4 text-center">
                    <img :src="post.cover_path" alt="" class="img-fluid">
            </div>
            
            <div class="post-details">
                <div class="post-meta d-flex justify-content-between">
                    <div class="category"><a href="#">{{ post.category.name }}</a></div>
                </div>

                <h2 class="blog-post-title">{{ post.title }}</h2>
                
                <div class="post-footer d-flex align-items-center flex-column flex-sm-row">
                    <a href="#" class="author d-flex align-items-center flex-wrap"><div class="title"><span>{{ post.creator.name }}</span></div></a>
                    <div class="d-flex align-items-center flex-wrap">       
                        <div class="date"><i class="icon-clock"></i> {{ post.created_at }}</div>
                        <div class="views"><i class="icon-eye"></i> 500</div>
                        <div class="comments meta-last"><i class="icon-comment"></i>12</div>
                    </div>
                </div>
                <div class="post-body" v-html="post.content">
                </div>
                
                <div class="post-tags">
                    <a href="#" class="tag">#Business</a>
                    <a href="#" class="tag">#Tricks</a>
                    <a href="#" class="tag">#Financial</a>
                    <a href="#" class="tag">#Economy</a>
                </div>
                <!-- /.blog-post -->
            </div>

        </div>

        <Comments :items="post.comments" />
      
      </div>
    </div>
  </div>

</template>

<script>
    import Comments from "../../components/Comments";

    export default {
        name: "PostShow",
        components: {Comments},
        data() {
            return {
                post: {
                    creator: "",
                    category: "",
                    comments: []
                }
            }
        },
        created() {
            this.fetchPost(this.$route.params);
        },
        methods: {
            fetchPost({ category, slug : postSlug}) {
                let url = `/api/${category}/${postSlug}`;

                axios.get(url)
                    .then(({ data : post}) => this.post = post.data)
                    .catch(error => console.log(error));
            }
        },
        watch: {
            '$route.params'(value) {
                this.fetchPost(value);
            }
        }
    }
</script>

<style scoped>

</style>