<br><br><br><br>
<!-- Title page -->
<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('<?php echo base_url('assets/template/images/bg-00.jpg') ?> ');">
	<h2 class="ltext-105 cl0 txt-center">
		Kontak
	</h2>
</section>	


<!-- Content page -->
<section class="bg0 p-t-104 p-b-116">
	<div class="container">
		<div class="flex-w flex-tr">
			<div class="size-210 bor10 flex-w flex-col-m w-full-md">
				<!-- <form>
					<h4 class="mtext-105 cl2 txt-center p-b-30">
						Send Us A Message
					</h4>

					<div class="bor8 m-b-20 how-pos4-parent">
						<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Your Email Address">
						<img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
					</div>

					<div class="bor8 m-b-30">
						<textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg" placeholder="How Can We Help?"></textarea>
					</div>

					<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
						Submit
					</button>
				</form> -->

				<style type="text/css" media="screen">
			        iframe{
			            width :  100%;
			            height: auto;
			            min-height: 400px;
			        }
			    </style>
			    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2030860.6430283608!2d106.8153426!3d-6.194284499999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f69e53db9b0b%3A0xa4e82479a020367e!2sBatik%20Tirtamanik!5e0!3m2!1sid!2sid!4v1597601151102!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
			</div>

			<div class="size-210 bor10 flex-w flex-col-m p-tb-15 p-lr-70 p-lr-15-lg w-full-md">
				<div class="flex-w w-full p-b-42">
					<span class="fs-18 cl5 txt-center size-211">
						<span class="lnr lnr-map-marker"></span>
					</span>

					<div class="size-212 p-t-2">
						<span class="mtext-110 cl2">
							Alamat
						</span>

						<p class="stext-115 cl6 size-213 p-t-18">
							<?php echo $site->alamat ?>
						</p>
					</div>
				</div>

				<div class="flex-w w-full p-b-42">
					<span class="fs-18 cl5 txt-center size-211">
						<span class="lnr lnr-phone-handset"></span>
					</span>

					<div class="size-212 p-t-2">
						<span class="mtext-110 cl2">
							Telepon
						</span>

						<p class="stext-115 cl1 size-213 p-t-18">
							+<?php echo $site->telepon ?>
						</p>
					</div>
				</div>

				<div class="flex-w w-full">
					<span class="fs-18 cl5 txt-center size-211">
						<span class="lnr lnr-envelope"></span>
					</span>

					<div class="size-212 p-t-2">
						<span class="mtext-110 cl2">
							E-mail
						</span>

						<p class="stext-115 cl1 size-213 p-t-18">
							<?php echo $site->email ?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>	