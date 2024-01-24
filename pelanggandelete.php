<?php 
require 'model.php';
require 'logincek.php';


$model= new Model();
$norek = $_REQUEST['norek'];
// echo "ditemukan".$norek;die;

$recPelanggan = $model->pelangganDelete($norek);

if($recPelanggan){
    echo "<script> alert('Data Berhasil Dihapus'); </script>";
    echo "<script> window.location='pelanggan.php'; </script>";
}

?>