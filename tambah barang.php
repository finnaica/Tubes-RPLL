<?php
include('koneksi.php');
session_start();

if(isset($_SESSION['login_admin'])){
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SI Military -  Administrator</title>
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
    <td bgcolor="#009900"><img src="gambar/mil.jpg" width="141" height="43" /></td>
    <td align="right" bgcolor="#009900"><a href="pilih kategori.php"><img src="gambar/back.jpg" width="35" height="36" /></a></td>
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
    <td colspan="2" align="center" bgcolor="#DEE8FF"><font size=3 face="Broadway, Geneva, sans-serif" color="#666666">Tambah Data <?php echo $kategori ?></font></td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#DEE8FF"><p><a href="data barang.php?kategori=<?php echo $_GET['kategori']?>"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Daftar <?php echo $kategori ?></font></a></p>
    <p><a href="tambah barang.php?kategori=<?php echo $_GET['kategori']?>"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Tambah Data <?php echo $kategori ?></font></a></p></td>
    <td align="center" valign="middle" bgcolor="#DEE8FF">
    <form name="ftambah" action="" method="post" enctype="multipart/form-data">
    <table width="200" border="0" cellpadding="4" cellspacing="0">
    <tr>
        <td bgcolor="#FFFFFF"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Gambar</font></td>
        <td bgcolor="#FFFFFF"><input name="gambar" type="file" /></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Nama Barang</font></td>
        <td bgcolor="#FFFFFF"><input type="text" name="nama_barang" /></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Harga Barang</font></td>
        <td bgcolor="#FFFFFF"><input type="text" name="harga" /></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Stok</font></td>
        <td bgcolor="#FFFFFF"><input type="text" name="stok" /></td>
      </tr>
      <tr>
        <td bgcolor="#FFFFFF"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Deskripsi</font></td>
        <td bgcolor="#FFFFFF"><input type="text" name="deskripsi"></td>
      </tr>
      <tr>
        <td colspan="2" align="center" bgcolor="#FFFFFF"><input type="submit" name="tambah" value="Simpan" /></td>
        </tr>
    </table>
    </form>
    
    <?php
	if(isset($_POST['tambah'])){
		$init = $_GET['kategori'];
	$sql = "select kode_barang from barang where kode_barang like '$init%' order by kode_barang desc limit 1";
	$qry = mysql_query($sql);
	$nr = mysql_num_rows($qry);
	if($nr>0){
		while($data = mysql_fetch_array($qry)){
			$no = substr($data[0], 2)+1;
		}
	}
	else {
		$no = '1';
	}
	if(strlen($no)==1){
	$no = "00".$no;
	}
	if(strlen($no)==2){
	$no = "0".$no;
	}
	$kode_barang = $init.$no;
		$nama = $_POST['nama_barang'];
		$harga = $_POST['harga'];
		$stok = $_POST['stok'];
		$deskripsi = $_POST['deskripsi'];
		$sql = "insert into barang values('$kode_barang', '$init','$nama','$harga','$stok','$deskripsi')";
		$qry = mysql_query($sql);
		if($qry){
			if(isset($_FILES['gambar'])){
					move_uploaded_file($_FILES['gambar']['tmp_name'],'produk/pakaian/'.$kode_barang.".jpg");
					}
			echo "<script>alert('Daftar Tersimpan');window.location='data barang.php?kategori=".$_GET['kategori']."';</script>";
		}
		else{
			echo "<script>alert('Daftar Gagal Disimpan');window.location='tambah barang.php';</script>";
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