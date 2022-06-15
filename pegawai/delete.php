<?php
include '../auth/koneksi.php';
    $id = $_GET['id'];
    $result = mysqli_query($mysqli, "DELETE FROM pegawai WHERE id=$id");
    header("Location: data_pegawai.php");
?>