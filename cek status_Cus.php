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
<table width="70%" border="0" align="center" cellpadding="10" cellspacing="0">
  <tr>
    <td width="348" align="center" bgcolor="#33CC00"><strong><font size="2" face="Tahoma, Geneva, sans-serif" color="#FFCC00">Situs jual beli atribut militer online</font></strong></td>
    <td bgcolor="#33CC00"><table width="200" border="0" align="right" cellpadding="0" cellspacing="0">
      <tr>
        <td><a href="bantuan.php"><img src="gambar/bantuan.jpg" width="99" height="26" /></a></td>
        <td><a href="status transaksi.php"
        ><img src="gambar/status transaksi.jpg" width="154" height="26" /></a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td bgcolor="#009900"><img src="gambar/mil.jpg" width="141" height="43" /></td>
    <td align="right" bgcolor="#009900"><a href="index.php"><img src="gambar/home.jpg" width="42" height="35" /></a></td>
  </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#DEE8FF"><table width="70%" border="4" align="center" cellpadding="4" cellspacing="0">
      <tr>
        <td align="center"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">No Transaksi</font></td>
        <td align="center"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Tgl</font></td>
        <td align="center"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Status</font></td>
        <td align="center"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Aksi</font></td>
        <td align="center"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Detail Barang</font></td>
        <td align="center"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Biaya Kirim</font></td>
        <td align="center"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Total Bayar</font></td>
      </tr>
      <tr>
      <?php
	  $a =$_GET['no_transaksi'];
	  $b = $_GET['kode_pembeli'];
	  $sqla = "select t.no_transaksi, t.tgl_transaksi, t.status, d.kode_barang, b.nama_barang, b.harga,k.harga, (b.harga*d.jumlah)+k.harga, b.harga*d.jumlah, d.jumlah from transaksi t join detail_transaksi d on t.no_transaksi=d.no_transaksi join barang b on d.kode_barang=b.kode_barang join pembeli p on p.kode_pembeli = t.kode_pembeli join kurir k on k.kode_kurir = p.kode_kurir where t.no_transaksi='$a' and t.kode_pembeli='$b'";
	  $qrya = mysql_query($sqla);
	  if($data = mysql_fetch_array($qrya)){
	  ?>
        <td><?php echo $data[0]; ?></td>
        <td><?php echo $data[1]; ?></td>
        <td><?php echo $data[2]; ?></td>
        <td align="center">
        <?php
        if($data[2] == 'Menunggu'){
		?>
        <input onclick="window.location='konfirmasi.php?no=<?php echo $data[0]; ?>'" type="submit" name="aksi" value="Konfirmasi" />
        <?php
        }
        ?>
        <?php
        if($data[2] == 'Dikirim'){
		?>
        <input onclick="window.location='konfirmasi_terima.php?no=<?php echo $data[0]; ?>'" type="submit" name="aksi" value="Diterima" />
         <?php
        }
        ?>
        </td>
        <td><table width="200" border="0" cellpadding="3">
          <tr>
            <td>Nama Barang :</td>
            <td><?php echo $data[4]; ?> </td>
          </tr>
          <tr>
            <td>Harga Satuan :</td>
            <td><?php echo $data[5]; ?></td>
          </tr>
          <tr>
            <td>Jumlah       :</td>
            <td><?php echo $data[9]; ?></td>
          </tr>
          <tr>
            <td>Total       :</td>
            <td><?php echo $data[8]; ?></td>
          </tr>
          
        </table></td>
        <td><?php echo $data[6]; ?></td>
        <td><?php echo $data[7]; ?></td>
        <?php
	  }
		?>
      </tr>
    </table>
    
    </td>
  </tr>
   <tr>
    <td colspan="2" bgcolor="#009900" align="center"><font size="2" face="Tahoma, Geneva, sans-serif" color="#FFCC00">Copyright by Finna Monica 2015</font></td>
  </tr>
</table>
</body>
</html>
