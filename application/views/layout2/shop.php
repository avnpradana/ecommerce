<!DOCTYPE html>
<html lang="zxx">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="Male_Fashion Template">
	<meta name="keywords" content="Male_Fashion, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Male-Fashion | Template</title>
	<?php require_once('../layout2/css.php');?>
</head>

<body>
	<?php require_once('../layout2/navbar.php');?>
	<!-- Breadcrumb Section Begin -->
	<section class="breadcrumb-option">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcrumb__text">
						<h4>Shop</h4>
						<div class="breadcrumb__links">
							<a href="./index.html">Home</a>
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
													<?php
													var_dump($this->uri->segment(2));
														$current_category = $this->uri->segment(4);
													?>
													<li <?php $all = $this->uri->segment(2); ?> class="<?= (isset($all) && $all == 'home') ? 'active' : '' ?>">
														<a href="<?= base_url('user/home') ?>">All</a>
													</li>
													<?php foreach($kategori as $ktr) { ?>
													<li class="<?= (isset($current_category) && $current_category == $ktr['nama_kategori']) ? 'active' : '' ?>">
														<a href="<?= base_url('user/kategori/index/'.$ktr['nama_kategori']) ?>"><?= $ktr['nama_kategori'] ?></a>
													</li>
													<?php } ?>
													<?php foreach($kategori as $ktr) { ?>
													<li class="active" data-filter="<?= $ktr['nama_kategori'] ?>">
														<?= $ktr['nama_kategori'] ?></li>
													<?php } ?>

													<li><a href="#">Men (20)</a></li>
													<li><a href="#">Women (20)</a></li>
													<li><a href="#">Bags (20)</a></li>
													<li><a href="#">Clothing (20)</a></li>
													<li><a href="#">Shoes (20)</a></li>
													<li><a href="#">Accessories (20)</a></li>
													<li><a href="#">Kids (20)</a></li>
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
									<p>Showing 1–12 of 126 results</p>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6">
								<div class="shop__product__option__right">
									<p>Sort by Price:</p>
									<select>
										<option value="">Low To High</option>
										<option value="">$0 - $55</option>
										<option value="">$55 - $100</option>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-4 col-md-6 col-sm-6">
							<div class="product__item">
								<div class="product__item__pic set-bg" data-setbg="<?= base_url('userr/')?>img/product/product-2.jpg">
									<ul class="product__hover">
										<li><a href="#"><img src="<?= base_url('userr/')?>img/icon/heart.png" alt=""></a></li>
										<li><a href="#"><img src="<?= base_url('userr/')?>img/icon/compare.png" alt="">
												<span>Compare</span></a>
										</li>
										<li><a href="#"><img src="<?= base_url('userr/')?>img/icon/search.png" alt=""></a></li>
									</ul>
								</div>
								<div class="product__item__text">
									<h6>Piqué Biker Jacket</h6>
									<a href="#" class="add-cart">+ Add To Cart</a>
									<div class="rating">
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
									</div>
									<h5>$67.24</h5>
									<div class="product__color__select">
										<label for="pc-4">
											<input type="radio" id="pc-4">
										</label>
										<label class="active black" for="pc-5">
											<input type="radio" id="pc-5">
										</label>
										<label class="grey" for="pc-6">
											<input type="radio" id="pc-6">
										</label>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Removed Pagination -->
				</div>
			</div>
		</div>
	</section>
	<?php require_once('./layout2/footer.php');?>
	<?php require_once('./layout2/js.php');?>

</body>

</html>
