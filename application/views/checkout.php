<!DOCTYPE html>
<html lang="zxx">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="Checkout Template">
	<meta name="keywords" content="Checkout, ecommerce, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Shopping Cart</title>
	<?php require_once('layout2/css.php'); ?>
</head>

<body>
	<?php require_once('layout2/navbar.php'); ?>
	<!-- Breadcrumb Section Begin -->
	<section class="breadcrumb-option">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcrumb__text">
						<h4>Check Out</h4>
						<div class="breadcrumb__links">
							<a href="<?= base_url() ?>">Home</a>
							<a href="<?= base_url('shop') ?>">Shop</a>
							<span>Check Out</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Breadcrumb Section End -->

	<!-- Checkout Section Begin -->
	<section class="checkout spad">
		<div class="container">
			<div class="checkout__form">
				<form action="<?= base_url('front/checkout/process_checkout') ?>" method="POST">
					<div class="row">
						<?php foreach ($user as $user) { ?>
						<div class="col-lg-8 col-md-6">
							<h6 class="checkout__title">Billing Details</h6>
							<div class="row">
								<div class="col-lg-12">
									<div class="checkout__input">
										<p>Nama<span>*</span></p>
										<input type="text" name="nama" value="<?= $user['nama'] ?>" required>
									</div>
								</div>

							</div>
							<div class="checkout__input">
								<p>Alamat<span>*</span></p>
								<input type="text" name="alamat" value="<?= $user['alamat'] ?>" required>
							</div>
							<div class="checkout__input">
								<p>Kota<span>*</span></p>
								<input type="text" name="kota" value="<?= $user['kota'] ?>" required>
							</div>
							<div class="checkout__input">
								<p>Provinsi<span>*</span></p>
								<input type="text" name="provinsi" value="<?= $user['provinsi'] ?>" required>
							</div>
							<div class="checkout__input">
								<p>Kode Pos<span>*</span></p>
								<input type="text" name="kode_pos" value="<?= $user['kode_pos'] ?>" required>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="checkout__input">
										<p>Phone<span>*</span></p>
										<input type="text" name="nohp" value="<?= $user['nohp'] ?>" required>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="checkout__input">
										<p>Email<span>*</span></p>
										<input type="email" name="email" value="<?= $user['email'] ?>" required>
									</div>
								</div>
							</div>

							<!-- <div class="checkout__input">
								<p>Bukti Pembayaran</p>
								<p>Jika Payment menggunakan Dana, kirim ke 085868338497</p>
								<input type="file" name="bukti_pembayaran" class="form-control">
							</div> -->

							<button type="submit" class="site-btn">Simpan</button>
							<?php } ?>

						</div>


						<div class="col-lg-4 col-md-6">
							<div class="checkout__order">
								<h4 class="order__title">Your Order</h4>
								<div class="checkout__order__products">Product <span>Total</span></div>
								<ul class="checkout__total__products">
									<?php if (!empty($keranjang)) { ?>
									<?php foreach ($keranjang as $item) { ?>
									<li><?= $item['nama'] ?> x<?= $item['qty'] ?>
										<span>Rp<?= number_format($item['harga'] * $item['qty'], 0, ',', '.') ?></span></li>
									<?php } ?>
									<?php } else { ?>
									<li>No items in the cart.</li>
									<?php } ?>
								</ul>
								<ul class="checkout__total__all">
									<li>Total <span>Rp<?= number_format($cart_total, 0, ',', '.') ?></span></li>
								</ul>

			
								<div class="form-group">
									<form action="front/Checkout/simpan" method="post" enctype="multipart/form-data">
										<label for="metode_pembayaran">Pilih Metode Pembayaran:</label>
										<select name="payment" id="payment" class="form-control" required>
											<option value="" disabled selected>Pilih metode</option>
											<option value="Cash on Delivery (COD)">Cash on Delivery (COD)</option>
											<option value="Dana">Dana</option>
										</select>
								</div>
								<br>
								<br>
								<button type="submit" class="site-btn">PLACE ORDER</button>
				</form>
			</div>
		</div>


		</div>
		</form>
		</div>
		</div>
	</section>
	<!-- Checkout Section End -->

	<?php require_once('layout2/footer.php'); ?>
	<?php require_once('layout2/js.php'); ?>

</body>

</html>
