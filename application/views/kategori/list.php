<br><br><br><br>
<section class="bg0 p-t-23 p-b-140">
	<div class="container">
		<div class="p-b-10">
			<h3 class="ltext-103 cl5">
				<?php echo $title ?>
			</h3>
		</div>
		<br>
		<!-- Banner -->
		<div class="sec-banner bg0 p-b-50">
			<div class="container">
				<div class="row">

					<!-- Tampil 3 Kategori -->
					<?php foreach ($list_kategori as $list_kategori) { ?>
					<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
						<!-- Block1 -->
						<div class="block1 wrap-pic-w">
							<img src="<?php echo base_url('assets/upload/kategori/image/'.$list_kategori->gambar) ?>" alt="<?php echo $list_kategori->nama_kategori ?>">

							<a href="<?php echo base_url('produk/kategori/'.$list_kategori->slug_kategori) ?>" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
								<div class="block1-txt-child1 flex-col-l">
									<span class="block1-name ltext-102 trans-04 p-b-8">
										<?php echo $list_kategori->nama_kategori; ?>
									</span>

									<span class="block1-info stext-102 trans-04">
										<!-- Spring 2020 -->
									</span>
								</div>

								<div class="block1-txt-child2 p-b-4 trans-05">
									<div class="block1-link stext-101 cl0 trans-09">
										Belanja Sekarang
									</div>
								</div>
							</a>
						</div>
					</div>
					<?php } ?>

				</div>
			</div>
		</div>
	</div>
</section>
