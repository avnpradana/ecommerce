<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="POS - Bootstrap Admin Template">
	<meta name="keywords" content="admin, bootstrap, business, login, responsive, HTML">
	<meta name="author" content="Dreamguys - Bootstrap Admin Template">
	<meta name="robots" content="noindex, nofollow">
	<title>Login</title>

	<?php require_once('layout/_css.php'); ?>
	<style>
		body {
			font-family: 'Roboto', sans-serif;
			background-color: #eef2f7;
			margin: 0;
		}

		.login-wrapper {
			display: flex;
			align-items: center;
			justify-content: center;
			height: 750px;
			padding: 15px;
		}

		.login-content {
			background: linear-gradient(135deg, #ffffff, #f9f9f9);
			padding: 40px;
			border-radius: 16px;
			box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
			width: 100%;
			max-width: 420px;
			animation: fadeIn 0.5s ease;
		}

		@keyframes fadeIn {
			from {
				opacity: 0;
				transform: scale(0.9);
			}

			to {
				opacity: 1;
				transform: scale(1);
			}
		}

		.login-logo img {
			display: block;
			margin: 0 auto 25px;
			max-width: 150px;
		}

		.login-userheading h3 {
			font-size: 28px;
			font-weight: bold;
			text-align: center;
			color: #333;
			margin-bottom: 10px;
		}

		.login-userheading h4 {
			font-size: 16px;
			color: #666;
			text-align: center;
			margin-bottom: 30px;
		}

		.form-login {
			margin-bottom: 20px;
		}

		.form-login label {
			display: block;
			font-weight: 500;
			color: #555;
			margin-bottom: 8px;
		}

		.form-login input {
			width: 100%;
			padding: 12px;
			border: 1px solid #ddd;
			border-radius: 8px;
			font-size: 14px;
			transition: border-color 0.3s, box-shadow 0.3s;
		}

		.form-login input:focus {
			border-color: #007bff;
			outline: none;
			box-shadow: 0 0 6px rgba(0, 123, 255, 0.5);
		}

		.btn-login {
			width: 100%;
			padding: 14px;
			background-color: orange;
			color: #ffffff;
			border: none;
			border-radius: 8px;
			font-size: 16px;
			font-weight: bold;
			cursor: pointer;
			transition: background-color 0.3s;
		}


		.signinform h4 {
			font-size: 14px;
			text-align: center;
			margin-top: 20px;
		}

		.signinform a {
			color: #007bff;
			text-decoration: none;
			font-weight: 500;
		}



		.form-setlogin h4 {
			font-size: 14px;
			text-align: center;
			color: #888;
			margin-top: 25px;
		}

		.modal {
			display: none;
			position: fixed;
			z-index: 1000;
			left: 0;
			top: 0;
			width: 100%;
			height: 100%;
			overflow: auto;
			background-color: rgba(0, 0, 0, 0.6);
			justify-content: center;
			align-items: center;
			animation: fadeIn 0.3s ease;
		}

		.modal-content {
			background: #fff;
			padding: 25px;
			border-radius: 12px;
			width: 90%;
			max-width: 400px;
			box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
			position: relative;
			animation: zoomIn 0.3s ease;
		}

		@keyframes zoomIn {
			from {
				transform: scale(0.8);
			}

			to {
				transform: scale(1);
			}
		}

		.close {
			color: #aaa;
			position: absolute;
			right: 15px;
			top: 10px;
			font-size: 24px;
			font-weight: bold;
			cursor: pointer;
		}

		.close:hover,
		.close:focus {
			color: #000;
			text-decoration: none;
		}

	</style>
</head>

<body class="account-page">

	<div class="main-wrapper">
		<div class="account-content">
			<div class="row">
				<div class="col-md-12 login-wrapper">
					<div class="login-content">
						<div class="login-userset">
							<div class="login-logo">
								<img src="<?= base_url('assets/admin/')?>assets/img/logo.png" alt="Logo">
							</div>
							<div class="login-userheading">
								<h3>Login</h3>
								<h4>Please login to your account</h4>
							</div>
							<form action="<?= base_url('auth/login/'); ?>" method="post">
								<div id="menghilang">
									<?php echo $this->session->flashdata('alert', true); ?>
								</div>
								<div class="form-login">
									<label for="username">Username</label>
									<div class="form-addons">
										<input type="text" id="username" name="username" placeholder="Enter your username">
									</div>
								</div>
								<div class="form-login">
									<label for="password">Password</label>
									<div class="pass-group">
										<input type="password" id="password" name="password" placeholder="Enter your password">
									</div>
								</div>
								<div class="form-login">
									<button class="btn btn-login" type="submit">Sign In</button>
								</div>
								<div class="signinform">
									<h4>Don’t have an account? <a href="#" class="hover-a" onclick="openModal()">Sign Up</a></h4>
								</div>
								<div class="form-setlogin">
									<h4>Or sign up with</h4>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="signupModal" class="modal">
			<div class="modal-content">
				<span class="close" onclick="closeModal()">&times;</span>
				<div class="login-userheading">
					<h3>Sign Up</h3>
					<h4>Please login to your account</h4>
				</div>
				<form action="<?= base_url('auth/simpan/'); ?>" method="post">
					<div class="form-login">
						<label for="signup-username">Username</label>
						<input type="text" id="signup-username" name="username" placeholder="Enter your username">
					</div>
					<div class="form-login">
						<label for="signup-username">Nama</label>
						<input type="text" id="signup-username" name="nama" placeholder="Enter your username">
					</div>
					<div class="form-login">
						<label for="signup-password">Password</label>
						<input type="password" id="signup-password" name="password" placeholder="Enter your password">
					</div>
					<div class="form-login">
						<button class="btn btn-login" type="submit">Register</button>
					</div>
				</form>
			</div>
		</div>

		<?php require_once('layout/_js.php'); ?>

		<script>
			function openModal() {
				document.getElementById('signupModal').style.display = 'flex';
			}

			function closeModal() {
				document.getElementById('signupModal').style.display = 'none';
			}

		</script>
	</div>

</body>

</html>
