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
					<h6>Add User</h6>
				</div>
			</div>

			<div class="card">
				<form action="<?= base_url('user/simpan')?>" method="post">
					<div class="card-body">
						<div class="row">
							<div class="col-lg-6 col-sm-6 col-12">
								<div class="form-group">
									<label>Username</label>
									<input type="text" id="username" name="username" required>
								</div>
								<div class="form-group">
									<label>NoHp</label>
									<input type="text" id="nohp" name="nohp" required>
								</div>
							</div>

							<div class="col-lg-6 col-sm-6 col-12">
								<div class="form-group">
									<label>Nama</label>
									<input type="text" id="name" name="nama" required>
								</div>
								<div class="form-group">
									<label>Role</label>
									<select class="form-select" aria-label="Default select example" id="level" name="level" required>
										<option value="" hidden style="color: #808080;">pilih salah satu</option>
										<option value="Admin">Admin</option>
										<option value="User">User</option>
									</select>

								</div>
							</div>

							<div class="form-group">
								<label>Password</label>
								<div class="pass-group">
                  <span class="fas toggle-password fa-eye-slash"></span>
									<input type="password" class=" pass-input" name="password" required>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-sm-6 col-12">

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
