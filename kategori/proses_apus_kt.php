<?php

include '../config.php';
$idd = $_GET['id'];

$hapus = mysqli_query($konek, "DELETE FROM kategori WHERE id=$idd");

if ($hapus) {
    header('Location:kategori.php');
}
