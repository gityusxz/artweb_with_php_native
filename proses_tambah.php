<?php

include 'config.php';


// echo $jdl, $isi;

//ini buat ngecek apakah tombol simpan di klik atau ngga
if ($_POST['judul'] && $_POST['isi']  != "") {
    //===========================================

    $jdl = $_POST['judul'];
    $isi = $_POST['isi'];
    $kt = $_POST['kategori_id'];

    // $query = "INSERT INTO artikel (judul_artikel, isi) VALUES ('$jdl','$isi')";
    $tambah = mysqli_query($konek, "INSERT INTO artikel (judul_artikel, isi, kategori_id) VALUES ('$jdl','$isi', $kt)");

    if ($tambah) {
        header('Location:admin.php');
    } else {
        echo "GAGAL";
    }
} else {
    header('Location:tambah.php');
    exit;
}
