<style>

</style>

<template>
    <div id="app-layout" class="wrapper">
        <!-- Navbar -->
        <navigation></navigation>
        <!-- /.navbar -->
        
        <!-- Main Sidebar Container -->
        <sidebar></sidebar>
        <!-- /.sidebar -->

        <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

        <router-view></router-view>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
        <slacker></slacker>
    </div>
</template>


<script>

    import Navigation from '../components/admin/Navigation.vue';
    import Slacker from '../components/admin/Slacker.vue';
    import Sidebar from '../components/admin/Sidebar.vue';
    
    export default {
        components: {
            Navigation,
            Slacker,
            Sidebar
        }
    }

</script>