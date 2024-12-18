<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Carousel Management</title>
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
                            <h4>Carousel List</h4>
                            <h6>Manage your carousel</h6>
                        </div>
                        <div class="page-btn">
                            <a href="<?= base_url('caraousel/tambah') ?>" class="btn btn-added">
                                <img src="<?= base_url() ?>assets/admin/assets/img/icons/plus.svg" alt="Add"> Add Carousel
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
                                    <th style="width: 25%;">Sub Judul</th>
                                    <th style="width: 25%;">Deskripsi</th>
                                    <th style="width: 40%;">Foto</th>
                                    <th style="width: 10%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($caraousel as $c): ?>
                                <!-- Looping data carousel -->
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                                    <td><?= $c->judul; ?></td>
                                    <td><?= $c->subjudul; ?></td>
                                    <td><?= $c->deskripsi; ?></td>
                                    <td>
                                        <img src="<?= base_url('upload/caraousel/' . $c->foto) ?>"  width="250">
                                    </td>
                                    <td>
                                        <!-- Tombol Edit -->
                                        <button class="btn p-0 me-2" data-bs-toggle="modal" data-bs-target="#editCarousel<?= $c->id_caraousel; ?>">
                                            <img src="<?= base_url() ?>assets/admin/assets/img/icons/edit.svg" alt="Edit">
                                        </button>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editCarousel<?= $c->id_caraousel; ?>" tabindex="-1" aria-labelledby="editCarouselLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Carousel</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="<?= base_url('caraousel/update') ?>" method="post" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            <input type="hidden" name="id_caraousel" value="<?= $c->id_caraousel; ?>">
                                                            <div class="mb-3">
                                                                <label for="judul" class="form-label">Judul</label>
                                                                <input type="text" class="form-control" id="judul" name="judul" value="<?= $c->judul; ?>" required>
                                                            </div>
                                                            
                                                            <div class="mb-3">
                                                                <label for="subjudul" class="form-label">Sub Judul</label>
                                                                <input type="text" class="form-control" id="subjudul" name="subjudul" value="<?= $c->subjudul; ?>" required>
                                                            </div>

                                                            <div class="mb-3">
                                                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                                                <textarea class="form-control" id="deskripsi" name="deskripsi" required><?= $c->deskripsi; ?></textarea>
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

                                      
                                        <a class=" btn-sm" href="javascript:void(0);"
												onClick="confirmDeleteCaraousel(<?= $c->id_caraousel; ?>)">
												<img src="<?= base_url()?>assets/admin/assets/img/icons/delete.svg" alt="img">
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

    
</body>

</html>
