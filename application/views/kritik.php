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
		<div class="content container-fluid">

			<div class="page-header">
				<div class="row">
					<div class="col">
						<h3 class="page-title">Kritik dan Saran</h3>
						<ul class="breadcrumb">
							
						</ul>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div class="card">
						
						<div class="card-body">
							<div class="table-responsive">
								<div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

									<table class="table datanew dataTable no-footer" id="DataTables_Table_0" role="grid"
										aria-describedby="DataTables_Table_0_info">
										<thead>
											<tr role="row">
												<th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
													aria-sort="ascending" aria-label="Name: activate to sort column descending"
													style="width: 136.406px;">Nama</th>
												<th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
													aria-label="Position: activate to sort column ascending" style="width: 229.396px;">Kritik dan
													Saran
												</th>

											</tr>
										</thead>
										<tbody>
											<?php foreach ($kritik as $k){ ?>
											<tr class="odd">
												<td class="sorting_1"><?= $k['nama']; ?></td>
												<td><?= $k['saran']; ?></td>
											</tr>
											<?php } ?>
										</tbody>
									</table>

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<?php require_once('layout/_js.php'); ?>

</body>

</html>
