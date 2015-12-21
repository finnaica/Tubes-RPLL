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
<table width="200" border="0" align="center" cellpadding="10" cellspacing="0">
  <tr>
    <td align="center" bgcolor="#33CC00"><strong><font size="2" face="Tahoma, Geneva, sans-serif" color="#FFCC00">Situs jual beli atribut militer online</font></strong></td>
    <td bgcolor="#33CC00">
    <form name="flogout" action="" method="post">
    <table width="200" border="0" align="right" cellpadding="0" cellspacing="0">
      <tr>
        <td align="right"><input type="submit" name="logout" value="Logout" /></td>
        <td><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Halo, </font></td>
        <td><font size=2 face="Broadway, Geneva, sans-serif" color="#666666"><?php echo $_SESSION['login_admin']; ?></font>
        </td>
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
    <td bgcolor="#009900">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#DEE8FF"><table width="200" border="0" cellpadding="10" cellspacing="0" bgcolor="#EEEEEE">
      <tr>
        <td><img src="gambar/mil.jpg" width="141" height="43" /></td>
        <td><img src="gambar/mil.jpg" width="141" height="43" /></td>
        <td><img src="gambar/mil.jpg" width="141" height="43" /></td>
      </tr>
      <tr>
        <td align="center"><a href="pilih kategori.php"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Barang</font></a></td>
        <td align="center"><a href="cek status_Adm.php"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Status Transaksi</font></a></td>
        <td align="center"><a href="pilih laporan.php"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Laporan</font></a></td>
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