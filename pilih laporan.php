<?php
include('koneksi.php');
session_start();

if(isset($_SESSION['login_admin'])){
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SI Military - Administrator</title>
</head>

<body>
<table width="80%" border="0" align="center" cellpadding="10" cellspacing="0">
  <tr>
    <td align="center" bgcolor="#33CC00"><strong><font size="2" face="Tahoma, Geneva, sans-serif" color="#FFCC00">Situs jual beli atribut militer online</font></strong></td>
    <td align="right" bgcolor="#33CC00">
    <form name="flogout" action="" method="post">
    <table width="200" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="right"><input type="submit" name="logout" value="Logout" /></td>
        <td><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Halo, </font></td>
        <td><font size=2 face="Broadway, Geneva, sans-serif" color="#666666"><?php echo $_SESSION['login_admin']; ?></font></td>
      </tr>
    </table></form>
    <?php
	if(isset($_POST['logout'])){
		unset($_SESSION['login_admin']);
		echo "<script>alert('Anda Berhasil Logout');window.location='login_admin.php'</script>";
	}
	?>
    </td>
  </tr>
  <tr>
    <td bgcolor="#009900"><img src="gambar/mil.jpg" width="141" height="43" /></td>
    <td align="right" bgcolor="#009900"><a href="utama admin.php"><img src="gambar/home.jpg" width="42" height="35" /></a></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#DEE8FF"><table width="60%" border="0" align="center" cellpadding="4" cellspacing="0">
      <tr>
        <td colspan="2" align="center" bgcolor="#FFFFFF"><img src="gambar/pilih laporan.jpg" width="131" height="67" /></td>
        </tr>
      <tr>
        <td align="center" bgcolor="#FFFFFF"><a href="laporan barang.php"><img src="gambar/laporan barang.jpg" width="114" height="51" /></a></td>
        <td align="center" bgcolor="#FFFFFF"><a href="laporan transaksi.php"><img src="gambar/laporan transaksi.jpg" width="139" height="51" /></a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#009900" align="center"><font size="2" face="Tahoma, Geneva, sans-serif" color="#FFCC00">Copyright by Finna Monica 2015</font></td>
  </tr>
</table>
</body>
</html>

<?php
}
else {
		echo "<script>window.location='login_admin.php';</script>";
}
?>
