<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin - Manage Products</title>
	<?php require_once('layout/_css.php'); ?>
</head>

<body>
	<?php require_once('layout/_navbar.php'); ?>
	<?php require_once('layout/_sidebar.php'); ?>
	<?php require_once('layout/_content.php'); ?>
	<div class="page-wrapper">
		<div class="content">
			<div class="page-header">
				<div class="page-title">
					<h4>Product Management</h4>
					<h6>Add Product</h6>
				</div>
			</div>

			<div class="card">
				<form action="<?= base_url('product/simpan') ?>" method="post">
					<div class="card-body">
						<div class="row">
							<!-- Nama Produk -->
							<div class="col-lg-6 col-sm-6 col-12">
								<div class="form-group">
									<label>Nama Produk</label>
									<input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan nama produk"
										required>
								</div>
							</div>
							
							<!-- <div class="col-lg-6 col-sm-6 col-12">
								<div class="form-group">
									<label>Foto 1:3</label>
									<input type="file" id="foto" name="foto[]" class="form-control" required>
								</div>
							</div> -->

							<!-- Harga -->
							<div class="col-lg-6 col-sm-6 col-12">
								<div class="form-group">
									<label>Harga</label>
									<input type="number" id="harga" name="harga" class="form-control" placeholder="Masukkan harga produk"
										required>
								</div>
							</div>

							<!-- Stok -->
							<div class="col-lg-6 col-sm-6 col-12">
								<div class="form-group">
									<label>Stok</label>
									<input type="number" id="stock" name="stock" class="form-control" placeholder="Masukkan jumlah stok"
										required>
								</div>
							</div>

							<div class="col-lg-6 col-sm-6 col-12">
								<label for="kategori" class="form-label">Kategori</label>
								<select class="form-control" id="kategori" name="kategori" required>
									<option value="" disabled selected>Pilih Kategori</option>
									<?php foreach ($kategori as $ktr): ?>
									<option value="<?= $ktr['nama_kategori']; ?>"><?= $ktr['nama_kategori'] ?></option>
									<?php endforeach; ?>
								</select>
							</div>

							<!-- Deskripsi -->
							<div class="col-lg-12 col-sm-12 col-12">
								<div class="form-group">
									<label>Deskripsi</label>
									<textarea id="deskripsi" name="deskripsi" class="form-control" rows="4"
										placeholder="Masukkan deskripsi produk" required></textarea>
								</div>
							</div>
							<!-- Tambahkan Dropdown Kategori di Modal Tambah/Edit -->



							<!-- Submit Button -->
							<div class="col-lg-12">
								<button type="submit" class="btn btn-primary me-2">Submit</button>
								<a href="javascript:void(0);" class="btn btn-secondary">Cancel</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<?php require_once('layout/_js.php'); ?>
</body>

</html>
