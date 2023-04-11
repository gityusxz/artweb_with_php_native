<?php
//terus eksekusi querynya
//sertakan file koneksi
include 'config.php';

$query = mysqli_query($konek, "SELECT artikel.*, kategori.kategori FROM artikel 
 LEFT JOIN kategori on artikel.kategori_id=kategori.id");

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/fontawesome/css/all.css">

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
            <div class="col-md-3">
                <div class="list-group">
                    <a href="index.php" class="list-group-item list-group-item-action active" aria-current="true">
                        MAIN MENU
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">Data Artikel</a>
                    <a href="kategori/kategori.php" class="list-group-item list-group-item-action">Data Kategori</a>

                </div>
            </div>
            <div class="col-md-9">
                <h4 class="float-left">Data Artikel</h4>
                <a href="tambah.php">
                    <button class="btn btn-primary my-2 my-sm-0 text-light float-right" type="submit">
                        <i class="fa fa-plus-circle"></i> Tambah
                    </button>
                </a>
                <table class="table table-bordered mt-5">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 4%;">#</th>
                            <th scope="col" style="width: 20%;">Judul Artikel</th>
                            <th scope="col" style="width: 25%;">Isi</th>
                            <th scope="col" style="width:15%">Kategori</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($query as $value) { ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $value['judul_artikel'] ?></td>
                                <td><?= substr($value['isi'], 0, 100) . "...." ?></td>
                                <td><?= $value['kategori'] ?></td>
                                <td class="text-center">
                                    <a href="edit.php?id=<?= $value['id'] ?>">
                                        <button class="btn btn-warning my-2 my-sm-0 text-light" type="submit">
                                            <i class="fa fa-pencil-square"></i> Edit
                                        </button></a> &nbsp;
                                    <a href="proses_hapus.php?id=<?= $value['id'] ?>">
                                        <button onclick="return confirm('seriuss mau apuss? <?= $value['judul_artikel'] ?>')" class="btn btn-danger my-2 my-sm-0 text-light" type="submit">
                                            <i class="fa fa-trash"></i> Hapus
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>



        <script src="../asset/js/jquery.slim.min.js"></script>
        <script src="../asset/js/bootstrap.bundle.js"></script>
        <script src="../asset/js/bootstrap.min.js"></script>
        <script src="../asset/js/popper.min.js"></script>
</body>

</html>