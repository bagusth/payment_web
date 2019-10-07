<?php
require 'function.php';

$nim = $_GET["nim"];

if( delete($nim) > 0 ) {
		echo "
			<script>
				alert('Ciee berhasil');
				document.location.href = 'data-siswa.php';
			</script>
			";
	} else {
		echo "
			<script>
				alert('Waduu gagal gan');
				document.location.href = 'data-siswa.php';
			</script>
			";
	}
?>