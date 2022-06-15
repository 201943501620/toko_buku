<?php
include '../auth/koneksi.php';
$category = mysqli_query($mysqli, "SELECT * FROM category");
if (isset($_POST['save'])) {
    $titles = $_POST['Title'];
    $penuliss = $_POST['Penulis'];
    $categorys = $_POST['Category'];
    $query = "INSERT INTO buku (title,penulis,category) VALUES('$titles', '$penuliss', '$categorys')";
    if (mysqli_query($mysqli, $query)) {
        header("Location: data_buku.php");
    } else {
        echo "<div class=\"alert alert-danger\" role=\"alert\">Gagal Mengubah</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="../img/favicon.ico"/>
    <title>Toko Buku</title>
    <link href="../css/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
            <a href="#" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap" />
                </svg>
            </a>

            <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="../buku/data_buku.php" class="nav-link px-2 link-dark">Buku</a></li>
                <li><a href="../category/data_category.php" class="nav-link px-2 link-dark">Category</a></li>
                <li><a href="../transaksi/data_transaksi.php" class="nav-link px-2 link-dark">Transaksi</a></li>
                <li><a href="../pegawai/data_pegawai.php" class="nav-link px-2 link-secondary">Pegawai</a></li>
            </ul>

            <div class="col-md-3 text-end">
                <form action="../auth/logout.php" method="post">
                    <input type="submit" class="btn btn-outline-danger me-2" name="logout" value="Logout" />
                </form>
            </div>
        </header>

        <h6 style="margin: 2% 0%  ;"> Tambah Buku :</h6>

        <form class="row g-3" method="post">
            <div class="col-md-12">
                <label for="Title" class="form-label">Title</label>
                <input type="text" class="form-control" id="Title" name="Title" >
            </div>
            <div class="col-6">
                <label for="Penulis" class="form-label">Penulis</label>
                <input type="text" class="form-control" id="Penulis" name="Penulis">
            </div>
            <div class="col-6">
                <label for="Category" class="form-label">Category</label>
                <select class="form-select" aria-label="Default select example" name="Category">
                    <option hidden value="1">Pilih Category</option>
                    <?php
                    while ($option = mysqli_fetch_array($category)) {
                    ?> <option value="<?php echo $option['id']; ?>"><?php echo $option['nama']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-12 m-2">
                <input type="submit" class="btn btn-dark m-1" name="save" value="Tambah">
            </div>
        </form>
    </div>
</body>

</html>