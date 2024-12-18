<script src="<?= base_url('assets/admin/')?>assets/js/jquery-3.6.0.min.js"></script>
<script src="<?= base_url('assets/admin/')?>assets/js/feather.min.js"></script>
<script src="<?= base_url('assets/admin/')?>assets/js/jquery.slimscroll.min.js"></script>
<script src="<?= base_url('assets/admin/')?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/admin/')?>assets/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/admin/')?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url('assets/admin/')?>assets/plugins/apexchart/apexcharts.min.js"></script>
<script src="<?= base_url('assets/admin/')?>assets/plugins/apexchart/chart-data.js"></script>
<script src="<?= base_url('assets/admin/')?>assets/js/script.js"></script>
<script src="<?= base_url('assets/admin/')?>assets/plugins/select2/js/select2.min.js"></script>
<script src="<?= base_url('assets/admin/')?>assets/js/moment.min.js"></script>
<script src="<?= base_url('assets/admin/')?>assets/js/bootstrap-datetimepicker.min.js"></script>
<script src="<?= base_url('assets/admin/')?>assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
<script src="<?= base_url('assets/admin/')?>assets/plugins/sweetalert/sweetalerts.min.js"></script>
<script>
	$('menghilang').delay('slow').slideDown('slow').delay(10000).slideUp(600);

</script>
<script>
	function confirmDelete(id) {
		Swal.fire({
			title: 'Apa kamu yakin?',
			text: "Anda tidak dapat mengembalikannya!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, hapus!'
		}).then((result) => {
			if (result.isConfirmed) {
				window.location.href = `<?= base_url('user/hapus/'); ?>${id}`;
			}
		});
	}

</script>
<script>
	function confirmDeleteKategori(id) {
		Swal.fire({
			title: 'Apa kamu yakin?',
			text: "Anda tidak dapat mengembalikannya!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, hapus!'
		}).then((result) => {
			if (result.isConfirmed) {
				window.location.href = `<?= base_url('kategori/hapus/'); ?>${id}`;
			}
		});
	}

</script>
<script>
	function confirmDeleteProduct(id) {
		Swal.fire({
			title: 'Apa kamu yakin?',
			text: "Anda tidak dapat mengembalikannya!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, hapus!'
		}).then((result) => {
			if (result.isConfirmed) {
				window.location.href = `<?= base_url('product/hapus/'); ?>${id}`;
			}
		});
	}


</script>
<script>
	function confirmDeleteKonfigurasi(id) {
		Swal.fire({
			title: 'Apa kamu yakin?',
			text: "Anda tidak dapat mengembalikannya!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, hapus!'
		}).then((result) => {
			if (result.isConfirmed) {
				window.location.href = `<?= base_url('konfigurasi/hapus/'); ?>${id}`;
			}
		});
	}


</script>

<script>
	function confirmDeleteCaraousel(id) {
		Swal.fire({
			title: 'Apa kamu yakin?',
			text: "Anda tidak dapat mengembalikannya!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Ya, hapus!'
		}).then((result) => {
			if (result.isConfirmed) {
				window.location.href = `<?= base_url('caraousel/hapus/'); ?>${id}`;
			}
		});
	}


</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
