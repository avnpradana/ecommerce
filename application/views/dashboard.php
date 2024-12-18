<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin</title>
	<?php require_once('layout/_css.php');?>
</head>

<body>
	<?php require_once('layout/_navbar.php');?>
	<?php require_once('layout/_sidebar.php');?>
	<?php require_once('layout/_content.php');?>

	<div class="page-wrapper">
		<div class="content">
			<div class="card">
				<div class="card-body">
					<div class="page-header">
						<div class="page-title">
							<h2>Selamat datang, <?= $this->session->userdata('nama')?></h2>
						</div>
					</div>
				</div>
			</div>
			<div class="row">

				<div class="col-lg-4 col-sm-6 col-12 d-flex">
					<div class="dash-count">
						<div class="dash-counts">
							<h4><?= $total_customers; ?></h4>
							<h5>Customers</h5>
						</div>
						<div class="dash-imgs">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
								stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
								class="feather feather-user">
								<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
								<circle cx="12" cy="7" r="4"></circle>
							</svg>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 col-12 d-flex">
					<div class="dash-count das1">
						<div class="dash-counts">
							<h4>Rp<span><?= number_format($total_pendapatan_bulanan); ?></span></h4>
							<h5>Total Pendapatan Bulanan</h5>
						</div>
						<div class="dash-imgs">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
								stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
								class="feather feather-shopping-cart">
								<circle cx="9" cy="21" r="1"></circle>
								<circle cx="20" cy="21" r="1"></circle>
								<path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
							</svg>
						</div>

					</div>
				</div>
				<div class="col-lg-4 col-sm-6 col-12 d-flex">
					<div class="dash-count das2">
						<div class="dash-counts">
							<h4>Rp<span><?= number_format($total_pendapatan_harian); ?></span></h4>
							<h5>Total Pendapatan Harian</h5>
						</div>
						<div class="dash-imgs">
							<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
								stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
								class="feather feather-file-text">
								<path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
								<polyline points="14 2 14 8 20 8"></polyline>
								<line x1="16" y1="13" x2="8" y2="13"></line>
								<line x1="16" y1="17" x2="8" y2="17"></line>
								<polyline points="10 9 9 9 8 9"></polyline>
							</svg>
						</div>
					</div>
				</div>
			</div>

			<div class="card mb-0">
				<div class="card-body">
					<h4 class="card-title">Pesanan Masuk</h4>
					<div class="table-responsive dataview">
						<div id="DataTables_Table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
							<div class="row">
								<div class="col-sm-12 col-md-6">
									<div class="dataTables_length" id="DataTables_Table_1_length"><label>Show <select
												name="DataTables_Table_1_length" aria-controls="DataTables_Table_1"
												class="custom-select custom-select-sm form-control form-control-sm">
												<option value="10">10</option>
												<option value="25">25</option>
												<option value="50">50</option>
												<option value="100">100</option>
											</select> entries</label></div>
								</div>
								<div class="col-sm-12 col-md-6"></div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<table class="table datatable dataTable no-footer" id="DataTables_Table_1" role="grid"
										aria-describedby="DataTables_Table_1_info">
										<thead>
											<tr role="row">
												<th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
													aria-sort="ascending" aria-label="SNo: activate to sort column descending"
													style="width: 100px;">No</th>
												<th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
													aria-label="Product Name: activate to sort column ascending" style="width: 100px;">Nama
													Pelanggan</th>
												<th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
													aria-label="Brand Name: activate to sort column ascending" style="width: 100px;">Tangggal
												</th>
												<th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
													aria-label="Category Name: activate to sort column ascending" style="width: 100px;">
													Jumlah</th>
												<th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
													aria-label="Expiry Date: activate to sort column ascending" style="width: 100px;">Status
												</th>
												<th class="sorting" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1"
													aria-label="Product Code: activate to sort column ascending" style="width: 100px;">Action
												</th>

											</tr>
										</thead>
										<tbody>



											<?php $no = 1; foreach ($transaction as $t): ?>

											<tr class="odd">
												<td><?=$no++?></td>
												<td><?= $t['nama']; ?></td>
												<td><?= $t['tanggal']; ?></td>
												<td>Rp<?= number_format($t['jumlah'], 0, ',', '.'); ?></td>
												<td>
													<span class="badges <?php 
                                                switch ($t['status']) {
                                                    case 'Pesanan Masuk': echo 'bg-red'; break;
                                                    case 'Pesanan Dikonfirmasi': echo 'bg-blue'; break;
                                                    case 'Pesanan Dikemas': echo 'bg-yellow'; break;
                                                    case 'Pesanan Dikirim': echo 'bg-orange'; break;
                                                    case 'Pesanan Dalam Perjalanan': echo 'bg-purple'; break;
                                                    case 'Pesanan Selesai': echo 'bg-darkgreen'; break;
                                                    default: echo ''; 
                                                }
                                            ?>">
														<?= $t['status']; ?>
													</span>
												</td>
												<td>
													<!-- Trigger Modal for details -->
													<a class="me-3 center-icon" href="#" data-bs-toggle="modal"
														data-bs-target="#detailsModal<?= $t['transaction_id']; ?>">
														<i class="fas fa-eye"></i>
													</a>
												</td>
											</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12 col-md-5">
									<div class="dataTables_info" id="DataTables_Table_1_info" role="status" aria-live="polite">Showing 1
										to 4 of 4 entries</div>
								</div>
								<div class="col-sm-12 col-md-7">
									<div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_1_paginate">
										<ul class="pagination">
											<li class="paginate_button page-item previous disabled" id="DataTables_Table_1_previous"><a
													href="#" aria-controls="DataTables_Table_1" data-dt-idx="0" tabindex="0"
													class="page-link">Previous</a></li>
											<li class="paginate_button page-item active"><a href="#" aria-controls="DataTables_Table_1"
													data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
											<li class="paginate_button page-item next disabled" id="DataTables_Table_1_next"><a href="#"
													aria-controls="DataTables_Table_1" data-dt-idx="2" tabindex="0" class="page-link">Next</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>



	<?php foreach ($transaction as $t): ?>
	<div class="modal fade" id="detailsModal<?= $t['transaction_id']; ?>" tabindex="-1"
		aria-labelledby="productDetailsModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<h5 class="modal-title" id="productDetailsModalLabel">Details</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>

				<!-- Modal Body -->
				<div class="modal-body">
					<div class="row">
						<div class="col-lg-6 col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="productdetails">
										<h5>Data Pembayaran</h5>
										<ul class="product-bar">
											<li>
												<h4>Nama</h4>
												<h6><?= $t['nama']; ?></h6>
											</li>
											<li>
												<h4>No Hp</h4>
												<h6><?= $t['nohp']; ?></h6>
											</li>
											<li>
												<h4>Tanggal Pesanan</h4>
												<h6><?= date('d-m-Y', strtotime($t['tanggal'])); ?></h6>
											</li>
											<li>
												<h4>Id Transaksi</h4>
												<h6><?= $t['transaction_id']; ?></h6>
											</li>
											<li>
												<h4>Total Produk</h4>
												<h6><?= $t['jumlah']; ?></h6>
											</li>
											<li>
												<h4>Total Harga</h4>
												<h6>Rp<?= number_format($t['jumlah'], 0, ',', '.'); ?></h6>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-6 col-sm-12">
							<div class="card">
								<div class="card-body">
									<div class="productdetails">
										<h5>Data Pengiriman</h5>
										<ul class="product-bar">
											<li>
												<h4>Nama Penerima</h4>
												<h6><?= $t['nama']; ?></h6>
											</li>
											<li>
												<h4>No Hp Penerima</h4>
												<h6><?= $t['nohp']; ?></h6>
											</li>
											<li>
												<h4>Alamat Penerima</h4>
												<h6><?= $t['alamat']; ?>, <?= $t['kota']; ?>, <?= $t['provinsi']; ?>, <?= $t['kode_pos']; ?>
												</h6>
											</li>
											<li>
												<h4>Status Pesanan</h4>
												<h6><span class="badges <?php 
                                                switch ($t['status']) {
                                                    case 'Pesanan Masuk': echo 'bg-red'; break;
                                                    case 'Pesanan Dikonfirmasi': echo 'bg-blue'; break;
                                                    case 'Pesanan Dikemas': echo 'bg-yellow'; break;
                                                    case 'Pesanan Dikirim': echo 'bg-orange'; break;
                                                    case 'Pesanan Dalam Perjalanan': echo 'bg-purple'; break;
                                                    case 'Pesanan Selesai': echo 'bg-darkgreen'; break;
                                                    default: echo ''; 
                                                }
                                            ?>">
														<?= $t['status']; ?>
													</span></h6>
											</li>





										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-12 col-sm-12">
							<div class="card">
								<div class="card-body">
									<h5>Detail Produk</h5>
									<br>
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
													<td colspan="5">No products available for this transaction.</td>
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
					<a data-bs-dismiss="modal" class="btn btn-cancel">Cancel</a>
					<!-- <button class="btn btn-submit me-2 float-end"
							onclick="window.location.href='<?= site_url('transaksi/masuk/ubah_status/' . $t['transaction_id']) ?>'">
							Konfirmasi Pesanan
						</button> -->
				</div>

			</div>
		</div>
	</div>
	<?php endforeach; ?>
	</div>

	<?php require_once('layout/_js.php');?>






</body>

</html>
