<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin</title>
	<?php require_once('layout/_css.php'); ?>
</head>

<body>

	<?php require_once('layout/_navbar.php'); ?>
	<?php require_once('layout/_sidebar.php'); ?>
	<?php require_once('layout/_content.php'); ?>
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

					<div class="page-header">
						<div class="page-title">
							<h4>Category List</h4>
							<h6>Manage Categories</h6>
						</div>
						<div class="page-btn">
							<a href="kategori/tambah" class="btn btn-added">
								<img src="assets/admin/assets/img/icons/plus.svg" alt="Add"> Add Category
							</a>
						</div>
					</div>

					<div class="table-responsive">
						<table class="table datanew">
							<thead>
								<tr>
									<th>Nama Kategori</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($kategori as $k): ?>
								<tr>
									<td><?= $k['nama_kategori']; ?></td>
									<td>
										
                                        <button class="btn p-0 me-3" data-bs-toggle="modal" data-bs-target="#editkategori<?=$k['id_kategori']?>">
												<img src="<?= base_url()?>assets/admin/assets/img/icons/edit.svg" alt="Edit">
										</button>
                                        <a href="javascript:void(0);" class="btn btn-sm btn-delete"
											onclick="confirmDeleteKategori  (<?= $k['id_kategori']; ?>)">
											<img src="assets/admin/assets/img/icons/delete.svg" alt="Delete">
										</a>
										<div class="modal fade" id="editkategori<?= $k['id_kategori'] ?>" tabindex="-1"
											aria-labelledby="edituserLabel" aria-hidden="true">
											<div class="modal-dialog">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title">Ubah Kategori</h5>
														<button type="button" class="btn-close" data-bs-dismiss="modal"
															aria-label="Close"></button>
													</div>
													<form action="<?= base_url('kategori/update') ?>" method="post">
														<div class="modal-body">
															<input type="hidden" name="id_kategori"
																value="<?= $k['id_kategori'] ?>">
															<div class="mb-3">
																<label for="nama" class="form-label">Nama User</label>
																<input type="text" class="form-control" id="nama"
																	name="nama_kategori" value="<?= $k['nama_kategori'] ?>"
																	required>
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

	<?php require_once('layout/_js.php'); ?>
</body>

</html>
