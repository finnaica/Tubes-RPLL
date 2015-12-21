<?php
include('koneksi.php');
class class_login{
public $nr = 0;
public function getNR($qry){
$nr = mysql_num_rows($qry);
return $nr;
}
public function getResult($a,$b){
return $a+b;
}
}
?>