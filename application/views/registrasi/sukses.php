<!-- breadcrumb -->
<br><br><br>
<div class="container">
<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
<a href="<?php echo base_url() ?>" class="stext-109 cl8 hov-cl1 trans-04">
Home
<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
</a>

<span class="stext-109 cl4">
Shoping Cart
</span>
</div>

</div>


<!-- Shoping Cart -->
<div class="bg0 p-t-25 p-b-85">
<div class="bread-crumb flex-w p-l-113 p-r-15 p-b-15 p-lr-0-lg">
<h1><?php echo $title ?></h1>
</div>

<div class="container">
<div class="row">
<div class="col-lg-10 col-xl-8 m-lr-auto m-b-50">
<div class="m-l-25 m-r--38 m-lr-0-xl">
	<div class="col-md-12">
		<?php if ($this->session->flashdata('sukses')) {
		echo '<div class="alert alert-warning">';
		echo $this->session->flashdata('sukses');
		echo '</div>';
		} ?>

		<p class="alert alert-success">Registrasi berhasil.  
			<a class="btn btn-info btn-sm" href="<?php echo base_url('masuk') ?>"> Login</a> <!-- Anda juga bisa melakukan checkout <a class="btn btn-warning btn-sm" href="<?php echo base_url('belanja/checkout') ?>"><i class="fa fa-shopping-cart"></i> Checkout</a> -->
		</p>
		
	</div>
</div>
</div>
</div>

</div>
</div>
