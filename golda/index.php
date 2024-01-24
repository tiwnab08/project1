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
    <nav class="navbar navbar-expand-lg navbar-dark bg-info">
        <div class="container">
            <a class="navbar-brand" href="index.php">DONOR DARAH</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="goldar.php">Data Golongan Darah</a>
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
        <a href="tambah.php?aksi=tambah">
            <button class="btn btn-info mt-4 mb-4"> <i class="fa fa-add"></i> Tambah Data Pendonor</button>
        </a>
        <table class="table table-bordered table-striped table-hover">
            <tr class="text-center">
                <th>ID Pendonor</th>
                <th>Kode Golongan Darah</th>
                <th>Nama Pendonor</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>No.Hp.</th>
                <th>Aksi</th>
            </tr>
            <?php
            include 'koneksi.php';
            if (isset($_POST['kata_kunci'])) {
                $kata_kunci =  $_POST['kata_kunci'];
                $data = mysqli_query($koneksi, "SELECT * FROM tb_pendonor WHERE nm_pendonor LIKE '%$kata_kunci%'");
            } else {
                $data =  mysqli_query($koneksi, "SELECT * FROM tb_pendonor");
            }
            $no = 1;
            while ($d = mysqli_fetch_array($data)) {
            ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td><?= $d['kd_goldar'] ?></td>
                    <td><?= $d['nm_pendonor'] ?></td>
                    <td><?= $d['jekel'] ?></td>
                    <td><?= $d['alamat'] ?></td>
                    <td><?= $d['no_hp'] ?></td>
                    <td class="text-center">
                        <a href="tambah.php?aksi=edit&id=<?= $d['id_pendonor'] ?>">
                            <button class="btn btn-warning"><i class="fa fa-edit"></i> Edit</button>
                        </a>
                        <a href="proses.php?aksi=hapus&id=<?= $d['id_pendonor'] ?>">
                            <button class="btn btn-danger" onclik="return confirm('Apakah Anda Yakin Akan Menghapus?')"><i class="fa fa-trash"></i> Hapus</button>
                        </a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
</body>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</html>