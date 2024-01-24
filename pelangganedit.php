<?php 
require 'model.php';
require 'logincek.php';


$model=new Model();
$norek =$_REQUEST['norek'];
// var_dump($norek);die;
$recPelanggan = $model->findPelanggan($norek);
if(isset($_POST['update'])){
  $data['norek'] = $norek;
  $data['namaPelanggan'] = $_POST['namaPelanggan'];
  $data['alamat'] = $_POST['alamat'];

  
  $recPelanggan =$model->pelangganUpdate($data);
  // var_dump($recPelanggan);die;
  if($recPelanggan){
      echo "<script> alert('Data Berhasil Di Update'); </script>";
      //kembali ke index2 setelah data diupdate
      echo "<script> window.location='pelanggan.php'; </script>";
  }else{
      echo "<script> alert('Data Gagal Di Update'); </script>";
      echo "<script> window.location='pelanggan.php'; </script>";
  }
}

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
            <nav class="navbar navbar-expand-lg ">
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
    </div>
    <div class="row mt-5">
      <div class="col-md-6 mx-auto">
        <h1 class="text-center text-primary"><b>UPDATE PELANGGAN</b></h1>
      <form action="" method="post">
                    <b>
                    
                    <input type="hidden" name="norek" id="norek" class="form-control " value="<?=$recPelanggan['norek'];?>">
                    <label for="namaPelanggan" class="form-label">Nama Pelanggan</label>
                    <input type="text" name="namaPelanggan" id="namaPelanggan" class="form-control" value="<?=$recPelanggan['namaPelanggan'];?>">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control"value="<?=$recPelanggan['alamat'];?>">
                    <button type="submit" name="update" class="btn btn-primary mt-2">UPDATE</button>
                    </b>
                </form>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>