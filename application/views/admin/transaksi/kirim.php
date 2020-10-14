<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title ?></title>
	<style type="text/css" media="print">
		body{
			font-size: 12px;
			font-family: Arial;

		}
		table{
			border: solid thin #000;
			border-collapse: collapse;
			width: 100%;
			margin-bottom: 1cm;
		}
		td{
			padding: 6px 12px;
			border: solid thin #000;
			text-align: left;
		}
		.bg-success{
			border: solid thin #000;
			background-color: #F5F5F5;
			font-weight: bold;
		}
	</style>
	<style type="text/css" media="screen">
		body{
			font-size: 12px;
			font-family: Arial;

		}
		table{
			border: solid thin #000;
			border-collapse: collapse;
			width: 100%;
			margin-bottom: 1cm;
		}
		td{
			padding: 6px 12px;
			border: solid thin #000;
			text-align: left;
		}
		.bg-success{
			border: solid thin #000;
			background-color: #F5F5F5;
			font-weight: bold;
		}
	</style>
</head>
<body onload="print()">
	<div style="width: 19cm; height: 27cm; padding-top: 0.5cm;">
		<h1 style="border-top: solid thin #EEE; text-align: center; font-size: 18px; font-weight: bold; padding-top: 20px;">PENGIRIMAN</h1>
		<table>
			<tr>
				<td>
					<strong>PENGIRIM:</strong>
					<p>
						<?php echo $site->namaweb ?>
						<br><?php echo $site->alamat ?>
						<br>Telepon: <?php echo $site->telepon ?>
					</p>
				</td>
				<td>
					<strong>PENERIMA:</strong>
					<p>
						<?php echo $header_transaksi->nama_pelanggan ?>
						<br><?php echo $header_transaksi->alamat ?>
						<br>Telepon: <?php echo $header_transaksi->telepon ?>
					</p>
				</td>
			</tr>
		</table>
		<table class="table">
			<thead>
				<tr class="bg-success">
					<th>No</th>
					<th>Kode</th>
					<th>Nama Produk</th>
					<th>Jumlah</th>
				</tr>
			</thead>
			<tbody>
				<?php $i=1; foreach ($transaksi as $transaksi) { ?>
				<tr>
					<td><?php echo $i ?></td>
					<td><?php echo $transaksi->kode_produk ?></td>
					<td><?php echo $transaksi->nama_produk ?></td>
					<td><?php echo number_format($transaksi->jumlah) ?></td>
				</tr>
				<?php $i++; } ?>
			</tbody>
		</table>
	</div>
</body>
</html>