<!-- breadcrumb -->
<br><br><br>
<div class="container">
<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
<a href="<?php echo base_url() ?>" class="stext-109 cl8 hov-cl1 trans-04">
Beranda
<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
</a>

<span class="stext-109 cl4">
Dashboard Pelanggan
</span>
</div>

</div>


<!-- Shoping Cart -->
<div class="bg0 p-t-25 p-b-85">
<!-- <div class="bread-crumb flex-w p-l-113 p-r-15 p-b-15 p-lr-0-lg">
<h1><?php echo $title ?></h1>
</div> -->
<div class="container">
<div class="p-b-10 m-l-21">
	<h3 class="ltext-103 cl5">
		<?php echo $title ?>
	</h3>
</div>
<div class="row">
<div class="col-lg-10 col-xl-8 m-lr-auto m-t-50 text-center">
<div class="m-l-21 m-r--38 m-lr-0-xl" style="background-size: 100%">
	<img src="<?php echo base_url() ?>assets/admin/dist/img/avatar.png" style="border-radius: 50%; width: 100px" class="m-all-20" alt="User Image">
	<h5>
		Selamat Datang <i><strong><?php echo $pelanggan->nama_pelanggan ; ?></strong></i>
	</h5>
	<br>
	<a class="btn btn-warning m-b-65 stext-115 cl8" href="<?php echo base_url('dasbor/profil') ?>">Edit Profil</a>
</div>
</div>

<!-- menu -->
<?php include('menu.php') ?>

<!-- <a href="<?php echo base_url('belanja/checkout') ?>" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
	Checkout
</a> -->
</div>
</div>
</div>
</div>
</div>