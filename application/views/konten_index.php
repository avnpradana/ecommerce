<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Konten Management</title>
    <?php require_once('layout/_css.php'); ?>
</head>

<body>
    <!-- Navbar dan Sidebar -->
    <?php require_once('layout/_navbar.php'); ?>
    <?php require_once('layout/_sidebar.php'); ?>

    <div class="page-wrapper">
        <div class="content">
            <div class="card">
                <div class="card-body">
                    <!-- Header dan Tombol Tambah -->
                    <div class="page-header">
                        <div class="page-title">
                            <h4>Konten List</h4>
                            <h6>Manage your Konten</h6>
                        </div>
                        <div class="page-btn">
                            <a href="<?= base_url('konten/tambah') ?>" class="btn btn-added">
                                <img src="<?= base_url() ?>assets/admin/assets/img/icons/plus.svg" alt="Add"> Add Konten
                            </a>
                        </div>
                    </div>

                    <!-- Tabel Carousel -->
                    <div class="table-responsive">
                        <table class="table datanew dataTable">
                            <thead>
                                <tr>
                                    <th style="width: 5%;">
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </th>
                                    <th style="width: 25%;">Judul</th>
                                    <th style="width: 40%;">Foto</th>
                                    <th style="width: 10%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($konten as $ko): ?>
                                <!-- Looping data carousel -->
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td><?= $ko->judul; ?></td>
                                    <td>
                                        <img src="<?= base_url('upload/fotokonten/' . $ko->foto) ?>"  width="250">
                                    </td>
                                    <td>
                                        <!-- Tombol Edit -->
                                        <button class="btn p-0 me-2" data-bs-toggle="modal" data-bs-target="#editCarousel<?= $ko->id_konten; ?>">
                                            <img src="<?= base_url() ?>assets/admin/assets/img/icons/edit.svg" alt="Edit">
                                        </button>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editCarousel<?= $ko->id_konten; ?>" tabindex="-1" aria-labelledby="editCarouselLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Carousel</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="<?= base_url('konten/update') ?>" method="post" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            <input type="hidden" name="id_konten" value="<?= $ko->id_konten; ?>">
                                                            <div class="mb-3">
                                                                <label for="judul" class="form-label">Judul</label>
                                                                <input type="text" class="form-control" id="judul" name="judul" value="<?= $ko->judul; ?>" required>
                                                            </div>
                                                            

                                                            <div class="mb-3">
                                                                <label for="foto" class="form-label">Foto</label>
                                                                <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                                                                <small>Jika tidak diubah, biarkan kosong</small>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Tombol Hapus -->
                                        <a href="javascript:void(0);" onclick="confirmDeleteCarousel(<?= $ko->id_konten; ?>)" class="btn-sm">
                                            <img src="<?= base_url() ?>assets/admin/assets/img/icons/delete.svg" alt="Delete">
                                        </a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="dataTables_paginate paging_numbers">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php require_once('layout/_js.php'); ?>

    <script>
        function confirmDeleteCarousel(id) {
            if (confirm('Apakah Anda yakin ingin menghapus carousel ini?')) {
                window.location.href = '<?= base_url('konten/hapus/') ?>' + id;
            }
        }
    </script>
</body>

</html>
