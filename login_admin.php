<?php
include('koneksi.php');
session_start();
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SI Military - Administrator</title>
</head>

<body>
<form name="flogin" action="" method="post">
<table width="30%" border="0" align="center" cellpadding="10" cellspacing="0">
  <tr>
    <td width="348" align="center" bgcolor="#33CC00"><strong><font size="2" face="Tahoma, Geneva, sans-serif" color="#FFCC00">Situs jual beli atribut militer online</font></strong></td>
    <td bgcolor="#33CC00">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#009900"><img src="gambar/mil.jpg" width="141" height="43" /></td>
    <td bgcolor="#009900">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" align="center" bgcolor="#DEE8FF"><table width="246" border="0" cellpadding="4" cellspacing="0" bgcolor="#EEEEEE">
      <tr>
        <td width="86"><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Username</font></td>
        <td width="144" align="center"><input type="text" name="username" /></td>
      </tr>
      <tr>
        <td><font size=2 face="Broadway, Geneva, sans-serif" color="#666666">Password</font></td>
        <td align="center"><input type="password" name="password" /></td>
      </tr>
      <tr>
      	<td colspan="2" align="center"><input type="submit" name="login" value="Login" /></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#009900" align="center"><font size="2" face="Tahoma, Geneva, sans-serif" color="#FFCC00">Copyright by Finna Monica 2015</font></td>
  </tr>
</table>
</form>

<?php
if(isset($_POST['login'])){
	
	
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$sql = "select * from admin where username='$username'";
	$qry = mysql_query($sql);
	$nr = mysql_num_rows($qry);
	
	if($nr>0){
		while($data = mysql_fetch_array($qry)){
			if($password==$data['password']){
				$_SESSION['login_admin']=$username;
		echo "<script>alert('Selamat Datang $username');window.location='utama admin.php';</script>";
			}
			else {
		echo "<script>alert('Password Salah');window.location='login_admin.php';</script>";
			}
		}
	}
	else{
		echo "<script>alert('Username Tidak Ditemukan');window.location='login_admin.php';</script>";
	}
	
}
?>

</body>
</html>
