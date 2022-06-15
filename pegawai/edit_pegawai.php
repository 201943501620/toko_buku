<?php
include '../auth/koneksi.php';
$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM pegawai WHERE id=$id");
while ($pegawai_data = mysqli_fetch_array($result)) {
    $fullname = $pegawai_data['fullname'];
    $username = $pegawai_data['username'];
    $password = $pegawai_data['password'];
}

if (isset($_POST['save'])) {
    $fullname = $_POST['Fullname'];
    $username = $_POST['Username'];
    $password = $_POST['Pass'];
    $query = "UPDATE pegawai SET fullname='$fullname', username='$username', password='$password' WHERE id=$id";
    if (mysqli_query($mysqli, $query)) {
        header("Location: data_pegawai.php");
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

        <h6 style="margin: 2% 0%  ;"> Data Pegawai :</h6>
        
            <form class="row g-3" method="post">
                    <div class="col-md-12">
                        <label for="Fullname" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="Fullname" name="Fullname" value="<?php echo $fullname?>">
                    </div>
                    <div class="col-6">
                        <label for="Username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="Username" name="Username" value="<?php echo $username?>">
                    </div>
                    <div class="col-6">
                        <label for="Pass" class="form-label">Password</label>
                        <input type="Password" class="form-control" id="Pass" name="Pass" value="<?php echo $password?>">
                    </div>
                    <div class="col-12 m-2">
                        <input type="submit" class="btn btn-dark m-1" name="save" value="Update">
                    </div>
                </form>
    </div>
</body>

</html>