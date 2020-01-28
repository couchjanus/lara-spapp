<template>
  <div class="container-fluid">
    <div class="my-2 d-flex justify-content-end">
      <router-link :to="{name: 'admin.posts.create'}" class="btn btn-info mb-2">
        Add a new post
        <i class="fa fa-plus-circle"></i>
      </router-link>
    </div>

    <table class="table datatable">
      <thead class="thead-info bg-info text-white">
        <tr>
          <th scope="col">#</th>
          <th scope="col" class="text-center">Title</th>
          <th scope="col" class="text-center">Views</th>
          <th scope="col" class="text-center">Online ?</th>
          <th scope="col" class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(post, index) in posts" :key="index">
          <th scope="row">{{ index + 1}}</th>
          <td>{{ post.title }}</td>
          <td class="text-center">
            <span
              class="badge badge-pill badge-info py-1 px-2"
            >{{ post.visits }}</span>
          </td>
          <td class="text-center">
            <span
              class="badge p-2"
              :class="post.online ? 'badge-success': 'badge-danger'"
              style="border-radius: 50%"
            ></span>
          </td>
          <td class="text-center">
            <router-link
              href="#"
              class="btn btn-outline-info rounded-circle round"
              :to="{
                        name: 'admin.posts.edit',
                        params: {
                            post: post.slug
                        }
                    }"
            >
              <i class="fa fa-pencil"></i>
            </router-link>
            <a
              href="#"
              class="btn btn-outline-danger rounded-circle round"
              @click.prevent="deletePosts(post)"
            >
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
  name: "PostsIndex",
  data() {
    return {
      posts: null,
      endpoint: "/api/posts/all"
    };
  },
  created() {
    this.fetchPosts(this.endpoint);
  },
  mounted() {
    document.title = "Manage Posts | SPA Blog";
  },
  methods: {
    fetchPosts(endpoint) {
      axios.get(endpoint).then(( response ) => {
        this.posts = response.data;
        console.log(this.posts);
      });
    },
    deletePosts(post) {
      const endpoint = `/api/posts/${post.slug}`;
      if (!confirm("Are you sure to delete this post ?")) {
        return false;
      }
      axios
        .delete(endpoint)
        .then((response) => {
            console.log("Post deleted successfully");
            this.fetchPosts();
        })
        .catch(error => {
            console.log(error);
        })
    }
  }
};
</script>


<style scoped>
.round {
  width: 30px;
  height: 30px;
  position: relative;
}
.round i {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.badge:empty {
  display: inline-block;
}
</style>