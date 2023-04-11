<?php


//kuncinyaa dah dapet nihhh
$jdl = $_GET['judul'];
// echo $jdl

//terus eksekusi querynya
//sertakan file koneksi
include 'config.php';

$query = mysqli_query($konek, "select * from artikel where judul_artikel = '$jdl'");

// query buat list artikel
$all = mysqli_query($konek, "select * from artikel where judul_artikel != '$jdl' order by id desc limit 4");

// echo $jdl;
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">

</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navbar-light bg-info">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="navbar-toggler-icon"></span>
                    </button> <a class="navbar-brand text-light" href="#">artWeb</a>

                    <ul class="navbar-nav ml-md-auto">
                        <a href="admin.php">
                            <button class="btn btn-warning my-2 my-sm-0 text-light" type="submit">
                                Login
                            </button>
                        </a>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-8">
                <?php
                foreach ($query as $value) { ?>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page"> <?= $value['judul_artikel'] ?></li>
                        </ol>
                    </nav>


                    <div class="card">
                        <div class="card-body">


                            <h5 class="font-weight-bold"><?= $value['judul_artikel'] ?></h5>
                            <p class="text-justify"><?= $value['isi'] ?></p>
                        <?php
                    }
                        ?>
                        </div>
                    </div>
            </div>

            <div class="list-group col-md-4">

                <a class="list-group-item list-group-item-action active" aria-current="true">
                    Artikel lainnya
                </a>
                <?php
                foreach ($all as $data) { ?>
                    <a href="artikel_tj.php?judul=<?= $data['judul_artikel'] ?>" class="list-group-item"><?= $data['judul_artikel'] ?></a>
                <?php
                }
                ?>
            </div>
        </div>
    </div>





    <script src="../asset/js/jquery.slim.min.js"></script>
    <script src="../asset/js/bootstrap.bundle.js"></script>
    <script src="../asset/js/bootstrap.min.js"></script>
    <script src="../asset/js/popper.min.js"></script>
</body>

</html>