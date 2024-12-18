<div class="sidebar" id="sidebar">
	<div class="sidebar-inner slimscroll">
		<div id="sidebar-menu" class="sidebar-menu">
			<ul>
				<!-- Dashboard -->
				<li class="<?= $this->uri->segment(1) == 'dashboard' ? 'active' : '' ?>">
					<a href="<?= base_url('dashboard'); ?>"><img
							src="<?= base_url('assets/admin/')?>assets/img/icons/dashboard.svg" alt="img"><span> Dashboard</span></a>
				</li>

				<!-- Users -->
				<li class="submenu <?= $this->uri->segment(1) == 'user' ? 'active' : '' ?>">
					<a href="javascript:void(0);"><img src="<?= base_url('assets/admin/')?>assets/img/icons/users1.svg"
							alt="img"><span> Users</span> <span class="menu-arrow"></span></a>
					<ul>
						<li class="<?= $this->uri->segment(2) == 'tambah' && $this->uri->segment(1) == 'user' ? 'active' : '' ?>"><a
								href="<?= base_url('user/tambah') ?>">New User</a></li>
						<li class="<?= $this->uri->segment(2) == '' && $this->uri->segment(1) == 'user' ? 'active' : '' ?>"><a
								href="<?= base_url('user') ?>">Users List</a></li>
					</ul>
				</li>

				<!-- Caraousel -->
				<li class="submenu <?= $this->uri->segment(1) == 'caraousel' ? 'active' : '' ?>">
					<a href="javascript:void(0);"><i data-feather="award"></i><span> Caraousel </span><span
							class="menu-arrow"></span></a>
					<ul>
						<li
							class="<?= $this->uri->segment(2) == 'tambah' && $this->uri->segment(1) == 'caraousel' ? 'active' : '' ?>">
							<a href="<?= base_url('caraousel/tambah') ?>">Add Caraousel</a></li>
						<li class="<?= $this->uri->segment(2) == '' && $this->uri->segment(1) == 'caraousel' ? 'active' : '' ?>"><a
								href="<?= base_url('caraousel') ?>">Caraousel List</a></li>
					</ul>
				</li>

				<!-- Konten -->
				<li class="<?= $this->uri->segment(1) == 'kritik' ? 'active' : '' ?>">
					<a href="<?= base_url('kritiksaran'); ?>"><i data-feather="box"></i><span> Kritik </span></a>
				</li>

				<!-- Kategori -->
				<li class="submenu <?= $this->uri->segment(1) == 'kategori' ? 'active' : '' ?>">
					<a href="javascript:void(0);"><img src="<?= base_url('assets/admin/')?>assets/img/icons/settings.svg"
							alt="img"><span> Kategori</span> <span class="menu-arrow"></span></a>
					<ul>
						<li
							class="<?= $this->uri->segment(2) == 'tambah' && $this->uri->segment(1) == 'kategori' ? 'active' : '' ?>">
							<a href="<?= base_url('kategori/tambah') ?>">Add Kategori</a></li>
						<li class="<?= $this->uri->segment(2) == '' && $this->uri->segment(1) == 'kategori' ? 'active' : '' ?>"><a
								href="<?= base_url('kategori') ?>">Kategori List</a></li>
					</ul>
				</li>

				<!-- Picproduct -->
				<li class="submenu <?= $this->uri->segment(1) == 'picproduct' ? 'active' : '' ?>">
					<a href="javascript:void(0);"><i data-feather="image"></i>
						<span> Picproduct</span> <span class="menu-arrow"></span></a>
					<ul>
						<li
							class="<?= $this->uri->segment(2) == 'tambah' && $this->uri->segment(1) == 'picproduct' ? 'active' : '' ?>">
							<a href="<?= base_url('picproduct/tambah') ?>">Add Picproduct</a></li>
					</ul>
				</li>

				<!-- Product -->
				<li class="submenu <?= $this->uri->segment(1) == 'product' ? 'active' : '' ?>">
					<a href="javascript:void(0);"><img src="<?= base_url('assets/admin/')?>assets/img/icons/product.svg"
							alt="img"><span> Product</span> <span class="menu-arrow"></span></a>
					<ul>
						<li
							class="<?= $this->uri->segment(2) == 'tambah' && $this->uri->segment(1) == 'product' ? 'active' : '' ?>">
							<a href="<?= base_url('product/tambah') ?>">Add Product</a></li>
						<li class="<?= $this->uri->segment(2) == '' && $this->uri->segment(1) == 'product' ? 'active' : '' ?>"><a
								href="<?= base_url('product') ?>">Product List</a></li>
					</ul>
				</li>

				<!-- Konfigurasi -->
				<li class="submenu <?= $this->uri->segment(1) == 'konfigurasi' ? 'active' : '' ?>">
					<a href="javascript:void(0);"><i data-feather="alert-octagon"></i><span> Konfigurasi </span><span
							class="menu-arrow"></span></a>
					<ul>
						<li
							class="<?	= $this->uri->segment(2) == 'tambah' && $this->uri->segment(1) == 'konfigurasi' ? 'active' : '' ?>">
							<a href="<?= base_url('konfigurasi/tambah') ?>">Add Konfigurasi</a></li>
						<li class="<?= $this->uri->segment(2) == '' && $this->uri->segment(1) == 'konfigurasi' ? 'active' : '' ?>">
							<a href="<?= base_url('konfigurasi') ?>">Konfigurasi List</a></li>
					</ul>
				</li>

				<li class="submenu <?= $this->uri->segment(1) == 'transaksi' ? 'active' : '' ?>">
					<a href="javascript:void(0);">
						<i data-feather="credit-card"></i>
						<span> Transaksi </span>
						<span class="menu-arrow"></span>
					</a>
					<ul>
						<li
							class="<?= $this->uri->segment(2) == 'masuk' && $this->uri->segment(1) == 'transaksi' ? 'active' : '' ?>">
							<a href="<?= base_url('transaksi/masuk') ?>">Pesanan Masuk</a>
						</li>
						<li
							class="<?= $this->uri->segment(2) == 'dikonfirmasi' && $this->uri->segment(1) == 'transaksi' ? 'active' : '' ?>">
							<a href="<?= base_url('transaksi/dikonfirmasi') ?>">Pesanan Dikonfirmasi</a>
						</li>
						<li
							class="<?= $this->uri->segment(2) == 'dikemas' && $this->uri->segment(1) == 'transaksi' ? 'active' : '' ?>">
							<a href="<?= base_url('transaksi/dikemas') ?>">Pesanan Dikemas</a>
						</li>
						<li
							class="<?= $this->uri->segment(2) == 'dikirim' && $this->uri->segment(1) == 'transaksi' ? 'active' : '' ?>">
							<a href="<?= base_url('transaksi/dikirim') ?>">Pesanan Dikirim</a>
						</li>
						<li
							class="<?= $this->uri->segment(2) == 'perjalanan' && $this->uri->segment(1) == 'transaksi' ? 'active' : '' ?>">
							<a href="<?= base_url('transaksi/dalam_perjalanan') ?>">Pesanan Dalam Perjalanan</a>
						</li>
						<li
							class="<?= $this->uri->segment(2) == 'selesai' && $this->uri->segment(1) == 'transaksi' ? 'active' : '' ?>">
							<a href="<?= base_url('transaksi/selesai') ?>">Pesanan Selesai</a>
						</li>
					</ul>
				</li>


			</ul>
		</div>
	</div>
</div>
