<?php

include 'config.php';

$id = $_POST['id'];
$jdl = $_POST['judul'];
$isi = $_POST['isi'];
$kt = $_POST['kategori_id'];


$query = "
    UPDATE artikel set judul_artikel='$jdl',
    isi='$isi', kategori_id='$kt' WHERE id=$id";

$edit = mysqli_query($konek, $query);

if ($edit) {
    header('Location:admin.php');
}
