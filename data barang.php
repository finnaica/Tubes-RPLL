<?php
include('koneksi.php');
session_start();

if (isset($_SESSION['login_admin'])){
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
        <td align="right"><input type="submit" name="logout" value="Logout" /></td>
        <td><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Halo, </font></td>
        <td><font size=2 face="Broadway, Geneva, sans-serif" color="#666666"><?php echo $_SESSION['login_admin']; ?></font></td>
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
    <td colspan="2" align="center" bgcolor="#DEE8FF"><font size=3 face="Broadway, Geneva, sans-serif" color="#666666">Data <?php echo $kategori ?></font></td>
  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#DEE8FF"><p><a href="data barang.php?kategori=<?php echo $_GET['kategori']?>"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Daftar <?php echo $kategori ?></font></a></p>
    <p><a href="tambah barang.php?kategori=<?php echo $_GET['kategori']; ?>"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Tambah Data <?php echo $kategori ?></font></a></p></td>
    <td bgcolor="#DEE8FF">
    
    <?php
	$sql = "Select * from barang where kode_kategori='".$_GET['kategori']."'";
	$qry = mysql_query($sql);
	$nr = mysql_num_rows($qry);
	if($nr < 1){
	?>
		<font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Belum ada data</font>
        
    <?php
	}
	else {
		?>
    <table width="200" border="1">
      <tr>
        <td bgcolor="#33CC00"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">No</font></td>
        <td bgcolor="#33CC00"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Gambar</font></td>
        <td bgcolor="#33CC00"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Kode Barang</font></td>
        <td bgcolor="#33CC00"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Nama Barang</font></td>
        <td bgcolor="#33CC00"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Harga</font></td>
        <td bgcolor="#33CC00"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Stok</font></td>
        <td bgcolor="#33CC00"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Deskripsi</font></td>
        <td bgcolor="#33CC00"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Aksi</font></td>
      </tr>
      <?php
		$no = 0;
		while($data=mysql_fetch_array($qry)){
			$no++;
		?>
      <tr>
        <td bgcolor="#FFFFFF"><?php echo $no; ?></td>
        <td bgcolor="#FFFFFF"><img src="produk/pakaian/<?php echo $data[0]; ?>.jpg" height="100" width="100" /></td>
        <td bgcolor="#FFFFFF"><?php echo $data[0]; ?></td>
        <td bgcolor="#FFFFFF"><?php echo $data[2]; ?></td>
        <td bgcolor="#FFFFFF"><?php echo $data[3]; ?></td>
        <td bgcolor="#FFFFFF"><?php echo $data[4]; ?></td>
        <td bgcolor="#FFFFFF"><?php echo $data[5]; ?></td>
        <td bgcolor="#FFFFFF"><a href="ubah barang.php?no=<?php echo $data[0]; ?>&kategori=<?php echo $_GET['kategori']; ?>">Ubah </a><a href="hapus barang.php?no=<?php echo $data[0]; ?>&kategori=<?php echo $_GET['kategori']; ?>">Hapus</a></td>
      </tr>
       <?php
		}
		?>
    </table></td>
  </tr>
   <?php
	}
	?>
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