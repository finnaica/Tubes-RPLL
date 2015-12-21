<?php
include('koneksi.php');
session_start();

if(isset($_SESSION['login_admin'])){
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SI Military - Administrator</title>
</head>

<body>
<table width="200" border="0" align="center" cellpadding="10" cellspacing="0">
  <tr>
    <td align="center" bgcolor="#33CC00"><strong><font size="2" face="Tahoma, Geneva, sans-serif" color="#FFCC00">Situs jual beli atribut militer online</font></strong></td>
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
    <td bgcolor="#009900"><img src="gambar/mil.jpg" width="141" height="43" /></td>
    <td align="right" bgcolor="#009900">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#DEE8FF"><font size=3 face="Broadway, Geneva, sans-serif" color="#666666">Ubah  Data <?php echo $kategori ?></font></td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#DEE8FF"><p><a href="data barang.php?kategori=<?php echo $_GET['kategori']?>"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Daftar <?php echo $kategori ?></font></a></p>
    <p><a href="tambah barang.php?kategori=<?php echo $_GET['kategori']?>"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Tambah Data <?php echo $kategori ?></font></a></p></td>
    <td align="center" valign="middle" bgcolor="#DEE8FF">
    
     <?php
	$sql = "select * from barang where kode_barang='".$_GET['no']."'";
	$qry = mysql_query($sql);
	while($data = mysql_fetch_array($qry)){
		$kode_barang = $data[0];
		$kode_kategori = $data[1];
		$nama_barang = $data[2];
		$harga = $data[3];
		$stok = $data[4];
		$keterangan = $data[5];
	}
	?>
    
     <form name="fubah" action="" method="post" enctype="multipart/form-data">
    <table bgcolor="#FFFFFF" width="200" border="0" cellpadding="4" cellspacing="0">
    <tr>
        <td><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Gambar</font></td>
        <td><img src="produk/pakaian/<?php echo $kode_barang; ?>.jpg" height="100" width="100" /><input name="gambar" type="file" /></td>
      </tr>
      <tr>
        <td><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Nama Barang</font></td>
        <td><input type="text" name="nama_barang" value="<?php echo $nama_barang; ?>" /></td>
      </tr>
      <tr>
        <td><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Harga Barang</font></td>
        <td><input type="text" name="harga" value="<?php echo $harga; ?>"/></td>
      </tr>
      <tr>
        <td><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Stok</font></td>
        <td><input type="text" name="stok" value="<?php echo $stok; ?>"/></td>
      <tr>
        <td><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Deskripsi</font></td>
        <td><input type="text" name="deskripsi" value="<?php echo $keterangan; ?>" /></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" name="ubah" value="Ubah" /></td>
        </tr>
    </table>
    
    </form>
    <?php
	if(isset($_POST['ubah'])){
		$nama_barang = $_POST['nama_barang'];
		$harga = $_POST['harga'];
		$stok = $_POST['stok'];
		$keterangan = $_POST['deskripsi'];
		$kode_barang = $_GET['no'];
		$sql = "update barang set nama_barang='$nama_barang', harga='$harga', stok='$stok', keterangan='$keterangan' where kode_barang='$kode_barang'";
		$qry = mysql_query($sql);
		if($qry){
			if(isset($_FILES['gambar'])){
					move_uploaded_file($_FILES['gambar']['tmp_name'],'Gambar/'.$_GET['no'].".jpg");
					}
			echo "<script>alert('Daftar Berhasil Diubah');window.location='data barang.php?kategori=".$_GET['kategori']."';</script>";
		}
		else{
			echo "<script>alert('Daftar Gagal Diubah');window.location='ubah barang.php?no=".$_GET['no']."';</script>";
		}
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

<?php
}
	else{
		echo"<script>window.location='login_admin.php'</script>";
	}
?>