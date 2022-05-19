<template>
<div class="wrapper">

<nav class="main-header navbar navbar-expand navbar-white navbar-light">

<ul class="navbar-nav">
<li class="nav-item">
<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
</li>
<li class="nav-item d-none d-sm-inline-block">
<router-link to="/home" class="nav-link">Visit Site</router-link>
</li>
<li class="nav-item d-none d-sm-inline-block">
<a href="#" class="nav-link">Contact</a>
</li>
</ul>

<ul class="navbar-nav ml-auto">

<li class="nav-item">
<a class="nav-link" data-widget="navbar-search" href="#" role="button">
<i class="fas fa-search"></i>
</a>
<div class="navbar-search-block">
<form class="form-inline">
<div class="input-group input-group-sm">
<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
<div class="input-group-append">
<button class="btn btn-navbar" type="submit">
<i class="fas fa-search"></i>
</button>
<button class="btn btn-navbar" type="button" data-widget="navbar-search">
<i class="fas fa-times"></i>
</button>
</div>
</div>
</form>
</div>
</li>

<li class="nav-item dropdown">
<a class="nav-link" data-toggle="dropdown" href="#">
<i class="far fa-comments"></i>
<span class="badge badge-danger navbar-badge">3</span>
</a>
<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
<a href="#" class="dropdown-item">

<div class="media">
<img src="../../../node_modules/admin-lte/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
<div class="media-body">
<h3 class="dropdown-item-title">
Brad Diesel
<span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
</h3>
<p class="text-sm">Call me whenever you can...</p>
<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
</div>
</div>

</a>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item">

<div class="media">
<img src="../../../node_modules/admin-lte/dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
<div class="media-body">
<h3 class="dropdown-item-title">
John Pierce
<span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
</h3>
<p class="text-sm">I got your message bro</p>
<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
</div>
</div>

</a>
<div class="dropdown-divider"></div>
 <a href="#" class="dropdown-item">

<div class="media">
<img src="../../../node_modules/admin-lte/dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
<div class="media-body">
<h3 class="dropdown-item-title">
Nora Silvester
<span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
</h3>
<p class="text-sm">The subject goes here</p>
<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
</div>
</div>

</a>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
</div>
</li>

<li class="nav-item dropdown">
<a class="nav-link" data-toggle="dropdown" href="#">
<i class="far fa-bell"></i>
<span class="badge badge-warning navbar-badge">15</span>
</a>
<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
<span class="dropdown-header">15 Notifications</span>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item">
<i class="fas fa-envelope mr-2"></i> 4 new messages
<span class="float-right text-muted text-sm">3 mins</span>
</a>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item">
<i class="fas fa-users mr-2"></i> 8 friend requests
<span class="float-right text-muted text-sm">12 hours</span>
</a>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item">
<i class="fas fa-file mr-2"></i> 3 new reports
<span class="float-right text-muted text-sm">2 days</span>
</a>
<div class="dropdown-divider"></div>
<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
</div>
</li>
<li class="nav-item">
<a class="nav-link" data-widget="fullscreen" href="#" role="button">
<i class="fas fa-expand-arrows-alt"></i>
</a>
</li>
<li class="nav-item">
<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
<i class="fas fa-th-large"></i>
</a>
</li>
</ul>
</nav>


<aside class="main-sidebar sidebar-dark-primary elevation-4">

<router-link to="/dashboard" class="brand-link">
<img src="../../../node_modules/admin-lte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
<span class="brand-text font-weight-light">E Shop Dashboard</span>
</router-link>
  <!-- Sidebar Menu -->
         <sidebar></sidebar>
          <!-- /.sidebar-menu -->


</aside>

<div class="content-wrapper" style="min-height: 244.75px;">

<router-view></router-view>

</div>


<aside class="control-sidebar control-sidebar-dark" style="display: none;">

<div class="p-3">
<h5>Title</h5>
<p>Sidebar content</p>
</div>
</aside>


<!-- <footer class="main-footer">

<div class="float-right d-none d-sm-inline">
Anything you want
</div>

<strong>Copyright © 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer> -->
<div id="sidebar-overlay"></div></div>
</template>
<script>
import adminLte from "admin-lte";
import('../../../node_modules/admin-lte/dist/css/adminlte.min.css');
import('../../../node_modules/admin-lte/plugins/fontawesome-free/css/all.css');
import('../../../node_modules/admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css');
import('../../../node_modules/admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css');
import('../../../node_modules/admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css');
import('../../../node_modules/admin-lte/plugins/datatables/jquery.dataTables.min.js');
import('../../../node_modules/admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js');
import('../../../node_modules/admin-lte/plugins/datatables-responsive/js/dataTables.responsive.min.js');
import('../../../node_modules/admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js');
import('../../../node_modules/admin-lte/plugins/datatables-buttons/js/dataTables.buttons.min.js');
import('../../../node_modules/admin-lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js');
import('../../../node_modules/admin-lte/dist/js/adminlte.min.js');
import('../../../node_modules/admin-lte/dist/js/pages/dashboard.js');
import sidebar from './sidebar.vue'
export default {
   components:{
       sidebar: sidebar
   },
   methods:{
 logout(){
        localStorage.removeItem('AToken')
        this.$router.push({name: 'login'})
    },

 
   },
    mounted() {
        let token = localStorage.getItem('AToken');
        if(!token){
            this.$router.push('/login')
        }
       
    },
};
//   $(document).ready(function() {
//     $("#example1").DataTable({
//       "responsive": true, "lengthChange": false, "autoWidth": false,
//       "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
//     }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
//     $('#example2').DataTable({
//       "paging": true,
//       "lengthChange": false,
//       "searching": false,
//       "ordering": true,
//       "info": true,
//       "autoWidth": false,
//       "responsive": true,
//     })
//   });

</script>