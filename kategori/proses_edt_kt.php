<?php

include '../config.php';

$id = $_POST['id'];
$kt = $_POST['kt'];

$cekdup = mysqli_num_rows(mysqli_query($konek, "SELECT kategori FROM kategori where kategori ='$kt'"));
// $quer = mysqli_query($konek, "SELECT kategori FROM kategori where id =$kt");


if ($cekdup === 1) {
    header("Location:kategori.php");
} else if ($cekdup > 0) {
    header("Location:edit_kt.php?id=$id");
} else {
    $query =  mysqli_query($konek, "UPDATE kategori set kategori='$kt' WHERE id=$id");
    header("Location:kategori.php");
}

