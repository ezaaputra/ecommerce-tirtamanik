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

<a href="<?php echo base_url('dasbor/belanja') ?>" class="stext-109 cl8 hov-cl1 trans-04">
Riwayat Belanja
<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
</a>

<span class="stext-109 cl4">
Konfirmasi
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
	
<?php 
// Kalau ada transaksi tampilkan tabel
if ($header_transaksi) { ?>

	<table class="table table-bordered">
		<thead>
			<tr>
				<th width="20%">Kode Transaksi</th>
				<th>: <?php echo $header_transaksi->kode_transaksi ?></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Tanggal</td>
				<td>: <?php echo date('d-m-Y',strtotime($header_transaksi->tanggal_transaksi)) ?></td>
			</tr>
			<tr>
				<td>Jumlah Total</td>
				<td>: <?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
			</tr>
			<tr>
				<td>Status Bayar</td>
				<td>: <?php echo $header_transaksi->status_bayar ?></td>
			</tr>
			<tr>
				<td>Bukti Bayar</td>
				<td>: <?php if ($header_transaksi->bukti_bayar != "") { ?>
					<img src="<?php echo base_url('assets/upload/image/'.$header_transaksi->bukti_bayar) ?>" class="img img-thumbnail" width="200">				
					<?php }else { echo 'Belum ada bukti bayar'; }?>
				</td>
			</tr>
		</tbody>
	</table>

<?php 
// Error upload
if (isset($error)) {
	echo '<p class="alert alert-warning">'.$error.'</p>';
}

// Notif error
echo validation_errors('<p class="alert alert-warning">','</p>');

// Form open
echo form_open_multipart(base_url('dasbor/konfirmasi/'.$header_transaksi->kode_transaksi));
?>

<table class="table">
	<tbody>
		<tr>
			<td width="30%">Pembayaran ke Rekening</td>
			<td>
				<select name="id_rekening" class="form-control">
					<?php foreach ($rekening as $rekening) { ?>
					<option value="<?php echo $rekening->id_rekening ?>" <?php if ($header_transaksi->id_rekening==$rekening->id_rekening) {echo "selected"; } ?>>
						<?php echo $rekening->nama_bank ?> (No. Rekening : <?php echo $rekening->nomor_rekening ?> a.n <?php echo $rekening->nama_pemilik ?>)
					</option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td>Tanggal Bayar</td>
			<td>
				<input type="text" name="tanggal_bayar" class="form-control" placeholder="dd-mm-yyyy" value="<?php if(isset($_POST['tanggal_bayar'])) { echo set_value('tanggal_bayar'); } elseif ($header_transaksi->tanggal_bayar!="") { echo $header_transaksi->tanggal_bayar; } else { echo date('d-m-Y'); } ?>">
			</td>
		</tr>
		<tr>
			<td>Jumlah Pembayaran</td>
			<td>
				<input type="number" name="jumlah_bayar" class="form-control" placeholder="Jumlah Pembayaran" value="<?php if(isset($_POST['jumlah_bayar'])) { echo set_value('jumlah_bayar'); } elseif($header_transaksi->jumlah_bayar!=""){ echo $header_transaksi->jumlah_bayar; } else{ echo $header_transaksi->jumlah_transaksi; } ?>">
			</td>
		</tr>
		<tr>
			<td>Dari Bank</td>
			<td>
				<input type="text" name="nama_bank" placeholder="Nama Bank" class="form-control" value="<?php echo $header_transaksi->nama_bank ?>">
				<small>contoh: BANK MANDIRI</small>
			</td>
		</tr>
		<tr>
			<td>Dari Nomor Rekening</td>
			<td>
				<input type="text" name="rekening_pembayaran" placeholder="Nomor Rekening" class="form-control" value="<?php echo $header_transaksi->rekening_pembayaran ?>">
				<small>contoh: 543211576</small>
			</td>
		</tr>
		<tr>
			<td>Nama Pemilik Rekening</td>
			<td>
				<input type="text" name="rekening_pelanggan" placeholder="Nama Pemilik Rekening" class="form-control" value="<?php echo $header_transaksi->rekening_pelanggan ?>">
				<small>contoh: Eza Ananda Putra</small>
			</td>
		</tr>
		<tr>
			<td>Upload Bukti Bayar</td>
			<td>
				<input type="file" name="bukti_bayar" placeholder="Upload Bukti Pembayaran" class="form-control">
			</td>
		</tr>
		<?php if($header_transaksi->status_bayar != 'Konfirmasi') { ?>
		<tr>
			<td></td>
			<td>
				<button type="submit" name="submit" class="cl8 size-50 bg8 bor13 hov-btn3 p-all-10 trans-04"><i class="fa fa-upload"></i> Submit</button>
				<button type="reset" name="reset" class="btn btn-default"><i class="fa fa-times"></i> Reset</button>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>

<?php 
// Form close
echo form_close();

// Kalau ga ada tampilkan notif
}else{ ?>
	<p class="alert alert-success"><i class="fa fa-warning"></i> Belum ada data transaksi</p>

<?php } ?>

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