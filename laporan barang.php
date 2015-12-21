<?php
include('koneksi.php');
session_start();

if (isset($_SESSION['login_admin'])){
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<table width="70%" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td align="center" bgcolor="#33CC00"><strong><font size="2" face="Tahoma, Geneva, sans-serif" color="#FFCC00">Situs jual beli atribut militer online</font></strong>
    </td>
    <td align="right" bgcolor="#33CC00">
    <form name="flogout" action="" method="post">
    <table width="200" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td align="right" bgcolor="#33CC00"><input type="submit" name="logout" value="Logout" /></td>
        <td bgcolor="#33CC00"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Halo,</font></td>
        <td><input type="text" name="username"  /></td>
      </tr>
    </table></form>
    
    <?php
	if(isset($_POST['logout'])){
		unset($_SESSION['login_admin']);
		echo"<script>alert('Anda Berhasil Logout');window.location='login_admin.php'</script>";
	}
	?>
  </td>
  </tr>
  
  <tr>
    <td bgcolor="#009900"><img src="gambar/mil.jpg" width="141" height="43" /></td>
    <td align="right" bgcolor="#009900"><a href="pilih laporan.php".php"><img src="gambar/back.jpg" width="35" height="36" /></a></td>
  </tr>
  <tr>
  	<td colspan="2" align="center" bgcolor="#DEE8FF">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#DEE8FF">
    <table width="80%" border="1">
      <tr>
        <td bgcolor="#33CC00"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">No</font></td>
        <td bgcolor="#33CC00"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Kode Barang</font></td>
        <td bgcolor="#33CC00"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Nama Barang</font></td>
        <td bgcolor="#33CC00"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Deskripsi</font></td>
        <td bgcolor="#33CC00"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Harga</font></td>
        <td bgcolor="#33CC00"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Stok</font></td>
        </tr>
      <?php
		$no = 0;
		$sql = "select * from barang";
		$qry = mysql_query($sql);
		while($data=mysql_fetch_array($qry)){
			$no++;
		?>
      <tr>
        <td bgcolor="#FFFFFF"><?php echo $no; ?></td>
        <td bgcolor="#FFFFFF"><?php echo $data[0]; ?></td>
        <td bgcolor="#FFFFFF"><?php echo $data[2]; ?></td>
        <td bgcolor="#FFFFFF"><?php echo $data[5]; ?></td>
        <td bgcolor="#FFFFFF"><?php echo $data[3]; ?></td>
        <td bgcolor="#FFFFFF"><?php echo $data[4]; ?></td>
      </tr>
       <?php
		}
		?>
    </table>
    </td>
  </tr>
  <tr>
   <td colspan="2" align="center" bgcolor="#DEE8FF"><input type="button" onclick="window.open('cetak barang.php');" name="cetak" value="Cetak" />
   </td>
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