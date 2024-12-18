<!-- Footer Section Begin -->
<footer class="footer">
	<div class="container">
		<div class="row">
			<!-- Logo & About Section -->
			<div class="col-lg-3 col-md-6 col-sm-6">
				<?php foreach($konfigurasi as $k) { 
                    if ($k['status'] == 'aktif') {  // Check if status is aktif
                ?>
				<div class="footer__about">
					<div class="footer__widget">
						<h6 data-filter="<?= $k['judul_website'] ?>"><?= $k['judul_website'] ?></h6>
					</div>
					<p data-filter="<?= $k['profil_website'] ?>"><?= $k['profil_website'] ?></p>
					<!-- <a href="#"><img src="<?= base_url('userr/') ?>img/payment.png" alt="Payment Methods"></a> -->
				</div>
				<?php }} ?>
			</div>

			<!-- Social Media Section -->
			<div class="col-lg-2 col-md-3 col-sm-6">
				<div class="footer__widget">
					<h6>Sosial Media</h6>
					<ul>
						<?php foreach($konfigurasi as $k) { 
                            if ($k['status'] == 'aktif') {  // Check if status is aktif
                        ?>
						<li data-filter="<?= $k['instagram'] ?>">
							<a href="<?= $k['instagram'] ?>" target="_blank">
								<i class="fab fa-instagram"></i> Instagram
							</a>
						</li>
						<li data-filter="<?= $k['facebook'] ?>">
							<a href="<?= $k['facebook'] ?>" target="_blank">
								<i class="fab fa-facebook"></i> Facebook
							</a>
						</li>
						<li data-filter="<?= $k['no_wa'] ?>">
							<a href="https://wa.me/<?= $k['no_wa'] ?>" target="_blank">
								<i class="fab fa-whatsapp"></i> WhatsApp
							</a>
						</li>
						<?php }} ?>
					</ul>
				</div>
			</div>

			<!-- Contact Info Section -->
			<div class="col-lg-3 col-md-4 col-sm-4">
				<div class="footer__widget">
					<h6>About Me</h6>
					<ul>
						<?php foreach($konfigurasi as $k) { 
                            if ($k['status'] == 'aktif') {  // Check if status is aktif
                        ?>
						<li data-filter="<?= $k['email'] ?>">
							<a href="mailto:<?= $k['email'] ?>">
								<i class="fas fa-envelope"></i> <?= $k['email'] ?>
							</a>
						</li>
						<li data-filter="<?= $k['alamat'] ?>">
							<a href="https://www.google.com/maps?q=<?= urlencode($k['alamat']) ?>" target="_blank">
								<i class="fas fa-map-marker-alt"></i> <?= $k['alamat'] ?>
							</a>
						</li>
						<?php }} ?>
					</ul>
				</div>
			</div>

			<div class="col-lg-3 offset-lg-1 col-md-6 col-sm-6">
				<div class="footer__widget">
					<h6>Kritik</h6>
					<div class="footer__newslatter">
						<p>Saran anda tentang website ini</p>
						<form action="<?= base_url('kritiksaran/simpan'); ?>" method="post">
							<input type="kritik_saran" name="saran" placeholder="Masukkan saran anda" required>
							<button type="submit"><i class="fas fa-paper-plane"></i></span></button>
						</form>
					</div>
				</div>
			</div>
		</div>

		<!-- Copyright Section Begin -->
		<!-- <div class="row">
			<div class="col-lg-12 text-center">
				<div class="footer__copyright__text">
					<p>Copyright ©
						<script>
							document.write(new Date().getFullYear());

						</script> 2024
						All rights reserved | This template is made with <i class="fa fa-heart-o"
							aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
					</p>
				</div>
			</div>
		</div> -->
		<!-- Copyright Section End -->
	</div>
</footer>
<!-- Footer Section End -->
