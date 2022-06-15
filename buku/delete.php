<?php
include '../auth/koneksi.php';
    $id = $_GET['id'];
    $result = mysqli_query($mysqli, "DELETE FROM buku WHERE id=$id");
    header("Location: data_buku.php");
?>