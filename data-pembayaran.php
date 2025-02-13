<?php
session_start();

if(!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}
require 'function.php';
$pembayaran = query("SELECT * FROM dev_bayar_m");
?>
<html>
	<head>
		<title> Data Pembayaran </title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<!-- DataTables CSS -->
		<link href="css/addons/datatables.min.css" rel="stylesheet">
		<!-- DataTables JS -->
		<script href="js/addons/datatables.min.js" rel="stylesheet"></script>
		<!-- DataTables Select CSS -->
		<link href="css/addons/datatables-select.min.css" rel="stylesheet">
		<!-- DataTables Select JS -->
		<script href="js/addons/datatables-select.min.js" rel="stylesheet"></script>		
		<link href="css/simple-sidebar.css" rel="stylesheet">
	</head>
	<body>
		<div class="d-flex" id="wrapper">
			<!-- Sidebar -->
			<div class="bg-dark border-right" id="sidebar-wrapper">
					<div class="list-group list-group-flush">
						<a href="index.php" class="list-group-item list-group-item-action bg-dark text-light">Dashboard</a>
						<a href="data-siswa.php" class="list-group-item list-group-item-action bg-dark text-light">Data Siswa</a>
						<a href="data-tagihan.php" class="list-group-item list-group-item-action bg-dark text-light">Data Tagihan</a>
						<a href="data-pembayaran.php" class="list-group-item list-group-item-action bg-dark text-light">Data Pembayaran</a>
					</div>
			</div>
			<!-- /#sidebar-wrapper -->
			<!-- Page Content -->
			<div id="page-content-wrapper">
				<nav class="navbar navbar-expand-lg navbar-light bg-danger border-bottom">
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto mt-2 mt-lg-0">
							<li class="nav-item active">
								<a class="nav-link text-light" href="logout.php">Logout</a>
							</li>
						</ul>
					</div>
				</nav>
			<div class="container-fluid">
				<h1 class="mt-4">Data Pembayaran</h1>
				<a class="btn btn-success" href="tambah-pembayaran.php">Tambah Data</a>
				<div class="nav justify-content-end">
					<label>Search:
						<form action="" method="post">
							<input type="text" class="form-control form-control-sm" placeholder="" name="keyword" id="keyword">
						</form>
					</label>
				</div>
				<div id="container">
				<table id="dtBasicExample" class="table table-striped table-bordered autoWidth" cellspacing="0" width="100%">
					<thead class= "thead-dark">
						<tr>
							<th class="th-sm">No Pembayaran</th>
							<th class="th-sm">NIM</th>
							<th class="th-sm">Tanggal</th>
							<th class="th-sm">Keterangan</th>
							<th class="th-sm">Periode</th>
							<th class="th-sm">Aksi</th>
						</tr>
					</thead>
					<?php foreach( $pembayaran as $row ) : ?>
					<tbody>
						<tr>
							<td><?= $row["no_bayar"]; ?></td>
							<td><?= $row["nim"]; ?></td>
							<td><?= $row["tanggal"]; ?></td>
							<td><?= $row["keterangan"]; ?></td>
							<td><?= $row["periode"]; ?></td>
							<td>
								<a class="btn btn-warning" href="edit-pembayaran.php?no_bayar=<?= $row["no_bayar"]; ?>&nim=<?=$row["nim"]?>">Change</a>
								<a class="btn btn-danger" href="delete-pembayaran.php?no_bayar=<?= $row["no_bayar"]; ?>">Delete</a>
							</td>
						</tr>
					</tbody>
					<?php endforeach; ?>
				</table>
				</div>
			</div>
		</div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->
		<script src="js/cariPembayaran.js"></script>
		<script>
			<!-- Menu Toggle Script -->
			$("#menu-toggle").click(function(e) {
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
			});
		</script>
	</body>
</html>