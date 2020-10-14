<table class="table table-bordered" id="example1">
	<thead>
		<tr>
			<th>No</th>
			<th width="25%">Nama Pelanggan</th>
			<th>Kode</th>
			<th>Tanggal</th>
			<th>Jml Total</th>
			<th>Jml Item</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $i=1; foreach ($header_transaksi as $header_transaksi) { ?>
		<tr>
			<td><?php echo $i ?></td>
			<td>
				<?php echo $header_transaksi->nama_pelanggan ?>
				<br><small>
					Telepon: <?php echo $header_transaksi->telepon ?>
					<br>Email: <?php echo $header_transaksi->email ?>
					<br>Alamat Kirim: 
					<br><?php echo nl2br($header_transaksi->alamat) ?>
				</small>
			</td>
			<td>
				<a href="<?php echo base_url('admin/transaksi/detail/'.$header_transaksi->kode_transaksi) ?>">
					<?php echo $header_transaksi->kode_transaksi ?>	
				</a>	
			</td>
			<td><?php echo date('d-m-Y',strtotime($header_transaksi->tanggal_transaksi)) ?></td>
			<td><?php echo number_format($header_transaksi->jumlah_transaksi) ?></td>
			<td><?php echo $header_transaksi->total_item ?></td>
			<td><?php echo $header_transaksi->status_bayar ?></td>
			<td class="text-center">
				<a href="https://api.whatsapp.com/send?phone=<?php echo $header_transaksi->telepon ?>&text=Maaf,%20bukti%20transaksi%20anda%20TIDAK%20VALID%0AKODE%20TRANSAKSI:%20<?php echo $header_transaksi->kode_transaksi?>%0A%0ASegera%20lakukan%20pengiriman%20ulang%20bukti%20transaksi.%0A<?php echo base_url('dasbor/belanja')?>" target="blank" class="btn btn-warning btn-sm"><i class="fa fa-phone"></i> Hubungi</a>
				<a href="<?php echo base_url('admin/transaksi/delete_belum/'.$header_transaksi->id_header_transaksi) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus Riwayat Transaksi?')"><i class="fa fa-times" ></i> Hapus</a>
			</td>
		</tr>
		<?php $i++; } ?>
	</tbody>
</table>