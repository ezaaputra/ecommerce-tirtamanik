<!-- breadcrumb -->
<br><br><br>
<div class="container">
<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
<a href="<?php echo base_url() ?>" class="stext-109 cl8 hov-cl1 trans-04">
Beranda
<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
</a>

<a href="<?php echo base_url('dasbor') ?>" class="stext-109 cl8 hov-cl1 trans-04">
Dashboard Pelanggan
<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
</a>

<span class="stext-109 cl4">
Profil
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
<div class="col-lg-10 col-xl-8 m-lr-auto m-b-50">
<div class="m-l-21 m-r--38 m-lr-0-xl">
	<?php if ($this->session->flashdata('sukses')) {
	echo '<div class="alert alert-warning">';
	echo $this->session->flashdata('sukses');
	echo '</div>';
	} ?>
		
	<?php 
	// Display error
	echo validation_errors('<div class="alert alert-danger">','</div>');

	// Form open
	echo form_open(base_url('dasbor/profil'), 'class="leave-comment"'); ?>

	<table class="table">
		<thead>
			
		</thead>
		<tbody>
			<tr>
				<th>Nama</th>
				<th><input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama lengkap" value="<?php echo $pelanggan->nama_pelanggan ?>" required title="Hanya Boleh Huruf dan Spasi" pattern="[A-Za-z\s]+"></th>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $pelanggan->email ?>" readonly></td>
			</tr>
			<tr>
				<td>Password</td>
				<td><input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>">
				<small class="text-danger">Ketik minimal 6 karakter untuk mengganti password</small>
				</td>
			</tr>
			<tr>
				<td>Telepon</td>
				<td><input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo $pelanggan->telepon ?>" required title="Nomor Tidak Valid" pattern="[0-9]{11,14}">
				<small class="text-danger">Harus diawali dengan 62 dan tanpa menggunakan spasi</small>
				</td>
			</tr>
			<tr>
				<td>Alamat</td>
				<td>
					<textarea name="alamat" class="form-control" placeholder="Alamat"><?php echo $pelanggan->alamat ?></textarea>
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<button class="cl8 size-50 bg8 bor13 hov-btn3 p-all-10 trans-04" type="submit">
						<i class="fa fa-save"></i> Update Profil
					</button>
					<button class="btn btn-default btn-md" type="reset">
						<i class="fa fa-times"></i> Reset
					</button>
				</td>
			</tr>
		</tbody>
	</table>

	<?php echo form_close(); ?>

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