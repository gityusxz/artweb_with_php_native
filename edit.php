<?php

//masukkan file koneksinya
include 'config.php';

//eksekusi query
$idd = $_GET['id'];
$query = mysqli_query($konek, "SELECT * FROM artikel WHERE id = $idd");
$kategori = mysqli_query($konek, "SELECT * FROM kategori");


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
                    </button> <a class="navbar-brand text-light" href="index.php">artWeb</a>

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

        <div class="row mt-5">
            <div class="col-md-10">
                <h4 class="float-left">Edit Data</h4>
                <a href="admin.php">
                    <button class="btn btn-success my-2 my-sm-0 text-light float-right" type="submit">
                        Kembali
                    </button>
                </a>
            </div>
        </div>


        <div class="row">
            <div class="col-md-10 mt-3">
                <div class="card">
                    <?php
                    foreach ($query as $data) { ?>

                        <div class="card-body">
                            <form method="POST" action="proses_edit.php">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Judul Artikel</label>
                                            <input value="<?= $data['judul_artikel'] ?>" type="text" name="judul" class="form-control" id="exampleInputEmail1" placeholder="masukkan judul artikel">
                                            <input value="<?= $data['id'] ?>" type="hidden" name="id" class="form-control" id="exampleInputEmail1">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Kategori Artikel</label>
                                            <select class="form-control" name="kategori_id" id="">
                                                <option hidden>pilih kategori</option>
                                                <?php
                                                foreach ($kategori as $item) { ?>
                                                    <option <?php
                                                            if ($item['id'] == $data['kategori_id']) {
                                                                echo "selected";
                                                            }
                                                            ?> value="<?= $item['id'] ?>">
                                                        <?= $item['kategori'] ?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Isi</label>
                                    <textarea name="isi" class="form-control" id="" cols="30" rows="10"><?= $data['isi'] ?></textarea>
                                </div>
                            <?php
                        }
                            ?>
                            <center>
                                <button type="submit" name="simpan" class="btn btn-primary"> <i class="fa fa-paper-plane"></i> Update</button>
                            </center>
                            </form>
                        </div>
                </div>
            </div>
        </div>
    </div>






    <script src="../asset/js/jquery.slim.min.js"></script>
    <script src="../asset/js/bootstrap.bundle.js"></script>
    <script src="../asset/js/bootstrap.min.js"></script>
    <script src="../asset/js/popper.min.js"></script>
</body>

</html>