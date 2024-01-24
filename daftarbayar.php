<?php 
require 'model.php';
require 'logincek.php';

?>

<?php 

$model = new Model();

$recBayar =$model->fetchPembayaran();

// var_dump($recBayar);die;

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
            <nav class="navbar navbar-expand-lg ">
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
        </div>
   <!--  -->
        <!-- <div class="row">
            <form action="" method="post">
                <h1 class="text-center text-primary mt-3">REKENING PEMBAYARAN</h1>
                 Button trigger modal -->
                <!-- <button type="button" class="btn btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                 +ADD
                </button> -->
            <!-- </form> -->
        <!-- </div> --> 

        <div class="table-responsive">
          <h1 class="text-center mb-5">DAFTAR PEMBAYARAN AIR</h1>
        <table class="table table-bordered border-warning table-sm table-hover table-striped">
            <tr>
            <thead class="table-info text-center  table-bordered table-hover table-striped">
                <th>NO</th>
                <th>ID Bayar</th>
                <th>Tanggal Bayar</th>
                <th>NO Rek</th> 
                <th>Meteran Bulan Ini</th>
                <th>Meteran Bulan Lalu</th>
                <th>Pemakaian</th>
                <th>HPKA</th>
                <th>Bayar</th>
                <th>Action</th> 
            </thead>
            </tr>
            <?php 
            $model = new Model();
            $nomor =1;
            if($recBayar != NULL){
                foreach ($recBayar as $bayar){
            ?>

            <tr>
            <tbody class="text-center">
                <td><?= $nomor ?></td>
                <td><?= $bayar['id_bayar'] ?></td>
                <td><?= $bayar['tanggal']?></td>
                <td><?= $bayar['norek'] ?></td>
                <td><?= $bayar['mbi'] ?></td>
                <td><?= $bayar['mbl'] ?></td>
                <td><?= $bayar['pemakaian'] ?></td>
                <td><?= number_format($bayar['HPKA']) ?></td>
                <td><?= number_format($bayar['bayar']) ?></td>
                
             
                </select>
                <td class="text-center">
                    <a href="pembayaranedit.php?id_bayar=<?=$bayar['id_bayar']?>" class="btn btn-sm btn-primary"><i class="fa-sharp fa-regular fa-pen-to-square"></i></a>
                    <a href="javascript:hapusPembayaran('<?=$bayar['id_bayar']?>')" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></a>
                </td>
                
            </tbody>
            </tr>
            <?php 
            $nomor++;
                 }
                }
    
            ?>
        </table>
        </div>
    <!-- Modal -->
    <!-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Pembayaran </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <b>
                    <label for="id_bayar" class="form-label">ID Bayar</label>
                    <input type="number" name="id_bayar" id="id_bayar" class="form-control">
                    <label for="tanggal_bayar" class="form-label">Tanggal Bayar</label>
                    <input type="date" name="tanggal_bayar" id="tanggal_bayar" class="form-control">
                    <label for="mbi" class="form-label">Meteran Bulan Ini</label>
                    <input type="number" name="mbi" id="mbi" class="form-control">
                    <label for="mbl" class="form-label">Meteran Bulan Lalu</label>
                    <input type="number" name="mbl" id="mbl" class="form-control">
                    <label for="HPKA" class="form-label">HPKA</label>
                    <input type="number" name="HPKA" id="HPKA" class="form-control">
                    <label for="norek" class="form-label">Nama Pelangan</label>
                    <select class="form-select mb-2" aria-label="Default select example" name="norek">
                        <option value="">Pilih Pelanggan</option>
                        <?php
                        $recPelanggan = $model->fetchPelanggan();
                        foreach ($recPelanggan as $pelanggan) {
                            echo '<option value="' . $pelanggan['norek'] . '">' . $pelanggan['namaPelanggan'] . '</option>';
                        }

                        ?>
                    </select>
                    <button type="submit" name="simpan" class="btn btn-primary mt-2">Simpan</button>
                    </b>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>/modal -->
    </div><!-- /container -->

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="text/javascript">
    function hapusPembayaran(idbayar){
      if(confirm('Yakin Ingin Hapus Data')){
        window.location.href='pembayarandelete.php?id_bayar=' + idbayar;
      }
    }
  </script>
</body>
</html>