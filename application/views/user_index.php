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
							<h4>User List</h4>
							<h6>Manage your User</h6>
						</div>
						<div class="page-btn">
							<a href="user/tambah" class="btn btn-added">
								<img src="<?= base_url()?>assets/admin/assets/img/icons/plus.svg" alt="img">Add User
							</a>
						</div>
					</div>

					<div class="table-responsive">
						<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
							<table class="table datanew dataTable no-footer" id="DataTables_Table_0" role="grid"
								aria-describedby="DataTables_Table_0_info">
								<thead>
									<tr role="row">
										<th style="width: 63.2292px;">
											<label class="checkboxs">
												<input type="checkbox">
												<span class="checkmarks"></span>
											</label>
										</th>
										<th>Username</th>
										<th>Nama</th>
										<th>Role</th>
										<th>No Hp</th>
										<!-- <th>Status</th> -->
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($user as $u): ?>
									<tr class="odd">
										<td>
											<label class="checkboxs">
												<input type="checkbox">
												<span class="checkmarks"></span>
											</label>
										</td>
										<td><?= $u['username']; ?></td>
										<td><?= $u['nama']; ?></td>
										<td><?= $u['level']; ?></td>
										<td><?= $u['nohp']; ?></td>
										<!-- <td><span class="bg-lightgreen badges">Active</span></td> -->
										<td>
											 
											<button class="btn p-0 me-3" data-bs-toggle="modal" data-bs-target="#edituser<?=$u['id_user']?>">
												<img src="<?= base_url()?>assets/admin/assets/img/icons/edit.svg" alt="Edit">
											</button>

											<div class="modal fade" id="edituser<?= $u['id_user'] ?>" tabindex="-1"
												aria-labelledby="edituserLabel" aria-hidden="true">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="modal-header">
															<h5 class="modal-title">Ubah User</h5>
															<button type="button" class="btn-close" data-bs-dismiss="modal"
																aria-label="Close"></button>
														</div>
														<form action="<?= base_url('user/update') ?>" method="post">
															<div class="modal-body">
														
																<input type="hidden" name="id_user" value="<?= $u['id_user'] ?>">
		
																<div class="mb-3">
																	<label for="nama" class="form-label">Nama User</label>
																	<input type="text" class="form-control" id="nama" name="nama"
																		value="<?= $u['nama'] ?>" required>
																</div>

															
																<div class="mb-3">
																	<label for="username" class="form-label">Username</label>
																	<input type="text" class="form-control" id="username" name="username"
																		value="<?= $u['username'] ?>" required>
																</div>
											
																<div class="mb-3">
																	<label for="level" class="form-label">Level</label>
																	<select name="level" class="form-select form-control" id="level" required>
																		<option value="user" <?= ($u['level'] == 'user') ? 'selected' : '' ?>>User</option>
																		<?php if ($this->session->userdata('level') == 'admin') { ?>
																		<option value="admin" <?= ($u['level'] == 'admin') ? 'selected' : '' ?>>Admin
																		</option>
																		<?php } ?>
																	</select>
																</div>
														
																<div class="mb-3">
																	<label for="nohp" class="form-label">No HP</label>
																	<input type="text" class="form-control" id="nohp" name="nohp"
																		value="<?= $u['nohp'] ?>" required>
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
										
											<a class=" btn-sm" href="javascript:void(0);"
												onClick="confirmDelete(<?= $u['id_user']; ?>)">
												<img src="<?= base_url()?>assets/admin/assets/img/icons/delete.svg" alt="img">
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
	</div>

	<?php require_once('layout/_js.php'); ?>
</body>

</html>
