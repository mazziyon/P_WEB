<?php 
require 'model.php';
require 'logincek.php';

$model = new Model();
    // var_dump($recPenjualanbulanan);die;
    function namabulan($bulan){
        $namabulan= array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
        $bulan =(int)$bulan;
        return $namabulan[$bulan];
    }

// $recLaporan =$model->fetchLaporan();
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDAM KOTA BENING</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="short icon" href="image/logopas.jpg">
  <script src="https://kit.fontawesome.com/ee8b0520cc.js" crossorigin="anonymous"></script>
  <style>
    body{
        background-image: url(image/onepiece.png);
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
                    <img src="image/logopas.jpg" alt="" height="50px" width="50px" class="rounded-circle">
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
                        <a class="nav-link" aria-current="page" href="daftarbayar.php">Daftar Pembayaran</a>
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
                        <a class="nav-link active" href="laporanbulanan.php">Laporan</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="logout.php"><i>Logout</i></a>
                        </li>
                    </ul></b>
                    </div>
                </div>
                </nav>
            </div>
        </div><!-- /row -->

        <div class="row">
        <h1 class="text-dark text-center ">Laporan Pembayaran Air</h1><br>
          <form method="post">
            <!-- membuat 2 kolom pada 1 baris yaitu .row -->
            <div class="row mt-2">
              <div class="col-md-3">
                <div class="mb-2">
                  <!-- <label for="tanggalfaktur" class="form-label">Tanggal Hari Ini</label> -->
                  <input type="month" class="form-control" id="tgl_faktur" name="tgl_faktur"
                    value="<?= date('Y-m') ?>">
                </div>
              </div>
              <div class="col-md-4">
                <div class="mb-2">
                  <button type="submit" name="tampil" class="btn btn-success">Tampil Laporan</button>
                </div>
              </div>
            </div>
          </form>
        </div>
        <?php
        if (isset($_POST['tampil'])) { 
                  $tanggalfaktur = $_POST['tgl_faktur'];
                  $tanggalfaktur = strtotime($tanggalfaktur);
                  $tahun = date("Y", $tanggalfaktur);
                  $bulan = date("m", $tanggalfaktur);
                  // $namabulan =CARIBULAN($bulan);
                  // echo $bulan.'_'.$tahun; die;
                  $model = new Model();
                  $recLaporan = $model->fetchLaporanBulanan($bulan,$tahun);
          ?>

    <div class="row mt-5">
      <h2 class="text-center mb-2">PDAM KOTA BENING</h2>
      <h2 class="text-center mb-2">LAPORAN PENDAPATAN REKENING AIR</h2>
      <h4 class="text-center" ><b>Periode : <?=namabulan($bulan) .' '.$tahun ?></b> </h4>
                </div>
    </div>

    <div class="table-responsive mt-5">
    <table class="table table-bordered border-warning table-sm table-hover table-striped mb-5">
        <tr>
        <thead class="table-info text-center table-bordered table-hover table-striped">
                <th>NO</th>
                <th>Tanggal Bayar</th>
                <th>NO Rek</th>
                <th>Pelanggan</th>
                <th>Meteran Bulan Ini</th>
                <th>Meteran Bulan Lalu</th>
                <th>Pemakaian</th>
                <th>HPKA Rp.</th>
                <th>Bayar Rp.</th>
        </thead>
        </tr>
        <?php 
                
                 // var_dump($recLaporan); die;//uji apakah data satuan bisa dibaca dalam bentuk array
                  $total=0;
                  $totbayar=0;
                  $nomor = 1;
                  if ($recLaporan != NULL) { //jika table satuan tidak kosong,prog tidak menampilkan table, jadi terhindar eror  
                    foreach ($recLaporan as $laporan) { //awal looping foreach
                      $total = $total + $laporan['pemakaian'];
                    $totbayar= $totbayar +$laporan['bayar'];

        ?>
        <tr>
        <tbody class="text-center">
                <td><?= $nomor++ ?></td>
                <td><?= $laporan['tgl_bayar'] ?></td>
                <td><?= $laporan['norek'] ?></td>
                <td><?= $laporan['namaPelanggan'] ?></td>
                <td class="text-end"><?=number_format($laporan['mbi']) ?></td>
                <td class="text-end"><?=number_format($laporan['mbl']) ?></td>
                <td class="text-end"><?=number_format($laporan['pemakaian']) ?></td>
                <td><?= number_format($laporan['HPKA']) ?></td>
                <td class="text-end"><?=number_format($laporan['bayar']) ?></td>
            <?php
                    }
                }
              
            ?>
             <tr>
                <td colspan="6" class="text-center"><b>Jumlah</b> </td>
                <td class="text-center"><?= $total ?></td>
                <td></td>
                <td><?= number_format($totbayar) ?></td>
            </tr>
           
           
              <tr>
              <th class="" colspan="8">Cetak Laporan</th>
              <td class="text-center">
                  <a href="laporanbulananprint.php?bulanfaktur=<?= $bulan?> & tahunfaktur=<?=$tahun?>"
                  class="btn btn-success btn-sm" target="_blank">+Print</a>         
              </td>
            </tr>

        </tbody>
        </tr>
        <?php 
            }
             ?>
    </table>
</div>

    </div><!-- /container -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
