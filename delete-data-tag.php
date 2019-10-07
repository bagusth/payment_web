<?php
require 'function.php';

$no_tagihan = $_GET["no_tagihan"];
$nilai = $_GET["nilai"];

if( deleteDataTag($nilai) > 0 ) {
		echo "
			<script>
				alert('Success');
				document.location.href = 'edit-tagihan.php?no_tagihan=$no_tagihan';
			</script>
			";
	} else {
		echo "
			<script>
				alert('Failed');
				document.location.href = 'edit-tagihan.php?no_tagihan=$no_tagihan';
			</script>
			";
	}
?>