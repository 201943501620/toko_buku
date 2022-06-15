<?php
include '../auth/koneksi.php';
    $id = $_GET['id'];
    $result = mysqli_query($mysqli, "DELETE FROM category WHERE id=$id");
    header("Location: data_category.php");
?>