  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <!-- MENU DASBOR -->
        <li><a href="<?php echo base_url('admin/dasbor') ?>"><i class="fa fa-dashboard text-aqua"></i> <span>Dashboard</span></a></li>

        <!-- MENU TRANSAKSI 
        <li><a href="<?php echo base_url('admin/transaksi') ?>"><i class="fa fa-check text-aqua"></i> <span>Transaksi</span></a></li> -->

        <!-- MENU PRODUK -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-balance-scale text-aqua"></i> <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/transaksi') ?>"><i class="fa fa-check-square-o"></i> Sudah Konfirmasi</a></li>
            <li><a href="<?php echo base_url('admin/transaksi/sudah_bayar') ?>"><i class="fa fa-clock-o"></i> Sudah Bayar</a></li>
            <li><a href="<?php echo base_url('admin/transaksi/belum_bayar') ?>"><i class="fa fa-cart-arrow-down"></i> Belum Bayar</a></li>
          </ul>
        </li>

        <!-- MENU PRODUK -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-sitemap text-aqua"></i> <span>Produk</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/produk') ?>"><i class="fa fa-table"></i> Data Produk</a></li>
            <li><a href="<?php echo base_url('admin/kategori') ?>"><i class="fa fa-tags"></i> Kategori Produk</a></li>
          </ul>
        </li>

        <!-- MENU REKENING -->
        <li><a href="<?php echo base_url('admin/rekening') ?>"><i class="fa fa-dollar text-aqua"></i> <span>Data Rekening</span></a></li>

        <!-- MENU USER -->
        <li><a href="<?php echo base_url('admin/user') ?>"><i class="fa fa-lock text-aqua"></i> <span>Data Pengguna</span></a></li>

        <!-- MENU USER -->
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-lock text-aqua"></i> <span>Pengguna</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/user') ?>"><i class="fa fa-circle-o"></i> Data Pengguna</a></li>
          </ul>
        </li> -->

        <!-- MENU KONFIGURASI -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-wrench text-aqua"></i> <span>Konfigurasi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('admin/konfigurasi') ?>"><i class="fa fa-home"></i> Konfigurasi Umum</a></li>
            <li><a href="<?php echo base_url('admin/konfigurasi/logo') ?>"><i class="fa fa-image"></i> Konfigurasi Logo</a></li>
            <li><a href="<?php echo base_url('admin/konfigurasi/icon') ?>"><i class="fa fa-home"></i> Konfigurasi Icon</a></li>
          </ul>
        </li>


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $title ?>
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
