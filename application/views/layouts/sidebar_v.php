<?php
$usr = $this->session->userdata('username');
$profil = $this->db->query("SELECT * FROM users WHERE username='$usr' ");
foreach ($profil->result() as $r1) {
  $foto = $r1->foto;
}

$sales = $this->db->query("SELECT * FROM tb_sales WHERE email='$usr' ");
foreach ($sales->result() as $s) {
  $foto = $s->foto;
}
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <?php
        if ($foto) {
          $img = $foto;
        } else {
          $img = 'thumb_def_user_picture.jpg';
        }
        ?>
        <img src="<?php echo base_url('asset/dist/img/' . $img); ?>" class="user-image" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?php echo $this->session->userdata('nama'); ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>

    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" style="margin-top:1cm;">
      <li class="header">MENU</li>
      <li class="treeview beranda" id="beranda">
        <a href="<?php echo base_url() ?>Dashboard">
          <i class="fas fa-tachometer-alt"></i> <span>Dashboard</span>
          <span class="pull-right-container">
          </span>
        </a>
      </li>
      <?php
      $status = $this->session->userdata('level');
      if ($status == 'Gudang') {
      ?>
        <li id="master" class="treeview">
          <a href="#">
            <i class="fas fa-toolbox"></i>
            <span>Master Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="barang"><a href="<?php echo base_url() ?>Gudang/barang"><i class="fas fa-minus"></i> Data Barang</a></li>
            <li id="supplier"><a href="<?php echo base_url() ?>Gudang/supplier"><i class="fas fa-minus"></i> Data Supplier</a></li>
            <li id="sales"><a href="<?php echo base_url() ?>Gudang/sales"><i class="fas fa-minus"></i> Data Petugas</a></li>
          </ul>
        </li>
        <li id="transaksi" class="treeview">
          <a href="#">
            <i class="fas fa-clone"></i>
            <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="masuk"><a href="<?php echo base_url() ?>Transaksi/masuk"><i class="fas fa-minus"></i></i> Barang Masuk </a></li>
            <li id="keluar"><a href="<?php echo base_url() ?>Transaksi/keluar"><i class="fas fa-minus"></i></i> Barang Keluar </a></li>
          </ul>
        </li>
        <li class="treeview" id="view">
          <a href="<?php echo base_url() ?>Gudang/manage_user">
            <i class="fa fa-users"></i> <span>Manajemen User</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
      <?php
      } else if ($status == 'Pimpinan') {
      ?>
        <li class="treeview" id="approve">
          <a href="#">
            <i class="fas fa-tasks"></i></i> <span>Approve Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="apmasuk"><a href="<?php echo base_url() ?>Approve/masuk"><i class="fa fa-circle"></i> Barang Masuk </a></li>
            <li id="apkeluar"><a href="<?php echo base_url() ?>Approve/keluar"><i class="fa fa-circle"></i> Barang Keluar </a></li>
          </ul>
        </li>
        <li id="lap" class="treeview">
          <a href="#">
            <i class="fas fa-file-alt"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="lapmasuk"><a href="<?php echo base_url() ?>laporan_masuk"><i class="fa fa-circle"></i> Barang Masuk </a></li>
            <li id="lapkeluar"><a href="<?php echo base_url() ?>laporan_keluar"><i class="fa fa-circle"></i> Barang Keluar </a></li>
          </ul>
        </li>
      <?php
      } else if ($status == 'Sales') {
      ?>
        <li class="treeview" id="view">
          <a href="<?php echo base_url() ?>View">
            <i class="fa fa-eye"></i> <span>View Barang</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
      <?php
      }
      ?>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>