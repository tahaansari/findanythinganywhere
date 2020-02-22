<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Authencation</title>

      <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
      <link href="<?= base_url('assets/admin_assets/css/bootstrap.min.css')?>" rel="stylesheet">
      <link rel="stylesheet" href="<?php echo base_url();?>assets/admin_assets/css/AdminLTE.min.css">
      
      <style type="text/css">
         .error{
         color: red;
         }
         .login-box, .register-box {
         margin-top: 10%;
         }
      </style>
   </head>
   <body class="hold-transition login-page">
      <div class="login-box">
         <div class="login-logo">
         </div>
         <div class="login-box-body">
            <h3 class="login-box-msg">
               <b>ADMIN DASHBOARD</b>
            </h3>
            <p class="error">
               <?php if(isset($message)){ echo $message;} ?>
            </p>
            <form action="<?php echo base_url()?>auth/login" method="post">
               <div class="form-group has-feedback">
                  <input name="identity" type="email" class="form-control" placeholder="Email">
               </div>
               <div class="form-group has-feedback">
                  <input name="password" type="password" class="form-control" placeholder="Password">
               </div>
               <div class="row">
                  <div class="col-xs-12">
                     <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                  </div>
               </div>
            </form>
         </div>
      </div>

      <script src="<?= base_url('assets/admin_assets/js/jquery.min.js')?>"></script>
      <script src="<?= base_url('assets/admin_assets/js/bootstrap.min.js')?>"></script>
      <script src="<?php echo base_url('assets/admin_assets/js/icheck.min.js')?>"></script>

      <script>
         $(function () {
           $('input').iCheck({
             checkboxClass: 'icheckbox_square-blue',
             radioClass: 'iradio_square-blue',
             increaseArea: '20%'
           });
         });
      </script>

   </body>
</html>