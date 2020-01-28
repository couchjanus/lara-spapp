<template>
    <div class="container-fluid">
        <form action="" @submit.prevent="storePost" enctype="multipart/form-data" method="POST">
            <div class="card mb-3">
                <cover-uploader @loaded="updateCover"></cover-uploader>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select class="custom-select" id="category" v-model="category_id">
                    <option selected="" disabled></option>
                    <option :value="category.id" v-for="(category, i) in categories" :key="i">{{ category.name }}</option>
                </select>
            </div>
            <div class="form-group">
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input" id="online" checked="" v-model="online">
                    <label class="custom-control-label" for="online">Online</label>
                </div>
            </div>
            
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" v-model="title">
                
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea v-model="content" id="content"></textarea>

            </div>
            <div class="form-group">
                <button class="btn btn-success btn-lg" type="submit">Post <i class="fa fa-check"></i></button>
            </div>
        </form>
    </div>
</template>

<script>
    import CoverUploader from "../../../components/CoverUploader";
    
    export default {
        components: {CoverUploader },
        
        data() {
            return {
                cover: null,
                category_id: "",
                title: "",
                content: "",
                online: false,
                endpoint: "/api/posts",
                categories: null,
            }
        },
        created() {
            this.fetchCategories();
        },
        mounted() {
            document.title = "New Post | SPA Blog"
        },
        methods: {
            updateCover(cover) {
                this.cover = cover;
            },
            storePost() {
                const config = {
                    headers: {
                        "content-type": "multipart/form-data"
                    }
                };
                // let formData = {
                //     cover: this.cover,
                //     title: this.title,
                //     content: this.content,
                //     category_id: this.category_id,
                //     online: this.online,
                // };

                let formData = new FormData();

                formData.append("cover", this.cover);
                formData.append("title", this.title);
                formData.append("content", this.content);
                formData.append("category_id", this.category_id);
                formData.append("online", this.online);

                console.log(formData);

                axios.post(this.endpoint, formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
                })
                .then(response => {
                    if (response.data) {
                        console.log(response.data);
                        this.$router.push({
                            name: "admin.posts.index"
                        });
                    }
                }).catch(error => {
                    alert(error.response.data.message);
                })
            },
            fetchCategories() {
                axios.get("/api/categories").then(response => {
                    
                    this.categories = response.data;
                });
            },
        },
        
    }
</script>

<style scoped>
    @import '~simplemde/dist/simplemde.min.css';
</style>