<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin - Tambah Konfigurasi</title>
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
					<h4>Manajemen Konfigurasi</h4>
					<h6>Tambah Konfigurasi</h6>
				</div>
			</div>

			<div class="card">
				<form action="<?= base_url('konfigurasi/simpan') ?>" method="post">
					<div class="card-body">
						<div class="row">
							<!-- Judul Website -->
							<div class="col-lg-12 col-sm-12 col-12">
								<div class="form-group">
									<label>Judul Website</label>
									<input type="text" id="judul_website" name="judul_website" class="form-control"
										placeholder="Masukkan judul website" required>
								</div>
							</div>

							<!-- Deskripsi -->
							<div class="col-lg-12 col-sm-12 col-12">
								<div class="form-group">
									<label>Profil Website</label>
									<textarea id="profil_website" name="profil_website" class="form-control" rows="4"
										placeholder="Masukkan deskripsi konfigurasi" required></textarea>
								</div>
							</div>

							<!-- Alamat -->
							<div class="col-lg-6 col-sm-6 col-12">
								<div class="form-group">
									<label>Alamat</label>
									<textarea id="alamat" name="alamat" class="form-control" rows="3"
										placeholder="Masukkan alamat lengkap" required></textarea>
								</div>
							</div>

							<div class="col-lg-6 col-sm-6 col-12">
								<div class="form-group">
									<label>Status</label>
									<select id="status" name="status" class="form-control" required>
										<option value="" disabled selected>Pilih Status</option>
										<option value="aktif">Aktif</option>
										<option value="nonaktif">Non-Aktif</option>
									</select>
								</div>
							</div>

							<div class="col-lg-6 col-sm-6 col-12">
								<div class="form-group">
									<label>Instagram</label>
									<textarea id="instagram" name="instagram" class="form-control" rows="3"
										placeholder="Masukkan alamat lengkap" required></textarea>
								</div>
							</div>
							<div class="col-lg-6 col-sm-6 col-12">
								<div class="form-group">
									<label>Facebook</label>
									<textarea id="facebook" name="facebook" class="form-control" rows="3"
										placeholder="Masukkan alamat lengkap" required></textarea>
								</div>
							</div>

							<!-- Email -->
							<div class="col-lg-6 col-sm-6 col-12">
								<div class="form-group">
									<label>Email</label>
									<input type="email" id="email" name="email" class="form-control"
										placeholder="Masukkan email" required>
								</div>
							</div>

							<!-- Telepon -->
							<div class="col-lg-6 col-sm-6 col-12">
								<div class="form-group">
									<label>Telepon</label>
									<input type="text" id="no_wa" name="no_wa" class="form-control"
										placeholder="Masukkan nomor telepon" required>
								</div>
							</div>

							<!-- Submit Button -->
							<div class="col-lg-12">
								<button type="submit" class="btn btn-primary me-2">Simpan</button>
								<a href="<?= base_url('konfigurasi') ?>" class="btn btn-secondary">Batal</a>
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
