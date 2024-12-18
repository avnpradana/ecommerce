
<!DOCTYPE html>
<html lang="zxx">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="Male_Fashion Template">
	<meta name="keywords" content="Male_Fashion, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Casual Shop</title>
	<?php require_once('layout2/css.php'); ?>
</head>

<body>
	<?php require_once('layout2/navbar.php'); ?>

	<!-- Hero Section Begin -->
	<section class="hero">
		<div class="hero__slider owl-carousel">
			<?php foreach ($caraousel as $item) { ?>
			<div class="hero__items set-bg" data-setbg="<?= base_url('upload/caraousel/') . $item['foto'] ?>">
				<div class="container">
					<div class="row">
						<div class="col-xl-5 col-lg-7 col-md-8">
							<div class="hero__text">
								<h6><?= $item['subjudul'] ?></h6>
								<h2><?= $item['judul'] ?></h2>
								<p><?= $item['deskripsi'] ?></p>
								<a href="<?= base_url('front/shop') ?>" class="primary-btn">Shop now <span class="arrow_right"></span></a>
								<!-- <div class="hero__social">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-pinterest"></i></a>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</section>
	<!-- Hero Section End -->

	<section class="banner spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 offset-lg-4">
                    <div class="banner__item">
                        <div class="banner__item__pic">
                            <img src="<?= base_url('userr/')?>img/banner/tracktop2.jpg" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>Clothing TrackTops 2024 </h2>
                            <a href="<?= base_url('front/shop') ?>">Shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="banner__item banner__item--middle">
                        <div class="banner__item__pic">
                            <img src="<?= base_url('userr/')?>img/banner/aa.jpg" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>Jacket</h2>
                            <a href="<?= base_url('front/shop') ?>">Shop now</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="banner__item banner__item--last">
                        <div class="banner__item__pic">
                            <img src="<?= base_url('userr/')?>img/banner/alvinn.jpg" alt="">
                        </div>
                        <div class="banner__item__text">
                            <h2>Shoes Casual 2024</h2>
                            <a href="<?= base_url('front/shop') ?>">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

	<!-- Product Section Begin -->
	<section class="product spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<ul class="filter__controls">
						<li class="active mixitup-control-active" data-filter="*"> 	Semua</li>
					<?php foreach ($kategori as $ktr) { ?>

						<li class="active mixitup-control-active" data-filter=".<?= $ktr['nama_kategori'] ?>"> 	<?= $ktr['nama_kategori'] ?></li>
						
						<?php } ?>
					</ul>
				</div>
				

			</div>
			<br>
			<!-- Produk -->
			<div class="row product__filter">
				<?php if (!empty($product)) { ?>
				<?php foreach ($product as $prd) { ?>
				<div class="col-lg-3 col-md-6 col-sm-6 mix <?= $prd->kategori ?>">

					<div class="product__item">

						<div class="product__item__pic set-bg" data-setbg="<?= base_url() ?>/upload/konten/<?= $prd->picture ?>">
							<ul class="product__hover">
								<li><a href="<?= base_url('front/shopdetails/index/'.$prd->product_id) ?>"><img
											src="<?= base_url('userr/') ?>img/icon/search.png" alt=""> <span>Details</span></a></li>
							</ul>
						</div>

						<div class="product__item__text">
							<h6><?= $prd->nama ?></h6>
							<!-- <span>Stok: <?= $prd->stock ?></span>
							<p><?= substr($prd->deskripsi, 0, 50) ?>...</p> -->
							<h5>Rp<?= number_format($prd->harga, 0, ',', '.') ?></h5>
							<!-- <a href="#" class="add-cart">+ Add To Cart</a> -->
						</div>
					</div>
				</div>
				<?php } ?>
				<?php } else { ?>
				<p>No products found in this category.</p>
				<?php } ?>
			</div>

		</div>
	</section>
	<!-- Product Section End -->

	<?php require_once('layout2/footer.php'); ?>
	<?php require_once('layout2/js.php'); ?>

</body>

</html>
