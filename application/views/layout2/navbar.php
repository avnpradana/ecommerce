<!-- Header Section Begin -->
<header class="header">
	<div class="container">
		<div class="row align-items-center">
			<!-- Logo Section -->
			<div class="col-lg-3 col-md-3">
				<div class="header__logo">
					<a href=""><img src="<?= base_url('userr/')?>img/logoo.webp" height="30px" width="150px" alt="Logo"></a>
				</div>
			</div>
			<!-- Navigation Section -->
			<div class="col-lg-6 col-md-6">
				<nav class="header__menu mobile-menu">
					<ul>
						<li class="<?= ($this->uri->segment(1) == 'home') ? 'active' : '' ?>">
							<a href="<?= base_url('home/')?>">Home</a>
						</li>
						<li class="<?= ($this->uri->segment(1) == 'front' && $this->uri->segment(2) == 'shop') ? 'active' : '' ?>">
							<a href="<?= base_url('front/shop')?>">Shop</a>
						</li>
						<li class="<?= ($this->uri->segment(1) == 'pages') ? 'active' : '' ?>">
							<a href="#">Pages</a>
							<ul class="dropdown">
								<!-- <li><a href="./about.html">About Us</a></li> -->
								<li><a href="<?= base_url('front/cart_details/')?>">Cart Details</a></li>
								<li><a href="<?= base_url('front/status/')?>">Pesanan Anda</a></li>


								<?php if($this->session->userdata('level')): ?>
								<li><a href="<?= base_url('auth/logout') ?>">Logout</a></li>
								<?php else: ?>
								<li><a href="<?= base_url('auth/login') ?>">Login</a></li>
								<?php endif; ?>
							</ul>
						</li>
					</ul>
				</nav>
			</div>
			<!-- User and Cart Section -->
			<div class="col-lg-3 col-md-3">

				<div class="header__nav__option d-flex align-items-center justify-content-end">
					<!-- Search Icon -->

					<!-- Search Trigger Button -->
					<a href="#" class="search-switch">
						<img src="<?= base_url('userr/') ?>img/icon/search.png" alt="Search">
					</a>

					<!-- Search Model (hidden by default) -->
					<div class="search-model">
						<div class="h-100 d-flex align-items-center justify-content-center">
							<div class="search-close-switch">+</div>
							<form class="search-model-form">
								<input type="text" id="search-input" placeholder="Search here...">
							</form>
						</div>
					</div>


					<!-- Cart Icon -->
					<a href="<?= base_url('front/cart_details/')?>">
						<img src="<?= base_url('userr/')?>img/icon/cart.png" alt="Cart">
						<span id="cart-count"></span>
					</a>
					<!-- Account Dropdown -->


					<button id="btn-message" class="button-message">
						<div class="content-avatar">
							<div class="status-user"></div>
							<div class="avatar">
								<svg class="user-img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
									<path
										d="M12,12.5c-3.04,0-5.5,1.73-5.5,3.5s2.46,3.5,5.5,3.5,5.5-1.73,5.5-3.5-2.46-3.5-5.5-3.5Zm0-.5c1.66,0,3-1.34,3-3s-1.34-3-3-3-3,1.34-3,3,1.34,3,3,3Z">
									</path>
								</svg>
							</div>
						</div>
						<div class="notice-content">
							<div class="username"><?= $this->session->userdata('username')?></div>
							<div class="lable-message">Hallo, <?= $this->session->userdata('username')?></div>
							<div class="user-id"><?= $this->session->userdata('nama')?></div>
						</div>
					</button>
				</div>
			</div>
		</div>
		<!-- Mobile Menu Icon -->
		<div class="canvas__open"><i class="fa fa-bars"></i></div>
	</div>
</header>
<!-- Header Section End -->
