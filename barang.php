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
<table width="80%" border="0" align="center" cellpadding="10" cellspacing="0">
  <tr>
    <td align="center" bgcolor="#33CC00"><strong><font size="2" face="Tahoma, Geneva, sans-serif" color="#FFCC00">Situs jual beli atribut militer online</font></strong></td>
    <td align="right" bgcolor="#33CC00"><table width="200" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td><a href="bantuan.php"><img src="gambar/bantuan.jpg" width="99" height="26"/></a></td>
        <td><a href="status transaksi.php"><img src="gambar/status transaksi.jpg" width="154" height="26" /></a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td bgcolor="#009900"><table border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td><img src="gambar/mil.jpg" width="141" height="43" /></td>
        <td width="500px" align="center" valign="middle"><form name="fcari" method="get" action="">
          <input type="text" name="q" placeholder="Cari Nama Barang" />
          <input type="hidden" name="kategori" value="<?php echo $_GET['kategori']; ?>" />
          <input type="submit" value="  " style="background-image:url(gambar/cari.jpg);width:45px;height:31px;" />
          <a href="lihat_keranjang.php"><img src="gambar/keranjang.jpg" width="29" height="29" /></a>
        </form></td>
        <td >&nbsp;</td>
      </tr>
    </table></td>
    <td align="right" bgcolor="#009900"><a href="index.php"><img src="gambar/home.jpg" width="42" height="35" /></a></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#DEE8FF" align="right"><table width="367" border="0" align="right" cellpadding="0" cellspacing="0">
      <tr>
     
     <?php
  $kategori = $_GET['kategori'];
  if($kategori == 'PA'){
  	$kategori = 'Pakaian';
  }
  if($kategori == 'LA'){
	  $kategori = 'Lambang';
  }
  if($kategori == 'TA'){
	  $kategori = 'Tas';
  }
  if($kategori == 'TO'){
	  $kategori = 'Topi';
  }
  if($kategori == 'SE'){
	  $kategori = 'Sepatu';
  }
  if($kategori== 'EX'){
	  $kategori = 'Lainnya';
  }
  
  ?>
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
    <td colspan="2" align="left" bgcolor="#DEE8FF">
    
    <?php
	$sql = "Select * from barang where kode_kategori='".$_GET['kategori']."'";
	if(isset($_GET['q'])){
	$sql = "Select * from barang where nama_barang like '%".$_GET['q']."%'";
	}
	$qry = mysql_query($sql);
	$nr = mysql_num_rows($qry);
	if($nr < 1){
	?>
        <font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Belum ada data</font>
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
	?></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#009900" align="center"><font size="2" face="Tahoma, Geneva, sans-serif" color="#FFCC00">Copyright by Finna Monica 2015</font></td>
  </tr>
</table>
</body>
</html>
