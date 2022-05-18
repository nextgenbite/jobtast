<template>
    <div class="sidebar">

<div class="user-panel mt-3 pb-3 mb-3 d-flex">
<div class="image">
<img src="../../../node_modules/admin-lte/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
</div>
<div class="info">
<a href="#" class="d-block">Alexander Pierce</a>
</div>
</div>


<nav class="mt-2">
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

<li class="nav-item ">
<router-link to="#" class="nav-link ">
<i class="nav-icon fas fa-tachometer-alt"></i>
<p>
Customer
<i class="right fas fa-angle-left"></i>
</p>
</router-link>
<ul class="nav nav-treeview">
<li class="nav-item">
<router-link to="/add-customer" class="nav-link">
<i class="far fa-circle nav-icon"></i>
<p>Add Customer</p>
</router-link>
</li>
<li class="nav-item">
<router-link to="/customer" class="nav-link">
<i class="far fa-circle nav-icon"></i>
<p>All Customer</p>
</router-link>
</li>
</ul>
</li>
<li class="nav-item ">
<router-link to="#" class="nav-link ">
<i class="nav-icon fas fa-tachometer-alt"></i>
<p>
Booking
<i class="right fas fa-angle-left"></i>
</p>
</router-link>
<ul class="nav nav-treeview">
<li class="nav-item">
<router-link to="/add-booking" class="nav-link ">
<i class="far fa-circle nav-icon"></i>
<p>Add Booking</p>
</router-link>
</li>
<li class="nav-item">
<router-link to="/booking" class="nav-link">
<i class="far fa-circle nav-icon"></i>
<p>All Booking</p>
</router-link>
</li>
</ul>
</li>

<li class="nav-item">
<a href="#" class="nav-link">
<i class="nav-icon fas fa-th"></i>
<p>
sample data
<span class="right badge badge-danger">New</span>
</p>
</a>
</li>
<li class="nav-item ">
<router-link to="/resort" class="nav-link">
<i class="nav-icon fas fa-user"></i>
<p>
Resrort
</p>
</router-link>
</li>
<li class="nav-item bg-danger">
<router-link to="/logout" class="nav-link">
<i class="nav-icon fas fa-user"></i>
<p>
Logout
</p>
</router-link>
</li>
</ul>
</nav>

</div>
</template>