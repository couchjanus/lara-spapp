<template>
    <div class="my-4">
        <div class="form-group">
            <label>Name:</label>
            <div class="tag--wrapper" id="taginput--wrapper">
                <input type="text" class="form-control" v-model="category">
            </div>
            <button class="btn btn-lg btn-info" @click="create">Create <i class="fa fa-check"></i></button>
        </div>
        <strong>Output:</strong>
            <pre>
            {{output}}
            </pre>
    </div>
</template>

<script>
    export default {
        name: "CategoriesCreate",
        data() {
            return {
                category: "",
                endpoint: "/api/categories",
                output: ''
            }
        },
        created() {
            document.title = "Add categories | SPA Blog"
        },
        methods: {
            create() {
                let currentObj = this;
                axios.post(this.endpoint, { name: this.category })
                    .then((response) => {
                        currentObj.output = response.data;
                        this.$router.push({
                            "name" : "admin.categories.index"
                        })
                    }).
                    catch(error => {
                        currentObj.output = error;
                    })
            }
        }
    }
</script>

<style lang="scss">
    .tag--wrapper {
        border: 1px solid darkcyan;
        border-radius: 2px;
        display: flex;
        flex-wrap: wrap;
        .input--tag {
            border: none;
            width: 40% !important;
            outline: none !important;
            transition: none !important;
            box-shadow: none !important;
            &:focus {
                border: none !important;
                box-shadow: none !important;
            }
        }
    }
    .tag__list {
        margin-bottom: 0px !important;
        padding-left: 0.2rem;
    }
    .tag__badge {
        padding: 8px;
        font-size: 10.5px;
        &--name {
            margin-right: 3px;
            cursor: pointer;
        }
        &--remove {
            border-left: 1px solid #e1e1e199;
            padding-left: 5px;
            cursor: pointer;
        }
    }
</style>