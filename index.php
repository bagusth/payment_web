<?php
session_start();

if(!isset($_SESSION["login"])) {
	header("Location: login.php");
	exit;
}

require 'function.php';
// $siswa = hitung("SELECT * FROM dev_siswa");
$tagihan = hitung("SELECT * FROM dev_tagihan_m");
$pembayaran = hitung("SELECT * FROM dev_bayar_m");
$siswa = hitung("SELECT * FROM dev_siswa");

$dataPoints = array( 
	array("y" => $siswa, "label" => "Jumlah Siswa" ),
	array("y" => $tagihan, "label" => "Jumlah Tagihan" ),
	array("y" => $pembayaran, "label" => "Jumlah Pembayaran" )
);
?>
<html>
	<head>
		<title> Dashboard </title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
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
			<h5 class="mt-4">Dashboard</h5>
			<div class="row">
				<div class="col-sm-4 pl-2 rounded">
					<div class="card text-center">
						<div class="card-body bg-warning">
						<center><h5 class="card-title text-dark">Data Siswa</h5>
							<img src="icon/cunt.png" width="15%"/>
							<h4><?= $siswa ?></h4>
						</div>
						<div class="card-footer text-muted bg-warning" >
                  			<a id="txt" href="data-siswa.php" class="">Detail</a></center>
                		</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="card text-center" >
						<div class="card-body" style="background-color:#6ebde4;">
						<center><h5 class="card-title">Data Tagihan</h5>
							<img src="icon/tax.png" width="15%"/>
							<h4><?= $tagihan ?></h4></center>
						</div>
						<div class="card-footer text-muted" style="background-color:#6ebde4;" >
                  			<a id="txt" href="data-tagihan.php" class="">Detail</a></center>
                		</div>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="card text-center">
						<div class="card-body" style="background-color:#f06560;">
						<center><h5 class="card-title">Data Pembayaran</h5>
							<img src="icon/credit-card.png" width="15%"/>
							<h4><?= $pembayaran ?></h4></center>
						</div>
						<div class="card-footer text-muted" style="background-color:#f06560;" >
                  			<a id="txt" href="data-pembayaran.php" class="">Detail</a></center>
                		</div>
					</div>
				</div>
				<div id="chartContainer" style="height: 370px; width: 100%;"></div>
				<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
			</div>
		</div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->
  
	  <!-- Menu Toggle Script -->
		<script>
			$("#menu-toggle").click(function(e) {
			e.preventDefault();
			$("#wrapper").toggleClass("toggled");
			});
		</script>
		<script>
			window.onload = function() {
			 
			var chart = new CanvasJS.Chart("chartContainer", {
				animationEnabled: true,
				theme: "light2",
				title:{
					text: ""
				},
				axisY: {
					title: "Data Pembayaran dan Tagihan Siswa"
				},
				data: [{
					type: "column",
					yValueFormatString: "Jumlah #,##0.##",
					dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
				}]
			});
			chart.render();
			 
			}
		</script>
	</body>
</html>