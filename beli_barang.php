<?php
include('koneksi.php');
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<table width="80%" border="0" align="center" cellpadding="8" cellspacing="0">
  <tr>
    <td align="center" bgcolor="#33CC00"><strong><font size="2" face="Tahoma, Geneva, sans-serif" color="#FFCC00">Situs jual beli atribut militer online</font></strong></td>
    <td align="right" bgcolor="#33CC00"><table width="200" border="0" align="right" cellpadding="0" cellspacing="0">
      <tr>
        <td><a href="status transaksi.php"><img src="gambar/bantuan.jpg" width="99" height="26" /></a></td>
        <td><img src="gambar/status transaksi.jpg" width="154" height="26" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td bgcolor="#009900"><img src="gambar/mil.jpg" width="141" height="43" /></td>
    <td bgcolor="#009900">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle" bgcolor="#DEE8FF"><table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="middle" bgcolor="#EEEEEE"><img src="produk/pakaian/<?php echo $kode_barang; ?>.jpg" height="100" width="100" /></td>
    <td align="left" valign="middle" bgcolor="#EEEEEE"><table width="200" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td bgcolor="#FFFFFF"><?php echo $nama_barang; ?></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><?php echo $harga; ?></td>
      </tr>
    </table></td>
    <td align="center" valign="middle" bgcolor="#EEEEEE"><img src="gambar/delete.jpg" width="33" height="38" /></td>
  </tr>
  <tr>
    <td colspan="3" align="center" valign="middle" bgcolor="#EEEEEE"><table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td bgcolor="#FFFFFF"><font size=2 face="Tahoma" color="#666666">Total Harga</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><font size=2 face="Tahoma" color="#666666">Biaya Kirim</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="middle" bgcolor="#EEEEEE"><a href="#"><a href="barang.php">Tambah barang lain</a></td>
    <td align="right" bgcolor="#EEEEEE"><form id="form1" name="form1" method="post" action="">
      <input type="submit" name="pembayaran" id="pembayaran" value="Lanjut Pembayaran" />
    </form></td>
  </tr>
</table></td>
  </tr>
</table>
</body>
</html>
