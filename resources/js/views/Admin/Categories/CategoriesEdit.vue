<template>
    <div class="my-4">
        <form @submit.prevent="update">
        <div class="form-group">
            <label for="name">Edit a category</label>
            <input type="text" class="form-control" v-model="category.name" id="name">
        </div>
        
        <div class="form-group">
            <button class="btn btn-lg btn-info">Update <i class="fa fa-check"></i></button>
        </div>
        </form>
    </div>
</template>

<script>

    export default {
        name: "CategoriesEdit",
        data() {
            return {
                category: {
                    name: "",
                },
                endpoint: "/api/categories",
            }
        },
        mounted() {
            document.title = "Edit category | SPA Blog";
            this.endpoint = this.endpoint + `/${this.$route.params.category}`;
            this.loadCategory(this.endpoint)
        },
        methods: {
            loadCategory(url) {
                axios.get(url)
                    .then(response => {
                        this.category = response.data;
                    })
            },
            update() {
                axios.put(this.endpoint, this.category)
                    .then((response) => {
                        this.$router.push({
                            name: "admin.categories.index"
                        })
                    })
                    .catch((error) => {
                        console.log(error);
                    })
            }
        }
    }
</script>

<style scoped>

</style>