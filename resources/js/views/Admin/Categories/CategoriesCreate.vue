<template>
    <div class="my-4">
        <label for="category">Edit a category</label>
        <input type="text" class="form-control" v-model="categories" id="category" name="category">
        <span class="text-danger d-block mb-2" v-if="errors.has('names')">{{ errors.get('names')}}</span>
        <div class="form-group">
            <button class="btn btn-lg btn-info" @click="create">Create <i class="fa fa-check"></i></button>
        </div>
    </div>
</template>

<script>

    import Errors from "../../../components/shared/Errors";
    import AddToken from "../../../components/shared/AddToken";
    import AuthMiddleware from "../../../components/shared/AuthMiddleware";
    import authenticated from "../../../components/shared/authenticated";
    export default {
        name: "CategoriesCreate",
        mixins: [AddToken, AuthMiddleware, authenticated],
        data() {
            return {
                categories: "",
                endpoint: "/api/categories",
                errors: new Errors()
            }
        },
        created() {
            document.title = "Add categories | SPA Blog"
        },
        methods: {
            create() {
                axios.post(this.endpoint, { names: this.categories })
                    .then(({ data : categories}) => {
                        return this.$store.dispatch("storeCategories", categories.data)
                    })
                    .then(() => {
                        this.$store.dispatch("alert", { message:  "Categories stored successfully"});
                        this.$router.push({
                            "name" : "admin.categories.index"
                        })
                    }).
                    catch(error => {
                        this.errors.record(error.response.data.errors)
                    })
            }
        }
    }
</script>

<style scoped>

</style>
