<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin - Carousel Management</title>
	<?php require_once('layout/_css.php'); ?>
</head>

<body>
	<!-- Navbar dan Sidebar -->
	<?php require_once('layout/_navbar.php'); ?>
	<?php require_once('layout/_sidebar.php'); ?>

	<div class="page-wrapper">
		<div class="content">
			<div class="card">
				<div class="card-body">
					<div class="table-top">
						<div class="search-set">
							<div class="search-path">
								<a class="btn btn-filter" id="filter_search">
									<img src="<?= base_url()?>assets/admin/assets/img/icons/filter.svg" alt="img">
									<span><img src="<?= base_url()?>assets/admin/assets/img/icons/closes.svg" alt="img"></span>
								</a>
							</div>
							<div class="search-input">
								<a class="btn btn-searchset">
									<img src="<?= base_url()?>assets/admin/assets/img/icons/search-white.svg" alt="img">
								</a>
								<div id="DataTables_Table_0_filter" class="dataTables_filter">
									<label>
										<input type="search" class="form-control form-control-sm" placeholder="Search..."
											aria-controls="DataTables_Table_0">
									</label>
								</div>
							</div>
						</div>
						<div class="wordset">
							<ul>
								<li>
									<a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf">
										<img src="<?= base_url()?>assets/admin/assets/img/icons/pdf.svg" alt="img">
									</a>
								</li>
								<li>
									<a data-bs-toggle="tooltip" data-bs-placement="top" title="excel">
										<img src="<?= base_url()?>assets/admin/assets/img/icons/excel.svg" alt="img">
									</a>
								</li>
								<li>
									<a data-bs-toggle="tooltip" data-bs-placement="top" title="print">
										<img src="<?= base_url()?>assets/admin/assets/img/icons/printer.svg" alt="img">
									</a>
								</li>
							</ul>
						</div>
					</div>

					<div class="page-header">
						<div class="page-title">
							<h4><?= $title; ?></h4>
							<h6>Manage your <?= $title; ?></h6>
						</div>
					</div>

					<div class="table-responsive">
						<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
							<table class="table datanew dataTable no-footer" id="DataTables_Table_0" role="grid"
								aria-describedby="DataTables_Table_0_info">
								<thead>
									<tr role="row">
										<th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
											aria-sort="ascending" style="width: 35px;">
											<label class="checkboxs">
												<input type="checkbox" id="select-all">
												<span class="checkmarks"></span>
											</label>
										</th>
										<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
											style="width: 121.844px;">No</th>
										<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
											style="width: 29.5625px;">ID Transaksi</th>
										<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
											style="width: 29.5625px;">Nama Pelanggan</th>
										<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
											style="width: 60.6875px;">Tanggal</th>
										<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
											style="width: 40.4583px;">Jumlah</th>
										<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
											style="width: 40.4583px;">Status</th>
										<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
											style="width: 78.4896px;">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php $no = 1; foreach ($transaction as $t): ?>
									<tr class="odd">
										<td class="sorting_1">
											<label class="checkboxs">
												<input type="checkbox">
												<span class="checkmarks"></span>
											</label>
										</td>
										<td><?=$no++?></td>
										<td><?= $t['transaction_id']; ?></td>
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
				</div>
			</div>
		</div>

		<!-- Transaction Detail Modal -->
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
''					<div class="modal-body">
						<div class="row">
							<div class="col-lg-6 col-sm-12">
								<div class="card">
									<div class="card-body">
										<div class="productdetails">
											<h5 class="card-title">Data Pembayaran</h5>
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
											<h5 class="card-title">Data Pengiriman</h5>
											<ul class="product-bar">
												<li>
													<h4>Penerima</h4>
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
													<h4>Status</h4>
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
										<h5 class="card-title">Pengiriman</h5>
                    <div class="form-group row">
												<label class="col-form-label col-md-2">Kurir</label>
												<div class="col-md-10">
                        
                        <input type="text" name="kurir" value="<?= $t['kurir'] ?>" readonly >
												</div>
											</div>
											<div class="form-group row">
												<label class="col-form-label col-md-2">No Resi</label>
												<div class="col-md-10">
                        <input type="text" name="no_resi" value="<?= $t['no_resi'] ?>" readonly>
												</div>
											</div>
									</div>
								</div>
							</div>


							<div class="col-lg-12 col-sm-12">
								<div class="card">
									<div class="card-body">
										<h5 class="card-title">Detail Produk</h5>
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
					
				</div>
			</div>
		</div>
		<?php endforeach; ?>
	</div>

	<?php require_once('layout/_js.php'); ?>

</body>

</html>
