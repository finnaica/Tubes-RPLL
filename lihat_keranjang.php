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
<table width="80%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="348" align="center" bgcolor="#33CC00"><strong><font size="2" face="Tahoma, Geneva, sans-serif" color="#FFCC00">Situs jual beli atribut militer online</font></strong></td>
    <td width="270" align="right" bgcolor="#33CC00"><table width="200" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td><a href="bantuan.php"><img src="gambar/bantuan.jpg" width="99" height="26" /></a></td>
        <td><img src="gambar/status transaksi.jpg" width="154" height="26" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td bgcolor="#009900"><table width="200" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="gambar/mil.jpg" width="141" height="43" /></td>
        <td><form id="form1" name="form1" method="post" action="">
          <label for="cari"></label>
          <input type="text" name="cari" id="cari" />
        </form></td>
        <td  align="center" valign="middle"><img src="gambar/cari.jpg" width="29" height="26" /></td>
        <td align="center" valign="middle"><img src="gambar/keranjang.jpg" width="34" height="30" /></td>
      </tr>
    </table></td>
    <td align="right" bgcolor="#009900"><a href=""><img src="gambar/home.jpg" width="42" height="35" /></td>
  </tr>  
  <tr>
    <td colspan="2" bgcolor="#DEE8FF" align="right"><table width="367" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="66"><a href="barang.php?kategori=PA"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Pakaian</font></a></td>
        <td width="57"><a href="barang.php?kategori=SE"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Sepatu</font></a></td>
        <td width="36"><a href="barang.php?kategori=TO"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Topi</font></a></td>
        <td width="34"><a href="barang.php?kategori=TA"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Tas</font></a></td>
        <td width="76"><a href="barang.php?kategori=LA"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Lambang</font></a></td>
        <td width="79"><a href="barang.php?kategori=EX"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Lain-lain</font></a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td bgcolor="#EEEEEE"><table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td rowspan="3"><img src="gambar/contohgambar.jpg" width="101" height="85" /></td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td><img src="gambar/delete.jpg" width="24" height="29" /></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF">&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
    <td align="center" valign="top" bgcolor="#EEEEEE"><table width="200" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td valign="middle" bgcolor="#FFFFFF"><font size=2 face="Tahoma" color="#666666">Total Barang</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr>
        <td valign="middle" bgcolor="#FFFFFF"><font size=2 face="Tahoma" color="#666666">Total Harga</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr>
        <td valign="middle" bgcolor="#FFFFFF"><font size=2 face="Tahoma" color="#666666">Biaya Kirim</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
      <tr>
        <td valign="middle" bgcolor="#FFFFFF"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Total</td>
        <td bgcolor="#FFFFFF">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#DEE8FF">&nbsp;</td>
  </tr>
</table>
</body>
</html>
