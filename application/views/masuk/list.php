<!-- breadcrumb -->
<br><br><br>
<div class="container">
<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
<a href="<?php echo base_url() ?>" class="stext-109 cl8 hov-cl1 trans-04">
Beranda
<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
</a>

<span class="stext-109 cl4">
Login
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
<div class="m-l-25 m-r--38 m-lr-0-xl">
	<div class="col-md-12">
		<?php if ($this->session->flashdata('sukses')) {
		echo '<div class="alert alert-warning">';
		echo $this->session->flashdata('sukses');
		echo '</div>';
		} ?>

		<p class="alert alert-success">Belum punya akun? 
			<a href="<?php echo base_url('registrasi') ?>">Registrasi</a>
		</p>

		<?php 
		// Display error
		echo validation_errors('<div class="alert alert-danger">','</div>');

		// Display notifikasi error login
		if ($this->session->flashdata('warning')){
			echo '<div class="alert alert-warning">';
			echo $this->session->flashdata('warning');
			echo '</div>';
		}

		// Form open
		echo form_open(base_url('masuk'), 'class="leave-comment"'); ?>

		<table class="table">
			<thead>
				
			</thead>
			<tbody>
				<tr>
					<td width="20%">Email (Username)</td>
					<td><input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo set_value('email') ?>" required></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password') ?>" required></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<button class="cl8 size-50 bg8 bor13 hov-btn3 p-all-10 trans-04" type="submit">
							<i class="fa fa-save"></i> Login
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
</div>
</div>

</div>
</div>
