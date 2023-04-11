<?php

//masukkan file koneksinya
include 'config.php';

//eksekusi query

$query = mysqli_query($konek, "SELECT * FROM artikel order by id desc");

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
        <div class="row">
            <div class="col-md-12">
                <div class="jumbotron">
                    <h2 class="font-weight-bold">
                        Ahlan wa Sahlan
                    </h2>
                    <p>
                        This is a template for a simple marketing or informational website. It includes a large callout called the hero unit and three supporting pieces of content. Use it as a starting point to create something more unique.
                    </p>
                    <p>
                        <a class="btn btn-primary btn-large" href="#">Learn more</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row ml-4">
        <h4 class="font-weight-bold">Artikel Terbaru</h4>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <?php
                foreach ($query as $value) { ?>
                    <div class="col-md-3 mt-3">
                        <div class="card ml-4" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title"><?= $value['judul_artikel'] ?></h5>
                                <p class="card-text"><?= substr($value['isi'], 0, 50) . "...." ?></p>
                                <a href="artikel_tj.php?judul=<?= $value['judul_artikel'] ?>" class="btn btn-primary">Selengkapnya -></a>
                            </div>

                        </div>
                    </div>
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