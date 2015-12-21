<?php
include('koneksi.php');
$nmr = $_GET['no'];
        $sql = "update transaksi set status='Dikirim' where no_transaksi='$nmr'";
		mysql_query($sql);
?>
Berhasil dikirim