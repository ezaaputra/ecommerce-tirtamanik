
	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="text-center ltext-103 cl5">
					Terbaru
				</h3>
			</div>

			<br>

			<div class="row isotope-grid">
				<?php foreach ($produk as $produk) { ?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
				<?php 
				// Form untuk memproses belanjaan
				echo form_open(base_url('belanja/add'));
				// Elemen yang dibawa
				echo form_hidden('id', $produk->id_produk);
				echo form_hidden('qty', 1);
				echo form_hidden('price', $produk->harga);
				echo form_hidden('name', $produk->nama_produk);
				// Elemen redirect
				echo form_hidden('redirect_page', str_replace('index.php.', '', current_url()));
				?>
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="<?php echo base_url('assets/upload/image/'.$produk->gambar) ?>" alt="<?php echo $produk->nama_produk ?>">

							<a href="<?php echo base_url('produk/detail/'.$produk->slug_produk) ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
								Lihat Produk
							</a>

						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="<?php echo base_url('produk/detail/'.$produk->slug_produk) ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?php echo $produk->nama_produk ?>
								</a>

								<span class="stext-105 cl3">
									Rp <?php echo number_format($produk->harga,'0',',','.') ?>
								</span>
							</div>

							<!-- <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
								
							</div> -->

							<div class="block2-txt-child2 flex-r p-t-3 m-l--10">
								<?php if ($produk->stok <= "0") { ?>

									<span class="label1" data-label1="habis"></span>

								<?php } else { ?>

									<button type="submit" value="submit">
										<i style="font-size: 20px;" class="cl2 hov-cl1 trans-04 zmdi zmdi-shopping-cart-plus"></i>
									</button>

								<?php } ?>

								<!-- <a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
									<img class="icon-heart1 dis-block trans-04" src="<?php echo base_url() ?>assets/template/images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="<?php echo base_url() ?>assets/template/images/icons/icon-heart-02.png" alt="ICON">
								</a> -->
							</div>
						</div>
					</div>

				<?php echo form_close(); //Form Closed ?>
				</div>
				<?php } ?>

			</div>

			<!-- Load more -->
			<!-- <div class="flex-c-m flex-w w-full p-t-45">
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div> -->
		</div>
	</section>