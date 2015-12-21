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
<table width="80%" border="0" align="center" cellpadding="10" cellspacing="0" style="cursor:pointer">
  <tr>
    <td align="center" bgcolor="#33CC00"><strong><font size="2" face="Tahoma, Geneva, sans-serif" color="#FFCC00">Situs jual beli atribut militer online</font></strong></td>
    <td align="right" bgcolor="#33CC00"><table width="228" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="49"><a href="bantuan.php"><img src="gambar/bantuan.jpg" width="99" height="26" /></a></td>
        <td width="111"><a href="status transaksi.php"><img src="gambar/status transaksi.jpg" width="154" height="26" /></a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#009900"><table border="0" align="left" cellpadding="0" cellspacing="0">
      <tr>
      	<td><img src="gambar/mil.jpg" width="141" height="43" /></td>
        <td><form name="fcari" action="" method="get"><input type="text" name="q" placeholder="Cari Nama Barang" /><input type="submit" value="  " style="background-image:url(gambar/cari.jpg);width:45px;height:31px;" /></form></td>
        <td><a href="lihat_keranjang.php"><img src="gambar/keranjang.jpg" width="30" height="29" /></a></td>
      </tr>
    </table></td>
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
  <td colspan="2" align="center"><font size=4 face="Broadway, Geneva, sans-serif" color="#666666">Promo Terbaru</font></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#DEE8FF">
    
    <?php
	$sql = "select * from barang limit 6";
	if(isset($_GET['q'])){
		$sql = "select * from barang where nama_barang like '%".$_GET['q']."%'";
	}
	$qry = mysql_query($sql);
	$nr = mysql_num_rows($qry);
	if($nr<1){
		?>
        Belum ada data
        <?php
	}
	else {
		$no = 0;
		while($data=mysql_fetch_array($qry)){
			$no++;
			?>
        <table width="33%" border="1" align="left" cellpadding="10" bgcolor="#EEEEEE">
          <tr>
            <td colspan="2" align="center"><img src="produk/pakaian/<?php echo $data[0]; ?>.jpg" height="200" width="200" onclick="window.location='meser.php?no=<?php echo $data[0]; ?>'"/></td>
            </tr>
          <tr>
            <td>Nama Barang</td>
            <td><?php echo $data[2]; ?></td>
          </tr>
          <tr>
            <td>Harga</td>
            <td><?php echo $data[3]; ?></td>
          </tr>
          <tr>
            <td>Deskripsi</td>
            <td><?php echo $data[5]; ?></td>
          </tr>
        </table>
        <?php
		}
		?>
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