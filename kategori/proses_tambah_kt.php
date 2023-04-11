<?php

include '../config.php';


// echo $jdl, $isi;

//ini buat ngecek apakah tombol simpan di klik atau ngga

$kt = $_POST['kt'];
$cekdup = mysqli_num_rows(mysqli_query($konek, "SELECT kategori FROM kategori where kategori ='$kt'"));

if ($cekdup > 0) {
    $_SESSION['pesan'] = "Oops! Duplikat input data...";
    header('Location:tambah_kategori.php');
} else {

    $tambah = mysqli_query($konek, "INSERT INTO kategori (kategori) VALUES ('$kt')");

    if ($tambah) {
        header('Location:kategori.php');
    }
}
