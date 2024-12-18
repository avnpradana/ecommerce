<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin</title>
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


					<div class="card-body">
						<!-- Header dan Tombol Tambah -->
						<div class="page-header">
							<div class="page-title">
								<h4>Product List</h4>
								<h6>Manage your products</h6>
							</div>
							<div class="page-btn">
								<a href="product/tambah" class="btn btn-added">
									<img src="http://localhost/projek_akhir/assets/admin/assets/img/icons/plus.svg" alt="img"> Add Product
								</a>
							</div>
						</div>

						<!-- Tabel Produk -->
						<div class="table-responsive">
							<table class="table datanew dataTable">
								<thead>
									<tr>
										<th style="width: 5%;">
											<label class="checkboxs">
												<input type="checkbox">
												<span class="checkmarks"></span>
											</label>
										</th>
										<th style="width: 20%;">Nama Produk</th>
										<th style="width: 15%;">Harga</th>
										<th style="width: 15%;">Stok</th>
										<th style="width: 15%;">Kategori</th>
										<th style="width: 15%;">Deskripsi</th>
										<th style="width: 10%;">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($product as $p): ?>
									<!-- Looping data produk -->
									<tr class="odd">
										<td>
											<label class="checkboxs">
												<input type="checkbox">
												<span class="checkmarks"></span>
											</label>
										</td>
										<td><?= $p['nama']; ?></td>
										<td>Rp <?= number_format($p ['harga'], 0, ',', '.') ?></td>
										<td><?= $p['stock']; ?></td>
										<td><?= $p['kategori']; ?></td>
										<td><?= $p['deskripsi']; ?></td>


										<td>
											<!-- Tombol lihat -->
											<button class="btn p-0 me-4" data-bs-toggle="modal"
												data-bs-target="#lihatPic<?= $p['product_id']; ?>">
												<i class="fas fa-image"></i>
											</button>

											<!-- Modal lihatPic -->
											<div class="modal fade" id="lihatPic<?= $p['product_id'] ?>" tabindex="-1"
												aria-labelledby="lihatPicLabel" aria-hidden="true">
												<div class="modal-dialog modal-lg">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">Picture Product - <?= $p['nama']; ?>
															</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal"
																aria-label="Close"></button>
														</div>
														<div class="modal-body">
															<!-- Carousel untuk gambar produk -->
															<div id="carouselProduct<?= $p['product_id']; ?>" class="carousel slide"
																data-bs-ride="carousel">
																<div class="carousel-inner">
																	<?php 
                                       $first = true; // Menandai item pertama
                                        foreach ($picproduct as $pic): 
                                         if ($pic['product_id'] == $p['product_id']): ?>
																	<div class="carousel-item <?= $first ? 'active' : '' ?>">
																		<img src="<?= base_url('upload/konten/' . $pic['picture']) ?>" class="d-block w-100"
																			alt="Gambar Produk">
																	</div>
																	<?php $first = false; ?>
																	<?php endif; 
                                      endforeach; ?>

																	<!-- Menampilkan pesan jika tidak ada gambar -->
																	<?php if ($first): ?>
																	<div class="carousel-item active">
																		<img src="<?= base_url('assets/admin/assets/img/no-image.png') ?>"
																			class="d-block w-100" alt="No Image">
																	</div>
																	<?php endif; ?>
																</div>

																<!-- Tombol navigasi carousel -->
																<button class="carousel-control-prev" type="button"
																	data-bs-target="#carouselProduct<?= $p['product_id']; ?>" data-bs-slide="prev">
																	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
																	<span class="visually-hidden">Previous</span>
																</button>
																<button class="carousel-control-next" type="button"
																	data-bs-target="#carouselProduct<?= $p['product_id']; ?>" data-bs-slide="next">
																	<span class="carousel-control-next-icon" aria-hidden="true"></span>
																	<span class="visually-hidden">Next</span>
																</button>
															</div>
														</div>
														<div class="modal-footer">
															<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
														</div>
													</div>
												</div>
											</div>
											
											
											<!-- Tombol Edit -->
											<button class="btn p-0 me-2" data-bs-toggle="modal"
											data-bs-target="#editProduct<?= $p['product_id']; ?>">
											<img src="http://localhost/projek_akhir/assets/admin/assets/img/icons/edit.svg" alt="Edit">
										</button>
										<!-- Tombol Hapus -->
										<a href="javascript:void(0);" onclick="confirmDeleteProduct(<?= $p['product_id']; ?>)"
											class="btn-sm">
											<img src="http://localhost/projek_akhir/assets/admin/assets/img/icons/delete.svg" alt="Delete">
										</a>

											<!-- Modal Edit -->
											<div class="modal fade" id="editProduct<?= $p['product_id']; ?>" tabindex="-1"
												aria-labelledby="editProductLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">Edit Produk</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal"
																aria-label="Close"></button>
														</div>
														<form action="<?= base_url('product/update')?>" method="post">
															<div class="modal-body">
																<input type="hidden" name="product_id" value="<?= $p['product_id']; ?>">
																<div class="mb-3">
																	<label for="nama" class="form-label">Nama
																		Produk</label>
																	<input type="text" class="form-control" id="nama" name="nama" value="<?= $p['nama']; ?>"
																		required>
																</div>
																<div class="mb-3">
																	<label for="harga" class="form-label">Harga</label>
																	<input type="number" class="form-control" id="harga" name="harga"
																		value="<?= $p['harga']; ?>" required>
																</div>
																<div class="mb-3">
																	<label for="stock" class="form-label">Stok</label>
																	<input type="number" class="form-control" id="stock" name="stock"
																		value="<?= $p['stock']; ?>" required>
																</div>

																<div class="mb-3">
																	<label for="deskripsi" class="form-label">Deskripsi</label>
																	<textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"
																		required><?= $p['deskripsi']; ?></textarea>
																</div>
																
																<div class="mb-3">
																	<label for="kategori" class="form-label">Kategori</label>
																	<textarea class="form-control" id="kategori" name="kategori" rows="3"
																		required><?= $p['kategori']; ?></textarea>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
																<button type="submit" class="btn btn-primary">Update</button>
															</div>
														</form>
													</div>
												</div>
											</div>



										</td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>

						<!-- Pagination -->
						<div class="dataTables_paginate paging_numbers">

						</div>
					</div>
				</div>
			</div>
		</div>

		<?php require_once('layout/_js.php'); ?>
</body>

</html>
