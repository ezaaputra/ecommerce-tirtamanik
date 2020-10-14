<!-- breadcrumb -->
<br><br><br>
<div class="container">
<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
<a href="<?php echo base_url() ?>" class="stext-109 cl8 hov-cl1 trans-04">
Beranda
<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
</a>

<span class="stext-109 cl4">
Keranjang
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
<div class="wrap-table-shopping-cart">
	<table class="table-shopping-cart">
		<tr class="table_head">
			<th></th>
			<th class="column-1" colspan="2">Produk</th>
			<!-- <th class="column-2"></th> -->
			<th class="column-3">Harga</th>
			<th class="column-4 text-center">Kuantitas</th>
			<th class="column-5">Subtotal</th>
			<th class="column-6"></th>
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

		<tr class="table_row">
			<td><a href="<?php echo base_url('belanja/hapus/'.$keranjang['rowid']) ?>" class="flex-c-m size-50 bg8 bor13 hov-btn3 p-all-10 trans-04 m-lr-20 cl8"><i class="fa fa-trash"></i></a></td>
			<td class="">
				<a href="<?php echo base_url('produk/detail/'.$produk->slug_produk) ?>">
				<div class="m-r-20">
					<img height="60" src="<?php echo base_url('assets/upload/image/thumbs/'.$produk->gambar) ?>" alt="<?php echo $keranjang['name'] ?>">
				</div>
				</a>
			</td>
			<td class="column-2">
				<a href="<?php echo base_url('produk/detail/'.$produk->slug_produk) ?>">
				<b><?php echo $keranjang['name'] ?></b>
				</a>		
			</td>
			<td class="column-3">Rp <?php echo number_format($keranjang['price'],'0',',','.') ?></td>
			<td class="column-4">
				<div class="wrap-num-product flex-w m-l-auto m-r-0">
					<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
						<i class="fs-16 zmdi zmdi-minus"></i>
					</div>

					<input class="mtext-104 cl3 txt-center num-product" type="number" name="qty" value="<?php echo $keranjang['qty'] ?>" max="<?php echo $produk->stok?>">

					<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
						<i class="fs-16 zmdi zmdi-plus"></i>
					</div>
				</div>
			</td>
			<td class="column-5">Rp <?php echo number_format($keranjang['subtotal'],0,',','.') ?></td>
			<td class="column-6">
				<button type="submit" name="update" class="flex-c-m size-50 bg8 bor13 hov-btn3 p-all-10 trans-04 m-r-30">
					<i class="fa fa-check"></i> Update
				</button>
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
</div>

<!-- 
<div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
	 
	<div class="flex-w flex-m m-r-20 m-tb-5">
		<input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">
			
		<div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
			Apply coupon
		</div>
	</div>
	

	<button type="submit" name="update" class="flex-c-m stext-101 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
		Update Cart
	</button>
</div>
-->

</div>
</div>

<div class="col-sm-10 col-lg-7 col-xl-4 m-lr-auto m-b-50">
<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
<h4 class="mtext-109 cl2 p-b-30">
	Total Belanja
</h4>

<!-- 
<div class="flex-w flex-t bor12 p-t-15 p-b-30">
	<div class="size-208 w-full-ssm">
		<span class="stext-110 cl2">
			Shipping:
		</span>
	</div>

	<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
		<p class="stext-111 cl6 p-t-2">
			There are no shipping methods available. Please double check your address, or contact us if you need any help.
		</p>
		
		<div class="p-t-15">
			<span class="stext-112 cl8">
				Calculate Shipping
			</span>

			<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
				<select class="js-select2" name="time">
					<option>Select a country...</option>
					<option>USA</option>
					<option>UK</option>
				</select>
				<div class="dropDownSelect2"></div>
			</div>

			<div class="bor8 bg0 m-b-12">
				<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="State /  country">
			</div>

			<div class="bor8 bg0 m-b-22">
				<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Postcode / Zip">
			</div>
			
			<div class="flex-w">
				<div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
					Update Totals
				</div>
			</div>
				
		</div>
	</div>
</div>
 -->

<div class="flex-w flex-t p-t-27 p-b-33">
	<div class="size-208">
		<span class="mtext-101 cl2">
			Total:
		</span>
	</div>

	<div class="size-209 p-t-1">
		<span class="mtext-110 cl2">
			<?php echo $total_belanja ?>
		</span>
	</div>
</div>

<?php if ($keranjang){ ?>
<a href="<?php echo base_url('belanja/checkout') ?>" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
	Checkout
</a>
<?php } else { ?>
<a href="<?php echo base_url('kategori') ?>" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
	Belanja Sekarang
</a>
<?php } ?>
</div>
</div>
</div>
</div>
</div>