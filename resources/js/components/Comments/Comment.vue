<template>
    <div class="row col-md-12">
        <div class="card mb-3 col-md-12 p-0 shadow-sm">
            <div class="card-header d-flex justify-content-between m-0">
                <span>{{ data.author_name}}</span>
                <span class="text-secondary">{{ data.created_at }}</span>
            </div>
            <div class="card-body">
                <p class="card-text">{{ data.content }}</p>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <button class="btn btn-danger" @click="deleteComment">
                    Delete
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Comment",
        props: ["data"],
        methods: {
            deleteComment() {
                if(! confirm("Are you sure to delete this comment ?")) {
                    return;
                }

                let endpoint =  `/api/comments/${this.data.id}`;

                axios.delete(endpoint)
                    .then(() => {
                        console.log("Comment deleted successfully");
                        this.$emit("delete", this.data);
                    })
                    .catch(error => {
                        console.log("An error occured during the request");
                    })
            }
        },
        computed: {
            auth() {
                return this.$store.getters.auth;
            }
        }
    }
</script>

<style scoped>

</style>