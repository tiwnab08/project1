<?php
include 'koneksi.php';

if ($_GET['aksi'] == 'tambah') {
    $kd_goldar   = $_POST['kd_goldar'];
    $nm_pendonor = $_POST['nm_pendonor'];
    $jekel      = $_POST['jekel'];
    $alamat     = $_POST['alamat'];
    $no_hp      = $_POST['no_hp'];

    $insert = mysqli_query($koneksi, "INSERT INTO `tb_pendonor`(`kd_goldar`, `nm_pendonor`, `jekel`, `alamat`, `no_hp`) 
                                        VALUES ('$kd_goldar','$nm_pendonor','$jekel','$alamat','$no_hp')");

    header("location:index.php");
} elseif ($_GET['aksi'] == 'edit') {
    $id   = $_POST['id_pendonor'];
    $kd_goldar   = $_POST['kd_goldar'];
    $nm_pendonor = $_POST['nm_pendonor'];
    $jekel      = $_POST['jekel'];
    $alamat     = $_POST['alamat'];
    $no_hp      = $_POST['no_hp'];


    $update = mysqli_query($koneksi, "UPDATE `tb_pendonor` SET 
                `kd_goldar`='$kd_goldar',
                `nm_pendonor`='$nm_pendonor',
                `jekel`='$jekel',
                `alamat`='$alamat',
                `no_hp`='$no_hp' WHERE id_pendonor =  '" . $id . "'");

    header("location:index.php");
} elseif ($_GET['aksi'] == 'hapus') {

    $delete = mysqli_query($koneksi, "DELETE FROM `tb_pendonor` WHERE id_pendonor = '" . $_GET['id'] . "'");

    header("location:index.php");
}

echo "<script>alert('Berhasil ditambah');window.location.href = 'index.php';</script>";
