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
    <td align="center" bgcolor="#33CC00"> <strong><font size="2" face="Tahoma, Geneva, sans-serif" color="#FFCC00">Situs jual beli atribut militer online</font></strong></td>
    <td bgcolor="#33CC00"><table width="200" border="0" align="right" cellpadding="0" cellspacing="0">
      <tr>
        <td><a href="bantuan.php"><img src="gambar/bantuan.jpg" width="99" height="26" /></a></td>
        <td><a href="status transaksi.php"><img src="gambar/status transaksi.jpg" width="154" height="26" /></a></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td bgcolor="#009900"><img src="gambar/mil.jpg" width="141" height="43" /></td>
    <td bgcolor="#009900">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#DEE8FF"><input type="image" name="imageField" src="gambar/isi data.jpg" /></td>
    <td bgcolor="#DEE8FF"><input type="image" name="imageField2" id="imageField" src="gambar/pilih transfer.jpg" /></td>
  </tr>
  <tr>
    <td align="center" valign="top" bgcolor="#DEE8FF">
    <?php
if(isset($_POST['simpan'])){
$init = "K";
	$sql = "select kode_pembeli from pembeli order by kode_pembeli desc limit 1";
	$qry = mysql_query($sql);
	$nr = mysql_num_rows($qry);
	if($nr>0){
		while($data = mysql_fetch_array($qry)){
			$no = substr($data[0], 1)+1;
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
	$kode_pembeli = $init.$no;
	$namapembeli = $_POST['nama_pembeli'];
	$email = $_POST['email_pembeli'];
	$telepon = $_POST['telepon'];
	$provinsi = $_POST['provinsi'];
	$kota = $_POST['kota'];
	$kecamatan = $_POST['kecamatan'];
	$alamat = $_POST['alamat'] ;
	$kodepos = $_POST['kode_pos'];
	$kurir = $_POST['nama_kurir'];
	
$sql = "insert into pembeli values('$kode_pembeli', '$email', '$namapembeli', '$telepon', '$provinsi', '$kota', '$kecamatan', '$alamat', '$kodepos', '$kurir')";
mysql_query($sql);

$init = "T";
	$sql = "select no_transaksi from transaksi order by no_transaksi desc limit 1";
	$qry = mysql_query($sql);
	$nr = mysql_num_rows($qry);
	if($nr>0){
		while($data = mysql_fetch_array($qry)){
			$no = substr($data[0], 1)+1;
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
	$no_transaksi = $init.$no;
$sql = "insert into transaksi values('$no_transaksi', '$kode_pembeli', curdate(), 'Menunggu')";
mysql_query($sql);

$kdbrg = $_GET['kode'];
$jml = $_GET['banyaknya'];

$sql = "insert into detail_transaksi values('$no_transaksi', '$kdbrg', '$jml')";
mysql_query($sql);

?>
<script>
alert('pembelian berhasil dicatat');
</script>
<font size=2 face="Broadway, Geneva, sans-serif" color="#666666">No Pembeli : <?php echo $kode_pembeli; ?><br />
No Transaksi : <?php echo $no_transaksi; ?>
<br />Total Transfer : <?php $sql = "select d.jumlah*b.harga+k.harga from transaksi t join detail_transaksi d on t.no_transaksi=d.no_transaksi join barang b on d.kode_barang=b.kode_barang join pembeli p on t.kode_pembeli=p.kode_pembeli join kurir k on p.kode_kurir=k.kode_kurir where t.no_transaksi='$no_transaksi'"; $qry = mysql_query($sql); while($data = mysql_fetch_array($qry)){ echo $data[0]; } ?></font>
<?php
} else {
?>
    <form method="post">
    <table width="200" border="0" align="center" cellpadding="4" cellspacing="0">
      <tr>
        <td bgcolor="#EEEEEE"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Nama Pembeli</td>
        <td bgcolor="#EEEEEE"><input type="text" name="nama_pembeli" id="nama_pembeli" /></td>
      </tr>
      <tr>
        <td bgcolor="#EEEEEE"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Email</td>
        <td bgcolor="#EEEEEE"><input type="text" name="email_pembeli" id="email_pembeli" /></td>
      </tr>
      <tr>
        <td bgcolor="#EEEEEE"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Telepon</td>
        <td bgcolor="#EEEEEE"><input type="text" name="telepon" id="telepon" /></td>
      </tr>
      <tr>
        <td bgcolor="#EEEEEE"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Provinsi</td>
        <td bgcolor="#EEEEEE"><input type="text" name="provinsi" /></td>
      </tr>
      <tr>
        <td bgcolor="#EEEEEE"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Kota/Kabupaten</td>
        <td bgcolor="#EEEEEE"><input type="text" name="kota" id="kota" /></td>
      </tr>
      <tr>
        <td bgcolor="#EEEEEE"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Kecamatan</td>
        <td bgcolor="#EEEEEE"><input type="text" name="kecamatan" id="kecamatan" />
        </td>
      </tr>
      <tr>
        <td bgcolor="#EEEEEE"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Alamat Lengkap</td>
        <td bgcolor="#EEEEEE"><label for="alamat"></label>
          <textarea name="alamat" id="alamat"></textarea></td>
      </tr>
      <tr>
        <td bgcolor="#EEEEEE"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Kode Pos</td>
        <td bgcolor="#EEEEEE"><input type="text" name="kode_pos" id="kode_pos" />
        </td>
      </tr>
       <tr>
        <td bgcolor="#EEEEEE"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Kurir</td>
        <td bgcolor="#EEEEEE"><select name="nama_kurir" id="nama_kurir">
        
        <?php
		$sql = "Select * from kurir";
		$qry = mysql_query($sql);
		while($data=mysql_fetch_array($qry)){
		?>
            <option value="<?php echo $data[0] ?>"><?php echo $data[0] ?> - <?php echo $data[1] ?> - <?php echo $data[2] ?></option>
            <?php
		}
			?>
          </select></td>
      </tr>
      <tr>
      <td colspan="2">&nbsp;</td>
      </tr>
    </table>
     <input type="submit" name="simpan" value="Simpan Pemesanan" />
     </form>
     <?php
}
	 ?>
     </td>
    <td bgcolor="#DEE8FF"><table width="200" border="0" align="center" cellpadding="4" cellspacing="0">
      <tr>
        <td bgcolor="#EEEEEE"><img src="gambar/logo-bank-mandiri.jpg" width="106" height="55" /></td>
        <td bgcolor="#EEEEEE"><img src="gambar/logo_bca.png" width="148" height="66" /></td>
        <td bgcolor="#EEEEEE"><img src="gambar/logo-bri.jpg" width="104" height="105" /></td>
      </tr>
      <tr>
        <td align="center" bgcolor="#EEEEEE"> <font size=2 face="Broadway, Geneva, sans-serif" color="#666666"><br />Bank Mandiri, Bandung<br />
Nomor Rekening<br />
0700 0000 1234<br />
a.n Military.com </td>
        <td align="center" bgcolor="#EEEEEE"> <font size=2 face="Broadway, Geneva, sans-serif" color="#666666"> Bank BCA, Bandung<br />
Nomor Rekening<br />
731 025 2526<br />
a.n Military.com</td>
        <td align="center" bgcolor="#EEEEEE"> <font size=2 face="Broadway, Geneva, sans-serif" color="#666666"> Bank BRI, Bandung<br />
Nomor Rekening<br />
123 657 839 020 05<br />
a.n Military.com</td>
      </tr>
      <tr>
        <td colspan="3" bgcolor="#EEEEEE">&nbsp;</td>
      </tr>
      <tr>
        <td colspan="3" align="center" bgcolor="#EEEEEE">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#009900" align="center"><font size="2" face="Tahoma, Geneva, sans-serif" color="#FFCC00">Copyright by Finna Monica 2015</font></td>
  </tr>
</table>
</body>
</html>
