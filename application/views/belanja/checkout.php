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
<div class="col-sm-10 col-lg-7 col-xl-6 m-lr-auto m-b-50">
<div class="bor10 p-lr-20 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
	<h4 class="mtext-109 cl2 p-b-30">Pesanan Anda</h4>
	<table class="table">
		<tr class="table_head">
			<th class="column-1"><h5><b>Produk</b></h5></th>
			<th class="column-2 text-right"><h5><b>Subtotal</b></h5></th>
		</tr>

		<?php 
		// kalau ga ada data belanjaan
		if (empty($keranjang)) {
		?>

		<?php $total_belanja	=	'Rp 0'  ?>

		<?php 
		// Kalau ada data belanjaan
		}else{

		// Looping data keranjang
		foreach ($keranjang as $keranjang) {
		// Form Update
		echo form_open(base_url('belanja/update_cart/'.$keranjang['rowid']));
		// Ambil data produk
		$id_produk	= $keranjang['id'];
		$produk 	= $this->produk_model->detail($id_produk);
		// Total Belanjaan
		$total_belanja	=	'Rp '.number_format($this->cart->total(),'0',',','.');
		?>

		<tr class="">
			<td class="column-1">
				<b><?php echo $keranjang['name'] ?></b> x <?php echo $keranjang['qty'] ?>
			</td>
			<td class="column-2 text-right">
				Rp <?php echo number_format($keranjang['subtotal'],0,',','.') ?>
			</td>
		</tr>
		<?php 
		// Form close
		echo form_close();
		// End Looping
		}
		// End else
		} ?>
	</table>

<div class="flex-w flex-t p-b-33 p-lr-10">
	<div class="size-208">
		<span class="mtext-101 cl2">
			<b>Total :</b>
		</span>
	</div>

	<div class="size-209 p-t-1 text-right">
		<span class="mtext-110 cl2">
			<?php echo $total_belanja ?>
		</span>
	</div>
</div>

<?php 
echo form_open(base_url('belanja/checkout')); 
$kode_transaksi = strtoupper(random_string('alnum',6));
?>

<input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan->id_pelanggan ?>">
<input type="hidden" name="jumlah_transaksi" value="<?php echo $this->cart->total() ?>">
<input type="hidden" name="tanggal_transaksi" value="<?php echo date('Y-m-d') ?>">

<table class="table">
	<thead>
		
	</thead>
	<tbody>
		<tr>
			<td>
				<b>Kode Transaksi</b>
				<input type="text" name="kode_transaksi" class="form-control" value="<?php echo $kode_transaksi ?>" readonly required>
			</td>
		</tr>
		<tr>
			<td>
				<b>Nama Penerima</b>
				<input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama lengkap" value="<?php echo $pelanggan->nama_pelanggan ?>" required>
			</td>
		</tr>
		<tr>
			<td>
				<b>Email Penerima</b>
				<input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $pelanggan->email ?>" required>
			</td>
		</tr>
		<tr>
			<td>
				<b>Telepon Penerima</b>
				<input type="text" name="telepon" class="form-control" placeholder="Telepon" value="<?php echo $pelanggan->telepon ?>" required>
			</td>
		</tr>
		<tr>
			<td>
				<b>Alamat Pengiriman</b>
				<textarea name="alamat" class="form-control" placeholder="Alamat"><?php echo $pelanggan->alamat ?></textarea>
			</td>
		</tr>
		<tr>
			<td>
				<button type="sumbit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
					Checkout
				</button>
				<!-- <button class="btn btn-success btn-md" type="submit">
					<i class="fa fa-save"></i> Submit
				</button>
				<button class="btn btn-default btn-md" type="reset">
					<i class="fa fa-times"></i> Reset
				</button> -->
			</td>
		</tr>
	</tbody>
</table>

<?php echo form_close(); ?>

</div>
</div>
</div>

