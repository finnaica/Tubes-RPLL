<?php
include('koneksi.php');
$nmr = $_GET['no'];
        $sql = "update transaksi set status='Diterima' where no_transaksi='$nmr'";
		mysql_query($sql);
?>
Berhasil diterima