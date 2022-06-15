<?php
include '../auth/koneksi.php';
$query = mysqli_query($mysqli, "SELECT buku.id, buku.title, buku.penulis, category.id as categoryid, category.nama FROM buku join category on buku.category = category.id");
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
        
        <h6 style="margin-top: 2% ;"> Data Buku :</h6>
				<a href="tambah_buku.php">
					<button type="button" class="btn btn-primary">Tambah</button></a>
				<table style="margin-top: 1%;" class="table table-success table-bordered table-striped ">
					<thead class="bg-info">
						<tr>
							<th>No</th>
							<th>Title</th>
							<th>Penulis</th>
                            <th>Category</th>
							<th class="col-md-1">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 0;
						while ($result = mysqli_fetch_array($query)) {
							$no++;
						?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $result['title']; ?></td>
								<td><?php echo $result['penulis']; ?></td>
                                <td><?php echo $result['nama']; ?></td>
									<td>
										<div class="btn-group" role="group" aria-label="Basic mixed styles example">
											<a href="edit_buku.php?id=<?php echo $result['id'] ?>">
												<button type="button" class="btn btn-warning">Edit</button></a>
											<div class="btn-group" role="group" aria-label="Basic mixed styles example">
												<a href="delete.php?id=<?php echo $result['id'] ?>">
													<button type="button" class="btn btn-danger">Delete</button></a>
											</div>
									</td>

							</tr>
						<?php } ?>
					</tbody>
				</table>
    </div>
</body>

</html>