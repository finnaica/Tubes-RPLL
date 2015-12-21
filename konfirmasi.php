<?php
include('koneksi.php');
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Situs jual beli atribut militer online</title>
</head>

<body>
<table width="80%" border="0" align="center" cellpadding="10" cellspacing="0">
  <tr>
    <td align="center" bgcolor="#33CC00"><strong><font size="2" face="Tahoma, Geneva, sans-serif" color="#FFCC00">Situs jual beli atribut militer online</font></strong></td>
    <td bgcolor="#33CC00"><table width="200" border="0" align="right" cellpadding="0" cellspacing="0">
      <tr>
        <td><a href="bantuan.php"><img src="gambar/bantuan.jpg" width="99" height="26" /></a></td>
        <td><a href="status transaksi.php"><img src="gambar/status transaksi.jpg" width="154" height="26" /></a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td bgcolor="#009900"><img src="gambar/mil.jpg" width="141" height="43" /></td>
    <td align="right" bgcolor="#009900"><a href="index.php"><img src="gambar/home.jpg" width="42" height="35" /></a></td>
  </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#DEE8FF">
    <?php
	if(isset($_POST['Submit'])){
		$nmr = $_GET['no'];
		$nama = $_POST['nama'];
		$no_rek = $_POST['no_rek'];
		$nama_bank = $_POST['bank'];
		$transfer = $_POST['tujuan'];
		$tanggal = $_POST['tanggal'];
		
		$sql = "insert into konfirmasi values('$nmr', '$nama', '$no_rek', '$nama_bank', '$transfer', '$tanggal')";
		mysql_query($sql);
		
		$sql = "update transaksi set status='Dibayar' where no_transaksi='$nmr'";
		mysql_query($sql);
		?>
        <font size=4 face="Broadway, Geneva, sans-serif" color="#666666">Transaksi berhasil dibayar<br />
        Silahkan tunggu pengiriman</font>
        <?php
	}
	else {
	?>
    <form method="post">
    <table bgcolor="#EEEEEE" width="200" border="0" align="center" cellpadding="0" cellspacing="3">
  <tr>
    <td><strong><font size=4 face="Broadway, Geneva, sans-serif" color="#666666">Konfirmasi</font></strong></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><font size=2 face="Tahoma" color="#666666">Nama Pemilik Rek</font></strong></td>
    <td><strong><font size=2 face="Tahoma" color="#666666">No Rekening</font></strong></td>
  </tr>
  <tr>
    <td><input type="text" name="nama" id="nama" /></td>
    <td><input type="text" name="no_rek" id="no_rek" /></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><font size=2 face="Tahoma" color="#666666">Nama Bank</font></strong></td>
    <td><strong><font size=2 face="Tahoma" color="#666666">Transfer ke</font></strong></td>
  </tr>
  <tr>
    <td><input type="text" name="bank" id="bank" /></td>
    <td><input type="text" name="tujuan" id="tujuan" /></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td><strong><font size=2 face="Tahoma" color="#666666">Tanggal</font></strong></td>
    <td rowspan="2" align="center"><input type="submit" name="Submit" value="Submit" /></td>
  </tr>
  <tr>
    <td><input type="date" name="tanggal" /></td>
    </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
</table>
</form>
<?php
	}
?>
</td>
  </tr>
   <tr>
    <td colspan="2" bgcolor="#009900" align="center"><font size="2" face="Tahoma, Geneva, sans-serif" color="#FFCC00">Copyright by Finna Monica 2015</font></td>
  </tr>
</table>
</body>
</html>
