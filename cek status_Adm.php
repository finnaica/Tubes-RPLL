<?php
include('koneksi.php');
session_start();

if(isset($_SESSION['login_admin'])){
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://wwv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Docw.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SI Military - Administrator</title>
</head>

<body>
<table width="70%" border="0" align="center" cellpadding="10" cellspacing="0">
  <tr>
    <td width="348" align="center" bgcolor="#33CC00"><strong><font size="2" face="Tahoma, Geneva, sans-serif" color="#FFCC00">Situs jual beli atribut militer online</font></strong></td>
    <td align="right" bgcolor="#33CC00">
     <form name="flogout" action="" method="post">
    <table width="200" border="0" cellpadding="0" cellspacing="0">
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
	?></td>
  </tr>
  <tr>
    <td bgcolor="#009900"><img src="gambar/mil.jpg" width="141" height="43" /></td>
    <td align="right" bgcolor="#009900"><a href="utama admin.php"><img src="gambar/home.jpg" width="42" height="35" /></a></td>
  </tr>
   <tr>
  	<td colspan="2" align="center" bgcolor="#DEE8FF">
    <form name="fcari" action="" method="get">
    <table width="200" border="0" cellpadding="4" cellspacing="0">
  	  <tr>
  	    <td align="left" valign="middle" bgcolor="#DEE8FF"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Tanggal Awal</font></td>
  	    <td bgcolor="#DEE8FF"><input type="date" name="q" placeholder="tgl awal" /></td>
  	    <td rowspan="2" bgcolor="#DEE8FF">
  	      <input type="submit" name="lihat" value="Lihat" />
	      </td>
	    </tr>
  	  <tr>
  	    <td align="left" valign="middle" bgcolor="#DEE8FF"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Tanggal Akhir</font></td>
  	    <td bgcolor="#DEE8FF"><input type="date" name="p" placeholder="tgl akhir" /></td>
  	    </tr>
    </table></form></td>
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
      <?php
	  $sql = "select t.no_transaksi, t.tgl_transaksi, t.status, d.kode_barang, b.nama_barang, b.harga, k.harga, (b.harga*d.jumlah)+k.harga, b.harga*d.jumlah, d.jumlah from transaksi t join detail_transaksi d on t.no_transaksi=d.no_transaksi join barang b on d.kode_barang=b.kode_barang join pembeli p on p.kode_pembeli = t.kode_pembeli join kurir k on k.kode_kurir = p.kode_kurir";
	  if(isset($_GET['q'])){
		$sql = "select t.no_transaksi, t.tgl_transaksi, t.status, d.kode_barang, b.nama_barang, b.harga, k.harga, (b.harga*d.jumlah)+k.harga, b.harga*d.jumlah, d.jumlah from transaksi t join detail_transaksi d on t.no_transaksi=d.no_transaksi join barang b on d.kode_barang=b.kode_barang join pembeli p on p.kode_pembeli = t.kode_pembeli join kurir k on k.kode_kurir = p.kode_kurir where tgl_transaksi >= '".$_GET['q']."' and tgl_transaksi <= '".$_GET['p']."'";
	}
	  $qry = mysql_query($sql);
	  while($data = mysql_fetch_array($qry)){
	  ?>
      <tr>
        <td><?php echo $data[0]; ?></td>
        <td><?php echo $data[1]; ?></td>
        <td><?php echo $data[2]; ?></td>
        <td align="center">
       <?php
	   if ($data[2] <> "Diterima"){
	   ?>
        <input onclick="window.location='konfirm.php?no=<?php echo $data[0]; ?>'" type="submit" name="aksi" value="Dibayar" />
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
      </tr>
        <?php
	  }
		?>
    </table>
    
    </td>
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