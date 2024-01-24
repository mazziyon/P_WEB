<?php
session_start(); // Inisialisasi session
session_destroy(); // Menghapus semua data session
header("Location: login.php"); // Redirect ke halaman utama atau halaman login
exit();
?>
