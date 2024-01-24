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
        <h4 class="mb-2 mt-2"><?= strtoupper($_GET['aksi']) ?></h4>
        <?php

        include 'koneksi.php';
        $data_goldar = mysqli_query($koneksi, "SELECT * FROM tb_goldar");

        $id_pendonor = "";
        $kd_goldar = "";
        $nm_pendonor = "";
        $jekel = "";
        $alamat = "";
        $no_hp = "";

        if ($_GET['aksi'] == 'edit') {

            $data_edit = mysqli_query($koneksi, "SELECT * FROM tb_pendonor WHERE  id_pendonor = '" . $_GET['id'] . "'");
            while ($e = mysqli_fetch_array($data_edit)) {
                $id_pendonor = $e['id_pendonor'];
                $kd_goldar   = $e['kd_goldar'];
                $nm_pendonor = $e['nm_pendonor'];
                $jekel      = $e['jekel'];
                $alamat     = $e['alamat'];
                $no_hp      = $e['no_hp'];
            }
        }

        ?>
        <form method="post" action="proses.php?aksi=<?= $_GET['aksi'] ?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-2">
                        <input type="hidden" name="id_pendonor" value="<?= $id_pendonor ?>">
                        <label>Golongan Darah</label>
                        <select name="kd_goldar" class="form-control">
                            <option value="">Pilih Golongan Darah</option>
                            <?php
                            while ($d = mysqli_fetch_array($data_goldar)) {
                                $select = $kd_goldar == $d['kd_goldar'] ? 'selected' : '';
                            ?>
                                <option value="<?= $d['kd_goldar'] ?>" <?= $select ?>><?= $d['nm_goldar'] ?> - <?= $d['rhesus'] ?> - <?= $d['kuota_pendonor'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-2">
                        <label>Nama Pendonor</label>
                        <input type="text" name="nm_pendonor" value="<?= $nm_pendonor ?>" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label>Jenis Kelamin</label>
                        <select name="jekel" class="form-control">
                            <option <?= $jekel == "Laki-laki" ? "selected" : "" ?>>Laki-laki</option>
                            <option <?= $jekel == "Perempuan" ? "selected" : "" ?>>Perempuan</option>
                        </select>
                    </div>

                    <div class="mb-2">
                        <label>Alamat</label>
                        <input type="text" name="alamat" value="<?= $alamat ?>" class="form-control">

                    </div>

                    <div class="mb-2">
                        <label>No.Hp.</label>
                        <input type="text" name="no_hp" value="<?= $no_hp ?>" class="form-control">
                    </div>

                    <button class="btn btn-success" type="submit">
                        <i class="fa fa-save"></i>
                        Simpan
                    </button>
                    <a href="index.php" class="btn btn-light pull-rigth ml-5">
                        <i class="fa fa-save"></i>
                        Batal
                    </a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>