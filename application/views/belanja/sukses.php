<!-- breadcrumb -->
<br><br><br>
<div class="container">
<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
<a href="<?php echo base_url() ?>" class="stext-109 cl8 hov-cl1 trans-04">
Beranda
<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
</a>

<a href="<?php echo base_url('belanja') ?>" class="stext-109 cl8 hov-cl1 trans-04">
Keranjang
<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
</a>

<span class="stext-109 cl4">
Checkout
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
	<div class="col-md-12 text-center">
		<?php if ($this->session->flashdata('sukses')) {
		echo '<div class="alert alert-warning">';
		echo $this->session->flashdata('sukses');
		echo '</div>';
		} ?>

		<p class="alert alert-success">Terima Kasih. Pesanan anda akan segera diproses. </p> 
			
	</div>
	<div class="col-sm-10 col-lg-7 col-xl-6 m-lr-auto m-b-50">
	<!-- <div class="p-lr-20 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
		<a class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" href="<?php echo base_url() ?>"> Lanjut Belanja</a>	
	</div><br> -->
	<div class="p-lr-20 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
		<a class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" href="<?php echo base_url('dasbor/belanja') ?>"> Konfirmasi Pembayaran</a>	
	</div>
	</div>


</div>
</div>
