	<!DOCTYPE html>
	<html lang="zxx">

	<head>
		<meta charset="UTF-8">
		<meta name="description" content="Male_Fashion Template">
		<meta name="keywords" content="Male_Fashion, unica, creative, html">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Shop Details</title>
		<?php require_once('layout2/css.php');?>
	</head>

	<body>
		<?php require_once('layout2/navbar.php');?>
		<section class="shop-details">
			<div class="product__details__pic">

				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="product__details__breadcrumb">
								<a href="<?= base_url('home')?>">Home</a>
								<a href="<?= base_url('front/shop')?>">Shop</a>
								<span>Product Details</span>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-lg-3 col-md-3">
							<ul class="nav nav-tabs" role="tablist">
								<?php foreach (array_slice($picproduct, 0, 4) as $index => $pic) : ?>
								<li class="nav-item">
									<a class="nav-link <?= $index === 0 ? 'active' : '' ?>" data-toggle="tab"
										href="#tabs-<?= $index + 1 ?>" role="tab">
										<div class="product__thumb__pic set-bg"
											data-setbg="<?= base_url('upload/konten/' . $pic['picture']) ?>">
										</div>
									</a>
								</li>
								<?php endforeach; ?>
							</ul>
						</div>
						<div class="col-lg-6 col-md-9">
							<div class="tab-content">
								<?php foreach (array_slice($picproduct, 0, 4) as $index => $pic) : ?>
								<div class="tab-pane <?= $index === 0 ? 'active' : '' ?>" id="tabs-<?= $index + 1 ?>" role="tabpanel">
									<div class="product__details__pic__item">
										<img src="<?= base_url('upload/konten/' . $pic['picture']) ?>" alt="">
									</div>
								</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>



				</div>
			</div>
			<div class="product__details__content">
			<div class="container">
    <?php foreach ($product as $p) { ?>
    <?php
        // Open form to 'product/cart' controller method
        echo form_open('product/cart'); 
        echo form_hidden('product_id', $p['product_id']); 
        echo form_hidden('harga', $p['harga']);
        echo form_hidden('nama', $p['nama']);
    ?>
    <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
            <div class="product__details__text">
                <h4><?= $p['nama'] ?></h4>
                <h3>Rp<?= number_format($p['harga'], 0, ',', '.') ?></h3>
                <p><?= substr($p['deskripsi'], 0, 1000) ?>...</p>

                <div class="product__details__cart__option">
                    <div class="quantity">
                        <div class="pro-qty">
                            <!-- Input for quantity -->
                            <input type="number" name="qty" value="1" min="1" max="<?= $p['stock'] ?>" required>
                        </div>
                    </div>
                    <button type="submit" class="primary-btn">Add to cart</button>
                </div>

                <div class="product__details__btns__option">        
                   
                    <a href="#"><i class="fa fa-exchange"></i> Stock: <?= $p['stock'] ?></a>
                </div>
            </div>
        </div>
    </div>
    <?= form_close(); ?>
    <?php } ?>
</div>

</div>

		</section>
		<!-- Shop Details Section End -->

		<!-- Related Section Begin -->
		<section class="related spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h3 class="related-title">Related Products</h3>
            </div>
        </div>
        <div class="row">
            <?php foreach ($related_products as $related) : ?>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="product__item">
                    <div class="product__item__pic set-bg" 
                         data-setbg="<?= base_url('upload/konten/' . $related['picture']) ?>">
                        <ul class="product__hover">
                            <!-- <li><a href="#"><img src="<?= base_url('assets/img/icon/heart.png') ?>" alt=""></a></li>
                            <li><a href="#"><img src="<?= base_url('assets/img/icon/compare.png') ?>" alt=""> <span>Compare</span></a></li> -->
                            <!-- <li><a href="<?= base_url('front/Shopdetails/index/' . $related['product_id']) ?>"><img src="<?= base_url('assets/img/icon/search.png') ?>" alt=""></a></li> -->
                        </ul>
                    </div>
                    <div class="product__item__text">
                        <h6><?= $related['nama'] ?></h6>
                        <a href="<?= base_url('front/Shopdetails/index/' . $related['product_id']) ?>" class="add-cart">View Details</a>
                        <h5>Rp<?= number_format($related['harga'], 0, ',', '.') ?></h5>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>







		<?php require_once('layout2/footer.php');?>
		<?php require_once('layout2/js.php');?>

	</body>

	</html>
