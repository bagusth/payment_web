<?php
require 'function.php';

$no_tagihan = $_GET["no_tagihan"];

if( deleteTag($no_tagihan) > 0 ) {
		echo "
			<script>
				alert('Ciee berhasil');
				document.location.href = 'data-tagihan.php';
			</script>
			";
	} else {
		echo "
			<script>
				alert('Waduu gagal gan');
				document.location.href = 'data-tagihan.php';
			</script>
			";
	}
?>