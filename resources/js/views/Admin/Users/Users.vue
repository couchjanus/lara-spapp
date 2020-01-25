<template>
  <div class="users">
    <div class="loading" v-if="loading">Loading...</div>

    <div v-if="error" class="error">{{ error }}</div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Responsive Hover Table</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input
                      type="text"
                      name="table_search"
                      class="form-control float-right"
                      placeholder="Search"
                    />

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default">
                        <i class="fa fa-search"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table v-if="users" class="table table-hover">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>User</th>
                      <th>Email</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="{ id, name, email } in users" :key="id">
                      <td>{{ id }}</td>
                      <td>{{ name }}</td>
                      <td>{{ email }}</td>
                    </tr>
                  </tbody>
                </table>
                <vue-pagination  :pagination="users"
                     @paginate="fetchData()"
                     :offset="4">
                </vue-pagination>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</template>
<script>
import axios from "axios";
import VuePagination from '../../../components/shared/Pagination';
export default {
  data() {
    return {
      loading: false,
      users: {
            total: 0,
            per_page: 2,
            from: 1,
            to: 0,
            current_page: 1
      },
      offset: 4,
      error: null
    };
  },
  components: {
        VuePagination,
  },
  created() {
    this.fetchData();
  },
  methods: {
    fetchData() {
      this.error = this.users = null;
      this.loading = true;
      axios.get("/api/users?page=${this.users.current_page").then(response => {
        console.log(response);
        this.loading = false;
        this.users = response.data;
      })
      .catch(() => {
        console.log('handle server error from here');
      });
    }
  }
};
</script>

