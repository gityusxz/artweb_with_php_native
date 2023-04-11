<?php

include 'config.php';
$idd = $_GET['id'];

$hapus = mysqli_query($konek, "DELETE FROM artikel WHERE id=$idd");

if ($hapus) {
    header('Location:admin.php');
}
