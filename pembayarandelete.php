<?php 
require 'model.php';
require 'logincek.php';


$model= new Model();
$idbayar = $_REQUEST['id_bayar'];
// echo "ditemukan".$idbayar;die;

$recBayar = $model->pembayaranDelete($idbayar);

if($recBayar){
    echo "<script> alert('Data Berhasil Dihapus'); </script>";
    echo "<script> window.location='index.php'; </script>";
}

?>