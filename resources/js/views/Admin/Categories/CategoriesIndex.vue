<template>
    <div class="container-fluid">
        <div class="my-2 d-flex justify-content-end">
            <router-link :to="{name: 'admin.categories.create'}" class="btn btn-info mb-2">
                Add a category <i class="fa fa-plus-circle"></i>
            </router-link>
        </div>
        <table class="table datatable">
        <thead class="thead-info bg-info text-white">
        <tr>
            <th scope="col">#</th>
            <th scope="col" class="text-center">Name</th>
            <th scope="col" class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="(category, index) in categories" :key="index">
            <th scope="row">{{ index + 1}}</th>
            <td class="text-center">{{ category.name }}</td>
            <td class="text-center">
                <router-link href="#" class="btn btn-outline-info rounded-circle round"
                     :to="{
                    name: 'admin.categories.edit',
                    params: {
                        category: category.slug
                    }
                    }"
                >
                    <i class="fa fa-pencil"></i>
                </router-link>
                <a href="#" class="btn btn-outline-danger rounded-circle round" @click.prevent="deleteCategory(category)">
                    <i class="fa fa-trash-o"></i>
                </a>
            </td>
        </tr>

        </tbody>
    </table>
    </div>
</template>

<script>
    import axios from "axios";
    export default {
        name: "CategoriesIndex",
        data() {
            return {
                categories: null,
                endpoint: "/api/categories"
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
                });
            },
            deleteCategory(category) {
                let message = "Are you sure you want to delete it ?";
                if(! this.confirm(message)) {
                    return;
                }
                let endpoint = this.endpoint +`/${category.slug}`;
                axios.delete(endpoint)
                    .then((response) => {
                        console.log("Categories deleted successfully");
                        this.fetchData();
                    })
                    .catch(error => {
                        console.log(error);
                    })
            },
            confirm(message) {
                return confirm(message);
            }
        }
    }
</script>
