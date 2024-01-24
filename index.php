<?php 
require 'model.php';
require 'logincek.php';
?>

<?php 
$model = new Model();
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
    .judul_menu {
        color: black;
        font-weight: bold;
    }
    
    .card{
        border-radius: 20px;
    }
    .footer{
        text-align: center;
        font-weight: bold;
        font-size: large;
    }
    .paragraf{
        font-weight: bold;
    }
    .paragraf{
        width: 600px;
        height: max-content;
        background-color: #87CEEB;
        border-radius: 20px;
    }
    .row-paragraf{
        border-radius: 80%;
        padding-top: 80px;
    }
    .card{
        border-radius: 20px;
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
                    <a class="navbar-brand" href="#"><b>AIRKU |</b> </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <b><ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
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
                        <a class="nav-link" href="laporanbulanan.php">Laporan</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="logout.php"><i>Logout</i></a>
                        </li>
                    </ul></b> 
                    </div>
                </div>
                </nav>
            </div>
        </div>
        <div ">
            <center>
            <div  class="judul_menu">
                <h3 class="text-center" ><b>SELAMAT DATANG DI WEBSITE</b></h3>
                <h4><b>PDAM KOTA BENING</b></h4><br>
                <h4 class="text-center"><b>KELOMPOK 3</b></h4>
            </div>
           <div class="row-paragraf mt-2">
            <div class="paragraf">
            <p>
            PDAM adalah kependekan dari Perusahaan Daerah Air Minum. PDAM merupakan salah satu unit usaha milik daerah yang bergerak dalam distribusi air bersih kepada masyarakat umum. PDAM terdapat di setiap provinsi, kabupaten, dan kotamadya di seluruh Indonesia.
            </p>
            <p>
            Fungsi utama PDAM adalah untuk melayani masyarakat dengan mencukupi kebutuhan akan air bersih. PDAM bertanggung jawab dalam penyediaan saluran air, pengembangan pelayanan sarana dan prasarana, serta pendistribusian air bersih. Selain itu, PDAM juga memiliki peran dalam mengembangkan perekonomian daerah dengan turut memperluas lapangan pekerjaan dan meningkatkan Pendapatan Asli Daerah (PAD). 
            </p>
            </div>
           </div>
            </center>
        </div>

       <div class="row mt-5 mb-5 text-center">
        <div class="col">
            <div class="card" style="background-color:#87CEEB;">
            <div class="card-header">
                <img src="image/iyon.jpg" alt="" width="150px" style="border-radius: 30px;"height="200px">
            </div>
            <div class="card-body">
                <h6><b>WARYONO</b></h6>
                <h6><b>211100010</b></h6>
                <h6><b>Sistem Informasi</b></h6>

            </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="background-color:#87CEEB;">
            <div class="card-header">
                <img src="image/eldi.jpg" alt="" width="150px"style="border-radius: 30px;"height="200px">
            </div>
            <div class="card-body">
                <h6><b>ENDRIKUS FRIELDI SALAMAO</b></h6>
                <h6><b>211100003</b></h6>
                <h6><b>Sistem Informasi</b></h6>
                

            </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="background-color:#87CEEB;">
            <div class="card-header">
                <img src="image/wahyu.jpg" alt="" width="150px"style="border-radius: 30px;" height="200px">
            </div>
            <div class="card-body">
                <h6><b>MUHAMMAD WAHYU HIDAYAT</b></h6>
                <h6><b>211100018</b></h6>
                <h6><b>Sistem Informasi</b></h6>
                
                

            </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="background-color:#87CEEB;">
            <div class="card-header">
                <img src="image/henky.jpg" alt="" width="150px"style="border-radius: 30px;"height="200px">
            </div>
            <div class="card-body">
                <h6><b>HENKY IRAWAN PUTRA</b></h6>
                <h6><b>211100019</b></h6>
                <h6><b>Sistem Informasi</b></h6>
                
            </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="background-color:#87CEEB;">
            <div class="card-header">
                <img src="image/salma.jpg" alt="" width="150px"style="border-radius: 30px;" height="200px">
            </div>
            <div class="card-body">
                <h6><b>SALMA PUTRI</b></h6>
                <h6><b>211100011</b></h6>
                <h6><b>Sistem Informasi</b></h6>
               

            </div>
            </div>
        </div>
       </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script type="text/javascript">
    function hapusPembayaran(idbayar){
      if(confirm('Yakin Ingin Hapus Data')){
        window.location.href='pembayarandelete.php?id_bayar=' + idbayar;
      }
    }
  </script>
</body>

<footer class="footer">
    <p class="text">UNIVERSITAS METAMEDIA</p>
</footer>
</html>