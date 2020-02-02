<template>
    <div class="container-fluid">
        <div class="mt-5 d-flex justify-content-end">
            <router-link :to="{name: 'admin.tags.create'}" class="btn btn-info mb-2">
                Add a tag <i class="fa fa-plus-circle"></i>
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
            <tr v-for="(tag, index) in tags" :key="index">
                <th scope="row">{{ index + 1}}</th>
                <td class="text-center">{{ tag.name }}</td>
                <td class="text-center">
                    <router-link href="#" class="btn btn-outline-info rounded-circle round"
                     :to="{
                        name: 'admin.tags.edit',
                        params: {
                            tag: tag.slug
                        }
                    }"
                    >
                        <i class="fa fa-pencil"></i>
                    </router-link>
                    <a href="#" class="btn btn-outline-danger rounded-circle round" @click.prevent="deleteTags(tag)">
                        <i class="fa fa-trash-o"></i>
                    </a>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>

    export default {
        name: "TagsIndex",
        data() {
            return {
                endpoint: "/api/tags",
                tags: null
            }
        },
        mounted() {
            document.title = "Manage tags | SPA Blog";
            this.loadTags();
        },
        methods: {
            loadTags() {
                axios.get(this.endpoint)
                    .then((response) => this.tags = response.data)
                    .catch((error) => console.log(error))
            },
            deleteTags(tag) {
                if(confirm("Are you sure to delete this tag ?")) {
                    return;
                }

                let endpoint = this.endpoint + `/${tag.slug}`;

                axios.delete(endpoint)
                    .then(() => this.loadTags())
                    .catch(error => console.log(error))
            },
        }
    }
</script>
