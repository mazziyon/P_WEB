<?php 

require 'model.php';
require 'logincek.php';

$model = new Model();

$recPelanggan = $model->fetchPelanggan();

if(isset($_POST['simpan'])){
    // var_dump($_POST);
    $norek =$_POST['norek'];
    $namapelanggan =$_POST['namaPelanggan']; 
    $alamat =$_POST['alamat'];
    
    $recPelanggan =$model->pelangganSave($norek,$namapelanggan,$alamat);
}
// if(!isset($_SESSION["log"])){
//     header("Location: login.php");
// }

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
    .bg{
        background-image: url(image/onepiece.png);
        background-repeat: no-repeat;
        background-size: cover;
    }
  </style>

    
</head>
  <body class="bg">
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
                        <a class="nav-link" aria-current="page" href="daftarbayar.php">Daftar Pembayaran</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link active" href="pelanggan.php">Pelanggan</a>
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
                        <a class="nav-link" href="logout.php"><i></i>Logout</a>
                        </li>
                        
                    </ul></b>
                    </div>
                </div>
                </nav>
            </div>
        </div>

        <div class="row">
            <form action="" method="post">
                <h1 class="text-center text-dark mt-3">DATA PELANGGAN</h1>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success mb-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                 +ADD
                </button>
            </form>
        </div>



        <div class="table-responsive">
        <table class="table table-bordered border-warning table-s table-hover table-striped">
            <tr>
            <thead class="table-info text-center">
                <th>NO</th>
                <th>NO Rek</th>
                <th>Nama Pelanggan</th>
                <th>Alamat</th>
                <th>Action</th> 
            </thead>
            </tr>
            <?php 
            $model = new Model();
            $nomor =1;
            if($recPelanggan != NULL){
                foreach ($recPelanggan as $pelanggan){
            ?>

            <tr>
            <tbody class="text-center">
                <td><?= $nomor ?></td>
                <td><?= $pelanggan['norek'] ?></td>
                <td><?= $pelanggan['namaPelanggan'] ?></td>
                <td><?= $pelanggan['alamat'] ?></td>
                <td class="text-center">
                    <a href="pelangganedit.php?norek=<?=$pelanggan['norek']?>" class="btn btn-sm btn-primary"><i class="fa-sharp fa-regular fa-pen-to-square"></i></a>
                    <a href="javascript:hapusPelanggan('<?=$pelanggan['norek']?>')" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></a>
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
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Pelanggan </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="" method="post">
                    <input type="hidden" name="norek" id="norek" class="form-control">
                    <label for="namaPelanggan" class="form-label">Nama Pelanggan</label>
                    <input type="text" name="namaPelanggan" id="namaPelanggan" class="form-control">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control">
                    <button type="submit" name="simpan" class="btn btn-primary mt-2">Simpan</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
            </div>
            </div>
        </div>
    </div>

    </div><!-- /container -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <script type="text/javascript">
    function hapusPelanggan(norek){
      if(confirm('Yakin Ingin Hapus Data')){
        window.location.href='pelanggandelete.php?norek=' + norek;
      }
    }
  </script>
</body>
</html>