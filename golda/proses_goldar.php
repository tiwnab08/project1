<?php
include 'koneksi.php';

if ($_GET['aksi'] == 'tambah') {
    $kd_goldar   = $_POST['kd_goldar'];
    $nm_goldar = $_POST['nm_goldar'];
    $rhesus      = $_POST['rhesus'];
    $kuota_pendonor     = $_POST['kuota_pendonor'];

    $insert = mysqli_query($koneksi, "INSERT INTO `tb_goldar`(`kd_goldar`, `nm_goldar`, `rhesus`, `kuota_pendonor`) 
                                        VALUES ('$kd_goldar','$nm_goldar','$rhesus','$kuota_pendonor')");

    header("location:goldar.php");
} elseif ($_GET['aksi'] == 'edit') {
    $kode   = $_POST['kd_goldar'];
    $kd_goldar   = $_POST['kd_goldar'];
    $nm_goldar = $_POST['nm_goldar'];
    $rhesus      = $_POST['rhesus'];
    $kuota_pendonor     = $_POST['kuota_pendonor'];


    $update = mysqli_query($koneksi, "UPDATE `tb_goldar` SET 
                `kd_goldar`='$kd_goldar',
                `nm_goldar`='$nm_goldar',
                `rhesus`='$rhesus',
                `kuota_pendonor`='$kuota_pendonor' WHERE kd_goldar =  '" . $kode . "'");

    header("location:goldar.php");
} elseif ($_GET['aksi'] == 'hapus') {

    $delete = mysqli_query($koneksi, "DELETE FROM `tb_goldar` WHERE kd_goldar = '" . $_GET['kode'] . "'");

    header("location:goldar.php");
}
