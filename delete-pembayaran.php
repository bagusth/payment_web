<?php
require 'function.php';

$no_bayar = $_GET["no_bayar"];

if( deletePem($no_bayar) > 0 ) {
		echo "
			<script>
				alert('Ciee berhasil');
				document.location.href = 'data-pembayaran.php';
			</script>
			";
	} else {
		echo "
			<script>
				alert('Waduu gagal gan');
				document.location.href = 'data-pembayaran.php';
			</script>
			";
	}
?>