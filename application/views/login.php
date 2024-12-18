<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
	<meta name="description" content="POS - Bootstrap Admin Template">
	<meta name="keywords"
		content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
	<meta name="author" content="Dreamguys - Bootstrap Admin Template">
	<meta name="robots" content="noindex, nofollow">
	<title>Login</title>

	<?php require_once('layout/_css.php');?>
</head>

<body class="account-page">

	<div class="main-wrapper">
		<div class="account-content">
			<div class="row">
				<div class="col-md-6 login-wrapper">
					<div class="login-content">
						<div class="login-userset">
							<div class="login-logo">
								<img src="<?= base_url('assets/admin/')?>assets/img/logo.png" alt="img">
							</div>
							<div class="login-userheading">
								<form action="<?= base_url('auth/login/');?>" method="post">
									<h3>Login</h3>
									<h4>Please login to your account</h4>
							</div>
							<div id="menghilang">
								<?php echo $this->session->flashdata('alert',true); ?>
							</div>
							<div class="form-login">
								<label>Username</label>
								<div class="form-addons">
									<input type="text" placeholder="Enter your username" name="username">
									<img src="<?= base_url('assets/admin/')?>assets/img/icons/mail.svg" alt="img">
								</div>
							</div>
							<div class="form-login">
								<label>Password</label>
								<div class="pass-group">
									<input type="password" class="pass-input" name="password" placeholder="Enter your password">
									<span class="fas toggle-password fa-eye-slash"></span>
								</div>
							</div>
							<div class="form-login">
								<button class="btn btn-login" type="submit" >Sing In</button>
							</div>
							<div class="signinform text-center">
								<h4>Don’t have an account? <a href="signup.html" class="hover-a">Sign Up</a></h4>
							</div>
							<div class="form-setlogin">
								<h4>Or sign up with</h4>
							</div>
							</form>
						</div>
					</div>
					<div class="col-md-6 login-img">
						<img src="<?= base_url('assets/admin/')?>assets/img/login.jpg" alt="img">
						<!-- <img src="<?= base_url('assets/admin/')?>assets/img/login.gif" alt="img"> -->
					</div>
				</div>
			</div>
		</div>

		<?php require_once('layout/_js.php');?>
</body>

</html>
