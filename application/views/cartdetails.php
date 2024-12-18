	<!DOCTYPE html>
	<html lang="zxx">

	<head>
		<meta charset="UTF-8">
		<meta name="description" content="Male_Fashion Template">
		<meta name="keywords" content="Male_Fashion, unica, creative, html">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Shopping Cart</title>
		<?php require_once('layout2/css.php');?>
	</head>

	<body>
		<?php require_once('layout2/navbar.php');?>
		<!-- Breadcrumb Section Begin -->
		<section class="breadcrumb-option">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="breadcrumb__text">
							<h4>Shopping Cart</h4>
							<div class="breadcrumb__links">
								<a href="	<?= base_url('home');?>">Home</a>
								<a href="<?= base_url('front/shop');?>">Shop</a>
								<span>Shopping Cart</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Breadcrumb Section End -->
		<!-- Shopping Cart Section Begin -->
		<section class="shopping-cart spad">
			<div class="container">
				<div class="row">
					<div class="col-lg-8">
						<div class="shopping__cart__table">
							<table>
								<thead>
									<tr>
										<th>Product</th>
										<th>Quantity</th>
										<th>Total</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($keranjang as $k) { ?>
									<tr>
										<td class="product__cart__item">
											<div class="product__cart__item__pic">
												<img src="<?= base_url() ?>/upload/konten/<?= $k['picture'] ?>" width="90px" alt="">
											</div>
											<div class="product__cart__item__text">
												<h6><?= $k['nama']?></h6>
												<h5>Rp<?= number_format($k['harga'], 0, ',', '.') ?></h5>
											</div>
										</td>
										<td class="quantity__item">
											<div class="quantity">
												<div class="pro-qty-2">
													<input type="text" value="<?= $k['qty']?>">

												</div>
											</div>
										</td>
										<td class="cart__price">Rp<?= number_format($k['sub_total'], 0, ',', '.') ?></td>
										<td class="cart__close">
											<a href="<?= base_url('front/Cart_details/delete_cart_item/' . $k['keranjang_id']); ?>"
												class="text-danger">
												<i class="fa fa-close"></i>
											</a>
										</td>

									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6">
								<div class="continue__btn">
									<a href="<?= base_url('front/shop')?>">Continue Shopping</a>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6">
								<!-- <div class="continue__btn update__btn">
									<a href="#"><i class="fa fa-spinner"></i> Update cart</a>
								</div> -->
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="cart__discount">
							<div class="continue__btn" >
									<a href="#">Lihat Pesanan Anda</a>
								</div>
							</form>
						</div>
						<div class="cart__total">
							<h6>Cart Total</h6>
							<ul>
								<li>Total <span>Rp<?= number_format($cart_total, 0, ',', '.') ?></span></li>
							</ul>
							<a href="<?= site_url('front/Checkout') ?>" class="primary-btn">Proceed to Checkout</a>

						</div>


					</div>
				</div>

			</div>

		</section>
		<!-- Shopping Cart Section End -->

		<?php require_once('layout2/footer.php');?>
		<?php require_once('layout2/js.php');?>

	</body>

	</html>
