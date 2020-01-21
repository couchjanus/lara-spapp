<template>
    <div class="container-fluid">
        <div class="my-2 d-flex justify-content-end">
            <router-link :to="{name: 'admin.categories.create'}" class="btn btn-info mb-2">
                Add a category <i class="fa fa-plus-circle"></i>
            </router-link>
        </div>
        <categories :categories="categories"></categories>
    </div>
</template>

<script>
    import axios from "axios";
    import Categories from "../../../components/admin/Categories";

    export default {
        name: "CategoriesIndex",
        components: {Categories},
        data() {
            return {
                categories: null,
            }
        },
        created() {
            this.fetchData();
        },
        mounted() {
            document.title = "Manage categories | SPA Blog"
        },
        methods: {
            fetchData() {
                axios.get("/api/categories").then(response => {
                    this.categories = response.data;
                    console.log(this.categories);
                });
            }
        }
    }
</script>

