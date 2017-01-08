<?php defined('BASEPATH') OR exit('DIRECT SCRIPT ACCESS NOT ALLOWED')  ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Smart Lists</title>
    </head>
    <body>
        <nav class="blue lighten-1">
            <div class="nav-wrapper">
                <a href="#" class="brand-logo"><?php echo $this->config->item('site_name'); ?></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <?php
                        if($this->session->loggedin == FALSE){
                    ?>
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a href="<?php echo base_url('auth/login'); ?>">Login</a></li>
                    <li><a href="<?php echo base_url('auth/register'); ?>">Register</a></li>
                    <?php } else {  ?>
                    <li><a href="<?php echo base_url('auth/logout'); ?>">Logout</a></li>
                    <li><a href="#">Welcome <?php echo $this->session->username; ?></a></li>
                    <li><a href="#" data-activates="acc_manage" class="dropdown-button btn">Manage Account</a>
                        <ul id="acc_manage" class="dropdown-content">
                            <li><a href="#" onclick="start('Manage Server')">Manage Servers</a></li>
                            <li><a href="#" onclick="start('Edit Profile')">Edit Profile</a></li>
                            <li class="divider"></li>
                            <li><a href="#" onclick="start('Become Pro')">Become Pro!</a></li>
                        </ul>
                    </li>

                    <?php } ?>
                </ul>
            </div>
        </nav>
        <div class="container">