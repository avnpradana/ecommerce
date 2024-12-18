<!DOCTYPE html>
<html lang="zxx">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="Male_Fashion Template">
	<meta name="keywords" content="Male_Fashion, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Pesanan Anda</title>
	<?php require_once('layout2/css.php');?>
	<style>

	</style>
</head>

<body>
	<?php require_once('layout2/navbar.php');?>
	<!-- Breadcrumb Section Begin -->
	<section class="breadcrumb-option">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcrumb__text">
						<h4>Status Pesanan</h4>
						<div class="breadcrumb__links">
							<a href="	<?= base_url('home');?>">Home</a>
							<a href="<?= base_url('front/shop');?>">Shop</a>
							<span>Status Pesanan Anda</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Breadcrumb Section End -->
	<section class="shopping-cart spad">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="shopping__cart__table">
						<table>
							<thead>
								<tr>
									<th>Product</th>
									<th>Tanggal</th>
									<th>Jumlah</th>
									<th>Status</th>

									<th>lihat Detail</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($order as $order) {?>
								<tr>
									<td class="product__cart__item">
										<div class="product__cart__item__pic">
											<img src="<?= base_url() ?>/upload/konten/<?= $order['picture'] ?>"
												width="90px" alt="">
										</div>
										<div class="product__cart__item__text">
											<h6><?= $order['nama']?></h6>
											<h5>Rp<?= number_format($order['harga'], 0, ',', '.') ?></h5>
										</div>
									</td>

									<td class="cart__price"><?= $order['tanggal']?></td>

									<td class="cart__price" style="padding-left: 30px;"><?= $order['jumlah'] ?></td>

									<td class="cart__close"><span class="badges <?php 
                                                switch ($order['status']) {
                                                    case 'Pesanan Masuk': echo 'bg-red'; break;
                                                    case 'Pesanan Dikonfirmasi': echo 'bg-blue'; break;
                                                    case 'Pesanan Dikemas': echo 'bg-yellow'; break;
                                                    case 'Pesanan Dikirim': echo 'bg-orange'; break;
                                                    case 'Pesanan Dalam Perjalanan': echo 'bg-purple'; break;
                                                    case 'Pesanan Selesai': echo 'bg-darkgreen'; break;
                                                    default: echo ''; 
                                                }
																										?>">
											<?= $order['status']; ?></i></td>
									<td>
										<!-- Trigger Modal for details -->
										<a class="center-icon btn btn-secondary btn-sm" href="#" data-bs-toggle="modal"
											data-bs-target="#detailsModal<?= $order['transaction_id']; ?>">
											<i class="fas fa-eye"></i> Lihat Detail
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

					</div>
				</div>

			</div>
		</div>

	</section>
	<!-- Shopping Cart Section End -->


	<?php require_once('layout2/footer.php');?>
	<?php require_once('layout2/js.php');?>
	<!-- Modal untuk detail transaksi -->
	<?php foreach ($transaction as $t): ?>
	<div class="modal fade" id="detailsModal<?= $t['transaction_id']; ?>" tabindex="-1"
		aria-labelledby="productDetailsModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header bg-secondary text-white">
					<h5 class="modal-title" id="productDetailsModalLabel">Detail Transaksi</h5>

				</div>

				<!-- Modal Body -->
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-6 col-sm-12">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">Data Pengiriman</h5>
									<ul class="list-group list-group-flush">
										<li class="list-group-item">
											<strong>Nama Penerima:</strong> <?= $t['nama']; ?>
										</li>
										<li class="list-group-item">
											<strong>No Hp Penerima:</strong> <?= $t['nohp']; ?>
										</li>
										<li class="list-group-item">
											<strong>Alamat Penerima:</strong> <?= $t['alamat']; ?>, <?= $t['kota']; ?>,
											<?= $t['provinsi']; ?>, <?= $t['kode_pos']; ?>
										</li>

										<li class="list-group-item">
											<strong>Status Pesanan:</strong>
											<span class="badge <?php 
                                            switch ($t['status']) {
                                                case 'Pesanan Masuk': echo 'bg-danger'; break;
                                                case 'Pesanan Dikonfirmasi': echo 'bg-primary'; break;
                                                case 'Pesanan Dikemas': echo 'bg-warning'; break;
                                                case 'Pesanan Dikirim': echo 'bg-info'; break;
                                                case 'Pesanan Dalam Perjalanan': echo 'bg-purple'; break;
                                                case 'Pesanan Selesai': echo 'bg-success'; break;
                                                default: echo ''; 
                                            }
                                        ?>"><?= $t['status']; ?></span>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="col-lg-6 col-sm-12">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">Data Pembayaran</h5>
									<ul class="list-group list-group-flush">
										<li class="list-group-item">
											<strong>Nama:</strong> <?= $t['nama']; ?>
										</li>
										<li class="list-group-item">
											<strong>No Hp:</strong> <?= $t['nohp']; ?>
										</li>
										<li class="list-group-item">
											<strong>Tanggal Pesanan:</strong>
											<?= date('d-m-Y', strtotime($t['tanggal'])); ?>
										</li>
										<li class="list-group-item">
											<strong>Total Harga:</strong>
											Rp<?= number_format($t['jumlah'], 0, ',', '.'); ?>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-lg-12 col-sm-12">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">Pengiriman</h5>
									<div class="form-group row">
										<label class="col-form-label col-md-2">Kurir</label>
										<div class="col-md-10">
                                            <h5>: <?= $t['kurir'] ?></h5>
											
										</div>
									</div>
									<div class="form-group row">
										<label class="col-form-label col-md-2">No Resi</label>
										<div class="col-md-10">
                                            <h5>: <?= $t['no_resi'] ?></h5>
										
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12 col-sm-12">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">Detail Produk</h5>
									<div class="table-responsive">
										<table class="table">
											<thead>
												<tr>
													<th>Nama Produk</th>
													<th>Harga</th>
													<th>Stok</th>
													<th>Qty</th>
													<th>Kategori</th>
													<th>Deskripsi</th>
												</tr>
											</thead>
											<tbody>
												<?php if (isset($product[$t['transaction_id']])): ?>
												<?php foreach ($product[$t['transaction_id']] as $p): ?>
												<tr>
													<td><?= $p['nama']; ?></td>
													<td>Rp<?= number_format($p['harga'], 0, ',', '.'); ?></td>
													<td><?= $p['stock']; ?></td>
													<td><?= $p['jumlah']; ?></td>
													<td><?= $p['kategori']; ?></td>
													<td>
														<?= strlen($p['deskripsi']) > 50 ? substr($p['deskripsi'], 0, 50) . '...' : $p['deskripsi']; ?>
													</td>
												</tr>
												<?php endforeach; ?>
												<?php else: ?>
												<tr>
													<td colspan="6" class="text-center">No products available for this
														transaction.</td>
												</tr>
												<?php endif; ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Modal Footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach; ?>

	</div>

	<?php require_once('layout/_js.php');?>






</body>

</html>
