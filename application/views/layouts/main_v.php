<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title><?php echo $title ?></title>
  <link rel="shortcut icon" href="<?php echo base_url() ?>/asset/dist/img/favicon.ico">
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <!-- Bootstrap 3.3.2 
  <link href="<?php echo base_url() ?>asset/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />-->
  <link href="<?php echo base_url() ?>asset/bootstrap4.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <!-- Style arip css-->
  <link href="<?php echo base_url() ?>asset/dist/css/skins/stylearip.css" rel="stylesheet" type="text/css" />
  <!-- Font Awesome Icons -->
  <link href="<?php echo base_url() ?>asset/dist/css/font-awesome-4.3.0/css/font-awesome.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url() ?>asset/dist/css/font-awesome-4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url() ?>asset/dist/css/fontawesome-5.15.3/css/fontawesome.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url() ?>asset/dist/css/fontawesome-5.15.3/css/all.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url() ?>asset/dist/css/fontawesome-5.15.3/css/all.css" rel="stylesheet" type="text/css" />

  <!-- Ionicons -->
  <link href="<?php echo base_url() ?>asset/dist/css/ionicons-2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
  <!-- Theme style -->
  <link href="<?php echo base_url() ?>asset/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
  <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
  <link href="<?php echo base_url() ?>asset/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url() ?>asset/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />


  <!-- jQuery-->
  <script src="<?php echo base_url() ?>asset/plugins/jQuery/jQuery-2.1.3.min.js"></script>
  <script src="<?php echo base_url() ?>asset/plugins/jQuery/jquery.form.min.js"></script>
  <script src="<?php echo base_url() ?>asset/plugins/jQuery/jquery.preload.min.js"></script>
  <script type="text/javascript" src="<?php echo base_url() ?>asset/plugins/datepicker/bootstrap-datepicker.js"></script>
  <!-- Bootstrap 3.3.2 JS
  <script src="<?php echo base_url() ?>asset/bootstrap/js/bootstrap.min.js" type="text/javascript"></script> -->
  <script src="<?php echo base_url() ?>asset/bootstrap4.6/js/bootstrap.min.js" type="text/javascript"></script>
  <!-- SlimScroll -->
  <script src="<?php echo base_url() ?>asset/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url() ?>asset/plugins/fastclick/fastclick.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url() ?>/asset/dist/js/app.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url() ?>/asset/jquery.chained.min.js" type="text/javascript"></script>

</head>

<body class="hold-transition skin-red-light sidebar-mini">
  <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
      <a class="logo" href="">
        <!--img alt="Brand" src="<?php echo base_url("asset/dist/img/logo.png"); ?>" height="40" width="40"-->
        <strong><i class="fas fa-blog"></i>BOODYMAN</strong>
      </a>
      <?php $this->load->view('layouts/navbar_v'); ?>
    </header>
    <?php $this->load->view('layouts/sidebar_v'); ?>
    <div class="content-wrapper">
      <section class="content">
        <?php
        $this->load->view($content);
        ?>
      </section>
    </div>
    <?php $this->load->view('layouts/footer_v'); ?>
  </div>
  <script type="text/javascript">
    $(document).ready(function() {
      setTimeout(function() {
        $(".alert").fadeIn('slow');
      }, 500);
    });
    setTimeout(function() {
      $(".alert").fadeOut('slow');
    }, 3000);
  </script>
</body>

</html>