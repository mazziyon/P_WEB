<?php 
require 'model.php';
require 'logincek.php';

$model = new Model();
$bulan = $_REQUEST['bulanfaktur'];
$tahun = $_REQUEST['tahunfaktur'];
$recPenjualanbulanan=$model->fetchLaporanBulanan($bulan, $tahun);
    // var_dump($recPenjualanbulanan);die;
    function namabulan($bulan){
        $namabulan= array("","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
        $bulan =(int)$bulan;
        return $namabulan[$bulan];
    }

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PDAM KOTA BENING</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="short icon" href="image/logopas.jpg">
  <style>
    @media print{
        .aksi{
            /* display none : menyembunyikan elemen html dari halaman web */
            display: none; 
        }
        
    }
    .ttd{
      text-align: right;
    }
  </style>

</head>
  <body>
    
    <div class="card">
        <div class="card-header">
            <div class="row text-center">
                <div class="col">
                    <h4>PDAM KOTA BENING</h4>
                    <H4>LAPORAN PENDAPATAN AIR</H4>
                    <h5>Periode : <?=namabulan($bulan) .' '.$tahun ?> </h5>
                </div>
            </div>
        </div>
        <div class="card-body">
    <table class="table table-bordered table-sm table-hover table-striped">
        <tr>
        <thead class="table text-center table-bordered table-striped">
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
                  $total=0;
                  $totbayar=0;
                  $nomor = 1;
                  if ($recPenjualanbulanan != NULL) {  
                    foreach ($recPenjualanbulanan as $laporan) { //awal looping foreach
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
            </tbody>
            </tr>
            <?php
                    }
                }
              
            ?>
             <tr>
                <td colspan="6" class="text-center"><b>Jumlah</b> </td>
                <td><?= $total ?></td>
                <td></td>
                <td><?= number_format($totbayar) ?></td>
            </tr>
            <tr class="aksi">
              <th class="text-center" colspan="8">Cetak Laporan</th>
              <td class="text-center">
                  <a href="laporanbulananprint.php?bulanfaktur=<?= $bulan?>&tahunfaktur=<?=$tahun?>"
                  class="btn btn-success btn-sm">+Print</a>         
              </td>
            </tr>
       
    </table>
    <div class="ttd">
    <h5>Padang <?php echo date("d-m-y"); ?></h5>
    <H5>Manejer PDAM</H5><br>
    <br><br><h5>Salma Putri S.kom</h5>
    </div>

    
    </div>
    </div>

    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="text/javascript">
    window.print();
  </script>
</body>
</html>
