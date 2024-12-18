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
									<span><img src="<?= base_url()?>assets/admin/assets/img/icons/closes.svg"
											alt="img"></span>
								</a>
							</div>
							<div class="search-input">
								<a class="btn btn-searchset">
									<img src="<?= base_url()?>assets/admin/assets/img/icons/search-white.svg" alt="img">
								</a>
								<div id="DataTables_Table_0_filter" class="dataTables_filter">
									<label>
										<input type="search" class="form-control form-control-sm"
											placeholder="Search..." aria-controls="DataTables_Table_0">
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
								<h4>Konfigurasi List</h4>
								<h6>Manage your Konfigurasis</h6>
							</div>
							<div class="page-btn">
								<a href="Konfigurasi/tambah" class="btn btn-added">
									<img src="http://localhost/projek_akhir/assets/admin/assets/img/icons/plus.svg"
										alt="img"> Add Konfigurasi
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
										<th style="width: 20%;">Judul Website</th>
										<th style="width: 15%;">Profil Webste</th>
										<th style="width: 10%;">Instagram</th>
										<th style="width: 40%;">Facebook</th>
										<th style="width: 40%;">Alamat</th>
										<th style="width: 40%;">Email</th>
										<th style="width: 40%;">Status</th>
										<th style="width: 10%;">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($konfigurasi as $k): ?>
									<!-- Looping data produk -->
									<tr class="odd">
										<td>
											<label class="checkboxs">
												<input type="checkbox">
												<span class="checkmarks"></span>
											</label>
										</td>
										<td><?= $k->judul_website; ?></td>
										<td><?= $k->profil_website; ?></td>
										<td><?= $k->instagram; ?></td>
										<td><?= $k->facebook; ?></td>
										<td><?= $k->alamat; ?></td>
										<td><?= $k->email; ?></td>
										<td><?= $k->status; ?></td>

										<td>
											<!-- Tombol Edit -->
											<button class="btn p-0 me-2" data-bs-toggle="modal"
												data-bs-target="#editKonfigurasi<?= $k->id_konfigurasi; ?>">
												<img src="http://localhost/projek_akhir/assets/admin/assets/img/icons/edit.svg"
													alt="Edit">
											</button>

											<!-- Modal Edit -->
											<div class="modal fade" id="editKonfigurasi<?= $k->id_konfigurasi; ?>"
												tabindex="-1" aria-labelledby="editKonfigurasiLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">Edit Konfigurasi</h5>
															<button type="button" class="btn-close"
																data-bs-dismiss="modal" aria-label="Close"></button>
														</div>
														<form action="<?= base_url('Konfigurasi/update') ?>"
															method="post">
															<div class="modal-body">
																<input type="hidden" name="id_konfigurasi"
																	value="<?= $k->id_konfigurasi; ?>">
																<div class="mb-3">
																	<label for="judul_website" class="form-label">Judul
																		Website</label>
																	<input type="text" class="form-control"
																		id="judul_website" name="judul_website"
																		value="<?= $k->judul_website; ?>" required>
																</div>
																<div class="mb-3">
																	<label for="profil_website"
																		class="form-label">Profil Website</label>
																	<input type="text" class="form-control"
																		id="profil_website" name="profil_website"
																		value="<?= $k->profil_website; ?>" required>
																</div>
																<div class="mb-3">
																	<label for="instagram"
																		class="form-label">Instagram</label>
																	<input type="text" class="form-control"
																		id="instagram" name="instagram"
																		value="<?= $k->instagram; ?>" required>
																</div>
																<div class="mb-3">
																	<label for="facebook"
																		class="form-label">Facebook</label>
																	<input type="text" class="form-control"
																		id="facebook" name="facebook"
																		value="<?= $k->facebook; ?>" required>
																</div>
																<div class="mb-3">
																	<label for="alamat"
																		class="form-label">Alamat</label>
																	<input type="text" class="form-control" id="alamat"
																		name="alamat" value="<?= $k->alamat; ?>"
																		required>
																</div>
																<div class="mb-3">
																	<label for="email" class="form-label">Email</label>
																	<textarea class="form-control" id="email"
																		name="email" rows="3"
																		required><?= $k->email; ?></textarea>
																</div>
																<div class="mb-3">
																	<label for="status"
																		class="form-label">Status</label>
																	<select class="form-control" id="status"
																		name="status" required>
																		<option value="" disabled>Pilih Status</option>
																		<option value="aktif"
																			<?= $k->status == 'aktif' ? 'selected' : ''; ?>>
																			Aktif</option>
																		<option value="nonaktif"
																			<?= $k->status == 'nonaktif' ? 'selected' : ''; ?>>
																			Non-Aktif</option>
																	</select>
																</div>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-secondary"
																	data-bs-dismiss="modal">Close</button>
																<button type="submit"
																	class="btn btn-primary">Update</button>
															</div>
														</form>
													</div>
												</div>
											</div>


											<!-- Tombol Hapus -->
											<a href="javascript:void(0);"
												onclick="confirmDeleteKonfigurasi(<?= $k->id_konfigurasi; ?>)"
												class="btn-sm">
												<img src="http://localhost/projek_akhir/assets/admin/assets/img/icons/delete.svg"
													alt="Delete">
											</a>
										</td>
									</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>

						<!-- Pagination -->
						<div class="dataTables_paginate paging_numbers">
							<!-- <ul class="pagination">
                            Contoh Pagination
                            <li class="paginate_button page-item active"><a href="#" class="page-link">1</a></li>
                            <li class="paginate_button page-item"><a href="#" class="page-link">2</a></li>
                        </ul> -->
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php require_once('layout/_js.php'); ?>
</body>

</html>
