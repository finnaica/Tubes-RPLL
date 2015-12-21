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

<body onload="window.print();">
<table width="70%" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td colspan="2" align="center" bgcolor="#33CC00"><p><strong><font color="#000000" size="2" face="Tahoma, Geneva, sans-serif">Toko Siliwangi</font></strong></p>
    <p><strong><font color="#000000" size="2" face="Tahoma, Geneva, sans-serif">Jalan Jendral A. Yani No 207-209</font></strong></p></td>
  </tr>
  <tr>
  	<td colspan="2" align="center" bgcolor="#DEE8FF"><table width="80%" border="1">
  	  <tr>
  	    <td bgcolor="#33CC00"><font size="2" face="Broadway, Geneva, sans-serif" color="#666666">No</font></td>
  	    <td bgcolor="#33CC00"><font size="2" face="Broadway, Geneva, sans-serif" color="#666666">Kode Barang</font></td>
  	    <td bgcolor="#33CC00"><font size="2" face="Broadway, Geneva, sans-serif" color="#666666">Nama Barang</font></td>
  	    <td bgcolor="#33CC00"><font size="2" face="Broadway, Geneva, sans-serif" color="#666666">Deskripsi</font></td>
  	    <td bgcolor="#33CC00"><font size="2" face="Broadway, Geneva, sans-serif" color="#666666">Harga</font></td>
  	    <td bgcolor="#33CC00"><font size="2" face="Broadway, Geneva, sans-serif" color="#666666">Stok</font></td>
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
  	    <td bgcolor="#FFFFFF"><?php echo $data[1]; ?></td>
  	    <td bgcolor="#FFFFFF"><?php echo $data[2]; ?></td>
  	    <td bgcolor="#FFFFFF"><?php echo $data[3]; ?></td>
  	    <td bgcolor="#FFFFFF"><?php echo $data[4]; ?></td>
  	    <td bgcolor="#FFFFFF"><?php echo $data[5]; ?></td>
	    </tr>
  	  <?php
		}
		?>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" align="right" valign="bottom" bgcolor="#DEE8FF"><table width="200" border="0">
      <tr>
        <td align="center">Bandung,<?php echo date('d F Y'); ?></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="center">Finna Monica</td>
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
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
</body>
</html>
