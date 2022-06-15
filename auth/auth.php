<?php
include 'koneksi.php';
session_start();

$pass = $_POST['pass'];	
$username=$_POST['username'];

$query = mysqli_query($mysqli,"SELECT * from pegawai where username = '$username' and password = '$pass' ");
$result = mysqli_num_rows($query);
echo $result;
if($result == 0){
	header("location:../index.php?pesan=error");
}
else{
	$_SESSION['login'] = true;
	header("location:../pegawai/data_pegawai.php");
}

?>