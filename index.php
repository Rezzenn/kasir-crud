<?php 
include 'config/database.php';
require_once 'includes/function.php';

if(!isset($_SESSION['is_login'])) {
    header("Location: login.php");
}

echo $_SESSION['name'];

echo "<h1>Selamat Datang di Web Kasir!</h1>";
echo "<p>koneksi ke Database PDO berhasil di jalankan</p>";
echo "<p>Test fungsi rupiah: " . rupiah(150000) . "</p>";
?>

//Testing Saja hehehe