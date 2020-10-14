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
Invoice #<?php echo $header_transaksi->kode_transaksi ?>
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
	<?php if ($header_transaksi->status_bayar == 'Konfirmasi'){ ?>
		<h3 class="ltext-103 cl5">
			<?php echo $title ?> #<?php echo $header_transaksi->kode_transaksi ?> <span style="background-color: #5cb85c; font-size: 10pt;" class="stext-101 cl0 size-101 bor1 p-lr-15">PAID</span>
		</h3>
	<?php } elseif ($header_transaksi->status_bayar == 'Menunggu Konfirmasi') { ?>
		<h3 class="ltext-103 cl5">
			<?php echo $title ?> #<?php echo $header_transaksi->kode_transaksi ?> <span style="background-color: #f0ad4e; font-size: 10pt;" class="stext-101 cl0 size-101 bor1 p-lr-15">PROCESS</span>
		</h3>
	<?php } elseif ($header_transaksi->status_bayar == 'Belum') { ?>
		<h3 class="ltext-103 cl5">
			<?php echo $title ?> #<?php echo $header_transaksi->kode_transaksi ?> <span style="background-color: #d9534f; font-size: 10pt;" class="stext-101 cl0 size-101 bor1 p-lr-15">UNPAID</span>
		</h3>
	<?php } ?>
</div>
<div class="row">
<div class="col-lg-10 col-xl-8 m-lr-auto m-b-50">
<div class="m-l-21 m-r--38 m-lr-0-xl">
	
<?php 
// Kalau ada transaksi tampilkan tabel
if ($header_transaksi) { ?>

	<table class="table table-bordered stext-107">
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
				<td>: Rp <?php echo number_format($header_transaksi->jumlah_transaksi,0,',','.') ?>,-</td>
			</tr>
			<tr>
				<td>Status Bayar</td>
				<td>: <?php echo $header_transaksi->status_bayar ?></td>
			</tr>
		</tbody>
	</table>

	<table class="table stext-107">
		<thead>
			<tr>
				<th>No</th>
				<th>Kode</th>
				<th>Nama Produk</th>
				<th>Jumlah</th>
				<th>Sub Total</th>
			</tr>
		</thead>
		<tbody>
			<?php $i=1; foreach ($transaksi as $transaksi) { ?>
			<tr>
				<td><?php echo $i ?></td>
				<td><?php echo $transaksi->kode_produk ?></td>
				<td><?php echo $transaksi->nama_produk ?></td>
				<td><?php echo number_format($transaksi->jumlah) ?></td>
				<td>Rp <?php echo number_format($transaksi->total_harga,0,',','.') ?>,-</td>
			</tr>
			<?php $i++; } ?>
		</tbody>
	</table>

<?php 
// Kalau ga ada tampilkan notif
}else{ ?>
	<p class="alert alert-success"><i class="fa fa-warning"></i> Belum ada data transaksi</p>

<?php } ?>

</div>
</div>

<!-- MENU -->
<div class="col-sm-10 col-lg-7 col-xl-4 m-lr-auto m-b-50">

<?php if ($header_transaksi->status_bayar == "Belum"): ?>
	
<!-- MENU KONFIRMASI -->
<div style="background-color: #717fe0" class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm m-b-20">
<span class="stext-107 cl0">Total :</span>
<h4 class="mtext-109 cl0">
	Rp <?php echo number_format($header_transaksi->jumlah_transaksi,0,',','.') ?>,-
</h4>

<!-- METODE BAYAR -->
<div class="flex-w flex-t p-t-27">
	<p class="stext-108 cl0">
		Metode Pembayaran :
	</p>		

	<select id="dropDown" class="form-control">
	    <option value="">Choose...</option>
	    <?php foreach ($rekening as $rekening2): ?>
	    <option value="div<?php echo $rekening2->id_rekening ?>"><?php echo $rekening2->nama_bank ?> </option>
	    <?php endforeach; unset($rekening2);?>
	</select>

	<?php foreach ($rekening as $rekening2): ?>
	<div id="div<?php echo $rekening2->id_rekening ?>" class="drop-down-show-hide">
		<p class="stext-102 cl0">
			Silahkan transfer ke: <br> 
			<span class="stext-110 cl0"><?php echo $rekening2->nama_bank ?> A.n. <?php echo $rekening2->nama_pemilik ?> No. Rek. <?php echo $rekening2->nomor_rekening ?></span> <br><br>
			*Pastikan Anda sudah mentransfer uang sebelum mengeksekusi tombol. <br><br>
			Mohon tuliskan berita: <br> 
			<span class="stext-110 cl0">INVOICE-<?php echo $header_transaksi->kode_transaksi ?></span><br> 
			Pada kolom berita transfer.
		</p><br>
		<a href="<?php echo base_url('dasbor/konfirmasi/'.$header_transaksi->kode_transaksi) ?>" class="flex-c-m stext-101 cl0 size-116 bg5 bor14 hov-btn2 p-lr-15 trans-04 pointer">
			Konfirmasi
		</a>
	</div>
	<?php endforeach ?>

	<!-- JQUERY TAMPIL SAAT KLIK DROPDOWN -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
 	<script>
 		$('.drop-down-show-hide').hide();

		$('#dropDown').change(function () {
		    $('.drop-down-show-hide').hide()    
		    $('#' + this.value).show();

		});
 	</script>

</div>
<!-- END METODE BAYAR -->
</div>
<!-- END MENU KONFIRMASI -->
<?php endif ?>

<!-- MENU CETAK -->
<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
<h4 class="mtext-109 cl2">
	Menu Invoice
</h4><br>
<a href="<?php echo base_url('admin/transaksi/cetak/'.$header_transaksi->kode_transaksi) ?>" target="_blank" class=""><i class="fa fa-file-pdf-o"></i> Cetak Invoice</a>
</div>
<!-- END MENU CETAK -->

</div>
<!-- END MENU -->

</div>
</div>
</div>