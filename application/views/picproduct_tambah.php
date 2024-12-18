<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin - Manage Products</title>
    <?php require_once('layout/_css.php'); ?>
</head>

<body>
    <?php require_once('layout/_navbar.php'); ?>
    <?php require_once('layout/_sidebar.php'); ?>
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Product Management</h4>
                    <h6>Add Product</h6>
                </div>
            </div>

            <div class="card">
                <form action="<?= base_url('picproduct/simpan_img') ?>" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="row">
                            <!-- Upload Foto -->
                            <div class="col-lg-12 col-sm-12 col-12">
                                <div class="form-group">
                                    <label>Upload Foto Produk (bisa banyak)</label>
                                    <input type="file" id="picture" name="picture[]" class="form-control" multiple required>
                                </div>
                            </div>

                            <!-- Select Produk -->
                            <div class="mb-3">
							<label for="exampleInputtext1" class="form-label">Pilih Product</label>
							<select name="product_id" class="form-select form-control" id="defaultSelect">
								<option value="" disabled selected>Pilih Product</option>
                                <?php foreach($prdct as $prd){ ?>
								<option value="<?= $prd['product_id'] ?>" ><?= $prd['nama'] ?></option>
                                <?php } ?>
							</select>
						</div>

                            <!-- Submit Button -->
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-primary me-2">Submit</button>
                                <a href="javascript:void(0);" class="btn btn-secondary">Cancel</a>
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
