<?php 
session_start();
class Model{
    private $server = "localhost";
        private $username = "root";
        private $password;
        private $db ="dbair";
        private $conn;

        public function __construct(){
            try{
                $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
            } catch(Exception $e) {
                echo "Koneksi Gagal".$e->getMessage();
            }
        }
        public function fetchPelanggan(){
            $data = null;
            $query ="SELECT * FROM `pelanggan`";
            if($result =$this->conn->query($query)){
                while($row =mysqli_fetch_assoc($result)){
                    $data[] = $row;
                }
            }
            return $data;
        }
        public function pelangganSave($norek,$namapelanggan,$alamat){
            $query ="INSERT INTO `pelanggan`(`norek`, `namaPelanggan`, `alamat`) VALUES ('$norek','$namapelanggan','$alamat')";
            if($sql =$this->conn->query($query)){
                echo "<script> alert('Data Berhasil Di Simpan'); </script>";
                echo "<script> window.location='pelanggan.php'; </script>";
            }else{
                echo "<script> alert('Data Gagal Di Simpan'); </script>";
                echo "<script> window.location='pelanggan.php'; </script>";
            }
    
        }
        public function pembayaranSave($idbayar,$norek,$tanggal,$mbi,$mbl,$HPKA){
            $query ="INSERT INTO `pembayaran`(`id_bayar`,`norek`,`tanggal_bayar`, `mbi`,`mbl`,`HPKA`) VALUES ('$idbayar','$norek','$tanggal','$mbi','$mbl','$HPKA')";
            if($sql =$this->conn->query($query)){
                echo "<script> alert('Data Berhasil Di Simpan'); </script>";
                echo "<script> window.location='daftarbayar.php'; </script>";
            }else{
                echo "<script> alert('Data Gagal Di Simpan'); </script>";
                echo "<script> window.location='daftarbayar.php'; </script>";
            }
    
        }

        public function findPelanggan($norek){
            $query=" SELECT * FROM `pelanggan` WHERE norek='$norek'";
            if($sql= $this->conn->query($query)){
                while ($row =$sql->fetch_assoc()){
                    $data = $row;
    
                }
            }
            return $data;
        }
        public function findBayar($id_bayar){
            $query=" SELECT * FROM `pembayaran` WHERE id_bayar='$id_bayar'";
            if($sql= $this->conn->query($query)){
                while ($row =$sql->fetch_assoc()){
                    $data = $row;
    
                }
            }
            return $data;
        }
        public function pelangganUpdate($data){
            $query="UPDATE `pelanggan` SET `norek`='$data[norek]',`namaPelanggan`='$data[namaPelanggan]',`alamat`='$data[alamat]' 
                WHERE norek ='$data[norek]'";
            //  var_dump($query);die;
            if($sql= $this->conn->query($query)){
                return true;
            }else{
                return false;
            }   
        }
        public function pembayaranUpdate($data){
            $query="UPDATE `pembayaran` SET `id_bayar`='$data[id_bayar]',`norek`='$data[norek]',`tanggal_bayar`='$data[tanggal_bayar]',`mbi`='$data[mbi]',`mbl`='$data[mbl]',`HPKA`='$data[HPKA]'
                WHERE id_bayar ='$data[id_bayar]'";
            //  var_dump($query);die;
            if($sql= $this->conn->query($query)){
                return true;
            }else{
                return false;
            }   
        }
        public function pelangganDelete($norek){
            $query="DELETE FROM `pelanggan` WHERE pelanggan.norek='$norek'";
            if($sql= $this->conn->query($query)){
                return true;
            }else{
                return false;
            }
        }
        public function pembayaranDelete($idbayar){
            $query="DELETE FROM `pembayaran` WHERE pembayaran.id_bayar='$idbayar'";
            if($sql= $this->conn->query($query)){
                return true;
            }else{
                return false;
            }
        }
        public function fetchPembayaran(){
            $data = null;
            $query ="
            SELECT
            pembayaran.id_bayar, DATE_FORMAT(tanggal_bayar, '%d-%m-%Y') AS tanggal,pelanggan.norek, pembayaran.mbi, pembayaran.mbl,
            (pembayaran.mbi - pembayaran.mbl) AS pemakaian,
            pembayaran.HPKA,
            ((pembayaran.mbi - pembayaran.mbl) * pembayaran.HPKA) AS bayar
            
            FROM pembayaran
            INNER JOIN pelanggan ON pembayaran.norek = pelanggan.norek
            ORDER BY pembayaran.tanggal_bayar ASC";
            if($result =$this->conn->query($query)){
                while($row =mysqli_fetch_assoc($result)){
                    $data[] = $row;
                }
            }
            return $data;
        }
        public function fetchLaporan(){
            $data = null;
            $query ="SELECT
            pembayaran.tanggal_bayar,pelanggan.norek, pelanggan.namaPelanggan, pembayaran.mbi, pembayaran.mbl,
            (pembayaran.mbi - pembayaran.mbl) AS pemakaian,
                   pembayaran.HPKA,
                   ((pembayaran.mbi - pembayaran.mbl) * pembayaran.HPKA) AS bayar
                   
                   FROM pembayaran
                   INNER JOIN pelanggan ON pembayaran.norek = pelanggan.norek";
            if($result =$this->conn->query($query)){
                while($row =mysqli_fetch_assoc($result)){
                    $data[] = $row;
                }
            }
            return $data;
        }
        public function fetchLaporanBulanan($bulan,$tahun){
            $data = null;
            $query ="SELECT
                    date(pembayaran.tanggal_bayar) AS tgl_bayar,pelanggan.norek, pelanggan.namaPelanggan, pembayaran.mbi, pembayaran.mbl,
                    (pembayaran.mbi - pembayaran.mbl) AS pemakaian,
                   pembayaran.HPKA,
                   ((pembayaran.mbi - pembayaran.mbl) * pembayaran.HPKA) AS bayar
                   
                   FROM pembayaran
                   INNER JOIN pelanggan ON pembayaran.norek = pelanggan.norek
                    WHERE month(pembayaran.tanggal_bayar)='$bulan' AND year(pembayaran.tanggal_bayar)='$tahun'
                    ORDER BY pembayaran.tanggal_bayar
                   ";
            if($result =$this->conn->query($query)){
                while($row =mysqli_fetch_assoc($result)){
                    $data[] = $row;
                }
            }
            return $data;
        }
        public function CEKPASSWORD($namauser,$password){
            $data =null;
            $query = "SELECT * FROM `table_user` WHERE namauser= '$namauser' AND password='$password'";
            if( $sql = $this->conn->query ($query)){
                while($rows = mysqli_fetch_assoc($sql)){
                    $data[] = $rows; //ambil hanya 1 record data yang memenuhi syarat
                }
            }
            return $data;
        }
    
}





?>