<?php
session_start();
if(empty($_SESSION['login'])){
	echo $_SESSION['login'];
	header("Location: ../index.php");
}
$host = 'localhost';
$dbname = 'tokoh_buku';
$user ='root';
$pass= '';
$port = 3307;
$mysqli = mysqli_connect($host,$user,$pass,$dbname,$port);
if(!$mysqli){
	die("Koneksi Gagal". mysqli_connect_error());
}
?>