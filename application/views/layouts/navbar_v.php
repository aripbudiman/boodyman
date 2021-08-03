<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top" role="navigation">
  <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
    <span class="sr-only">Toggle navigation</span>
  </a>
  
  <!-- Navbar Right Menu -->
       <div id="xloading" class="grspinner" style="display:none">
            <div class="rect1"></div>
          	<div class="rect2"></div>
          	<div class="rect3"></div>
        </div>
  <?php
    $usr = $this->session->userdata('username');
    $profil = $this->db->query("SELECT * FROM users WHERE username='$usr' ");
    foreach($profil->result() as $r1){
      $foto = $r1->foto;
    }
    $sales = $this->db->query("SELECT * FROM tb_sales WHERE email='$usr' ");
    foreach($sales->result() as $s){
      $foto = $s->foto;
    }
  ?>
  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <!-- Messages: style can be found in dropdown.less-->      <!-- User Account: style can be found in dropdown.less -->
      <li class="dropdown user user-menu"> <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <?php 
          if($foto){
            $img = $foto;
          }else{
            $img = 'thumb_def_user_picture.jpg';
          }
        ?>
        <img src="<?php echo base_url('asset/dist/img/'.$img); ?>" class="user-image" alt="User Image"/>
        <span class="hidden-xs"><?php echo $this->session->userdata('nama'); ?> | <?php echo $this->session->userdata('level'); ?></span> </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header"> <img src="<?php echo base_url('asset/dist/img/'.$img); ?>" class="img-circle" alt="User Image" />
            <p> <?php echo $this->session->userdata('nama'); ?> <small><?php echo $this->session->userdata('username'); ?></small> </p>
          </li>
          <!-- Menu Body -->          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-left"> <a href="<?php echo base_url() ?>Profil" class="btn btn-default btn-flat">Profil</a> </div>
            <div class="pull-right"> <a href="<?php echo base_url() ?>Log/out" class="btn btn-default btn-flat">Keluar</a> </div>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>