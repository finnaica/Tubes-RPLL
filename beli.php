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
        <td><img src="gambar/bantuan.jpg" width="99" height="26" /></td>
        <td><img src="gambar/status transaksi.jpg" width="154" height="26" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#009900"><table border="0" align="left" cellpadding="0" cellspacing="0">
      <tr>
      	<td><img src="gambar/mil.jpg" width="141" height="43" /></td>
        <td><form name="fcari" action="" method="get"><input type="text" name="q" placeholder="Cari Nama Barang" /><input type="submit" value="  " style="background-image:url(gambar/cari.jpg);width:45px;height:31px;" /></form></td>
        <td><img src="/military.com/gambar/keranjang.jpg" width="38" height="34" /></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" align="center" valign="middle" bgcolor="#DEE8FF">
    
    <?php
	$sql = "select * from barang where kode_barang='".$_GET['no']."'";
	$qry = mysql_query($sql);
	while($data = mysql_fetch_array($qry)){
    $kode_barang = $data[0];
		$nama_barang = $data[2];
		$harga = $data[3];
	}
	?>
    
    <table width="200" border="1">
      <tr>
        <td rowspan="3" align="center"><img src="produk/pakaian/<?php echo $kode_barang; ?>.jpg" height="100" width="100" /></td>
        <td><?php echo $nama_barang; ?></td>
      </tr>
      <tr>
        <td><?php echo $harga; ?></td>
      </tr>
      <tr>
      <td><input type="number" name="banyaknya" placeholder="banyaknya" id="banyaknya" /></td>
      </tr>
      <tr>
      <script>
	  function lanjut(){
		  var asdf = document.getElementById('banyaknya').value;
		  window.location='beli_barang.php?kode=<?php echo $_GET['no']; ?>&banyaknya='+asdf;
	  }
	  </script>
        <td><form id="form1" name="form1" method="post" action="">
          <input onclick="lanjut" type="button" name="beli" value="Beli" />
        </form></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
