<?php 
// Ambil data menu dari konfigurasi
$nav_produk 		= $this->konfigurasi_model->nav_produk();
$nav_produk_mobile	= $this->konfigurasi_model->nav_produk();
$nav_header_belum	= $this->konfigurasi_model->nav_header_belum($this->session->userdata('id_pelanggan'));

?>
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="<?php echo base_url() ?>" class="logo">
						<img src="<?php echo base_url('assets/upload/image/'.$site->logo) ?>" alt="<?php echo $site->namaweb ?> | <?php echo $site->tagline ?>">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">

						    <!-- Menu Home -->
							<li ><!-- class="active-menu" -->
								<a href="<?php echo base_url() ?>">Beranda</a>
							</li>

							<!-- Menu Produk -->
							<li>
								<a href="<?php echo base_url('kategori') ?>">Kategori</a>
								<ul class="sub-menu">
									<?php foreach ($nav_produk as $nav_produk) { ?>
									<li><a href="<?php echo base_url('produk/kategori/'.$nav_produk->slug_kategori) ?>">
										<?php echo $nav_produk->nama_kategori ?></a></li>
									<?php } ?>
								</ul>
							</li>	

							<!-- Menu Kontak -->
							<li ><!-- class="active-menu" -->
								<a href="<?php echo base_url('kontak') ?>">Kontak</a>
							</li>	

							<!-- Menu Hot -->
							<!-- <li class="label1" data-label1="hot">
								<a href="shoping-cart.html">Katalog</a>
							</li> -->

							
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">

						<!-- Jika user sudah login maka muncul nama dan mengarah ke dasbor -->
						<?php if ($this->session->userdata('email')) { ?>
							<!-- Halaman User -->
							<ul class="main-menu p-l-5">
							<li>
								<a style="font-size: 18pt" href="<?php echo base_url('dasbor') ?>"><i class="fa fa-user"></i></a>
								<ul class="sub-menu">
									<li>
										<a href="<?php echo base_url('dasbor') ?>">
											<?php echo $this->session->userdata('nama_pelanggan') ?>
											<small><?php echo $this->session->userdata('email') ?></small>
										</a>
									</li>
									<hr>
									<li>
										<a href="<?php echo base_url('masuk/logout') ?>">
										Logout</a>
									</li>
								</ul>
							</li>
							</ul>

							<!-- Notif Belum Bayar -->
							<a href="<?php echo base_url('dasbor/belanja') ?>" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 <?php if(count($nav_header_belum)>0){echo "icon-header-noti";} ?>" data-notify="<?php echo count($nav_header_belum) ?>">
								<i class="zmdi zmdi-notifications-active"></i>
							</a>

						<!-- Jika Belum login mengarah ke registrasi -->
						<?php } else { ?>
							<a style="font-size: 18pt" class="cl2 hov-cl1 trans-04 p-l-22 p-r-11" href="<?php echo base_url('registrasi') ?>"><i class="fa fa-user-o"></i>
							</a>
						<?php } ?>

						<!-- icon Keranjang -->
						<?php 
						// Check data belanjaan ada atau tidak
						$keranjang	= $this->cart->contents();
						?>

						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="<?php echo count($keranjang) ?>">
							<i class="zmdi zmdi-shopping-cart"></i>
						</div>
						
						<!-- <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div> -->

						<!-- <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
							<i class="zmdi zmdi-favorite-outline"></i>
						</a> -->
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="<?php echo base_url() ?>"><img src="<?php echo base_url('assets/upload/image/'.$site->logo) ?>" alt="<?php echo $site->namaweb ?> | <?php echo $site->tagline ?>"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<!-- <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div> -->

				<!-- Jika user sudah login maka muncul nama dan mengarah ke dasbor -->
				<?php if ($this->session->userdata('email')) { ?>
					<!-- Halaman User -->
					<a class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11" href="<?php echo base_url('dasbor') ?>">
						<i class="fa fa-user"></i>
					</a>

					<!-- Notif Belum Bayar -->
					<a href="<?php echo base_url('dasbor/belanja') ?>" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 <?php if(count($nav_header_belum)>0){echo "icon-header-noti";} ?>" data-notify="<?php echo count($nav_header_belum) ?>">
						<i class="zmdi zmdi-notifications-active"></i>
					</a>

				<!-- Jika Belum login mengarah ke registrasi -->
				<?php } else { ?>
					<a style="font-size: 18pt" class="cl2 hov-cl1 trans-04 p-l-22 p-r-11" href="<?php echo base_url('registrasi') ?>">
						<i class="fa fa-user-o"></i>
					</a>
				<?php } ?>

				<!-- icon Keranjang -->
				<?php 
				// Check data belanjaan ada atau tidak
				$keranjang	= $this->cart->contents();
				?>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-18 p-r-11 icon-header-noti js-show-cart" data-notify="<?php echo count($keranjang) ?>">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

				<!-- <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
					<i class="zmdi zmdi-favorite-outline"></i>
				</a> -->
			</div>

			<!-- Button show menu -->
			<!-- <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div> -->
		</div>


		<!-- Menu Mobile -->
		<!-- <div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar" style="font-weight: bold">
						<?php echo $site->tagline ?>
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<a target="blank" href="<?php echo $site->facebook ?>" class="flex-c-m trans-04 p-lr-25">
							<i class="fa fa-facebook"></i>
						</a>

						<a target="blank" href="<?php echo $site->instagram ?>" class="flex-c-m trans-04 p-lr-25">
							<i class="fa fa-instagram"></i>
						</a>
					</div>
				</li>
			</ul>

			<ul class="main-menu-m"> -->

				<!-- Menu Home -->
				<!-- <li >
					<a href="<?php echo base_url() ?>">Beranda</a>
				</li> -->

				<!-- Menu Produk -->
				<!-- <li>
					<a href="<?php echo base_url('kategori') ?>">Kategori</a>
					<ul class="sub-menu">
						<?php foreach ($nav_produk_mobile as $nav_produk_mobile) { ?>
						<li><a href="<?php echo base_url('produk/kategori/'.$nav_produk_mobile->slug_kategori) ?>">
							<?php echo $nav_produk_mobile->nama_kategori ?></a></li>
						<?php } ?>
					</ul>
				</li> -->

				<!-- Menu Konfirmasi -->
				<!-- <li>
					<a href="<?php echo base_url('dasbor/belanja') ?>">Konfirmasi Pesanan</a>
				</li>	 -->

				<!-- Profil -->
				<!-- <li>
					<a href="<?php echo base_url('dasbor') ?>">Profil</a>
				</li>	
			</ul>
		</div> -->

		<!-- Modal Search -->
		<!-- <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="<?php echo base_url() ?>assets/template/images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div> -->
	</header>

	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Keranjang Anda
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">

					<?php 
					// kalau ga ada data belanjaan
					if (empty($keranjang)) {
					?>

					<li class="header-cart-item flex-w flex-t m-b-12 ">
						<p class="alert alert-success size-116 text-center stext-101">Keranjang Anda Kosong.</p>
					</li>

					<?php $total_belanja	=	'Rp 0'  ?>

					<?php 
					// Kalau ada data belanjaan
					}else{
					// Total Belanjaan
						$total_belanja	=	'Rp '.number_format($this->cart->total(),'0',',','.');

					// Tampilkan data belanja
						foreach ($keranjang as $keranjang) {
							$id_produk	=	$keranjang['id'];
							// Ambil data produk
							$produknya	=	$this->produk_model->detail($id_produk);

					?>

					<li class="header-cart-item flex-w flex-t m-b-12">
						<a href="<?php echo base_url('belanja/hapus/'.$keranjang['rowid']) ?>">
						<div class="header-cart-item-img">
							<img src="<?php echo base_url('assets/upload/image/thumbs/'.$produknya->gambar) ?>" alt="<?php echo $keranjang['name'] ?>">
						</div>
						</a>
						
						<div class="header-cart-item-txt p-t-8">
							<a href="<?php echo base_url('produk/detail/'.$produknya->slug_produk) ?>" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								<?php echo $keranjang['name'] ?>
							</a>

							<span class="header-cart-item-info">
								<?php echo $keranjang['qty'] ?> x Rp <?php echo number_format($keranjang['price'],'0',',','.') ?> 
								<!-- = Rp <?php echo number_format($keranjang['subtotal'],'0',',','.') ?> -->
							</span>
						</div>
					</li>

					<?php 
						} // Tutup foreach keranjang
					} // Tutup if
					?>

				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: <?php echo $total_belanja; ?>
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<?php if ($keranjang){ ?>
						<a href="<?php echo base_url('belanja') ?>" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							Lihat
						</a>

						<a href="<?php echo base_url('belanja/checkout') ?>" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Checkout
						</a>
						<?php }else { ?>

						<a href="<?php echo base_url('kategori') ?>" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Belanja Sekarang
						</a>
						<?php } ?>
						
					</div>
				</div>
			</div>
		</div>
	</div>