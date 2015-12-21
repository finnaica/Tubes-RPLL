<?php
include('koneksi.php');
session_start();

if(isset($_SESSION['login_admin'])){
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="80%" border="0" align="center" cellpadding="4" cellspacing="0">
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
        <td colspan="2" align="center" bgcolor="#FFFFFF"><img src="gambar/pilih kategori.jpg" width="133" height="68" /></td>
        </tr>
      <tr>
        <td align="center" bgcolor="#FFFFFF"><a href="data barang.php?kategori=PA"><img src="gambar/pakaian.jpg" width="109" height="48" /></a></td>
        <td align="center" bgcolor="#FFFFFF"><a href="data barang.php?kategori=TA"><img src="gambar/tas.jpg" width="116" height="48" /></a></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#FFFFFF"><a href="data barang.php?kategori=SE"><img src="gambar/sepatu.jpg" width="110" height="49" /></a></td>
        <td align="center" bgcolor="#FFFFFF"><a href="data barang.php?kategori=LA"><img src="gambar/lambang.jpg" width="116" height="47" /></a></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#FFFFFF"><a href="data barang.php?kategori=TO"><img src="gambar/topi.jpg" width="110" height="49" /></a></td>
        <td align="center" bgcolor="#FFFFFF"><a href="data barang.php?kategori=EX"><img src="gambar/lainnya.jpg" width="115" height="47" /></a></td>
      </tr>
    </table></td>
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
