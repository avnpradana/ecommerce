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
			<div class="page-header">
				<div class="page-title">
					<h4>User Management</h4>
					<h6>Add Kategori</h6>
				</div>
			</div>
			<div class="card">
				<form action="<?= base_url('kategori/simpan')?>" method="post">
					<div class="card-body">
						<div class="row">
							<div class="col-lg-12 col-sm-6 col-12">
								<div class="form-group">
									<label>Username</label>
									<input type="text" id="nama_kategori" name="nama_kategori" required>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<input class="btn btn-submit me-2" type="submit" value="Submit">
							<a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>
						</div>
					</div>
			</div>
		</div>
	</div>

	<?php require_once('layout/_js.php');?>





</body>

</html>
