<!DOCTYPE html>
<html><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title ?></title>
    <link rel="shortcut icon" href="<?php echo base_url()?>/asset/dist/img/favicon.ico">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo base_url();?>asset/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link href="<?php echo base_url()?>asset/dist/css/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="<?php echo base_url()?>asset/ionicons.min.css" rel="stylesheet" type="text/css" /> 
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url();?>asset/dist/css/AdminLTE.min.css">  
    <style>
       .coy{      
         box-shadow: 3px 3px 5px grey;
         border-radius: 7px;
       }
    </style>
    
  </head>
  <body style="background-color: #9ecfdb;">
    <div class="login-box coy" align="center"> 
      <div class="login-box-body" style="border-radius: 7px;">
          <!--img width="50px" src="<?php //echo base_url() ?>assets/img/favicon.png"><br-->
        	<span style="font-size:22px;color: #029acf;font-family: arial;"><b> Verifikasi </b></span><span style="font-size:22px;color: #d2d6de; font-family: verdana;">Akun Sales </span><br><br>
        
      
      <?php echo $this->session->flashdata('msg'); ?>
        <!--p class="login-box-msg" style="font-size:18px;">Login Admin</p-->
        
        <form method="post" action="<?php echo base_url() ?>Log/active">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" value="<?php echo $mail ?>" placeholder="Email" name="email" readonly>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Kode Verifikasi" name="kode" autofocus>
          </div>

          <div class="row">
            <div class="col-xs-4">
              
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-info btn-block btn-flat"> &nbsp; Confirm</button>
            </div><!-- /.col -->
          </div>
        </form>   
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    <script src="<?php echo base_url() ?>asset/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <script src="<?php echo base_url() ?>asset/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){setTimeout(function(){$(".alert").fadeIn('slow');}, 500);});
      setTimeout(function(){$(".alert").fadeOut('slow');}, 3000);
    </script>
   
  </body>
</html>