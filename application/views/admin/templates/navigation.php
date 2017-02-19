<?php defined('BASEPATH') OR exit('NO DIRECT SCRIPT ACCESS IS ALLOWED'); ?>
<ul class="sidebar-menu">
    <li class="header">HEADER</li>
    <!-- Optionally, you can add icons to the links -->
    <li><a href="<?php echo base_url('admin/home'); ?>"><i class="fa fa-link"></i> <span>Home</span></a></li>
    <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
    <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>Add functions</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="#">Add User</a></li>
            <li><a href="#">Add Server</a></li>
            <li><a href="#">Add Notice</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#"><i class="fa fa-link"></i> <span>View functions</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li><a href="#">View Users</a></li>
            <li><a href="#">View Servers</a></li>
            <li><a href="#">View Notices</a></li>
        </ul>
    </li>
</ul>