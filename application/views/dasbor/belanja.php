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
Riwayat Belanja
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
		echo '<div class = "alert alert-warning">';
		echo $this->session->flashdata('sukses');
		echo '</div>';
	} ?>
<!-- <p>Berikut adalah riwayat belanja Anda</p> -->

<?php 
// Kalau ada transaksi tampilkan tabel
if ($header_transaksi) { ?>

	<table class="table stext-107">
		<thead>
			<tr>
				<th>No</th>
				<th>Kode</th>
				<th>Tgl</th>
				<th>Total</th>
				<th>Status</th>
				<!-- <th>Action</th> -->
			</tr>
		</thead>
		<tbody>
			<?php $i=1; foreach ($header_transaksi as $header_transaksi) { ?>
			<tr>
				<td><?php echo $i ?></td>
				<td>
					<a href="<?php echo base_url('dasbor/detail/'.$header_transaksi->kode_transaksi) ?>">
						<?php echo $header_transaksi->kode_transaksi ?>	
					</a>	
				</td>
				<td><?php echo date('d-m-Y',strtotime($header_transaksi->tanggal_transaksi)) ?></td>
				<td>Rp <?php echo number_format($header_transaksi->jumlah_transaksi,0,',','.') ?>,-</td>
				<td>
					<?php if ($header_transaksi->status_bayar == 'Konfirmasi'){ ?>
						<span style="background-color: #5cb85c; font-size: 7pt;" class="bor1 p-lr-6"></span>
						<span class="cl2 bor1 p-lr-10">PAID</span>
					<?php } elseif ($header_transaksi->status_bayar == 'Menunggu Konfirmasi') { ?>
						<span style="background-color: #f0ad4e; font-size: 7pt;" class="bor1 p-lr-6"></span>
						<span class="cl2 bor1 p-lr-10">PROCESS</span>
					<?php } elseif ($header_transaksi->status_bayar == 'Belum') { ?>
						<span style="background-color: #d9534f; font-size: 7pt;" class="bor1 p-lr-6"></span>
						<span class="cl2 bor1 p-lr-10">UNPAID</span>
					<?php } ?>	
				</td>
				<!-- <td>
					<a href="<?php echo base_url('dasbor/konfirmasi/'.$header_transaksi->kode_transaksi) ?>" class="cl8 size-50 bg8 bor13 hov-btn3 p-all-10 trans-04"><i class="fa fa-upload"></i> Konfirmasi</a>
				</td> -->
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