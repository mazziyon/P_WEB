<?php 
require 'model.php';
require 'logincek.php';

$model = new Model();

$recLaporan =$model->fetchLaporan();

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDAM KOTA BENING</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="short icon" href="image/logo.png">
  <style>
    body{
        background-image: url(image/bg.jpg);
        background-repeat: no-repeat;
        background-size: cover;
    }
  </style>

</head>
  <body>
    <div class="container">
        <div class="row">
            <div class="col">
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <img src="image/logo.png" alt="" height="50px" width="50px" class="rounded-circle">
                    <a class="navbar-brand" href="#"><b>PDAM KOTA BENING |</b> </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <b><ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="daftarbayar.php">Daftar Pembayaran</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="pelanggan.php">Pelanggan</a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Admin
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="pembayaran.php"><i class="fa-solid fa-plus"></i> Pembayaran Air</a></li>
                        </ul>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="laporanbulanan.php">Laporan</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="logout.php"><i>Logout</i></a>
                        </li>
                        <!-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">

                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                        </li> -->
                    </ul></b> 
                    </div>
                </div>
                </nav>
            </div>
        </div><!-- /row -->


        <div class="table-responsive">
    <h1 class="text-center mb-2">PDAM KOTA BENING</h1>
    <h1 class="text-center mb-2">LAPORAN PENDAPATAN REKENING AIR</h1>
    <table class="table table-bordered border-primary table-sm table-hover table-striped">
        <thead class="table-dark text-center table-bordered table-hover table-striped">
            <tr>
                <th>NO</th>
                <th>Tanggal Bayar</th>
                <th>NO Rek</th>
                <th>Pelanggan</th>
                <th>Meteran Bulan Ini</th>
                <th>Meteran Bulan Lalu</th>
                <th>Pemakaian</th>
                <th>HPKA</th>
                <th>Bayar</th>
            </tr>
        </thead>
        <tbody class="text-center">
            <?php
            $model = new Model();
            $nomor = 1;
            $total = 0;
            $totbayar=0;
            $tothpka=" ";
            if ($recLaporan != NULL) {
                foreach ($recLaporan as $laporan) {
                    $total = $total + $laporan['pemakaian'];
                    
                    $totbayar= $totbayar +$laporan['bayar'];
            ?>
                    <tr>
                        <td><?= $nomor ?></td>
                        <td><?= $laporan['tanggal_bayar'] ?></td>
                        <td><?= $laporan['norek'] ?></td>
                        <td><?= $laporan['namaPelanggan'] ?></td>
                        <td class="text-end"><?=number_format($laporan['mbi']) ?></td>
                        <td class="text-end"><?=number_format($laporan['mbl']) ?></td>
                        <td class="text-end"><?=number_format($laporan['pemakaian']) ?></td>
                        <td><?= number_format($laporan['HPKA']) ?></td>
                        <td class="text-end"><?=number_format($laporan['bayar']) ?></td>
                     </tr>
            <?php
                    $nomor++;
                }
            ?>
            <tr>
                <td colspan="6" class="text-center">Jumlah </td>
                <td><?= $total ?></td>
                <td><?= $tothpka ?></td>
                <td><?= $totbayar ?></td>
            </tr>
        <?php
            }
        ?>
        </tbody>
    </table>
</div>

    </div><!-- /container -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>