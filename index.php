<?php 

require_once 'config/database.php';
require_once 'includes/function.php';

echo "<h1>Selamat Datang di Web Kasir!</h1>";
echo "<p>koneksi ke Database PDO berhasil di jalankan</p>";
echo "<p>Test fungsi rupiah: " . rupiah(150000) . "</p>";
?>

//Testing Saja 