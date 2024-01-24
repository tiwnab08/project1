<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <a class="navbar-brand" href="index.php">DONOR DARAH</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="tambah.php?aksi=tambah">Data Pendonor</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" method="post" action="index.php">
                    <input class="form-control mr-sm-2" name="kata_kunci" type="search" placeholder="Cari nama pendonor" aria-label="Search">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><i class="fa fa-search"></i> Cari</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">

        <a href="tambah_goldar.php?aksi=tambah">
            <button class="btn btn-info mt-4 mb-4"><i class="fa fa-plus"></i> Tambah Data Golongan Darah</button>
        </a>
        <table class="table table-bordered table-striped table-hover">
            <tr>
                <th>Kode Golongan Darah</th>
                <th>Nama Golongan Darah</th>
                <th>Rhesus</th>
                <th>Kuota Pendonor</th>
                <th>Aksi</th>
            </tr>
            <?php
            include 'koneksi.php';
            $data =  mysqli_query($koneksi, "SELECT * FROM tb_goldar");

            while ($d = mysqli_fetch_array($data)) {
            ?>
                <tr>
                    <td><?= $d['kd_goldar'] ?></td>
                    <td><?= $d['nm_goldar'] ?></td>
                    <td><?= $d['rhesus'] ?></td>
                    <td><?= $d['kuota_pendonor'] ?></td>
                    <td>
                        <a href="tambah_goldar.php?aksi=edit&kode=<?= $d['kd_goldar'] ?>">
                            <button class="btn btn-warning"><i class="fa fa-edit"></i> Edit</button>
                        </a>
                        <a href="proses_goldar.php?aksi=hapus&kode=<?= $d['kd_goldar'] ?>">
                            <button class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
                        </a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
</body>

</html>