<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin - Tambah Carousel</title>
    <?php require_once('layout/_css.php'); ?>
</head>

<body>
    <?php require_once('layout/_navbar.php'); ?>
    <?php require_once('layout/_sidebar.php'); ?>
    <?php require_once('layout/_content.php'); ?>
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Manajemen Konten</h4>
                    <h6>Tambah Konten</h6>
                </div>
            </div>

            <div class="card">
                <form action="<?= base_url('konten/simpan') ?>" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <!-- Judul -->
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Judul</label>
                                    <input type="text" id="judul" name="judul" class="form-control" placeholder="Masukkan judul" required>
                                </div>
                            </div>
                            
                            <!-- Foto -->
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Foto 1:1</label>
                                    <input type="file" id="foto" name="foto[]" class="form-control" required>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary me-2">Simpan</button>
                                <a href="<?= base_url('konten') ?>" class="btn btn-secondary">Batal</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php require_once('layout/_js.php'); ?>
</body>

</html>
