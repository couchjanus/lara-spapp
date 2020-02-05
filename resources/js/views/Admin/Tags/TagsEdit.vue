<template>
    <div class="my-4">
        <div class="form-group">
            <label for="name">Edit a tag</label>
            <input type="text" class="form-control" v-model="tag.name" id="name">
        </div>
        <div class="form-group">
            <button class="btn btn-lg btn-info" @click="update">Update <i class="fa fa-check"></i></button>
        </div>
    </div>
</template>

<script>

    export default {
        name: "TagsEdit",
        data() {
            return {
                tag: {
                    name: ""
                },
                endpoint: "/api/tags",
            }
        },
        mounted() {
            document.title = "Edit a tag | SPA Blog";
            this.endpoint = this.endpoint + `/${this.$route.params.tag}`;
            this.loadTag(this.endpoint)
        },
        methods: {
            loadTag(url) {
                axios.get(url)
                    .then((response) => this.tag = response.data)
            },
            update() {
                axios.put(this.endpoint, this.tag)
                    .then((response) => {
                        console.log("updated tag");
                        this.$router.push({
                            name: "admin.tags.index"
                        })
                    })
                    .catch((error) => {
                        console.log(error);
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