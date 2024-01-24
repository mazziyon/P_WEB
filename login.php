<?php
require 'model.php';

$model = new Model();

if(isset($_POST['login'])) {
    // echo "Login Aktif..";
    // var_dump($_POST);
    $namauser = $_POST['namauser'];
    $password = $_POST['password'];
    $recLogin = $model->CEKPASSWORD( $namauser, $password);
//  var_dump($recLogin);die; 
    if( $recLogin != NULL){
        $_SESSION['log'] = True;
        header('location:index.php');
    }else { 
        echo "<script> alert('Data Gagal Di Simpan'); </script>";
        header('location:login.php?namauser=$namauser'); 
       
    } 
    
    if(!isset($_SESSION['log'])){
    }else{
            header('location:index.php');
        
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="short icon" href="image/logopas.jpg">
    <script src="https://kit.fontawesome.com/ee8b0520cc.js" crossorigin="anonymous"></script>
    <style>
        body{
        background-image: url(image/onepiece.png);
        background-repeat: no-repeat;
        background-size: cover;
    }
    .card{
        margin-top: 100px;
    }
    </style>
</head>
  <body>
  <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>LOGIN DULU!!</h3>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="mb-1">
                                <label for="namauser" class="form-label">Username</label>
                                <div class="input-group">
                                <div class="input-group-text"><i class="fa-solid fa-user"></i></div>
                                <input type="text" class="form-control" id="namauser" name="namauser">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <div class="input-group">
                                <div class="input-group-text"><i class="fa-solid fa-key"></i></div>
                                <input type="password" class="form-control" id="password" name="password" autocomplete="off">
                                </div>
                            </div>
                            <button type="submit" name="login" class="btn btn-success">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>