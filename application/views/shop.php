

<!DOCTYPE html>
<html lang="zxx">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="Male_Fashion Template">
	<meta name="keywords" content="Male_Fashion, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Shop</title>
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
						<h4>Shop</h4>
						<div class="breadcrumb__links">
							<a href="<?= base_url('home')?>">Home</a>
							<span>Shop</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Breadcrumb Section End -->

	<!-- Shop Section Begin -->
	<section class="shop spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="shop__sidebar">
						<div class="shop__sidebar__search">
							<form action="#">
								<input type="text" placeholder="Search...">
								<button type="submit"><span class="icon_search"></span></button>
							</form>
						</div>
						<div class="shop__sidebar__accordion">
							<div class="accordion" id="accordionExample">
								<div class="card">
									<div class="card-heading">
										<a data-toggle="collapse" data-target="#collapseOne">Categories</a>
									</div>
									<div id="collapseOne" class="collapse show" data-parent="#accordionExample">
										<div class="card-body">
											<div class="shop__sidebar__categories">
												<ul class="nice-scroll">
													<?php foreach ($kategori as $ktr) { ?>
													<li><a
															href="<?= base_url('front/shop/filter_by_category/' . $ktr['nama_kategori']) ?>"><?= $ktr['nama_kategori'] ?>
														</a></li>
													<?php } ?>
												</ul>
											</div>
										</div>
									</div>
								</div>
								<!-- Removed Branding -->
								<!-- Removed Filter Price -->
								<!-- Removed Size -->
								<!-- Removed Colors -->
								<!-- Removed Tags -->
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-9">
					<div class="shop__product__option">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6">
								<div class="shop__product__option__left">
								<p>Showing <?= count($product) ?></p>
								</div>
							</div>
							
						</div>
					</div>
					<div class="row">
						<?php foreach($product as $p) { ?>
						<div class="col-lg-4 col-md-6 col-sm-6">
							<div class="product__item">
								<div class="product__item__pic set-bg" data-setbg="<?= base_url() ?>/upload/konten/<?= $p->picture ?>">
									<ul class="product__hover">
										<li><a href="<?= base_url('front/shopdetails/index/'.$p->product_id) ?>"><img
													src="<?= base_url('userr/') ?>img/icon/search.png" alt=""> <span>Details</span></a></li>
									</ul>

								</div>
								<div class="product__item__text">

									<h6><?= $p->nama ?></h6>
									<a href="<?= base_url('front/shopdetails/index/'.$p->product_id) ?>" class="add-cart">Lihat Detail</a>
									
									<h5>Rp<?= number_format($p->harga, 0, ',', '.') ?></h5>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
					<!-- Removed Pagination -->
				</div>
			</div>

		</div>
	</section>
	<?php require_once('layout2/footer.php');?>
	<?php require_once('layout2/js.php');?>

</body>

</html>
