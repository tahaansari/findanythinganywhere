<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Administrator</title>
      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

      <link href="<?= base_url('assets/admin_assets/css/bootstrap.min.css')?>" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="<?php echo base_url('assets/admin_assets/css/AdminLTE.min.css');?>">
      <link rel="stylesheet" href="<?php echo base_url('assets/admin_assets/css/skin-blue.min.css');?>">
      
      <?php 
         if(isset($css_files)){
             foreach($css_files as $files){ ?>
      <link type="text/css" rel="stylesheet" href="<?php echo $files; ?>" />
      <?php     }
         } ?>
   </head>
   <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper">
      <header class="main-header">
         <div class="logo">
            <span class="logo-lg"><b>Admin</b>Panel</span>
         </div>
         <nav class="navbar navbar-static-top" role="navigation">
            <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
               <ul class="nav navbar-nav">
                  <li class="dropdown user user-menu">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <span class="hidden-xs">
                     Options
                     </span>
                     </a>
                     <ul class="dropdown-menu">
                        <li class="user-header">
                           <img src="<?php echo base_url()?>/assets/admin_assets/img/user.jpg" class="img-circle" alt="User Image">
                           <p>
                              Administrator
                           </p>
                        </li>
                        <li class="user-footer">
                           <div class="pull-right">
                              <a href="<?php echo base_url()?>auth/logout" class="btn btn-default btn-flat">Sign out</a>
                           </div>
                        </li>
                     </ul>
                  </li>
               </ul>
            </div>
         </nav>
      </header>
      <aside class="main-sidebar">
         <section class="sidebar">
            <div class="user-panel">
               <div class="pull-left image">
                  <img src="<?php echo base_url()?>/assets/admin_assets/img/user.jpg" class="img-circle" alt="User Image">
               </div>
               <div class="pull-left info">
                  <p> Administrator</p>
                  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
               </div>
            </div>
            <ul class="sidebar-menu">
               <li class="header"></li>
               <li>
                  <a href="<?php echo base_url()?>admin/users">
                  <i class="fa fa-link"></i> 
                  <span>Users</span>
                  </a>
               </li>
               <li>
                  <a href="<?php echo base_url()?>admin/journey">
                  <i class="fa fa-link"></i> 
                  <span>Users Journey</span>
                  </a>
               </li>
               <li>
                  <a href="<?php echo base_url()?>admin/feedback">
                  <i class="fa fa-link"></i> 
                  <span>Feedback</span>
                  </a>
               </li>
               <li>
                  <a href="<?php echo base_url()?>admin/share">
                  <i class="fa fa-link"></i> 
                  <span>Share</span>
                  </a>
               </li>
               <li>
                  <a href="<?php echo base_url()?>admin/limit">
                  <i class="fa fa-link"></i> 
                  <span>Limit</span>
                  </a>
               </li>

            </ul>
         </section>
      </aside>